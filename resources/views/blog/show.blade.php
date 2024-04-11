@extends('base')

@section('title', $post->title)



@section('content')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h1>{{ $post->title }}</h1><span class="badge text-bg-info">Ecrit le {{ $post->created_at }}</span>
        </div>
    </div>
    <div class="row mt-3">
        @if ($post->image)
            <div class="col-md-4 ms-5">
                <img src="{{ $post->imageUrl() }}" class="img-fluid"  alt="illustration de l'article{{ $post->title }}">
            </div>
            <div class="col-md-6 mx-2">
            @else
           <div class="col-md-6 mx-auto">
        @endif

            <article>
                {{ $post->content }}
            </article>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <a href="{{ route('blog.edit', ['post' => $post->id]) }}" class="btn btn-outline-info mt-2">Modifier
                l'article</a>
        </div>
    </div>
@endsection
