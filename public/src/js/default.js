$(document).ready(function() 
    { 
        $("#tablaAdmin").tablesorter(); 
        $("#tablaUsuario").tablesorter(); 
        $("#tablaEvento").tablesorter(); 
        $("#tablaCampus").tablesorter(); 
        $("#tablaCurso").tablesorter(); 
        $("#tablaFacultad").tablesorter(); 
    } 
); 

$('.glyphicon-trash').click(function(){
    		return confirm("Seguro que desea eliminar?");
		}
	);

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};

// MENU EDITAR


