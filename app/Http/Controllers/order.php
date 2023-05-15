<?php

namespace App\Http\Controllers;

use App\Models\Joki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class order extends Controller
{
    public function index()
    {
        return Inertia::render('DaftarOrder');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);
        if ($validator->fails()) {
            return Inertia::render('DaftarOrder', ['errors' => $validator->errors()]);
        }
        $email = $request->input('email');
        $data = Joki::where('email', $email)->get();
        return Inertia::render('DaftarOrder', ['errors' => ["datas" => $data]]);
    }
}
