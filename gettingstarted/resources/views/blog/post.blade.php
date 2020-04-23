@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $posts ['title'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{$posts ['content']}}</p>
        </div>
    </div>
@endsection