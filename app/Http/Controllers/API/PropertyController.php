<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest('updated_at')->paginate();

        if (count($properties) == 0) {
            return $this->sendError('RETRIEVE_MANY_FAILED', 'No properties found', 404);
        } else {
            return $this->sendResponse(PropertyResource::collection($properties), 'RETRIEVE_SUCCESS');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'serial_no' => 'nullable',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->sendError('VALIDATION_ERROR', $validator->errors()->all(), 422);
        }

        $property = new Property;
        $property->name = $request->name;
        $property->serial_no = $request->serial_no;
        $property->description = $request->description;
        $property->location = $request->location;
        $property->status = $request->status;
        $property->save();

        return $this->sendResponse(new PropertyResource($property), 'CREATE_SUCCESS');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}