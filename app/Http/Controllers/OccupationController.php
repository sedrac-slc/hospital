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

    public function index(Request $request){
        try {
            if(isset($request->arg) && isset($request->search)){
                $occupations = Occupation::where($request->arg,"like","%{$request->search}%")->paginate();
                return $this->indexPage($occupations);
            }
            $occupations = Occupation::paginate();
            return $this->indexPage($occupations);
        } catch (Exception) {
            return redirect()->back();
        };
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
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('occupation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
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
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('occupation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
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
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('occupation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

}
