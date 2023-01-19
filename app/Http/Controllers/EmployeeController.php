<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Occupation;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private function indexPage($employees, $page = 'painels.employee.index')
    {
        $active = "employee";
        $search = Employee::selectors();
        return view($page, compact('employees', 'active', 'search'));
    }

    public function index(){
        try {
            $employees = User::join('employees','user_id','users.id')->paginate();
            return $this->indexPage($employees);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");;
        };
    }

    public function search(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required']);
            $employees = Employee::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($employees);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
        }
    }

    public function create(){
        $active = "employee";
        $occupations = Occupation::paginate();
        $search = Occupation::selectorsEmployee();
        return view('painels.occupation_employee.occupation', compact('occupations', 'active', 'search'));
    }

    public function search_occupation(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required','action'=>'regex:/[create|edit]/u']);
            $active = "employee";
            $search = Occupation::selectorsEmployee();
            $occupations = Occupation::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return view('painels.occupation_employee.occupation', compact('occupations', 'active', 'search'));
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
        }
    }

    public function form_create(Request $request){
        try{
            $request->validate(['x_occupation' => 'required','action'=>'regex:/[create|edit]/u']);
            $occupation = Occupation::find($request->x_occupation);
            return view('painels.occupation_employee.form_user', [
                "active" => "employee",
                "occupation" => $occupation
            ]);
        }catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
        }
    }



    public function store(EmployeeRequest $request){
        try {
            $data = $request->all();
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();
            Employee::create($data);
            return redirect()->route('employee.index')->with('success',"Processo de adição realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function edit($id){
        $employees = Employee::find($id);
        return $this->indexPage($employees,'painels.employee.edit');
    }

    public function update(EmployeeRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $employees = Employee::find($id);
            $employees->update($data);
            return redirect()->route('employee.index')->with('success',"Processo de actualização realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function show($id){
        $employees = Employee::find($id);
        return $this->indexPage($employees,'painels.employee.show');
    }

    public function destroy($id){
        try {
            $employees = Employee::find($id);
            $employees->delete();
            return redirect()->route('employee.index')->with('success',"Processo de eliminação realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

}

