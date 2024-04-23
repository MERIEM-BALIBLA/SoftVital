<?php

namespace App\Http\Controllers\admin\specialite;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Specialite;
use App\Repositories\specialite\SpecialiteInterfaceRepository;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    protected $specialiteRepository;

    public function __construct(SpecialiteInterfaceRepository $specialiteRepository)
    {
        $this->specialiteRepository = $specialiteRepository;
    }

    public function index()
    {
        $specialites = $this->specialiteRepository->read();
        return view('admin.dashboard.specialite.index', compact('specialites'));
    }

    public function store(Request $request){
        $this->specialiteRepository->add($request);
        return redirect()->back();
    }

    public function update($id, Request $request){
        $this->specialiteRepository->edit($id,$request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->specialiteRepository->delete($id);
        return redirect()->back();
    }
    
}
