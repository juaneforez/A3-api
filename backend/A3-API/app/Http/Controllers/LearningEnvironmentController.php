<?php

namespace App\Http\Controllers;

use App\Models\Learning_environment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LearningEnvironmentController extends Controller
{
    private $rules = [
        'name' => 'required|string|max:255|min:3',
        'capacity' => 'required|string|max:255|min:3',
        'area_mt2' => 'required|string|max:255|min:3',
        'floor' => 'required|string|max:255|min:3',
        'inventory' => 'required|string|max:255|min:3',
        'type_id' => 'required|numeric|max:99999999999999999999',
        'location_id' => 'required|numeric|max:99999999999999999999',
        'status' => 'required|string|max:255|min:3'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'capacity' => 'capacidad',
        'area_mt2' => 'area',
        'floor' => 'piso',
        'inventory' => 'inventario',
        'type_id' => 'tipo',
        'location_id' => 'locacion',
        'status' => 'estado',
    ];

    public function applyValidator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        $data = [];
        if($validator->fails()){
            $data = response()->json([
                'errors' => $validator->errors(),
                'data' => $request->all()
            ], Response::HTTP_BAD_REQUEST);
        }

        return $data;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learning_environments = Learning_environment::all();
        return response()->json( $learning_environments, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->applyValidator($request);
        if(!empty($data)){
            return $data;
        }

        $learning_environment = Learning_environment::create ($request->all());
        $response = [
            'message ' => 'Registro creado exitosamente',
            'learning_environment' => $learning_environment
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Learning_environment $learning_environment)
    {
        return response()->json($learning_environment, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Learning_environment $learning_environment)
    {
        $data = $this->applyValidator($request);
        if(!empty($data)){
            return $data;
        }

        $learning_environment->update($request->all());
        $response = [
            'message ' => 'Registro se actualizado exitosamente',
            'learning_environment' => $learning_environment
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning_environment $learning_environment)
    {
        $learning_environment->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente',
            'learning_environment' => $learning_environment->id
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
