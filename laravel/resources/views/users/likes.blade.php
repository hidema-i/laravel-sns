@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
@include('nav')
<div class="container">
    @include('users.user')
    <!-- 追加 -->
    @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
    @foreach($articles as $article)
    @include('articles.card')
    @endforeach
</div>
@endsection