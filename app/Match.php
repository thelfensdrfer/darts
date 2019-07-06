<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Match
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property int $sets
 * @property int $legs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereLegs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereSets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereUserId($value)
 * @mixin \Eloquent
 */
class Match extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'sets',
        'legs',
    ];
}
