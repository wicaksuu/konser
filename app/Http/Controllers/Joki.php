<?php

namespace App\Http\Controllers;

use App\Models\Joki as ModelsJoki;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Joki extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'ticket' => 'required|string',
        ]);


        if ($validator->fails()) {
            return Inertia::render('Daftar', ['errors' => $validator->errors()]);
        }

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $ticket = $request->input('ticket');

        try {
            ModelsJoki::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'ticket' => $ticket,
                'status' => 'Waiting'
            ]);

            return Inertia::render('Daftar', ['errors' => ["success" => "Order Berhasil Tersimpan"]]);
        } catch (\Throwable $th) {
            return Inertia::render('Daftar', ['errors' => $th->getMessage()]);
        }
    }
    public function index()
    {
        return Inertia::render('Daftar');
    }
}
