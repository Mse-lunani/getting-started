<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex(Store $session){
    	$post = new Post();
    	$posts = $post->getPosts($session);
    	return view('blog.index', ['posts'=> $posts]);

    }
    public function getAdminIndex(Store $session){
    	$post = new Post();
    	$posts = $post->getPosts($session);
    	return view('admin.index', ['posts'=> $posts]);

    }
    public function getPost(Store $session, $id){
    	$post = new Post();
    	$posts = $post->getPost($session,$id);
    	return view('blog.post', ['posts'=> $posts]);
    }
    public function getAdminCreate(){
    	return view('admin.create');
    }
    public function getAdminEdit(Store $session, $id){
        $post = new Post();
        $posts = $post->getPost($session, $id);
        return view('admin.edit',['post'=>$posts, 'postId'=>$id]);
    }
    public function postAdminCreate(Store $session, Request $request){
            $this->validate($request,[
'title' => 'required|min:5',
'content'=>'required|min:10'
    ]);
        $post = new Post();
        $post-> addPost($session,$request->input('title'),$request->input('content'));
        return redirect()->route('admin.index')->
    with('info','this post title has been created as: '.$request->input('title'));
    }
       public function postAdminUpdate(Store $session, Request $request){
        $this->validate($request,[
'title' => 'required|min:5',
'content'=>'required|min:10'
    ]);
        $post = new Post();
        $post-> editPost($session,$request->input('title'),$request->input('content'),$request->input('id'));
        return redirect()->route('admin.index')->
    with('info','this post title has been edited to: '.$request->input('title'));
    }
}
