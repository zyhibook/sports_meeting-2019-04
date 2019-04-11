<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use App\Models\News;
use App\Models\Team;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\GameResource;

class DataController extends Controller
{
    public function news()
    {
        $news = News::select('id', 'title')->orderBy('updated_at', 'desc')->get();
        
        return new NewsResource($news);
    }

    public function teams()
    {
        $teams_ranked_golden = Team::select('name')->withCount(['golden', 'golden_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count;
        });

        $teams_ranked_medal = Team::select('name')->withCount(['golden', 'golden_s', 'silver', 'silver_s', 'bronze', 'bronze_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count + $team->silver_count + $team->silver_s_count + $team->bronze_count + $team->bronze_s_count;
        });

        $teams_resource_golden = new TeamResource($teams_ranked_golden);
        $teams_resource_medal = new TeamResource($teams_ranked_medal);

        return [
            'teams_ranked_golden' => $teams_resource_golden,
            'teams_ranked_medal' => $teams_resource_medal,
        ];
    }

    public function games()
    {
        $games_12am_track = new GameResource(Game::whereBetween('begins_at', ['2019-04-12 00:00:00', '2019-04-12 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get());
        $games_12am_field = new GameResource(Game::whereBetween('begins_at', ['2019-04-12 00:00:00', '2019-04-12 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get());
        $games_12pm_track = new GameResource(Game::whereBetween('begins_at', ['2019-04-12 12:00:00', '2019-04-12 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get());
        $games_12pm_field = new GameResource(Game::whereBetween('begins_at', ['2019-04-12 12:00:00', '2019-04-12 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get());
        $games_13am_track = new GameResource(Game::whereBetween('begins_at', ['2019-04-13 00:00:00', '2019-04-13 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get());
        $games_13am_field = new GameResource(Game::whereBetween('begins_at', ['2019-04-13 00:00:00', '2019-04-13 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get());
        $games_13pm_track = new GameResource(Game::whereBetween('begins_at', ['2019-04-13 12:00:00', '2019-04-13 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get());
        $games_13pm_field = new GameResource(Game::whereBetween('begins_at', ['2019-04-13 12:00:00', '2019-04-13 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get());

        return [
            'games_12am_track' => $games_12am_track,
            'games_12am_field' => $games_12am_field,
            'games_12pm_track' => $games_12pm_track,
            'games_12pm_field' => $games_12pm_field,
            'games_13am_track' => $games_13am_track,
            'games_13am_field' => $games_13am_field,
            'games_13pm_track' => $games_13pm_track,
            'games_13pm_field' => $games_13pm_field,
        ];
    }
}