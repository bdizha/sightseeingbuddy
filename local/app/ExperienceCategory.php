<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceCategory extends Model
{

    protected $table = 'experience_categories';

    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'level'
    ];

    public static function getList($level = 'main')
    {
        return self::where('level', '=', $level)
            ->orderBy("name", "ASC")
            ->pluck("name", "id");
    }

}
