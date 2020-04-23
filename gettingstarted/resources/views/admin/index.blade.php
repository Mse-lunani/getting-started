@extends('layouts.admin')

@section('content')
  @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
   
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $post['title'] }}</h1>
            <p>{{$post['content']}}</p>
            <p><strong></strong> <a href="{{ route('admin.edit',['id' => array_search($post,$posts)]) }}">Edit</a></p>
        </div>
    </div>
    <hr>
@endforeach
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
  
@endsection