<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * 当前页面的标题
     *
     * @var string
     */
    protected $title = '赛事';

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $games = Game::paginate(20);
        $this->render
            ->flash('danger', '测试')
            ->flash('warning', '测试')
            ->flash('success', '测试')
            ->flash('info', '测试');

        return $this->render->make(compact('games'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Game::create($request->all());
        $this->render->flash('success', '赛事创建成功');

        return $this->render->make();
    }

    /**
     * @param Game $game
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Game $game, Request $request)
    {
        $game->update($request->all());
        $this->render->flash('success', '赛事信息更新成功');

        return $this->render->make();
    }

    /**
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $game->delete();
        $this->render->flash('danger', '赛事删除成功');

        return $this->render->make();
    }
}
