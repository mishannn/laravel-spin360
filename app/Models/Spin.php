<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Spin
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property int $frames_count
 * @property int $invert_rotation
 * @property float $rotation_speed
 * @method static \Illuminate\Database\Eloquent\Builder|Spin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereFramesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereInvertRotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereRotationSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spin whereTitle($value)
 * @mixin Eloquent
 */
class Spin extends Model
{
    public $timestamps = false;
}