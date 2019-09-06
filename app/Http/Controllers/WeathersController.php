<?php

namespace App\Http\Controllers;

use App\Weather;
use App\City;
use GuzzleHttp\Client;

class WeathersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    
    public function index() {
        $weathers = Weather::where('owner_id', auth()->id())->get(); //Weather::all();
        
        /*$weathers = Weather::where('temperature', 9)
            ->orderBy('precipitation', 'asc')
            ->take(10)
            ->get();*/
        
        return view('weathers.index', compact('weathers'));
    }
    
    public function create() {
        return view('weathers.create');
    }
    
    public function edit(Weather $weather) {
        return view('weathers.edit', compact('weather'));
    }
    
    public function update(Weather $weather) {
        //$this->authorize('update', $weather);
        
        $weather->update(request(['city_id', 'date', 'precipitation', 'temperature']));
        
        return redirect('/weathers');
    }
    
    public function destroy(Weather $weather) {
        //$this->authorize('update', $weather);
        
        $weather->delete();
        
        return redirect('/weathers');
    }
    
    public function store() {
        Weather::create(
            request()->validate([
                'city_id' => ['required', 'min:2'],
                'date' => ['required', 'date'], 
                'precipitation' => 'required', 
                'temperature' => 'required'
            ]) + ['owner_id' => auth()->id()]);
        
        return redirect('/weathers');
    }
    
    public function callapi($api_id, $city_id) {
        $client = new Client();
        $res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast', [
            'query' => [
                'id' => $api_id,
                'units' => 'metric',
                'lang' => 'ru',
                'APPID' => '80f835aed72770e3e5c809661daad62d'
            ]
        ]);
        
        $data = json_decode($res->getBody());
        $values = $data->list;
        
        $city = City::findOrFail($city_id);
        
        return view('weathers.callapi', compact('values', 'city'));
    }
    
    public function show(Weather $weather) {
//         if ($weather->owner_id !== auth()->id()) {
//             abort(403);
//         }
        
        //abort_if($weather->owner_id !== auth()->id(), 403);
        //abort_unless
        //$this->authorize('update', $weather);
        
//         if (\Gate::denies('update', $weather)) {
//             abort(403);
//         }
        //abort_unless(\Gate::allows('update', $weather), 403);
        
        return view('weathers.show', compact('weather'));
    }
}
