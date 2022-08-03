@extends('master')
@section('title', 'masin ')
@section('content')
    <div>
        <h1>Masin yenile et <b></b></h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('cars.update',['id'=>$car->user_id , 'car'=> $car->id])}}">
            <div>
                @method('put')
                @csrf
                <br>
                <div class="row">
                    <label for="brand" class="col-sm-2 col-form-label">Markasi : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="brand" id="brand"
                               value="{{ $car->brand }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="graduation_year" class="col-sm-2 col-form-label">Buraxilis ili : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="graduation_year" id="graduation_year"  value="{{ $car->graduation_year }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="color" class="col-sm-2 col-form-label">Reng : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="color" id="color" value="{{ $car->color }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="registration_num" class="col-sm-2 col-form-label">Qeydiyat nomresi : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="registration_num" id="registration_num" value="{{ $car->registration_num }}">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Yenile</button>
            </div>
        </form>


    </div>
@endsection
