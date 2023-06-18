<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function foto(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image',
                'user_id' => 'required'
            ]);
            $user = User::find($request->user_id);
            if (Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $data["image"] = $request->image->store('users');
            $user->update($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->back();
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }
}
