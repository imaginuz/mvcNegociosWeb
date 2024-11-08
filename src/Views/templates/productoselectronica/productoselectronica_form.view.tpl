<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=ProductosElectronica-ProductosElectronicaForm&mode={{mode}}&id_producto={{id_producto}}" method="post" class="row">
        {{with producto}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="id_producto">ID</label>
            <input class="col-8" type="text" name="id_producto" id="id_producto" value="{{id_producto}}" readonly />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="nombre">Nombre</label>
            <input class="col-8" type="text" name="nombre" id="nombre" value="{{nombre}}" required />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="tipo">Tipo</label>
            <input class="col-8" type="text" name="tipo" id="tipo" value="{{tipo}}" />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="precio">Precio</label>
            <input class="col-8" type="number" name="precio" id="precio" value="{{precio}}" step="0.01" required />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="marca">Marca</label>
            <input class="col-8" type="text" name="marca" id="marca" value="{{marca}}" />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="fecha_lanzamiento">Fecha de Lanzamiento</label>
            <input class="col-8" type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{fecha_lanzamiento}}" />
        </div>
        <div class="row col-6 offset-3">
            <button type="submit" class="col-4 offset-4">{{submit_text}}</button>
        </div>
        {{endwith}}
    </form>
</section>
