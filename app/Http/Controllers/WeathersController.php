<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weather;

class WeathersController extends Controller
{
    public function index() {
        $weathers = Weather::all();
        
        /*$weathers = Weather::where('temperature', 9)
            ->orderBy('precipitation', 'asc')
            ->take(10)
            ->get();*/
        
        return view('weathers.index', compact('weathers'));
    }
    
    public function create() {
        return view('weathers.create');
    }
    
    public function edit($id) {
        $weather = Weather::findOrFail($id);
        return view('weathers.edit', compact('weather'));
    }
    
    public function update($id) {
        $weather = Weather::findOrFail($id);
        
        $weather->city_id = request('city_id');
        $weather->date = request('date');
        $weather->precipitation = request('precipitation');
        $weather->temperature = request('temperature');
        
        $weather->save();
        
        return redirect('/weathers');
    }
    
    public function destroy($id) {
        Weather::findOrFail($id)->delete();
        
        return redirect('/weathers');
    }
    
    public function store() {
        $weather = new Weather();
        
        $weather->city_id = request('city_id');
        $weather->date = request('date');
        $weather->precipitation = request('precipitation');
        $weather->temperature = request('temperature');
        
        $weather->save();
        
        return redirect('/weathers');
    }
}
