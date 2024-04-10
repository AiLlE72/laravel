@extends('base')

@if (isset($post))
    @section('title', 'Modifier un article')
@else
    @section('title', 'Créer un article')
@endif




@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            @if (isset($post))
                <h1>Modifier un article</h1>
            @else
                <h1>Créer un article</h1>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            @if (isset($post))
                <form action="{{ url('/blog' . '/' . $post->id . '/edit') }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="" method="post" enctype="multipart/form-data">
            @endif

            @csrf
            <div class="mb-3">
                <label for="titleInput" class="form-label">Titre</label>
                <input name="title" type="text" class="form-control" id="titleInput" placeholder="Rentrer votre titre"
                    @if (isset($post)) value="{{ $post->title }}"
                        @else
                        value="{{ old('title') }}" @endif>
                @error('title')
                    <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryInput" class="form-label">Catégorie</label>
                <select name="category_id" id="categoryInput" class="form-control">

                    <option value="0">Choisissez une catégorie</option>
                    @foreach ($categories as $category)
                        <option @if (isset($post)) @selected(old('category_id', $post->category_id) === $category->id) @endif
                            value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            @if (isset($post))
                @php
                    $tagsIds = $post->tag()->pluck('id');
                @endphp
            @endif

            <div class="mb-3">
                <label for="tagInput" class="form-label">Choisissez les mots clés</label>
                <select name="tags[]" id="tagInput" class="form-control" multiple="true">

                    @foreach ($tags as $tag)
                        <option @if (isset($post)) @selected($tagsIds->contains($tag->id)) @endif
                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label">Votre image</label>
                <input name="image" type="file" class="form-control" id="imageInput"
                    placeholder="Choisisser une image">
                @error('image')
                    <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contentInput" class="form-label">Votre article </label>
                <textarea name="content" class="form-control" id="contentInput" rows="3">
@if (isset($post))
{{ $post->content }}@else{{ old('title') }}
@endif
</textarea>
                @error('content')
                    <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-success" type="submit">Envoyer</button>
            </div>
            </form>

        </div>
    </div>

@endsection
