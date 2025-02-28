<?php
namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use App\Models\announcmentModel;
use App\Models\EquipmetModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class AnnouncmentController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $equipments = EquipmetModel::all();
        return view('owner.createannoucment', compact("user", "equipments"));
    }

    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'price' => 'required|numeric',
            'disponibility' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'equipments' => 'array', 
            'equipments.*' => 'exists:equipment,id' // Validate each equipment ID
        ]);

        // Create the announcement
        $announcement = announcmentModel::create([
            'title' => $validated['title'],
            'city' => $validated['city'],
            'price' => $validated['price'],
            'disponibility' => $validated['disponibility'],
            'user_id' => $validated['user_id']
        ]);

        if (!empty($validated['equipments'])) {
            $announcement->equipments()->attach($validated['equipments']);
        }

        return redirect()->back()->with('success', 'Announcement created successfully!');
    }
}
