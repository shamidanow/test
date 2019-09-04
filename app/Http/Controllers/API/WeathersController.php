<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Weather;

use Illuminate\Support\Facades\Validator;

class WeathersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weathers = Weather::all();
        return $this->sendResponse($weathers->toArray(), 'Weathers retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $weather = Weather::create($input);
        return $this->sendResponse($weather->toArray(), 'Weather created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weather = Weather::find($id);
        if (is_null($weather)) {
            return $this->sendError('Weather not found.');
        }
        return $this->sendResponse($weather->toArray(), 'Weather retrieved successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weather $weather)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'city_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $weather->city_id = $input['city_id'];
        $weather->date = $input['date'];
        $weather->precipitation = $input['precipitation'];
        $weather->temperature = $input['temperature'];
        
        $weather->save();
        return $this->sendResponse($weather->toArray(), 'Weather updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $weather)
    {
        $weather->delete();
        return $this->sendResponse($weather->toArray(), 'Weather deleted successfully.');
    }
}