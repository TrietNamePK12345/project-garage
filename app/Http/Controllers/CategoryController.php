<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;


class CategoryController extends Controller
{
    public static function index(): Collection
    {
        dump(Category::all());
        return Category::all();
    }
}
