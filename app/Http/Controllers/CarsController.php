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

    public function index(Request $request)
    {
        if (!$request->only('per_page') || $request->only('per_page')['per_page'] == 'null' ) {
            if (!$request->only('brand')&&!$request->only('model')) {
                return Car::all();
            }
            if(!$request->only('model')){
                $brand = $request->only('brand');
                return  Car::searchByBrand($brand)->get();
            }
            if(!$request->only('brand')){
                $model = $request->only('model');
                return Car::searchByModel($model)->get();
            }
            $brandWithModel = $request->only('brand');
            $modelWithBrand = $request->only('model');
            return Car::searchByBrand($brandWithModel)->searchByModel($modelWithBrand)->get();
        };

        $per_page = $request->only('per_page');
        $cars = Car::paginate($per_page['per_page']);
        $cars->appends([$per_page])->links();
        return $cars;
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
