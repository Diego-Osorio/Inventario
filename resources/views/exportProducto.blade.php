<div class="box-body">        
               <div class="row">             
                <div class="col-sm-12">       
                  <table id="example1" class="table  table-bordered table-hover dataTable no-footer">
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