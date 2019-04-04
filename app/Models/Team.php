<?php

namespace App\Models;

/**
 * Class Team
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection $golden
 * @property \Illuminate\Database\Eloquent\Collection $silver
 * @property \Illuminate\Database\Eloquent\Collection $bronze
 * @property \Illuminate\Database\Eloquent\Collection $golden_s
 * @property \Illuminate\Database\Eloquent\Collection $silver_s
 * @property \Illuminate\Database\Eloquent\Collection $bronze_s
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Team extends Model
{
    /**
     * 金牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function golden()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * 银牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function silver()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * 铜牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bronze()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * 体特-金牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function golden_s()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * 体特-银牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function silver_s()
    {
        return $this->hasMany('App\Models\Game');
    }

    /**
     * 体特-铜牌所属赛事
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bronze_s()
    {
        return $this->hasMany('App\Models\Game');
    }
}
