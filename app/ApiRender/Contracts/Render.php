<?php

namespace App\ApiRender\Contracts;

interface Render
{
    /**
     * 设置此次响应后前端应该显示什么标题
     *
     * @param  string  $title
     * @return void
     */
    public function setTitle(string $title);

    /**
     * 设置此次响应后前端应该弹出什么消息（可多次调用，依次显示）
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function flash(string $key, $value = true);

    /**
     * 生成要发给前端的响应
     *
     * @param  string|array  $data
     * @param  int  $status
     * @param  array  $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function make($data = [], $status = 200, array $headers = []);
}
