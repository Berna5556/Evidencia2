<label for="Id_Producto">Id Producto</label>
<input type="text" name="Id_Producto" value="{{ isset($pedido->id_producto) ? $pedido->id_producto:'' }}" id="Id_Producto">
<br>
<label for="Cantidad">Cantidad</label>
<input type="text" name="Cantidad" value="{{ isset($pedido->cantidad) ? $pedido->cantidad:'' }}" id="Cantidad">
<br>
<label for="Estatus">Estatus</label>
<select name="Estatus" id="Estatus">
    <option value="en_proceso">En Proceso</option>
    <option value="en_ruta">En ruta</option>
    <option value="entregado">Entregado</option>
</select>
<br>

<input type="submit" value="Guardar datos">
</form>