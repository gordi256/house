<?php

namespace App\Http\Controllers;

use App\Models\{Category, Item, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        return view('catalog.index');
    }
}
