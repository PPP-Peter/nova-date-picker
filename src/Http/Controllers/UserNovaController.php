<?php

namespace Wame\ContractsCard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserNovaController extends Controller
{
    public function getUsers(Request $request)
    {
        return response( User::where('id', auth()->user()->id)->get());
    }

    public function getUser(Request $request)
    {
        return auth()->user();
    }

    public function checkAdmin(Request $request)
    {
        return auth()->user()->hasAnyRole('admin', 'super-admin');
    }

}

