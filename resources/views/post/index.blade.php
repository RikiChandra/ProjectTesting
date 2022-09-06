@extends('layout/main')
@section('title', 'Daftar Post')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4"><a href="/post/create" class="btn btn-primary">Add Post</a></h5>
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name }}</td>
                            {{-- <td>{{ strip_tags($item->body) }}</td> --}}
                            <td>
                                <a href="/post/{{ $item->id }}" class="btn btn-info">View</a>
                                <a href="/post/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/post/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Anda yakin Ingin Menghapus ? ')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
