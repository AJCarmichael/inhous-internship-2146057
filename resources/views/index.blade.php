@extends('layouts.app')

@section('content')
    <h1>Your Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    
    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>By {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small>
            
            @if(auth()->id() == $post->user_id)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-info">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    @endforeach
@endsection
