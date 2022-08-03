<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create($id)
    {
        return view('cars.index', compact('id'));
    }

    public function store(CarRequest $request, $id)
    {
        $car = Car::create([
            'user_id' => $id,
            'brand' => $request->get('brand'),
            'graduation_year' => $request->get('graduation_year'),
            'color' => $request->get('color'),
            'registration_num' => $request->get('registration_num'),
        ]);

        return redirect()->route('users.index')->with('success', 'Yeni masin elave olundu!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($user_id, Car $car)
    {
        return view('cars.update', compact('car'));
    }

    public function update(CarRequest $request, $user_id, Car $car)
    {
        $params = $request->only([
            'brand',
            'graduation_year',
            'color',
            'registration_num'
        ]);
        $car->update($params);

        return redirect()->route('users.index')->with('success', 'Update islemi gerceklesdi!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
