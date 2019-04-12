@extends('layouts.app')

@section('title', '赛事')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('games.update', $game->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $game->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="begins_at">开始时间：</label>
                        <input type="datetime-local" name="begins_at" id="begins_at" class="form-control" value="{{ $game->begins_at->toDateString() . 'T' . $game->begins_at->format('H:i') }}">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="class" value="1" id="class_1" @if($game->class == 1) checked @endif>
                        <label class="form-check-label" for="class_1">
                            径赛
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="class" value="2" id="class_2" @if($game->class == 2) checked @endif>
                        <label class="form-check-label" for="class_2">
                            田赛
                        </label>
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">金牌</span>
                            <select name="golden_id" id="golden_id" class="btn btn-outline-secondary">
                                <option value="" @if(!$game->golden_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->golden_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="golden_name" type="text" class="form-control" value="{{ $game->golden_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">银牌</span>
                            <select name="silver_id" id="silver_id" class="btn btn-outline-secondary">
                                <option value="" @if(!$game->silver_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->silver_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="silver_name" type="text" class="form-control" value="{{ $game->silver_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">铜牌</span>
                            <select name="bronze_id" id="bronze_id" class="btn btn-outline-secondary">
                                    <option value="" @if(!$game->bronze_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->bronze_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="bronze_name" type="text" class="form-control" value="{{ $game->bronze_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">体特金牌</span>
                            <select name="golden_s_id" id="golden_s_id" class="btn btn-outline-secondary">
                                <option value="" @if(!$game->golden_s_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->golden_s_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="golden_s_name" type="text" class="form-control" value="{{ $game->golden_s_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">体特银牌</span>
                            <select name="silver_s_id" id="silver_s_id" class="btn btn-outline-secondary">
                                <option value="" @if(!$game->silver_s_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->silver_s_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="silver_s_name" type="text" class="form-control" value="{{ $game->silver_s_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">体特铜牌</span>
                            <select name="bronze_s_id" id="bronze_s_id" class="btn btn-outline-secondary">
                                <option value="" @if(!$game->bronze_s_id) selected @endif>空</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($game->bronze_s_id == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="bronze_s_name" type="text" class="form-control" value="{{ $game->bronze_s_name }}">
                        <div class="input-group-append">
                            <span class="input-group-text">获得者姓名</span>
                        </div>
                    </div>
                    <button class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@endsection