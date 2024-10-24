@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <div>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection