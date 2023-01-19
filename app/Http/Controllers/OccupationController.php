<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupationRequest;
use App\Models\Occupation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OccupationController extends Controller
{

    public function indexPage($occupations, $page = 'painels.occupation.index')
    {
        $active = "occupation";
        $search = Occupation::selectors();
        return view($page, compact('occupations', 'active', 'search'));
    }

    public function index(){
        try {
            $occupations = Occupation::paginate();
            return $this->indexPage($occupations);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");;
        };
    }

    public function search(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required']);
            $occupations = Occupation::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($occupations);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
        }
    }

    public function create(){
        return $this->indexPage(null,'painels.occupation.create');
    }

    public function store(OccupationRequest $request){
        try {
            $data = $request->all();
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();
            Occupation::create($data);
            return redirect()->route('occupation.index')->with('success',"Processo de adição realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function edit($id){
        $occupations = Occupation::find($id);
        return $this->indexPage($occupations,'painels.occupation.edit');
    }

    public function update(OccupationRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $occupations = Occupation::find($id);
            $occupations->update($data);
            return redirect()->route('occupation.index')->with('success',"Processo de actualização realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function show($id){
        $occupations = Occupation::find($id);
        return $this->indexPage($occupations,'painels.occupation.show');
    }

    public function destroy($id){
        try {
            $occupations = Occupation::find($id);
            $occupations->delete();
            return redirect()->route('occupation.index')->with('success',"Processo de eliminação realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

}
