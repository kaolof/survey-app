<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 

        
        $isAdmin = $user->hasRole('admin'); 

        $users = User::all();

        $responseUsers = User::whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('responses');
        })->get();
        

        return Inertia::render('Dashboard', [
            'user' => $user,
            'isAdmin' => $isAdmin,
            'users' => $users,
            'responseUsers'=> $responseUsers
        ]);
    }
}
