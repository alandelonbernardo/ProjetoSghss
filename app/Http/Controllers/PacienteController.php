<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $paciente = Paciente::all();

        return $paciente;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PacienteRequest $request) {
        $data = $request->validated();
        $paciente = new Paciente();
        $paciente->name = $data['name'];
        $paciente->cpf = $data['cpf'];
        $paciente->phone = $data['phone'];
        $paciente->address = $data['address'];
        $paciente->save();

        return $paciente;
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $paciente = new Paciente();
        $paciente = $paciente->find($id);

        if(!$paciente) {
            return ['message' => 'Não existe ou foi excluido'];
        }

        return $paciente;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, PacienteRequest $request) {
        $data = $request->validated();
        $paciente = Paciente::find($id);

        if(!$paciente) {
            return ['message' => 'Não existe'];
        }

        $paciente->name = $data['name'];
        $paciente->cpf = $data['cpf'];
        $paciente->phone = $data['phone'];
        $paciente->address = $data['address'];
        $paciente->save();

        return $paciente;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id) {
        $paciente = Paciente::find($id);

        if(!$paciente) {
            return ['message' => 'Não existe ou já foi excluido'];
        }

        $paciente->delete();

        return ['status' => 'success', 'message' => 'Excluido com sucesso'];
    }
}
