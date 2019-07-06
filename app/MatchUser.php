<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MatchUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatchUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatchUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatchUser query()
 * @mixin \Eloquent
 */
class MatchUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id',
        'user_id',
        'sort',
    ];
}
