<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
        $validator = $request->validate([
            'title' => 'required|unique:post',
            'content' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->id_category = $request->id_category;
        $post->content = $request->content;
        $post->feature = $request->feature;
        $post->status = $request->status;
        if($request->hasFile('image')){
            
            $file = $request->file('image');
          
            $image = uniqid().'_'.time().'_'.date('Ymd').'.' . $file->getClientOriginalName();
            $file->move('upload', $image);
        
            $post->image = $image;
        }else{
            $post->image = '';
        }
        $post->save();
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
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
        $validator = $request->validate([
            'title' => 'required|unique:post,title,'.$id,
            'content' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->id_category = $request->id_category;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->feature = $request->feature;
        if($request->hasFile('image')){
            $file = $request->file('image');
          
            $image = uniqid().'_'.time().'_'.date('Ymd').'.' . $file->getClientOriginalName();
            $file->move('upload', $image);
        
            $post->image = $image;
        }
        $post->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return '';
    }
}
