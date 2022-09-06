@extends('layout/main')
@section('title', 'View Post')

@section('content')
    <div class="card">
        <div class="card-body">
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            {{-- { !!($post->body)!! } --}}
        </div>
    </div>
@endsection
