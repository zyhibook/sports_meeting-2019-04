<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\ApiRender\Contracts\Render;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 用于返回API响应的render
     *
     * @var \App\ApiRender\Contracts\Render
     */
    protected $render;

    /**
     * 当前页面的标题
     *
     * @var string
     */
    protected $title = '';

    /**
     * @param \App\ApiRender\Contracts\Render $render
     */
    public function __construct(Render $render)
    {
        $this->render = $render;

        $this->render->setTitle($this->title);
    }
}
