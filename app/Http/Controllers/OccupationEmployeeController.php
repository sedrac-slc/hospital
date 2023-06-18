<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Occupation;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class OccupationEmployeeController extends Controller
{

    public function employee_list($id){
        try {
            $active = "occupation";
            $search = Employee::selectors();
            $employees = User::join('employees','user_id','users.id')
                        ->where('occupation_id',$id)
                        ->paginate();
            $occupation = true;
            return view('painels.employee.index', compact('employees', 'active', 'search','occupation'));
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");;
        };
    }

}
