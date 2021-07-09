@extends('components.layout')
@section('title', $post->title . ' - BBS')
@section('content')
    <div class="xl:container xl:mx-auto mx-4 py-4">
        <a href="{{ route('index') }}">&laquo; 戻る</a>
        <div class="text-right">
            <form action="{{ route('posts.edit', $post) }}" class="inline-block">
                @csrf

                <button>編集</button>
            </form>
            <form action="{{ route('posts.destory', $post) }}" class="inline-block" method="post">
                @method('DELETE')
                @csrf

                <button>削除</button>
            </form>
        </div>

        <div class="poster__item my-4">
            <h1 class="justify-center text-2xl">
                <b>{{ $post->title }}</b>
                <span class="float-right">投稿者：{{ $post->poster }}</span>
            </h1>
            <p>{!! nl2br(e($post->body)) !!}</p>
        </div>

        <div class="comment-form__outer">
            <h2 class="text-xl">コメント</h2>

            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf

                <label class="pb-4">
                    名前
                    <input class="w-full" type="text" name="poster" value="{{ old('poster') }}">
                    @error('poster')
                        <div class="post__error">{{ $message }}</div>
                    @enderror
                </label>
                <label class="pb-4">
                    Eメール
                    <input class="w-full" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="post__error">{{ $message }}</div>
                    @enderror
                </label>
                <label class="pb-4">
                    内容
                    <textarea class="h-40 w-full" name="body">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="post__error">{{ $message }}</div>
                    @enderror
                </label>
                <button>投稿</button>
            </form>
        </div>

        <div class="comments__outer py-4">
            <ul>
                @forelse ($post->comments()->latest()->get() as $comment)
                    <li class="comment__outer pb-2">
                        <div class="comment__poster px-4 w-full">
                            <b>{{ $comment->id }} : {{ $comment->poster }} : {{ $comment->created_at }}</b>
                        </div>
                        <p class="px-4">{!! nl2br(e($comment->body)) !!}</p>
                    </li>
                @empty
                    <li>コメントがありません</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
