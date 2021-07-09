@extends('components.layout')
@section('title', '新規投稿の作成 - BBS')
@section('content')
    <div class="xl:container xl:mx-auto mx-4 py-4">
        <a href="{{ route('index') }}">&laquo; 戻る</a>
        <h2 class="text-2xl">投稿の編集</h2>

        <form action="{{ route('posts.update', $post) }}" method="post">
            @method('PATCH')
            @csrf

            <label class="pb-4">
                タイトル
                <input class="w-full" type="text" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="post__error">{{ $message }}</div>
                @enderror
            </label>
            <label class="pb-4">
                Eメール
                <input class="w-full" type="text" name="email" value="{{ old('email', $post->email) }}">
                @error('email')
                    <div class="post__error">{{ $message }}</div>
                @enderror
            </label>
            <label class="pb-4">
                名前
                <input class="w-full" type="text" name="poster" value="{{ old('poster', $post->poster) }}">
                @error('poster')
                    <div class="post__error">{{ $message }}</div>
                @enderror
            </label>
            <label class="pb-4">
                内容
                <textarea class="h-40 w-full" name="body">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="post__error">{{ $message }}</div>
                @enderror
            </label>
            <button>更新</button>
        </form>
    </div>
@endsection
