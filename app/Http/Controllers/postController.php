<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest ;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  $posts=Post::all();
//        return $posts ;
      //  $posts=Post::latest()->get();
        $posts=Post::latest()->get();
        return view('posts.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
       // return $request->all() ;
//        $this->validate($request,[
//            'title'=>'required|min:4'
//        ]);
        $title=$request->title ;
        $post= Post::create(['title'=>$title,'user_id'=>1,'content'=>'ahmed']);
      //  Post::create([$request->all()]);
       /* $post->title=$title;
        $post->content ='mosts';
        $post->user_id=1 ;
        $post->save();*/
        return redirect('/posts');

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
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('id',$id)->first();

        return view('posts.edit')->with('post',$post);

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
        $title=$request->title ;
        $post=Post::find($id)->update(['title'=>$title]);
        return redirect('/posts');
       // return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //we will delete the record from here
        $post=Post::find($id)->delete();
        return redirect('/posts');

    }

    public function contact(){
        $people =['mostafa','Ahmed','mohamed','Basmala','Manar'];
        return view('contact' ,compact('people'));
    }
    public function show_post ($id,$name){
       // return view('post')->with('id',$id);
        return view('post',compact('id','name'));
    }
}
