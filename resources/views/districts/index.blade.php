@extends('master')
@section('title', 'Rayon ')
@section('content')
    <div>
        <h1>Seyahet rayonu elave et <b></b></h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('districts.store',$id)}}">
            <div>
                @csrf
                <br>
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Rayon adi : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="date_of_travel" class="col-sm-2 col-form-label">Seyahet tarixi : </label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="date_of_travel" id="date_of_travel">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="duration" class="col-sm-2 col-form-label">Seyahet muddeti : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="duration" id="duration">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Elave et</button>
            </div>
        </form>


    </div>
@endsection
