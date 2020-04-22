<?php 

namespace App;

class mypost{
	public function getpost($session){
		if (!$session->has('posts')) {
			$this->create_dummy($session);
		}
		return $session->get('posts');
	}
	private function create_dummy($session){
		$post = [[

'title'=>'this first one worked bitch',
'content'=>'yeah boyy'
		],[
'title'=>'this second one worked bitch',
'content'=>'yeah boyy']
	];

$session->put('posts',$post);
	}
}



