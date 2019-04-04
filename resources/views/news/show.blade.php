@extends('layouts.app')

@section('title', '新闻')

@section('content')
    <!-- 瞎写的看着改 -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <div class="card-text">
                {!! $news->body !!}
            </div>
        </div>
    </div>
@endsection