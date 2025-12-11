<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medico = Medico::all();

        return $medico;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(MedicoRequest $request)
    {
        $data = $request->validated();
        $medico = new Medico();
        $medico->name = $data['name'];
        $medico->crm = $data['crm'];
        $medico->specialty = $data['specialty'];
        $medico->save();

        return $medico;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medico = new Medico();
        $medico = $medico->find($id);

        if(!$medico) {
            return ['message' => 'Não exite ou foi excluido'];
        }

        return $medico;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, MedicoRequest $request)
    {
        $data = $request->validated();
        $medico = Medico::find($id);

        if(!$medico) {
            return ['message' => 'Não existe'];
        }

        $medico->name = $data['name'];
        $medico->crm = $data['crm'];
        $medico->specialty = $data['specialty'];
        $medico->save();

        return $medico;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $medico = Medico::find($id);

        if(!$medico) {
            return ['message' => 'Não existe ou já foi excluido'];
        }

        $medico->delete();

        return ['status' => 'success', 'message' => 'Excluido com sucesso'];
    }
}
