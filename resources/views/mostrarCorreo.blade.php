<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('recibirCorreo')}}" method="POST">
        @csrf
        <p>Para:</p>
        <input type="text" name="correo_persona" value="{{$correo_persona}}">
        <p>Asunto:</p>
        <input type="text" name="sub">
        <p>Mensaje:</p>
        <textarea name="mensaje" rows="4" cols="50"></textarea>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>