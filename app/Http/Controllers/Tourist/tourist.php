<?php

namespace App\Http\Controllers\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\announcmentModel;
use Illuminate\Support\Facades\Auth;

class tourist extends Controller
{
    public function index($perpage = 4)
    {
        $user = Auth::user();
        $announcments = announcmentModel::paginate($perpage);
        return view("tourist.home", compact("announcments","user"));
    }
    public function search(Request $request)
    {
        $user = Auth::user();
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
        return view("tourist.search", compact("announcments","user"));
    }
    public function profile(){
        $user = Auth::user();

        return view("tourist.profile",compact('user'));
    }
    public function editForm(){
        $user = Auth::user();
        return view("tourist.editform",compact('user'));
    }
}
