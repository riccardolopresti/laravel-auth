<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;

    public static function SlugGenerator($string){
        $slug = Str::slug($string, '-');
        $original_slug = $slug;
        $c = 1;
        $exists = Project::where('slug', $slug)->first();

        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
