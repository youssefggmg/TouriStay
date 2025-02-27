<?php

namespace App\Http\Controllers\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\announcmentModel;

class tourist extends Controller
{
    public function index($perpage = 4){
        $announcments = announcmentModel::paginate($perpage);
        return view("tourist.home", compact("announcments"));
    }
    public function search(Request $request){
        $search = $request->input("search");
        $search = $request->input('search');

    $query = announcmentModel::query();

    if (is_numeric($search)) {
        $query->where('price', $search);
    } elseif (strtotime($search)) {
        $query->where('disponibility', $search);
    } else {
        $query->where('city', 'ILIKE', "%$search%");
    }

    $announcments = $query->get();
        return view("tourist.search", compact("announcments"));
    }
}
