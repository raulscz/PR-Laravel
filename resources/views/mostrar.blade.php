@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mostrar Coches</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="mostrar">
    <div>
        <form action="{{url('crear')}}" method="GET">
            <button class= "botonCre" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "botonCre" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div class="row flex-cv">
        <table class="table">
            <tr class="active">
                <th>ID</th>
                <th>FOTO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DNI</th>
                <th>EDAD</th>
                <th>TELEFONO</th>
                <th>TELEFONO 2</th>
                <th>EMAIL</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
            </tr>
            @foreach($listaPersona as $persona)
                <tr>
                    <td>{{$persona->id}}</td>
                    <td style="padding: auto; text-align: center"><img src="{{asset('storage').'/'.$persona->foto_persona}}" width="100"></td>
                    <td>{{$persona->nombre_persona}}</td>
                    <td>{{$persona->apellido_persona}}</td>
                    <td>{{$persona->dni_persona}}</td>
                    <td>{{$persona->edad_persona}}</td>
                    <td>{{$persona->num_telf}}</td>
                    <td>{{$persona->num_telf2}}</td>
                    <td>{{$persona->correo_persona}}</td>
                    <td><form action="{{url('eliminarPersona/'.$persona->id)}}" method="POST">
                        @csrf
                        <!--{{csrf_field()}}--->
                        {{method_field('DELETE')}}
                        <!--@method('DELETE')--->
                        <button class= "botonEli" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                    </form></td>
                    <td><form action="{{url('modificarPersona/'.$persona->id)}}" method="GET">
                        <button class= "botonAct" type="submit" name="Modificar" value="Modificar">Modificar</button>
                    </form></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>