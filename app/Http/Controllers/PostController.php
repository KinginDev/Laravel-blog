<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blo post in it
        $posts = Post::orderBy('id','DESC')->paginate(5);
        
        //return a view and passt the variable to the view
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
             'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' =>  'required'
           
            ));
        // Store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
       
        $post->save();
//notificationd 
        Session::flash('success','The blog post was succesfully saved');

        // redirect to another page
        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);


        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a variable
        $post = Post::find($id);
        //return the view and pass in the var we prev. created

        return view('posts.edit')->withPost($post);
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
        //Validate the data
        $post = Post::find($id);
        if($request->input('slug') ==$post->slug ) {
            #code
             $this->validate($request ,array(
           'title' => 'required|max:255',
            'body' => 'required'
            ));

        }else{
        $this->validate($request ,array(
           'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255| unique:posts,slug',
            'body' => 'required'
            ));
    }
        //save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();
        //set flash data with success message
        Session::flash('success','This Post was Successfully Updated');

        //redirect with flash data to the post.show

            return redirect()->route('post.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find th post with an id
        $post = Post::find($id);
        //Delete with the eloquent model delete
        $post->delete();
        // set flash data
        Session::flash('success', "The Post was Successfully deleted");
        return redirect()->route('post.index');

    }
}
