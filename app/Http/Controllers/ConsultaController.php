<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultaRequest;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consulta = Consulta::query()->with('paciente', 'medico')->get();
        return $consulta;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ConsultaRequest $request)
    {
        $data = $request->validated();
        $consulta = new Consulta();
        $consulta->paciente_id = $data['paciente_id'];
        $consulta->medico_id = $data['medico_id'];
        $consulta->date = $data['date'];
        $consulta->time = $data['time'];
        $consulta->observations = $data['observations'];
        $consulta->save();

        return $consulta;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consulta = Consulta::with('paciente', 'medico')->find($id);

        if(!$consulta) {
            return ['message' => 'Não exite ou foi excluido'];
        }

        return $consulta;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, ConsultaRequest $request)
    {
        $data = $request->validated();
        $consulta = Consulta::find($id);

        if(!$consulta) {
            return ['message' => 'Não existe'];
        }

        $consulta->paciente_id = $data['paciente_id'];
        $consulta->medico_id = $data['medico_id'];
        $consulta->date = $data['date'];
        $consulta->time = $data['time'];
        $consulta->observations = $data['observations'];
        $consulta->save();

        return $consulta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $consulta = Consulta::find($id);

        if(!$consulta) {
            return ['message' => 'Não existe ou já foi excluido'];
        }

        $consulta->delete();

        return ['status' => 'success', 'message' => 'Excluido com sucesso'];
    }
}
