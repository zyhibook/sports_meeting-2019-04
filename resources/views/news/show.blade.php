@extends('pages.root')

@section('title', '新闻')

@section('content')
<main-header></main-header>
<div style="background-color:#f2f2f2; padding-top: 40px">
    <mu-card style="width: 80%; max-width: 1080px; margin: 0 auto;">
        <mu-card-title title="{{ $news->title }}"></mu-card-title>
        <mu-card-text>
            {!! $news->body !!}
        </mu-card-text>
    </mu-card>
</div>
@endsection
