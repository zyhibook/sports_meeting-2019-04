<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->file('photo')->store('photo', 'public');
            return [
                'errno' => 0,
                'data' => [config('app.url').'/storage/'.$path]
            ];
        }

        return [
            'errno' => 1,
            'data' => '上传失败'
        ];
    }
}
