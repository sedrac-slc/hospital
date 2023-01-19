<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationTypeRequest;
use App\Models\ConsultationType;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationTypeController extends Controller
{
    private function indexPage($consultation_types, $page = 'painels.consultation_type.index')
    {
        $active = "consultation_type";
        $search = ConsultationType::selectors();
        return view($page, compact('consultation_types', 'active', 'search'));
    }

    public function index(){
        try {
            $consultation_types = ConsultationType::paginate();
            return $this->indexPage($consultation_types);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");;
        };
    }

    public function search(Request $request){
        try {
            $request->validate(['arg' => 'required','search' => 'required']);
            $consultation_types = ConsultationType::where($request->arg, "LIKE", "%" . $request->search . "%")->paginate();
            return $this->indexPage($consultation_types);
        } catch (Exception) {
            return redirect()->back()->with('error',"Não foi possível a realização da operação");
        }
    }

    public function create(){
        return $this->indexPage(null,'painels.consultation_type.create');
    }

    public function store(ConsultationTypeRequest $request){
        try {
            $data = $request->all();
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();
            ConsultationType::create($data);
            return redirect()->route('consultation_type.index')->with('success',"Processo de adição realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function edit($id){
        $consultation_types = ConsultationType::find($id);
        return $this->indexPage($consultation_types,'painels.consultation_type.edit');
    }

    public function update(ConsultationTypeRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $consultation_types = ConsultationType::find($id);
            $consultation_types->update($data);
            return redirect()->route('consultation_type.index')->with('success',"Processo de actualização realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

    public function show($id){
        $consultation_types = ConsultationType::find($id);
        return $this->indexPage($consultation_types,'painels.consultation_type.show');
    }

    public function destroy($id){
        try {
            $consultation_types = ConsultationType::find($id);
            $consultation_types->delete();
            return redirect()->route('consultation_type.index')->with('success',"Processo de eliminação realizado com successo");
        } catch (Exception) {
            return redirect()->back()->with('error',"Erro na realização da operação");
        }
    }

}
