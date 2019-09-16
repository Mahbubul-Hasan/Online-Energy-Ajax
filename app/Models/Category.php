<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    function saveCategoryInfo($request, $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;

        $category->save();
    }
}
