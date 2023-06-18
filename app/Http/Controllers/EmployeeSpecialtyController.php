<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeSpecialtyController extends Controller
{

    public function specialty(Request $request)
    {
        try {
            if(!isset($request->employee)){
                toastr()->error('Não possível realização desta operador', 'Erro');
                return redirect()->back();
            }
            $employee = Employee::find($request->employee);
            if(isset($request->x_specialty_del)){
                $employee->specialties()->detach([$request->x_specialty_del]);
                toastr()->success('Operação realizado com successo', 'Successo');
                return redirect()->back();
            }else if(isset($request->x_specialty_add)){
                $employee->specialties()->attach([$request->x_specialty_add]);
                toastr()->success('Operação realizado com successo', 'Successo');
                return redirect()->back();
            }else{
                toastr()->error('Não possível realização desta operador', 'Erro');
                return redirect()->back();
            }
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        };
    }

    public function employee(Request $request)
    {
        try {
            if(!isset($request->specialty)){
                toastr()->error('Não possível realização desta operador', 'Erro');
                return redirect()->back();
            }
            $specialty = Specialty::find($request->specialty);
            if(isset($request->x_employee_del)){
                $specialty->employees()->detach([$request->x_employee_del]);
                toastr()->success('Operação realizado com successo', 'Successo');
                return redirect()->back();
            }else if(isset($request->x_employee_add)){
                $specialty->employees()->attach([$request->x_employee_add => [
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "created_by" => Auth::user()->id,
                    "updated_by" => Auth::user()->id
                ]]);
                toastr()->success('Operação realizado com successo', 'Successo');
                return redirect()->back();
            }else{
                toastr()->error('Não possível realização desta operador', 'Erro');
                return redirect()->back();
            }
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        };
    }

}
