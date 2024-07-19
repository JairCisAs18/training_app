<x-app-layout>
    @extends('bootstrapCDN')
    <link rel="stylesheet" href="{{ url('/css/adminView-style.css') }}">
    <!-- <div class="container">
        <h4>Usuarios de Recursos Humanos</h4>
    </div> -->
    <h3>Usuarios de Recursos Humanos</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nómina</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Departamento</th>
                <th>Fecha de nacimiento</th>
                <th>Fecha de ingreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rhusers as $rh)
                <tr>
                    <td>{{$rh->name}}</td>
                    <td>{{$rh->employee_id}}</td>
                    <td>{{$rh->email}}</td>
                    <td>{{$rh->phone_number}}</td>
                    <td>
                        @if($rh->photo)
                            <img src="storage/user_photo/{{$rh->photo}}" alt="" width="50px" height="50px">
                        @else
                            <p>No tiene foto</p>
                        @endif
                    </td>
                    <td>{{$rh->department}}</td>
                    <td>{{$rh->birthdate}}</td>
                    <td>{{$rh->job_anniversary}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <h3>Usuarios de Recursos Humanos</h3>
    @foreach($rhusers as $rhuser)
        <p>{{$rhuser->name}} y su departmanento es {{$rhuser->department}}</p><br>
    @endforeach -->
    <a href="/add-user/hr">Nuevo capacitador</a>
    <h3>Usuarios a capacitar</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nómina</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Departamento</th>
                <th>Fecha de nacimiento</th>
                <th>Fecha de ingreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{$trainee->name}}</td>
                    <td>{{$trainee->employee_id}}</td>
                    <td>{{$trainee->email}}</td>
                    <td>{{$trainee->phone_number}}</td>
                    <td>
                        @if($trainee->photo)
                            <img src="storage/user_photo/{{$trainee->photo}}" alt="" width="50px" height="50px">
                        @else
                            <p>No tiene foto</p>
                        @endif
                    </td>
                    <td>{{$trainee->department}}</td>
                    <td>{{$trainee->birthdate}}</td>
                    <td>{{$trainee->job_anniversary}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/add-user/trainee">Nuevo personal</a>
    <!-- @foreach($trainees as $trainee)
        <p>{{$trainee->name}} y su departamento es {{$trainee->department}}</p>
    @endforeach -->
</x-app-layout>