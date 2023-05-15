<?php

namespace App\Http\Controllers;

use App\Models\{Building, Category, Item, Review, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' =>  "Главная страница",
            'buildings_count' => Building::count(),
            'review_count'  => Review::count(),
            'user_count' => User::count(),

        ];

        return view('dashboard',  $data);
    }
}
