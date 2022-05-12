<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'desciption'=>'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $book = New Book();
        $book->name = $request->input('name') ;
        $book->description = $request->input('description') ;
        $book->image = $imageName;
        $book->price = $request->input('price') ;
        $book->author_id = $request->input('author_id') ;
        $book->save();
        return response()->json([
            'message'=>'Book created Successfully',
            'book'=>$book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::FindOrFail($id);
        return response()->json(['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $book = Book::FindOrFail($id);
        $book->name = $request->input('name') ;
        $book->description = $request->input('description') ;
        $book->image = $imageName;
        $book->price = $request->input('price') ;
        $book->author_id = $request->input('author_id') ;
        $book->update();
        return response()->json([
            'message'=>'Book updated Successfully',
            'book'=>$book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Book::FindOrFail($id)->delete();
        return response()->json(['message'=>'Book Deleted Successfully']);
    }



}
