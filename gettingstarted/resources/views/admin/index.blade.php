@extends('layouts.admin')

@section('content')
  @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $post['title'] }}</h1>
            <p>{{$post['content']}}</p>
        </div>
    </div>
    <hr>
@endforeach
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
   
    <div class="row">
        <div class="col-md-12">
            <p><strong></strong> <a href="{{ route('admin.edit') }}">Edit</a></p>
        </div>
    </div>
  
@endsection