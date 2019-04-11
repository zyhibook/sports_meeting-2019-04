@extends('layouts.app')

@section('title', '新闻')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@stop

@section('content')
    <div class="container">
        <a href="{{ route('news.create') }}" class="btn btn-info">创建新闻</a>
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
                        <form method="post" action="{{ route('news.destroy', $single_news->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $news->render() !!}
    </div>
@endsection
