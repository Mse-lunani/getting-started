<?php 

namespace App;

class Post{
	public function getPost($session){
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


}

