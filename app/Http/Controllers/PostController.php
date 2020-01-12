<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::orderBy('created_at','desc')->paginate(6);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'subject'=>'required',
            'body'=>'required'
        ]);
        //
        $firstname =$request->firstname;
        $lastname  =$request->lastname;
        $subject   =$request->subject;
        $body      =$request->body;

        if ($request->hasFile('post_image')) {
            $filenameWithExtension=$request->file('post_image')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtension,PATHINFO_FILENAME);
            $extension=$request->file('post_image')->getClientOriginalExtension();
            $fileNameStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('post_image')->storeAS('public/post_image',$fileNameStore);
        }else{
            $fileNameStore='noImage.jpg';
        }


        // create post
        $post=new Post();
        $post->firstname =$firstname;
        $post->lastname  =$lastname;
        $post->subject   =$subject;
        $post->body      =$body;
        $post->user_id   = auth()->user()->id;
        $post->post_image=$fileNameStore;
        $post->save();
        return redirect('posts')->with('success','Done successfully') ;
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
        $post=Post::where('id',$id)->first();
        return view('pages.show',compact('post'));
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
        $post=Post::where('id',$id)->first();
        if (auth()->user()->id != $post->user_id) {
            return redirect('posts');
        }
        return view('pages.edit', compact('post'));
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
        //find post
        $post=Post::where('id',$id)->first();
        // validation
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'subject'=>'required',
            'body'=>'required'
        ]);
        //
        $newFirstName =$request->firstname;
        $newLastaNme  =$request->lastname;
        $newSubject   =$request->subject;
        $newBody      =$request->body;

        if ($request->hasFile('post_image')) {
            $filenameWithExtension=$request->file('post_image')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtension,PATHINFO_FILENAME);
            $extension=$request->file('post_image')->getClientOriginalExtension();
            $fileNameStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('post_image')->storeAS('public/post_image',$fileNameStore);
        }


        // update post
        $post->firstname =$newFirstName;
        $post->lastname  =$newLastaNme;
        $post->subject   =$newSubject;
        $post->body      =$newBody;
        if ($post->post_image != 'noImage.jpg') {
            Storage::delete('public/post_image/'.$post->post_image);
        }
        if ($request->hasFile('post_image')) {
            $post->post_image=$fileNameStore;
        }
        $post->save();
        return redirect('posts/'.$post->id)->with('success','Successfully Updated') ;
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
        $post=Post::where('id',$id)->first();
        if (auth()->user()->id != $post->user_id) {
            return redirect('/dashboard');
        }
        if ($post->post_image != 'noImage.jpg') {
            Storage::delete('public/post_image/'.$post->post_image);
        }
        $post->delete();
        return redirect('dashboard')->with('success','Successfully Deleted');
    }
}
