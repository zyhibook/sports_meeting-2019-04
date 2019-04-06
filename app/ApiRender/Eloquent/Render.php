<?php

namespace App\ApiRender\Eloquent;

use \Illuminate\Contracts\Routing\ResponseFactory;
use App\ApiRender\Contracts\Render as RenderContract;

class Render implements RenderContract
{
    /**
     * 页面中需要显示一次的消息
     *
     * @var string
     */
    protected $flashMessages = [];

    /**
     * 页面当前标题
     *
     * @var string
     */
    protected $title;

    /**
     * 设置此次响应后前端应该显示什么标题
     *
     * @param  string  $title
     * @return \App\ApiRender\Contracts\Render
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * 设置此次响应后前端应该弹出什么消息（可多次调用，依次显示）
     *
     * @param  string  $type
     * @param  mixed   $message
     * @return \App\ApiRender\Contracts\Render
     */
    public function flash(string $type, $message = true)
    {
        $this->flashMessages[] = [
            'type' => $type,
            'message' => $message
        ];

        return $this;
    }

    /**
     * 生成要发给前端的响应
     *
     * @param  string|array  $data
     * @param  int  $status
     * @param  array  $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function make($data = [], $status = 200, array $headers = [])
    {
        /** @var \App\ApiRender\Contracts\Render $factory */
        $factory = app(ResponseFactory::class);

        $content = [
            'data' => $data
        ];

        if (!empty($this->title)) {
            $content['title'] = $this->title;
        }

        if (!empty($this->title)) {
            $content['flash_messages'] = $this->flashMessages;
        }

        return $factory->make($content, $status, $headers);
    }
}
