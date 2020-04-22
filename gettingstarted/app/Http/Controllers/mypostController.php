<?php

namespace App\Http\Controllers;

use App\mypost;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
class mypostController extends Controller
{
    public function getIndex(Store $session){
    	$post = new mypost();
    	$posts = $post->getpost($session);
    	return view('blog.index',['posts' => $posts]);
    }
}
