@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>By {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small>

    <div class="mt-3">
        @if(auth()->id() === $post->user_id)
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
    </div>
@endsection
