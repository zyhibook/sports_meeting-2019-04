@extends('layouts.app')

@section('title', '后台管理')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">新闻管理</h1>
        <p class="lead">管理所有新闻</p>
        <hr class="my-4">
        <p>管理入口</p>
        <a href="{{ route('news.index') }}" class="btn btn-primary btn-lg" role="button">点击进入</a>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">队伍管理</h1>
        <p class="lead">管理所有队伍</p>
        <hr class="my-4">
        <p>管理入口</p>
        <a href="{{ route('teams.index') }}" class="btn btn-primary btn-lg" role="button">点击进入</a>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">赛事管理</h1>
        <p class="lead">管理所有赛事</p>
        <hr class="my-4">
        <p>管理入口</p>
        <a href="{{ route('games.index') }}" class="btn btn-primary btn-lg" role="button">点击进入</a>
    </div>
@endsection
