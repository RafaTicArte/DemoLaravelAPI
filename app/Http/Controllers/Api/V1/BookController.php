<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\V1\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request     $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Log::debug($request->sort);
        switch($request->sort) {
            case 'title':
                return BookResource::collection(Book::orderBy('title')->paginate());
            case '-title':
                return BookResource::collection(Book::orderBy('title', 'DESC')->paginate());
            case 'description':
                return BookResource::collection(Book::orderBy('description')->paginate());
            case '-description':
                return BookResource::collection(Book::orderBy('description', 'DESC')->paginate());
            case 'oldest':
            case '-latest':
                return BookResource::collection(Book::oldest()->paginate());
            case 'latest':
            default:
                return BookResource::collection(Book::latest()->paginate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\Book             $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Http\Requests\BookRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        if ($request->user('api')->role != '1') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->extra = $request->extra;
        $book->user_id = $request->user('api')->id;

        if ($book->save()) {
            return response()->json(new BookResource($book), 201);
        } else {
            return response()->json(['message' => 'Failed'], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Http\Requests\BookRequest   $request
     * @param  \App\Models\Book             $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if ($request->user('api')->role != '1') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $book->title = $request->title;
        $book->description = $request->description;
        $book->extra = $request->extra;

        if ($book->update()) {
            return response()->json(new BookResource($book), 201);
        } else {
            return response()->json(['message' => 'Failed'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\Book             $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        if ($request->user('api')->role != '1') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if ($book->delete()) {
            return response()->json([
                'message' => 'Success',
            ], 204);
        }

        return  response()->json([
            'message' => 'Not found',
        ], 404);
    }
}
