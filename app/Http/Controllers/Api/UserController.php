<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function update(Request $request, $id)
    {
        return true;
    }
}
