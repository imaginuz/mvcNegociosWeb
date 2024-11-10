<h1>Listado de Funciones</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Tipo</th>
                <th><a href="index.php?page=Funciones-FuncionesForm&mode=INS"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach funciones}}
                <tr>
                    <td>{{fncod}}</td>
                    <td>{{fndsc}}</td>
                    <td>{{fnest}}</td>
                    <td>{{fntyp}}</td>
                    <td>
                        <a href="index.php?page=Funciones-FuncionesForm&mode=UPD&fncod={{fncod}}"><i class="fas fa-edit"></i></a>
                        <a href="index.php?page=Funciones-FuncionesForm&mode=DEL&fncod={{fncod}}" onclick="return confirm('¿Está seguro de eliminar esta función?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            {{endforeach}}
        </tbody>
    </table>
</section>
