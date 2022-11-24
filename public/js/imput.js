$(document).ready(function() {
        var iCnt = 0;

// Crear un elemento div añadiendo estilos CSS
        var container = $(document.createElement('div')).css({
            
        });
/**
 * Crea un nuevo elemento de entrada, lo agrega al contenedor y luego agrega el contenedor a la página.
 */

        $('#btAdd').click(function() {
            if (iCnt <= 19) {

                iCnt = iCnt + 1;

                // Añadir caja de texto.
                $(container).append(''+ '' +
                ' ' + iCnt  );
                $(container).append('<div class="col"><div class="col-md-12 col-sm-12"><div class="form-group"> <label for="name_ingreso">codigo del producto</label><input type="text" class="form-control" id="nameingreso" placeholder=""'+ +  + 'select ' +
                'value=" ' + iCnt + '" /></div></div></div>');
                $(container).append('<div class="col"><div class="col-md-12 col-sm-12><div class="form-group"><label for=name_producto">Nombre del Producto</label><input type="text" class="form-control" id="name_producto" placeholder="" ' +  + 'select ' +
                'value=" ' + iCnt + '" /></div></div>');
                $(container).append('<div class="col"><div class="col-md-12 col-sm-12"><div class="form-group"><label for="Cantidad">Cantidad</label><input class="form-control" type="number" value="0" id="example-number-input" ' +  + 'select ' +
                'value=" ' + iCnt + '" /></select></div></div></div></div>');



                

 $('#main').after(container); 
            }
            else {      //se establece un limite para añadir elementos, 20 es el limite
                
                $(container).append('<label>Limite Alcanzado</label>'); 
                $('#btAdd').attr('class', 'bt-disable'); 
                $('#btAdd').attr('disabled', 'disabled');

            }
        });

        $('#btRemove').click(function() {   // Elimina un elemento por click
            if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
        
            if (iCnt == 0) { $(container).empty(); 
        
                $(container).remove(); 
                $('#btAdd').removeAttr('disabled'); 
                $('#btAdd').attr('class', 'bt') 

            }
        });

        $('#btRemoveAll').click(function() {    // Elimina todos los elementos del contenedor
        
            $(container).empty(); 
            $(container).remove(); 
            $('#btSubmit').remove(); iCnt = 0; 
            $('#btAdd').removeAttr('disabled'); 
            $('#btAdd').attr('class', 'bt');

        });
    });

    // Obtiene los valores de los textbox al dar click en el boton "Enviar"
    var divValue, values = '';

    function GetTextValue() {

        $(divValue).empty(); 
        $(divValue).remove(); values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
        $('body').append(divValue);

    }