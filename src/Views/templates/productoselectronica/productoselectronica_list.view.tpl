<h1>Listado de Productos Electrónicos</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Fecha de Lanzamiento</th>
                <th><a href="index.php?page=ProductosElectronica-ProductosElectronicaForm&mode=INS"><i class="fas fa-solid fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach productos}}
                <tr>
                    <td>{{id_producto}}</td>
                    <td>{{nombre}}</td>
                    <td>{{tipo}}</td>
                    <td>{{precio}}</td>
                    <td>{{marca}}</td>
                    <td>{{fecha_lanzamiento}}</td>
                    <td>
                        <a href="index.php?page=ProductosElectronica-ProductosElectronicaForm&mode=UPD&id_producto={{id_producto}}"><i class="fas fa-edit"></i></a>
                        <a href="index.php?page=ProductosElectronica-ProductosElectronicaForm&mode=DEL&id_producto={{id_producto}}" onclick="return confirm('¿Está seguro de eliminar este producto?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            {{endforeach}}
        </tbody>
    </table>
</section>
