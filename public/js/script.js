//VALIDACIONES PARA SOLO LETRAS
function SoloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
  especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
  tecla_especial = false
  for(var i in especiales) {
    if(key == especiales[i]) {
        tecla_especial = true;
        break;
    }
  }
  if(letras.indexOf(tecla) == -1 && !tecla_especial){
    return false;
  }
}

//VALIDACIONES PARA SOLO NUMEROS
function SoloNumeros(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = "0123456789";
  if(letras.indexOf(tecla)==-1){
    return false;
  }
}
