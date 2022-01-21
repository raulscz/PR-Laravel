<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Crear Persona</title>
</head>
<body>
    <form action="{{url('crear')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Nombre</p>
        <input type="text" name="nombre_persona" placeholder="Introduce el nombre...">
        @error('nombre_persona')
            <br>
            {{$message}}
        @enderror
        <p>Apellido</p>
        <input type="text" name="apellido_persona" placeholder="Introduce el apellido...">
        @error('apellido_persona')
            <br>
            {{$message}}
        @enderror
        <p>DNI</p>
        <input type="text" name="dni_persona" placeholder="Introduce el dni...">
        @error('dni_persona')
            <br>
            {{$message}}
        @enderror
        <p>Edad</p>
        <input type="number" name="edad_persona" placeholder="Introduce la edad...">
        @error('edad_persona')
            <br>
            {{$message}}
        @enderror
        <p>Telefono</p>
        <input type="number" name="num_telf" placeholder="Introduce el telefono...">
        @error('num_telf')
            <br>
            {{$message}}
        @enderror
        <p>Telefono 2</p>
        <input type="number" name="num_telf2" placeholder="Introduce el telefono...">
        @error('num_telf2')
            <br>
            {{$message}}
        @enderror
        <p>Foto</p>
        <input type="file" name="foto_persona">
        @error('foto_persona')
            <br>
            {{$message}}
        @enderror
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>