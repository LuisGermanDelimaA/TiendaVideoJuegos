$(document).ready(function () {
	

});	

function validarExtra(){
  let precio=$("#precio").val();

  if ($.isNumeric(precio)==false){
    alert("El valor debe ser numerico");
    return false;
  }

	return true;
}

