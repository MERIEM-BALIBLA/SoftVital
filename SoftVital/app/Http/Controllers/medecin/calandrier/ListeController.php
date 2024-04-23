<?php

namespace App\Http\Controllers\medecin\calandrier;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    public function index(){
        $events = Event::get();
        return view('medecin/calendrier/liste/liste', compact('events'));
    }

    public function edit($id)
    {
        $category = Event::findOrFail($id);
        // return view('admin.category.edit', ['category' => $category]);
    }
}
