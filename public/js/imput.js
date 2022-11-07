$(document).ready(function() {
        var iCnt = 0;

// Crear un elemento div añadiendo estilos CSS
        var container = $(document.createElement('div')).css({
            padding: '10px', margin: '15px', width: '170px', border: '',
            borderTopColor: '#99', borderBottomColor: '#99',
            borderLeftColor: '#99', borderRightColor: '#99'
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
                $(container).append('<div class="col"><div class="col-md-6"><div class="form-group"><label>Nombre Ingreso</label><input type="id_ingreso" name="name" id="id_ingreso" '+ +  + 'select ' +
                'value=" ' + iCnt + '" /></div></div></div>');
                $(container).append('<div class="col"><div class="col-md-6"><div class="form-group"><label>Nombre Producto</label><input type="id_producto" name="name" id="id_producto" ' +  + 'select ' +
                'value=" ' + iCnt + '" /></div></div></div>');
                $(container).append('<div class="col"><div class="col-md-6"><div class="form-group"><label>Cantidad</label><input type="numer" name="numer" id="cantidad" ' +  + 'select ' +
                'value=" ' + iCnt + '" /></div></div></div>');



                

                if (iCnt ==1 ) {   

       var divSubmit = $(document.createElement(''));
                    $(divSubmit).append('<input type=button class="bt" onclick="GetTextValue()"' + 
                            'id=btSubmit value=Enviar />');

                }

 $('#main').after(container, divSubmit); 
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
                $('#btSubmit').remove(); 
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