<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actualizar Persona</title>
</head>
<body>
<form action="{{url('modificarPersona')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre</p>
        <input type="text" name="nombre_persona" value="{{$persona->nombre_persona}}">
        <p>Apellido</p>
        <input type="text" name="apellido_persona" value="{{$persona->apellido_persona}}">
        <p>DNI</p>
        <input type="text" name="dni_persona" value="{{$persona->dni_persona}}">
        <p>Edad</p>
        <input type="number" name="edad_persona" value="{{$persona->edad_persona}}">
        <p>Telefono</p>
        <input type="number" name="num_telf" value="{{$persona->num_telf}}">
        <p>Telefono 2</p>
        <input type="number" name="num_telf2" value="{{$persona->num_telf2}}">
        <p>Foto</p>
        <input type="file" name="foto_persona" value="{{$persona->foto_persona}}">
        <div>
            <input type="hidden" name="id" value="{{$persona->id}}">
            <input type="hidden" name="id_telf" value="{{$persona->id_telf}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>