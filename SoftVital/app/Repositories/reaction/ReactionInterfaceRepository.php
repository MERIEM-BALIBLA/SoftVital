<?php
namespace App\Repositories\reaction;

use Illuminate\Http\Request;

interface ReactionInterfaceRepository
{
    public function addReact(Request $request);
    public function deleteReact($id);
}