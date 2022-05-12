<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorsRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
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
    public function store(AuthorsRequest $request)
    {
        //
        $inputs = $request->all();
        $authors = Author::create($inputs);
        return response()->json([
            'authors'=>$authors
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
        $author =  Author::FindOrFail($id);
        return response()->json(['author'=>$author]);
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
        $author =  Author::FindOrFail($id);
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->email = $request->input('email');
        $author->phone = $request->input('phone');
        $author->update();
        return response()->json(['message'=> 'Author Updated Successfully']);

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
        Author::FindOrFail($id)->delete();
        return response()->json([
            'message' => 'Author Deleted Succesfully'
        ]);
    }

    public function paginate()
    {
        //
        $authors =  Author::paginate(10);
        return response()->json(['authors'=>$authors]);
    }

}
