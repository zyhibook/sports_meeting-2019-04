@extends('layouts.app')

@section('title', '队伍')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('teams.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@endsection