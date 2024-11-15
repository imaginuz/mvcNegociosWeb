<h1>Listado de Funciones</h1>
<section class="WWList">
    <table>
        <style>
            th,
            td {
                text-align: center;
            }
        </style>
        <thead>
            <tr>
                <th>Código de Función</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Tipo</th>
                <th><a href="index.php?page=Funciones-FuncionesForm&mode=INS"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>

        <tbody>
            {{foreach funcion}}
            <tr>
                <td>{{fncod}}</td>
                <td>{{fndsc}}</td>
                <td>{{fnest}}</td>
                <td>{{fntyp}}</td>
                <td>
                    <a href="index.php?page=Funciones-FuncionesForm&mode=UPD&fncod={{fncod}}"><i class="fas fa-edit"></i></a>
                    <a href="index.php?page=Funciones-FuncionesForm&mode=DEL&fncod={{fncod}}"><i class="fas fa-trash"></i></a>
                    <a href="index.php?page=Funciones-FuncionesForm&mode=DSP&fncod={{fncod}}"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            {{endfor funcion}}
        </tbody>
    </table>
</section>