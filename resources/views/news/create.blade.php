@extends('layouts.app')

@section('title', '新闻')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" id="title" placeholder="在这里输入标题">
                    <input hidden type="text" id="content" name="body" value="空">
                    <div id="editor">
                        <p>在这里输入新闻内容</p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="//cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script>
    $(function () {
        var editor = new wangEditor('#editor');
        console.log(editor)
        editor.customConfig.uploadImgServer= '../api/upload';
        editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
        editor.customConfig.uploadImgMaxLength = 30;
        editor.customConfig.uploadFileName = 'photo';
        editor.customConfig.uploadImgHeaders = {
            'Accept': 'text/x-json'
        }
        console.log(editor.customConfig)
        editor.customConfig.onchange = function(html){
            $("#content").val(html) ;
            console.log($("#content").val());
        };
        editor.create();

    });
</script>
@endsection
