<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        try {
            $active = "patient";
            $search = Patient::selectors();
            $patients = User::join('patients', 'user_id', 'users.id')
                            ->orderBy('users.created_at', 'DESC')
                            ->select('users.*','patients.id as patient_id');
            if (isset($request->arg) && isset($request->search)) {
                $patients = $patients->where("users." . $request->arg, "like", "%{$request->search}%");
            }
            $patients = $patients->paginate();
            return view('painels.patient.index', compact('patients', 'active', 'search'));
        } catch (Exception) {
            return redirect()->back();
        };
    }

    public function create()
    {
        try {
            return view('painels.patient.create', [
                "active" => "patient",
                "url" => route('patient.store')
            ]);
        } catch (Exception) {
            return redirect()->back();
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            if ($data['password'] != $data['confirm_password']) {
                toastr()->error('As senhas são diferentes', 'Aviso');
                return redirect()->back();
            }

            $data['password'] =  Hash::make($data['password']);
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();

            $user = User::create($data);
            Patient::create([
                'user_id' => $user->id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('patient.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $active = "patient";
        $patient = Patient::find($id);
        return view('painels.patient.edit', compact('patient', 'active'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $patient = Patient::with('user')->find($id);
            if (isset($request->pass_now)) {
                if (Hash::check($request->pass_now, $patient->user->password)) {
                    if (isset($request->password) && isset($request->confirm_password)) {
                        if ($request->password == $request->confirm_password) {
                            $data['password'] = Hash::make($request->password);
                        } else {
                            toastr()->warning("A senha nova é diferente da senha de confirmação", "Aviso");
                            return redirect()->back();
                        }
                    } else {
                        toastr()->warning("Campos em falta (pode ser o campo para digita a nova velha ou da confirmação da senha)", 'Aviso');
                        return redirect()->back();
                    }
                } else {
                    toastr()->warning("Verifica a senha actual, não corresponde", 'Aviso');
                    return redirect()->back();
                }
            }
            $patient->user->update($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('patient.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $active = "patient";
        $patient = Patient::find($id);
        return view('painels.patient.show', compact('patient', 'active'));
    }

    public function destroy($id)
    {
        try {
            $patient = Patient::find($id);
            $patient->delete();
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('patient.index');
        } catch (Exception $e) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function json(Request $request)
    {
        if (!isset($request->name)) return response()->json(["patients" => []]);
        if (trim($request->name) == "") return response()->json(["patients" => []]);
        $patients = User::join('patients', 'user_id', 'users.id')
            ->where('users.name', 'like', "%{$request->name}%")
            ->get();
        return response()->json(["patients" => $patients]);
    }
}
