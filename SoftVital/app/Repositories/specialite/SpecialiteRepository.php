<?php
namespace App\Repositories\specialite;

use App\Models\Medecin\Specialite;
use Illuminate\Http\Request;

class SpecialiteRepository implements SpecialiteInterfaceRepository
{

    public function read()
    {
        return Specialite::orderBy('specialite')->paginate(8);
    }

    public function add(Request $request)
    {
        $fields = $request->validate([
            'specialite' => 'required|min:5|max:20'
        ]);
         $specialite = new Specialite();
         $specialite->specialite = $fields['specialite'];
         $specialite->save();
         return $specialite;
    }

    public function delete($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();
    }

    public function edit($id, Request $request){
        $fields = $request->validate([
            'specialite' => 'required|min:5|max:20',
            'date' => 'required'
        ]);
        $specialite = Specialite::findOrFail($id);
        $specialite -> update($fields);
        return $specialite;
    }


}