$(document).ready(function() {
  $('#bt_add').click(function(){
     agregar();
  });
});

var cont=0;
total=0;

$("#guardar").show();

function agregar() 
{
  codigo = $("#codigo").val();
  producto = $("#producto").val();
  cantidad = $("#cantidad").val();
  idcategoria = $("#idcategoria").val();
  idmarca = $("#idmarca").val();

  if(codigo!="" && producto!="" && cantidad!="" && cantidad>0) 
  {
   

    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="producto[]" value="'+producto+'">'+producto+' <input type="hidden" name="idmarca[]" value="'+idmarca+'">'+idmarca+' <input type="hidden" name="idcategoria[]" value="'+idcategoria+'">'+producto+'</td><td><input type="hidden" name="codigo[]" value="'+codigo+'">'+codigo+'</td><td><input type="number" name="cantidad[]" class="form-control" value="'+cantidad+'"></td></tr>';
     cont++;
     limpiar();
     $('#detalles').append(fila);
  }
    else
  {
   alert("Error al ingresar el detalle de ingreso, revise los datos del articulo");
   }
}


function limpiar(){
  $("#producto").val("");
  $("#codigo").val("");
  $("#cantidad").val("");
}


function eliminar(index){
$("#fila"+ index).remove();


}