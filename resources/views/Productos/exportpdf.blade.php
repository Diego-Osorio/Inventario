<!DOCTYPE html>
<html>
    <title>Reporte Productos-Laravel Framework</title>
    <head>
        <style>
        table {
            font-family:arial, sans-serif;
            border-collapse: collapse;
            with:100%;
        }
        td, th{
            border:1px solid #dddddd;
            text-align:left;
            padding:8px;
        }      
            tr:nth-child(evend){
                background-color: #dddddd;
            }
            </style>
            <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>marca</th>
            <th>Categoria</th>
            <th>Codigo</th>
            <th>Stock</th>
            <th >ubicacion</th>
            </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto-> nombre}}</td>
                <td>{{$producto->marca_id}}</td>
                <td>{{$producto->categoria_id}}</td>
                <td>{{$producto->codigo}}</td>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->ubicacion}}</td>
                </tr>
                    
                            @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>
