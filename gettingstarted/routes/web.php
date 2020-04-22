<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@getIndex')->name('blog.index');
Route::get('post/{id?}',function($id=1){
if($id == 1 ){
	$post = [
'title' => 'My title',
'content' => 'my content'
	];
}else{
	$post = [
'title' => 'Not 1',
'content' => 'the id passed was not one'
	];
}
return view('blog.post', ['post' => $post]);
//return $post['title'];
})->name('bolg.post');
Route::get('/about',function(){
return view('other.about');
})->name('about.index');
Route::group(['prefix'=>'admin'],function(){
Route::get('',function(){
	return view('admin.index');
})->name('admin.index');
Route::get('create',function(){
	return view('admin.create');
})->name('admin.create');
Route::get('edit/{id?}',function($id = 1){
if($id == 1 ){
	$post = [
'title' => 'My title',
'content' => 'my content'
	];
}else{
	$post = [
'title' => 'Not 1',
'content' => 'the id passed was not one'
	];
}
	return view('admin.edit',['post' =>$post]);
})->name('admin.edit');
Route::post('create',function(\Illuminate\Http\Request $request, \Illuminate\Validation\Factory $validator){
	$validation = $validator->make($request->all(),[
'title' => 'required|min:5',
'content'=>'required|min:10'
	]);
	if ($validation->fails()) {
		return redirect()->back()->withErrors($validation);
	}
	return redirect()->route('admin.index')->
	with('info','post created, new Title is: '.$request->input('title'));

})->name('admin.create');
Route::post('edit',function(\Illuminate\Http\Request $request ,  \Illuminate\Validation\Factory $validator){
		$validation = $validator->make($request->all(),[
'title' => 'required|min:5',
'content'=>'required|min:10'
	]);
	if ($validation->fails()) {
		return redirect()->back()->withErrors($validation);
	}
	return redirect()->route('admin.index')->
	with('info','thi s post title has been edited to: '.$request->input('title'));
})->name('admin.update');
Route::post('testing',function(\Illuminate\Http\Request $request){
	return redirect()->route('admin.index')->with('info','well this worked here is your fucking responce'. $request->input('title'));
})->name('testing');	
});
