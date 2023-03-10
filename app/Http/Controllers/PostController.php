<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all(); or
        $posts = Post::with('categories')->get();
        return view('post', compact('posts'));
        
        // $categories = Category::with('posts')->get();
        // return view('post', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);


        $post = Post::create($formData);
        $post->categories()->attach($formData['category_id']);

        //this also worked
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        // $data = $request->category_id;

        // dd($data);

        // $post->categories()->attach($data);

        return redirect()->route('post.index');
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
        $categories = Category::all();
        $post = Post::find($id);
        // dd($post);
        return view('post_edit', compact('categories', 'post'));
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
        // dd($request->all());
        // $formData1 = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'category_id' => 'required',
        // ]);

        $formData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('id', $id)->update($formData);
        $formData['category_id'] = $request->category_id;
        $post = Post::find($id);
        $post->categories()->sync($formData['category_id']);

        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('hello');
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('post.index');
    }
}
