@extends('layouts.app')

@section('title', '队伍')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('teams.update', $team->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $team->name }}">
                    </div>
                    <button class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@endsection