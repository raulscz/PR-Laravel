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
        <input type="text" name="nombre_persona" placeholder="Introduce el nombre..." required>
        <p>Apellido</p>
        <input type="text" name="apellido_persona" placeholder="Introduce el apellido..." required>
        <p>DNI</p>
        <input type="text" name="dni_persona" placeholder="Introduce el dni..."required >
        <p>Edad</p>
        <input type="number" name="edad_persona" placeholder="Introduce la edad..." required>
        <p>Telefono</p>
        <input type="number" name="num_telf" placeholder="Introduce el telefono..." required>
        <p>Telefono 2</p>
        <input type="number" name="num_telf2" placeholder="Introduce el telefono...">
        <p>Foto</p>
        <input type="file" name="foto_persona">
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>