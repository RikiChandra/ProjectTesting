@extends('layout/main')
@section('title', 'Edit Category')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.update', ['kategori' => $kategori->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="title"
                            placeholder="add category" name="name" value="{{ old('name') ?? $kategori->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            placeholder="add slug" name="slug" value="{{ old('slug') ?? $kategori->slug }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
