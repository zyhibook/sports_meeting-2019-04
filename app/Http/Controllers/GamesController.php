<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $games = Game::paginate(20);

        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Game::create([
            'name' => $request->post('name'),
            'class' => $request->post('class'),
            'begins_at' => Carbon::parse($request->post('begins_at')),
        ]);
        session()->flash('success', '赛事创建成功');

        return redirect()->route('games.index');
    }

    public function edit(Game $game)
    {
        $teams = Team::all();

        return view('games.edit', compact('game','teams'));
    }

    /**
     * @param Game $game
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Game $game, Request $request)
    {
        $data = $request->all();
        $data['begins_at'] = Carbon::parse($request->begins_at)->toDateTimeString();

//        dd($data);

        $game->update($data);
        session()->flash('success', '赛事信息更新成功');

        return redirect()->route('games.index');
    }

    /**
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $game->delete();
        session()->flash('danger', '赛事删除成功');

        return redirect()->route('games.index');
    }
}
