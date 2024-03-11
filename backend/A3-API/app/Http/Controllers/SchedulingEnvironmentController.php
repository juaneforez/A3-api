<?php

namespace App\Http\Controllers;

use App\Models\Scheduling_environment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SchedulingEnvironmentController extends Controller
{
    private $rules = [
        'course_id' => 'required|numeric',
        'instructor_id' => 'required|numeric',
        'environment_id' => 'required|numeric',
        'date_scheduling' => 'required|date_format:Y-m-d'
    ];

    private $traductionAttributes = [
        'course_id' => 'curso',
        'instructor_id' => 'instructor',
        'environment_id' => 'ambiente',
        'date_scheduling' => 'fecha de programación'
    ];

    public function applyValidator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        $data = [];
        if ($validator->fails()) {
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
        $scheduling_environments = Scheduling_environment::all();
        $scheduling_environments->load(['course', 'instructor', 'environment_type']);
        return response()->json($scheduling_environments, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->applyValidator($request);
        if (!empty($data)) {
            return $data;
        }

        $scheduling_environment = Scheduling_environment::create($request->all());
        $response = [
            'message ' => 'Registro creado exitosamente',
            'scheduling_environment' => $scheduling_environment
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Scheduling_environment $scheduling_environment)
    {
        $scheduling_environment->load(['course', 'instructor', 'environment_type']);
        return response()->json($scheduling_environment, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scheduling_environment $scheduling_environment)
    {
        $data = $this->applyValidator($request);
        if (!empty($data)) {
            return $data;
        }

        $scheduling_environment->update($request->all());
        $response = [
            'message ' => 'Registro se actualizado exitosamente',
            'scheduling_environment' => $scheduling_environment
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scheduling_environment $scheduling_environment)
    {
        $scheduling_environment->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente',
            'scheduling_environment' => $scheduling_environment->id
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
