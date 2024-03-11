<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    private $rules = [
        'code' => 'required|string|min:3|max:255',
        'shift' => 'required|string|min:3|max:255',
        'career_id' => 'required|numeric|max:99999999999999999999',
        'initial_date' => 'required|date|date_format:Y-m-d',
        'final_date' => 'required|date|date_format:Y-m-d',
        'status' => 'required|string|max:255',
    ];

    private $traductionAttributes = [
        'code' => 'código',
        'shift' => 'jornada',
        'career_id' => 'carrera',
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
        $courses = Course::all();
        $courses->load('career');
        return response()->json( $courses, Response::HTTP_OK);
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

        $course = Course::create ($request->all());
        $response = [
            'message ' => 'Registro creado exitosamente',
            'course' => $course
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('career');
        return response()->json($course, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $this->applyValidator($request);
        if(!empty($data)){
            return $data;
        }

        $course->update($request->all());
        $response = [
            'message ' => 'Registro se actualizado exitosamente',
            'course' => $course
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente',
            'course' => $course->id
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
