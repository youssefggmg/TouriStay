<?php

namespace App\Http\Controllers\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\announcmentModel;

class tourist extends Controller
{
    public function index(){
        $announcments = announcmentModel::paginate(12);
        return view("tourist.home", compact("announcments"));
    }
}
