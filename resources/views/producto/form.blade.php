<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($producto->nombre) ? $producto->nombre:'' }}" id="Nombre">
<br>
<label for="Descripcion">Descripcion</label>
<input type="text" name="Descripcion" value="{{ isset($producto->descripcion) ? $producto->descripcion:'' }}" id="Descripcion">
<br>
<label for="Precio">Precio</label>
<input type="text" name="Precio" value="{{ isset($producto->precio) ? $producto->precio:'' }}" id="Precio">
<br>
<label for="Cantidad">Cantidad</label>
<input type="text" name="Cantidad" value="{{ isset($producto->cantidad) ? $producto->cantidad:'' }}" id="Cantidad">
<br>
<label for="Foto">Foto</label>
@if(isset($producto->foto))
<img src="{{ asset('storage').'/'.$producto->foto }}" width="100" alt="">
@endif
<input type="file" name="Foto" value="" id="Foto">
<br>
<input type="submit" value="Guardar datos">

<a href="{{ url('producto/') }}">Regresar</a>

</form>