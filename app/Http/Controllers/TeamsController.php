<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teams = Team::pagiante(20);

        return view('teams.index', compact('teams'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Team::create($request->all());
        session()->flash('success', '队伍创建成功');

        return redirect()->route('teams.index');
    }

    /**
     * @param Team $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * @param Team $team
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Team $team, Request $request)
    {
        $team->update($request->all());
        session()->flash('success', '队伍信息更新成功');

        return redirect()->route('teams.index');
    }

    /**
     * @param Team $team
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Team $team)
    {
        $team->delete();
        session()->flash('danger', '队伍已删除');

        return redirect()->route('teams.index');
    }
}
