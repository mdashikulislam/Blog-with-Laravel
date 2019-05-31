<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        if ($category->count() == 0){

            return redirect()->route('category.create')->with('success','Make a Category First');
        }else{
            return view('admin.posts.create')->with('categorys',Category::all());
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required|image',
            'contents'=>'required',
            'category'=> 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts',$featured_new_name);
        $post = Post::create([
            'title'=>$request->title,
            'featured'=>'upload/posts/'.$featured_new_name,
            'category_id'=>$request->category,
            'content'=> $request->contents,
            'slug'=>str_slug($request->title)

        ]);

        return redirect()->back()->with('success','Post Create Successfully');

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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categorys',Category::all());
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
       $this->validate($request,[
           'title'=>'required',
           'category'=>'required',
           'contents'=>'required'
       ]);

       $post = Post::find($id);

       if ($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('upload/posts/',$featured_new_name);
            $post->featured = 'upload/posts/'. $featured_new_name;
       }
       $post->title = $request->title;
       $post->category_id = $request->category;
       $post->content = $request->contents;
       $post->save();
       return redirect()->route('post.home')->with('success','Post Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post =  Post::find($id);
       $post->delete();

       return redirect()->back()->with('success','Post Trash Successfully');
    }

    public function trash(){
        $trash = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts',$trash);
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success','Trash Delete Successfully');

    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back()->with('success','Trash Resotre');
    }
}
