@extends('base')

@section('title', 'Page d\'acceuil')



@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <h1>Bienvenue sur notre blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="accordion" id="accordionExample">

                @foreach ($posts as $post)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button @unless ($loop->first) collapsed @endunless"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $post->id }}"
                                @if ($loop->first) aria-expanded="true"@else aria-expanded="false" @endif
                                aria-controls="collapseOne">
                                {{ $post->title }}<p class="small">{{ $post->category?->name }}</p> @foreach($post->tag as $tag)
                                    <span class=" ms-2 badge text-bg-secondary">{{ $tag->name }}</span>
                                @endforeach

                            </button>
                        </h2>
                        <div id="collapse{{ $post->id }}"
                            class="accordion-collapse collapse @if ($loop->first) show @endif"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body text-truncate">
                                {{ $post->content }}
                                <div>
                                    <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                                        class="btn btn-primary mt-2">Lire la suite</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row mt-2">
                    {{ $posts->links() }}
                </div>
            @endsection
        </div>
    </div>
</div>
