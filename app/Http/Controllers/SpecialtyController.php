<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialtyRequest;
use App\Models\Employee;
use App\Models\Specialty;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialtyController extends Controller
{
    private function indexPage($specialties, $page = 'painels.specialty.index')
    {
        $active = "specialty";
        $search = Specialty::selectors();
        return view($page, compact('specialties', 'active', 'search'));
    }

    public function index(Request $request){
        try {
            $active = "specialty";
            $search = Specialty::selectors();
            $specialties = Specialty::with('employees')->orderBy('specialties.created_at','DESC');
            if(isset($request->arg) && isset($request->search)){
                $specialties = $specialties->where("specialties.".$request->arg,"like","%{$request->search}%");
            }
            if(isset($request->employee)){
                $employee = Employee::with('specialties')->find($request->employee);
                if(isset($request->action) && $request->action == "add"){
                    $specialties = $specialties->distinct('specialties.id')->paginate();
                    $specialtiesOfEmployee = collect($employee->specialties)->map(function($e){
                        return $e->id;
                    });
                    return view('painels.specialty.index', compact('specialties', 'active', 'search','employee','specialtiesOfEmployee'));
                }
                $specialties = $specialties->join('employee_specialty','specialties.id','specialty_id')
                                           ->where('employee_id',$request->employee)
                                           ->paginate();
                return view('painels.specialty.index', compact('specialties', 'active', 'search','employee'));
            }
            $specialties = $specialties->paginate();
            return view('painels.specialty.index', compact('specialties', 'active', 'search'));
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        };
    }

    public function search(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required']);
            $specialties = Specialty::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($specialties);
        } catch (Exception) {
            return redirect()->back();
        }
    }

    public function create(){
        return $this->indexPage(null,'painels.specialty.create');
    }

    public function store(SpecialtyRequest $request){
        try {
            $data = $request->all();
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();
            Specialty::create($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('specialty.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function edit($id){
        $specialties = Specialty::find($id);
        return $this->indexPage($specialties,'painels.specialty.edit');
    }

    public function update(SpecialtyRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $specialties = Specialty::find($id);
            $specialties->update($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('specialty.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function show($id){
        $specialties = Specialty::find($id);
        return $this->indexPage($specialties,'painels.specialty.show');
    }

    public function destroy($id){
        try {
            $specialties = Specialty::find($id);
            $specialties->delete();
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('specialty.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

}
