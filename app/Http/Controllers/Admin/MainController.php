<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index() {
        $tag = new Tag();
        $tag->title = 'Привет мир';
        $tag->save();
        return view("admin.index");
    }
}
