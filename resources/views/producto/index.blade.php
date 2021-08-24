
<div class="container">

<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">




<br>
<br>
<h1>Productos</h1>
<a href="{{ url('producto/create') }}" class="btn btn-success" style="margin:0px;">Nuevo</a>
<BR></BR>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre del producto</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso(kg)</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Fecha de creación</th>
            <th>Fecha de la última venta</th>
            <th>Acciones</th>
            <th>Vender</th>

        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombreProducto }}</td>
            <td>{{ $producto->referencia }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->peso }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->fechaCreacion }}</td>
            <td>{{ $producto->fechaUltimaVenta }}</td>
            <td>

                <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">Editar</a>
    
                <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Está seguro de borrar este registro?')" value="Eliminar" class="btn btn-danger">

                </form>
            </td>
            <td>
                <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('PATCH') }}
                <input type="submit" onclick="return confirm('¿Desea vender un producto?')" value="Vender" class="btn btn-info">

                </form>
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<script src="{{ asset(mix('js/app.js')) }}"></script>


