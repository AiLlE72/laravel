@extends('base')

@section('title', $post->title)



@section('content')
<div class="row mt-5">
    <div class="col-md-6 mx-auto">
        <h1>{{$post->title}}</h1><span class="badge text-bg-info">Ecrit le {{$post->created_at}}</span>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 mx-auto">
        <article>
            {{$post->content}}
        </article>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mx-auto">
        <a href="{{route('blog.edit', ['post' => $post->id])}}" class="btn btn-outline-info mt-2">Modifier l'article</a>
    </div>
</div>
@endsection
