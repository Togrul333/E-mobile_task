<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelDistrictRequest;
use App\Models\Travel_district;
use Illuminate\Http\Request;

class TravelDistrictController extends Controller
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
        return view('districts.index', compact('id'));

    }

    public function store(TravelDistrictRequest $request, $id)
    {
        $district = Travel_district::create([
            'user_id' => $id,
            'name' => $request->get('name'),
            'date_of_travel' => $request->get('date_of_travel'),
            'duration' => $request->get('duration'),

        ]);

        return redirect()->route('users.index')->with('success', 'Seyahet rayonu elave olundu!!');


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id, $district)
    {
        $district = Travel_district::where('id', $district);
        $district->delete();
        return redirect()->route('users.show',$id)->with('warning', 'Qeyd edilmis Seyahet rayonu musterinin listesinden silindi!!');
    }
}
