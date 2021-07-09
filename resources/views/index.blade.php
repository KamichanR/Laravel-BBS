@extends('components.layout')
@section('title', 'BBS')
@section('content')
    <div class="xl:container xl:mx-auto mx-4 my-4">
        <div class="text-right">
            <form action="{{ route('posts.create') }}" class="inline-block">
                @csrf

                <button>新規投稿作成</button>
            </form>
        </div>

        <ul>
            @forelse ($posts as $post)
                <li>
                    <a href="{{ route('posts.read', $post) }}">
                        {{ $post->title }}
                    </a>
                </li>
            @empty
                <li>投稿がありません</li>
            @endforelse
        </ul>
    </div>
@endsection
