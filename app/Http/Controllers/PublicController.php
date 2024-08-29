<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $dishes = Dish::all();
        return view("index", compact("dishes"));
    }
}
