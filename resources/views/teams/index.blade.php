@extends('layouts.app')

@section('title', '队伍')

@section('content')
    <div class="container">
        <a href="{{ route('teams.create') }}" class="btn btn-info">创建新队伍</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">队伍名</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <th scope="row">{{ $team->id }}</th>
                    <td>{{ $team->name }}</td>
                    <td>
                        <a href="{{ route('teams.edit', [$team->id]) }}" class="btn btn-warning btn-sm d-sm-inline-flex">修改</a>
                        <form method="post" action="{{ route('teams.destroy', $team->id) }}" class=" d-sm-inline-flex">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $teams->render() !!}
    </div>
@endsection