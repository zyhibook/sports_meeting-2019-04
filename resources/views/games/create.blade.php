@extends('layouts.app')

@section('title', '赛事')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('games.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="begins_at">开始时间</label>
                        <input type="datetime-local" name="begins_at" id="begins_at" class="form-control">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="class" value="1" id="class_1">
                        <label class="form-check-label" for="class_1">
                            径赛
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="class" value="2" id="class_2">
                        <label class="form-check-label" for="class_2">
                            田赛
                        </label>
                    </div>
                    <button class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@endsection