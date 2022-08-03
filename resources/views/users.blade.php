@extends('master')
@section('title',' Musteriler')
@section('content')
    <div class="col-md-12">
        <h1>Musteriler</h1>
        <form method="GET" action="{{route('users.index')}}">
            <div class="filters row">
                <div class="col-sm-6 col-md-2">
                    <label for="ad">Ad,Soy-ad:<input type="text" class="form-control" name="ad" id="ad" size="6"
                                                     value="{{request()->ad}}">
                    </label>
                </div>
                <div class="col-sm-6 col-md-2">
                    <label for="yasi"> Yas <input type="text" class="form-control" name="yasi" id="yas" size="3"
                                                   value="{{request()->yasi}}">
                    </label>
                </div>
                <div class="col-sm-6 col-md-2">
                    <label>
                        <span>
                            Cinsiyyet
                        </span>
                        <select name="gender" class="form-control">
                            <option selected disabled>Cinsiyyeti secin</option>
                            <option {{ request()->gender ===  "m" ? "selected" : ""}} value="m">Kishi</option>
                            <option {{ request()->gender ===  "f" ? "selected" : ""}}  value="f">Qadin</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-6 col-md-2">
                    <label for="markasi"> Marka <input type="text" class="form-control" name="markasi" id="markasi" size="6"
                                                         value="{{request()->markasi}}">
                    </label>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="submit" class="btn btn-primary">Filtr</button>
                    <a href="{{route('users.index')}}" class="btn btn-warning">Sıfırla</a>
                </div>
            </div>
        </form>
        <br>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    No
                </th>
                <th>
                    Ad Soy-ad:
                </th>
                <th>
                    Yas
                </th>
                <th>
                    Cinsiyyet
                </th>
                <th>
                    Avtomobil markasi
                </th>
                <th>
                    Son seyahet etdiyi rayon
                </th>
                <th>

                </th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }} {{$user->surname }}</td>
                    <td>{{ $user->calculate_age() }}</td>
                    <td>{{ $user->gender == "m" ?  "Kishi" : "Qadin" }}</td>
                    <td>
                        @if($user->car)
                            {{ $user->car->brand }}
                            <a href="{{route('cars.edit', ['id' =>$user->id , 'car' =>$user->car->id])}}"><span
                                    class="badge badge-success">Update</span></a>
                        @else
                            Masini yoxdu
                            <a class="btn btn-primary" type="button"
                               href="{{route('cars.create',$user->id)}}">+</a>
                        @endif
                    </td>
                    <td>
                        {{$user->last_travel_districts()}}
                        <a class="btn btn-primary" type="button"
                           href="{{route('districts.create',$user->id)}}">+</a>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('users.show', $user) }}">Ətraflı</a>
                                <a class="btn btn-warning" type="button" href="{{ route('users.edit', $user) }}">Yenile</a>
                                @csrf
                                @method('DELETE')
                                <input onclick="return confirmDelete();" class="btn btn-danger" type="submit"
                                       value="Sil"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('users.create') }}">Musteri elave et</a>
        <br>
        <br>
        <br>
    </div>
@endsection
@section('js')
    <script>
        function confirmDelete() {
            if (confirm("Bu elementi siləcəyinizə əminsiniz?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection




