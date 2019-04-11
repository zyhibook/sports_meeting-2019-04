@extends('layouts.app')

@section('title', '新闻')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">标题</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $single_news)
                <tr>
                    <th scope="row">{{ $single_news->id }}</th>
                    <td><a href="{{ route('news.show', [$single_news->id]) }}" class="card-link">{{ $single_news->title }}</a></td>
                    <td>
                        <form action="{{ route('news.destroy', $single_news->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $news->render() !!}
@endsection
