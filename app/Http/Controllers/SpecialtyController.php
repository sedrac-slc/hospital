<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialtyRequest;
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

    public function index(){
        try {
            $specialties = Specialty::paginate();
            return $this->indexPage($specialties);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");;
        };
    }

    public function search(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required']);
            $specialties = Specialty::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($specialties);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
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
            return redirect()->route('specialty.index')->with('success',"Processo de adição realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
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
            return redirect()->route('specialty.index')->with('success',"Processo de actualização realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
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
            return redirect()->route('specialty.index')->with('success',"Processo de eliminação realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

}
