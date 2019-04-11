@extends('layouts.app')

@section('title', '队伍')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@stop

@section('content')
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
                <td><a href="{{ route('teams.edit', [$team->id]) }}" class="btn btn-primary btn-sm">修改</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $news->render() !!}
@endsection