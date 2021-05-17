$(document).ready(function(){
  //VALIDACION DE formulario
  $("#editarForm").submit(function(){
      if (validarRequeridos()==false) return false;
      if(typeof validarExtra === 'function') {
         if (validarExtra()==false) return false;
     }
      return true;
  });

});

function validarRequeridos(clave){
  var valor="";
  var err=0;
  if (Pstring(clave)=="") clave="";
  $(clave+" .required").each(function(k,v){
      
      if ($(v).is(':visible')){
        
          valor=Pstring($(v).val());
          if (valor=="" || valor=="-1"){
            // $(v).parent().parent().attr('title', 'Este campo es requerido.').addClass('has-error');
            haserror($(v),"Este campo es requerido.");
            err=1;
          }
          else{
            // $(v).parent().parent().attr('title', '').removeClass('has-error');
            haserror($(v),"");
          }

      }

  });
  if (err){
    alert("Debes llenar campos obligatorios");
    return false;
  } 
  return true;
}

function haserror(obj,title){
  var preError=0;
  var paren= $(obj).parent().parent();
  title=Pstring(title);
  if ($(paren).hasClass('label-floating')){
    if (title.length>0) {
      $(paren).attr('title', 'Este campo es requerido.').addClass('has-error');
      preError=1;
    }
    else
      $(paren).attr('title', '').removeClass('has-error');
  }
  else{
    paren= $(obj).parent().parent().parent();
    if ($(paren).hasClass('label-floating')){
      if (title.length>0) {
        $(paren).attr('title', 'Este campo es requerido.').addClass('has-error');
        preError=1;
      }
      else
        $(paren).attr('title', '').removeClass('has-error');
    }
    else{
      paren= $(obj);
      if (title.length>0){
        if ($(obj).prop("type")=="select-one") 
          $(paren).parent().find(".select2-selection").attr('title', 'Este campo es requerido.').addClass('has-errorM');
        else
          $(paren).attr('title', 'Este campo es requerido.').addClass('has-errorM');
        preError=1;
      }
      else
        if ($(obj).prop("type")=="select-one") 
          $(paren).parent().find(".select2-selection").attr('title', '').removeClass('has-errorM');
        else
        $(paren).attr('title', '').removeClass('has-errorM');
    }
  }
  
  return preError;
}

function validarFormulario(){
  if(typeof validarExtra === 'function') {
    if (validarExtra()==false) return false;
  }
  return true;
}

function Pnumero(num){
    if (!num || num == 'NaN') return 0;
    if (isNaN(num))           return 0;
    return parseInt(num);
}

function Pstring(valor){
  if (valor===null) return '';
  if (!valor) return '';
  return $.trim(valor);
}