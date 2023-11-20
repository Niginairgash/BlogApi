<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $blogs
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body' => 'required'
        ]);

        $blog = Blog::create($request->all());
        return [
            "status" => 1,
            "data" => $blog
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $id)
    {
        return [
            "status" => 1,
            "data" => $id
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $id)
    {
        $request ->validate([
            'title'=> 'required',
            'body' => 'required'
        ]);
        $id->update($request->all());

        return [
            'status' =>1,
            'data' => $id,
            'msg' => 'Blog updated successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $id)
    {
        $id->delete();
        return [
            'status' => 1,
            'data' => $id,
            'msg' => 'Blog deleted succsessfully'
        ];
    }
}
