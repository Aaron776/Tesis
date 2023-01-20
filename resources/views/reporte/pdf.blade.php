<!doctype html>
<html lang="en">

<head>
  <title>Reporte</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <img src="">
  <h2 style="text-align: center;">Reporte del Docente: {{$datos->distributivos->usuarios->name}}</h2>
  <table class="table table-hover mt-4" style="border: 1px solid black;">
        <thead>
          <tr style="border: 1px solid black;">
            <th style="border: 1px solid black; text-align: center;">Cédula</th>
            <th style="border: 1px solid black; text-align: center;">Asignatura</th>
            <th style="border: 1px solid black; text-align: center;">Día</th>
            <th style="border: 1px solid black; text-align: center;">Modalidad</th>
            <th style="border: 1px solid black; text-align: center;">Hora Llegada</th>
            <th style="border: 1px solid black; text-align: center;">Hora Salida</th>
            <th style="border: 1px solid black; text-align: center;">Hora Inicio Clase</th>
            <th style="border: 1px solid black;text-align: center;">Hora Fin Clase</th>
            <th style="border: 1px solid black; text-align: center;">Estado</th>
    
          </tr>
        </thead>
        <tbody>
          <tr>
            <th style="border: 1px solid black; padding:7px;text-align: center;">{{$datos->distributivos->usuarios->cedula}}</th>
            <th style="border: 1px solid black; text-align: center; padding:7px;">{{$datos->distributivos->materia}}</th>
            <th style="border: 1px solid black; text-align: center;padding:7px;">{{$datos->distributivos->dia}}</th>
            <th style="border: 1px solid black; text-align: center;padding:7px;">{{$datos->distributivos->tipo_clase}}</th>
            <th style="border: 1px solid black; text-align: center;padding:7px;">{{$datos->hora_entrada}}</th>
            <th style="border: 1px solid black; text-align: center;padding:7px;">{{$datos->hora_salida}}</th>
            <th style="border: 1px solid black;text-align: center;padding:7px;">{{$datos->distributivos->hora_inicio}}</th>
            <th style="border: 1px solid black; text-align: center;padding:7px;">{{$datos->distributivos->hora_fin}}</th>
            <th style="border: 1px solid black;text-align: center;padding:7px;">{{$datos->estado}}</th>
          </tr>
        </tbody>
      </table>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>