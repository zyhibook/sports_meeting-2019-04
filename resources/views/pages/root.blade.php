@extends('layouts.app')

@section('title', '首页')

@section('content')
    @foreach($games_12am_track as $game)
        {{-- 12日上午径赛 --}}
    @endforeach

    @foreach($games_12am_field as $game)
        {{-- 12日上午田赛 --}}
    @endforeach

    @foreach($games_12pm_track as $game)
        {{-- 12日下午径赛 --}}
    @endforeach

    @foreach($games_12pm_field as $game)
        {{-- 12日下午田赛 --}}
    @endforeach

    @foreach($games_13am_track as $game)
        {{-- 13日上午径赛 --}}
    @endforeach

    @foreach($games_13am_field as $game)
        {{-- 13日上午田赛 --}}
    @endforeach

    @foreach($games_13pm_track as $game)
        {{-- 13日下午径赛 --}}
    @endforeach

    @foreach($games_13pm_field as $game)
        {{-- 13日下午田赛 --}}
    @endforeach
@endsection