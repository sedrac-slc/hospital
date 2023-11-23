<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UserRequest;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    private function indexPage($employees, $page = 'painels.employee.index')
    {
        $active = "employee";
        $search = Employee::selectors();
        return view($page, compact('employees', 'active', 'search'));
    }

    public function index(Request $request)
    {
        try {
            $active = "employee";
            $search = Employee::selectors();
            $employees = User::with('employee.consultations','employee.specialties')
                            ->join('employees', 'user_id', 'users.id')
                            ->orderBy('users.created_at', 'DESC')
                            ->select("users.*",'employees.id as employee_id');
            if(isset($request->arg) && isset($request->search)){
                $employees = $employees->where("users.".$request->arg,"like","%{$request->search}%");
            }
            if(isset($request->occupation)){
                $active = "occupation";
                $occupation = Occupation::find($request->occupation);
                $employees = $employees->where('occupation_id',$request->occupation)->paginate();
                return view('painels.employee.index', compact('employees', 'active', 'search','occupation'));
            }
            if(isset($request->specialty)){
                $active = "specialty";
                $employees = $employees->join('employee_specialty','employee_id','employees.id')
                                        ->select('users.name','email','gender','naturalness','nationality','birthday','employees.id','employee_id');
                if(isset($request->action) && $request->action == "add"){
                    $employee_add = true;
                    $employees = $employees->distinct('users.id')->paginate();
                    $specialty = Specialty::find($request->specialty);
                    return view('painels.employee.index', compact('employees', 'active', 'search','specialty','employee_add'));
                }
                $employees = $employees->where('specialty_id','=',$request->specialty);
            }
            $employees = $employees->paginate();
            return view('painels.employee.index', compact('employees', 'active', 'search'));
        } catch (Exception $e) {
            return redirect()->back();
        };
    }

    public function search(Request $request)
    {
        try {
            $request->validate(['arg' => 'required', 'search' => 'required']);
            $employees = Employee::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($employees);
        } catch (Exception) {
            return redirect()->back()->with('error', "Não foi possível a realização da operação");
        }
    }

    public function create(Request $request)
    {
        try {
            $occupation = Occupation::find($request->occupation);
            return view('painels.employee.create', [
                "active" => "employee",
                "occupation" => $occupation,
                "url" => route('employee.store').( isset($occupation->id) ? "?occupation=".$occupation->id : "")
            ]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', "Não foi possível a realização da operação");
        }
    }

    public function store(EmployeeRequest $request)
    {
        try {
            $data = $request->all();

            if ($data['password'] != $data['confirm_password'])
                 return redirect()->back()->with('error', "Não foi possível a realização da operação");

            $data['password'] =  Hash::make($data['password']);
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();

            $user = User::create($data);
            $occupation = Occupation::find($request->occupation);

            Employee::create([
                'user_id' => $user->id,
                'occupation_id' => $occupation->id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('employee.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $active = "employee";
        $employee = Employee::find($id);

        return view('painels.employee.edit', compact('employee','active'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $employees = Employee::with('user')->find($id);
            if (isset($request->pass_now)) {
                if (Hash::check($request->pass_now, $employees->user->password)) {
                    if (isset($request->password) && isset($request->confirm_password)) {
                        if ($request->password == $request->confirm_password) {
                            $data['password'] = Hash::make($request->password);
                        } else {
                            toastr()->warning("A senha nova é diferente da senha de confirmação","Aviso");
                            return redirect()->back();
                        }
                    } else {
                        toastr()->warning("Campos em falta (pode ser o campo para digita a nova velha ou da confirmação da senha)",'Aviso');
                        return redirect()->back();
                    }
                } else {
                    toastr()->warning("Verifica a senha actual, não corresponde",'Aviso');
                   return redirect()->back()->with('warning', "Verifica a senha actual, não corresponde");
                }
            }
            $employees->user->update($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('employee.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $active = "employee";
        $employee = Employee::find($id);
        return view('painels.employee.show', compact('employee','active'));
    }

    public function destroy($id)
    {
        try {
            $employees = Employee::find($id);
            $employees->delete();
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('employee.index');
        } catch (Exception $e) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->name)) return response()->json(["employees"=>[]]);
        if(trim($request->name) == "") return response()->json(["employees"=>[]]);
        $employees = User::join('employees', 'user_id', 'users.id')
                    ->where('users.name','like',"%{$request->name}%")
                    ->get();
        return response()->json(["employees"=>$employees]);
    }

}
