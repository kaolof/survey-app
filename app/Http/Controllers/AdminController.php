<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Response;


class AdminController extends Controller
{
    public function index()
    {
       // return Inertia::render('Admin/Dashboard');

        $users = User::all();

        $responseUsers = User::whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('responses');
        })->get();

        return Inertia::render('Admin/Dashboard', [
            'users' => $users,
            'responseUsers'=> $responseUsers
        ]);

        //dd($users);


        // Verificar si el usuario tiene permiso
        /* if (!auth()->user()->can('admin.dashboard')) {
            abort(403); // Acceso prohibido
        } */
       
        
    }

}
