<?php 

namespace App;

class Post{
	public function getPosts($session){
		if (!$session->has('posts')) {
			$this->createDummyData($session);
		}
	return $session->get('posts');
	}
private function createDummyData($session){
	$posts = [[
		'title'=>'new title',
		'content'=>'mycontent'
	],
	[
		'title'=>'newtitle',
		'content'=>'another content'
	]

	];
$session->put('posts',$posts);
}
	public function getPost($session,$id){
		if (!$session->has('posts')) {
			$this->createDummyData($session);
		}
	return $session->get('posts')[$id];
	}
	public function addPost($session,$title,$content){
		if (!$session->has('posts')) {
			$this->createDummyData($session);
		}
		$post = $session->get('posts');
		array_push($post, ['title'=>$title,'content'=>$content]);
		$session->put('posts',$post);
	}
	public function editPost($session,$title,$content,$id){
		$post = $session->get('posts');
		$post[$id] = ['title' => $title,'content'=> $content];
		$session->put('posts',$post);
	}

}

