<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $games = Game::paginate(20);

        return view('games.index', compact('games'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Game::create($request->all());
        session()->flash('success', '赛事创建成功');

        return redirect()->route('games.index');
    }

    /**
     * @param Game $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Game $game)
    {
        return view('games.edit');
    }

    /**
     * @param Game $game
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Game $game, Request $request)
    {
        $game->update($request->all());
        session()->flash('success', '赛事信息更新成功');

        return redirect()->route('games.index');
    }

    /**
     * @param Game $game
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $game->delete();
        session()->flash('danger', '赛事删除成功');

        return redirect()->route('games.index');
    }
}