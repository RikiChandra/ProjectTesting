@extends('layout/main')
@section('title', 'Edit Post')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="add title" name="title"
                            value="{{ old('title') ?? $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="add slug" name="slug"
                            value="{{ old('slug') ?? $post->slug }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $item)
                                @if (old('category_id', $post->category_id == $item->id))
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
