@extends('master')
@isset($user)
    @section('title', 'Musteri m-rin yenilenmesi')
@else
    @section('title', 'Создать usera')
@endisset

@section('content')
    <div>
        @isset($user)
            <h1>Musteri melumatlarin yenilenmesi -<b>{{ $user->name }}</b></h1>
        @else
            <h1>Musteri elave olunmasi</h1>
        @endisset

        <form method="POST"
              @isset($user)
              action="{{ route('users.update', $user) }}"
              @else
              action="{{ route('users.store') }}"
            @endisset
        >
            <div>
                @isset($user)
                    @method('PUT')
                @endisset
                @csrf
                <br>
                <div class="row">
                    <label for="adi" class="col-sm-2 col-form-label">Ad : </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="name" id="adi"
                               value="{{  isset($user) ? $user->name : null }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="code" class="col-sm-2 col-form-label">Soyad: </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="surname" id="code"
                               value="{{  isset($user) ? $user->surname : null }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Doguldugu tarix: </label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="date_of_birthday" id="name"
                               value="@isset($user){{ $user->date_of_birthday }}@endisset">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="description" class="col-sm-2 col-form-label">Cinsiyet: </label>
                    <div class="col-sm-2">
                        <select name="gender" class="form-control">

                            <option selected disabled>Cinsiyyeti secin</option>
                            <option @isset($user){{ $user->gender ===  "m" ? "selected" : ""}}@endisset value="m">
                                Kishi
                            </option>
                            <option @isset($user){{ $user->gender ===  "f" ? "selected" : ""}} @endisset value="f">
                                Qadin
                            </option>


                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="phone" class="col-sm-2 col-form-label">Mobil nom: </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="phone" placeholder="0555555555" id="name"
                               value="@isset($user){{ $user->phone }}@endisset">
                    </div>
                </div>
                @isset($user)
                    <button type="submit" class="btn btn-success">Yenile</button>
                @else
                    <button type="submit" class="btn btn-success">Yarat</button>
                @endisset
            </div>
        </form>
        <br>
        <hr>
        @isset($user)
            <h1>Musteri {{ $user->name }}-in masini : <b>{{$user->car->brand ?? 'yoxdu'}}</b></h1>
        @endisset
        <br>
        <hr>
        @isset($user)
            <h1>Musteri <b>{{ $user->name }}-in seyahet etdiyi rayonlar : -</b></h1>
            @foreach($user->travel_districts as $rayon)
                <h1><b>{{ $rayon->name }} :{{ $rayon->duration }} - gun </b></h1>
            @endforeach
        @endisset


    </div>
@endsection
