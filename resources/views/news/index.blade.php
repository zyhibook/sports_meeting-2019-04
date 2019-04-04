@extends('layouts.app')

@section('title', '新闻')

@section('content')
    <ul>
        @foreach($news as $single_news)
            <li><a href="{{ route('news.show', [$single_news->id]) }}">{{ $single_news->title }}</a></li>
        @endforeach
    </ul>

    {!! $news->render() !!}
@endsection