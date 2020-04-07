@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
<h1>control structures</h1>
{{ $r = rand(0,1)}}
@if($r == 0)
<p>this only displays if true</p>
@else
<p>this only displays if false</p>
@endif
@for($i = 0; $i<5 ; $i++)
<p>{{ $i }}. Iteration</p>
@endfor
<hr>
{{"<script>alert('this doesnt work') </script>"}}

{!!"<script>alert('this works fine') </script>"!!}
</div>
</div>
@endsection
