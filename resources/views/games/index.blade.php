@extends('layouts.app')

@section('title', '赛事')

@section('content')
    <div class="container">
        <a href="{{ route('games.create') }}" class="btn btn-info">创建新赛事</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">赛事</th>
                <th scope="col">开始时间</th>
                <th scope="col">金牌队伍</th>
                <th scope="col">金牌</th>
                <th scope="col">银牌队伍</th>
                <th scope="col">银牌</th>
                <th scope="col">铜牌队伍</th>
                <th scope="col">铜牌</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->begins_at }}</td>
                    <td>@if($game->golden){{ $game->golden->name }}@else 暂无数据 @endif</td>
                    <td>@if($game->golden_name){{ $game->golden_name }}@else 暂无数据 @endif</td>
                    <td>@if($game->silver){{ $game->silver->name }}@else 暂无数据 @endif</td>
                    <td>@if($game->silver_name){{ $game->silver_name }}@else 暂无数据 @endif</td>
                    <td>@if($game->bronze){{ $game->bronze->name }}@else 暂无数据 @endif</td>
                    <td>@if($game->bronze_name){{ $game->bronze_name }}@else 暂无数据 @endif</td>
                    <td>
                        <a href="{{ route('games.edit', [$game->id]) }}" class="btn btn-warning btn-sm d-sm-inline-flex">修改</a>
                        <form method="post" action="{{ route('games.destroy', $game->id) }}" class="d-sm-inline-flex">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $games->render() !!}
    </div>
@endsection