<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'favorites' => Favorite::isPublic()->latest()->paginate(10)
        ]);
    }
}
