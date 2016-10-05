<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <title>Evento PDF</title>
  </head>
  <body>
 
    <h3>Detalles del evento</h3>
            <!-- Aqui va la tabla! -->
            <table id="" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <td class="columnaDato">Fecha</td>
                    <td>{{ $evento->fecha }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Hora</td>
                    <td>{{ $evento->hora }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Modulo</td>
                    <td>{{ $evento->sala }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Campus</td>
                    <td>{{ $evento->campus->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Nombre del Docente</td>
                    <td>{{ $evento->course->teacher->user->nombre . " " . $evento->course->teacher->user->apellido_paterno }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Email del Docente</td>
                    <td>{{ $evento->course->teacher->user->email }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Nombre del Curso</td>
                    <td>{{ $evento->course->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Unidad Academica</td>
                    <td>{{ $evento->course->faculty->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Numero de estudiantes</td>
                    <td>{{ $evento->course->numero_estudiantes }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Sigla del Curso</td>
                    <td>{{ $evento->course->sigla }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Sala</td>
                    <td>{{ $evento->sala }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Detalle</td>
                    <td>{{ $evento->descripcion }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">N° Tablets</td>
                    <td>{{ ceil($evento->course->numero_estudiantes/5) }}</td>
                </tr>
                @if($evento->course->student_id != '')
                    <tr>
                        <td class="columnaDato">Ayudante</td>
                        <td>{{ $evento->course->student->user->nombre ." ". $evento->course->student->user->apellido_paterno }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    
  </body>
</html>