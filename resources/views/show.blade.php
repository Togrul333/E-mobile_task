@extends('master')
@section('title',' Ətraflı')

@section('content')
    <div class="col-md-12">
        <h1>Musteri - {{ $user->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Sutun
                </th>
                <th>
                    Məzmun
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>Ad</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Soyad</td>
                <td>{{ $user->surname }}</td>
            </tr>
            <tr>
                <td>Tevellud</td>
                <td>{{ $user->date_of_birthday }}</td>
            </tr>
            <tr>
                <td>Cinsiyet</td>
                <td>{{ $user->gender == "m" ?  "Kishi" : "Qadin" }}</td>
            </tr>
            <tr>
                <td>Avtomobil markasi</td>
                <td>{{ $user->car->brand ?? 'Avtomobili yoxdu' }}</td>
            </tr>

            @foreach($user->travel_districts as $travel)
                <tr>
                    <td>Seyahet etdiyi rayon</td>
                    <td>{{$travel->name}}
                        <form method="post" action="{{ route('districts.destroy',['id' =>$user->id , 'district' =>$travel->id]) }}">
                            <button class="btn btn-danger" type="submit">Удалить</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@endsection
