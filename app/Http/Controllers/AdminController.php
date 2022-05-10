<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function me(Request $request)
    {
        return new AdminResource($request->user());
    }
}
