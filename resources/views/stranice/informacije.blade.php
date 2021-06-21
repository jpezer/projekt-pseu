@extends('stranice.okvir')

@section('sadrzaj')
    <h1 style="text-align:center">Popis studija</h1>
    <table class="table table-bordered">
        <tr>
            <th>Naziv</th>
            <th>Opis</th>
        </tr>

        @foreach($studiji as $studij)
            <tr>
                <td>{{$studij->nazivStudija}}</td>
                <td>{{$studij->opis}}</td>
            </tr>
        @endforeach
    </table>

    <h1 style="text-align:center">Popis predmeta</h1>
    <br>

    <table class="table table-bordered">
        <tr>
            <th>Naziv predmeta</th>
            <th>Naziv studija</th>
        </tr>

        @foreach($data as $d)
            <tr>
                <td>{{$d->naziv}}</td>
                <td>{{$d->nazivStudija}}</td>
            </tr>
        @endforeach
    </table>
    
   
@endsection