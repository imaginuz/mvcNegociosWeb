<h1>Listado de Roles</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th><a href="index.php?page=Roles-RolesForm&mode=INS"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach roles}}
                <tr>
                    <td>{{rolescod}}</td>
                    <td>{{rolesdsc}}</td>
                    <td>{{rolesest}}</td>
                    <td>
                        <a href="index.php?page=Roles-RolesForm&mode=UPD&rolescod={{rolescod}}"><i class="fas fa-edit"></i></a>
                        <a href="index.php?page=Roles-RolesForm&mode=DEL&rolescod={{rolescod}}" onclick="return confirm('¿Está seguro de eliminar este rol?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            {{endforeach}}
        </tbody>
    </table>
</section>
