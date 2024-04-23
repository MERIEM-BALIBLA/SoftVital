<?php   
namespace App\Repositories\specialite;
use Illuminate\Http\Request;

interface SpecialiteInterfaceRepository {

    public function read();
    public function add(Request $request);
    public function delete($id);
    public function edit($id, Request $request);
    

}