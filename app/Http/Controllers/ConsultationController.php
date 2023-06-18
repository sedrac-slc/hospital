<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use App\Models\ConsultationType;
use App\Models\Employee;
use App\Models\Patient;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{

    private function querySearch($consultations, $arg, $search)
    {
        switch ($arg) {
            case "patient":
                return $consultations->join('patients', 'patient_id', 'patients.id')
                    ->join('users', 'user_id', 'users.id')
                    ->where('users.name', 'like', "%{$search}%");
            case "employee":
                return $consultations->join('employees', 'employee_id', 'employees.id')
                    ->join('users', 'user_id', 'users.id')
                    ->where('users.name', 'like', "%{$search}%");
            case "consultation_type":
                return $consultations->join('consultation_types', 'consultation_type_id', 'consultation_types.id')
                    ->where('consultation_types.name', 'like', "%{$search}%");
            case "price":
                return $consultations->where('price', 'like', "%{$search}%");
            default:
                return $consultations;
        }
    }

    public function index(Request $request)
    {
        try {
            $active = "consultation";
            $search = Consultation::selectors();
            $consultations = Consultation::with('patient', 'employee', 'consultation_type')
                ->orderBy('consultations.created_at', 'DESC');
            if (isset($request->arg) && isset($request->search)) {
                $consultations = $this->querySearch($consultations, $request->arg, $request->search);
            }
            if (isset($request->patient)) {
                $consultations = $consultations->where('patient_id', $request->patient);
            }
            if (isset($request->employee)) {
                $consultations = $consultations->where('employee_id', $request->employee);
            }
            if (isset($request->consultation_type)) {
                $consultations = $consultations->where('consultation_type_id', $request->consultation_type);
            }
            $consultations = $consultations->paginate();
            return view('painels.consultation.index', compact('consultations', 'active', 'search'));
        } catch (Exception) {
            return redirect()->back();
        };
    }

    public function create(Request $request)
    {
        try {
            $active = "consultation";
            $search = Employee::selectors();
            if (isset($request->patient)) {
                $patient = Patient::with('user')->find($request->patient);
                return view('painels.consultation.create', compact('active', 'search', 'patient'));
            }
            if (isset($request->employee)) {
                $employee = Employee::with('user')->find($request->employee);
                return view('painels.consultation.create', compact('active', 'search', 'employee'));
            }
            if (isset($request->consultation_type)) {
                $consultation_type = ConsultationType::find($request->consultation_type);
                return view('painels.consultation.create', compact('active', 'search', 'consultation_type'));
            }
            return view('painels.consultation.create', compact('active', 'search'));
        } catch (Exception) {
            return redirect()->back();
        };
    }

    public function store(ConsultationRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] =  $data['updated_by'] = Auth::user()->id;
            $data['created_at'] =  $data['updated_at'] = Carbon::now();
            Consultation::create($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('consultation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $active = "consultation";
        $consultation = Consultation::with('employee', 'patient', 'consultation_type')->find($id);
        return view('painels.consultation.edit', [
            "active" => $active,
            "consultation" => $consultation,
            "employee" => $consultation->employee,
            "patient" => $consultation->patient,
            "consultation_type" => $consultation->consultation_type
        ]);
    }

    public function update(ConsultationRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();
            $consultation = Consultation::find($id);
            $consultation->update($data);
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('consultation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $consultation = Consultation::find($id);
            $consultation->delete();
            toastr()->success('Operação realizado com successo', 'Successo');
            return redirect()->route('consultation.index');
        } catch (Exception) {
            toastr()->error('Não possível realização desta operador', 'Erro');
            return redirect()->back();
        }
    }
}
