<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\News;
use App\Models\Team;

class PagesController extends Controller
{
    public function root()
    {
        $news = News::select('id', 'title')->orderBy('updated_at', 'desc')->get();

        $teams_ranked_golden = Team::select('name')->withCount(['golden', 'golden_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count;
        });

        $teams_ranked_medal = Team::select('name')->withCount(['golden', 'golden_s', 'silver', 'silver_s', 'bronze', 'bronze_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count + $team->silver_count + $team->silver_s_count + $team->bronze_count + $team->bronze_s_count;
        });

        $games_12am_track = Game::whereBetween('begins_at', ['2019-04-12 00:00:00', '2019-04-12 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_12am_field = Game::whereBetween('begins_at', ['2019-04-12 00:00:00', '2019-04-12 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_12pm_track = Game::whereBetween('begins_at', ['2019-04-12 12:00:00', '2019-04-12 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_12pm_field = Game::whereBetween('begins_at', ['2019-04-12 12:00:00', '2019-04-12 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_13am_track = Game::whereBetween('begins_at', ['2019-04-13 00:00:00', '2019-04-13 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_13am_field = Game::whereBetween('begins_at', ['2019-04-13 00:00:00', '2019-04-13 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_13pm_track = Game::whereBetween('begins_at', ['2019-04-13 12:00:00', '2019-04-13 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_13pm_field = Game::whereBetween('begins_at', ['2019-04-13 12:00:00', '2019-04-13 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();

        return view('pages.root', compact(
            'news',
            'teams_ranked_golden',
            'teams_ranked_medal',
            'games_12am_track',
            'games_12am_field',
            'games_12pm_track',
            'games_12pm_field',
            'games_13am_field',
            'games_13am_track',
            'games_13pm_field',
            'games_13pm_track'
        ));
    }

    public function admin()
    {
        return view('pages.admin');
    }
}
