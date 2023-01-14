<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Car::all();
    }

    public function show($id)
    {
        return Car::findOrFail($id);
    }

    public function store(CarRequest $request)
    {
        return Car::create($request->all());
    }

    public function update($id, CarRequest $request)
    {
        return Car::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Car::destroy($id);
    }
}
