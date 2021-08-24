<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
<h1>Productos</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li>{{ $error }}</li> 
        @endforeach
        </ul>
    </div>


@endif
<form >
<div class="form-group">
<label for="nombreProducto">Nombre del producto</label>
<input typ="text" class="form-control" id="nombreProducto" name="nombreProducto" value="{{isset($producto->nombreProducto) ? $producto->nombreProducto:'' }}">
</div>

<div class="form-group">
<label for="referencia">Referencia</label>
<input typ="text" class="form-control" id="referencia" name="referencia" value="{{isset($producto->referencia) ? $producto->referencia:'' }}">
</div>

<div class="form-group">
<label for="precio">Precio</label>
<input typ="text" id="precio" class="form-control"  name="precio" value="{{isset($producto->precio) ? $producto->precio:'' }}">
</div>

<div class="form-group">
<label for="peso">Peso (kg)</label>
<input typ="text" id="peso"class="form-control"  name="peso" value="{{ isset ( $producto->peso)? $producto->peso:'' }}" >
</div>

<div class="form-group">
<label for="categoria">Categoría</label>
<input typ="text" id="categoria" class="form-control"  name="categoria" value="{{isset($producto->categoria)? $producto->categoria:'' }}">
<div>

<div class="form-group">
<label for="stock">Stock</label>
<input typ="text" id="stock" class="form-control"  name="stock" value="{{ isset($producto->stock)? $producto->stock:'' }}" >
<div>

<div class="form-group">
<label for="fechaCreacion">Fecha de creación</label>
<input type="date" id="fechaCreacion" class="form-control"  name="fechaCreacion" value="{{ isset($producto->stock) ? $producto->fechaCreacion:'' }}">
<div>

<div class="form-group">
<label for="fechaUltimaVenta">Fecha de la última venta Ej 2021-08-23 18:59:00</label>
<input type="datetime" id="fechaUltimaVenta"  class="form-control" name="fechaUltimaVenta" value="{{ isset($producto->fechaUltimaVenta)? $producto->fechaUltimaVenta->format('Y.m.d H:i:s'):''}}" >
<div>
<BR>
<div class="form-group">
<input type="submit" value="Aceptar" class="btn btn-success">
<a href="{{ url('producto/') }}" class="btn btn-primary">Regresar</a>
</div>

</form>


