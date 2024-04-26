<?php
namespace App\Repositories\singlePage;

use Illuminate\Http\Request;

interface SinglePageInterfaceRepository
{
    public function show($id);
    public function reserve(Request $request);
}