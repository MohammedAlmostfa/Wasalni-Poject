<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($data)
    {

        $profile=Profile::create([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'gender'=>$data['gender'],
            'birthday'=>$data['birthday'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'user_id'=>$data['user_id'],,

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
