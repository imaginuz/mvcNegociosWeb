<h1>Listado de Roles</h1>
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
                <th>Código de Rol</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th><a href="index.php?page=Roles-RolesForm&mode=INS"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>

        <tbody>
            {{foreach rol}}
            <tr>
                <td>{{rolescod}}</td>
                <td>{{rolesdsc}}</td>
                <td>{{rolesest}}</td>
                <td>
                    <a href="index.php?page=Roles-RolesForm&mode=UPD&rolescod={{rolescod}}"><i class="fas fa-edit"></i></a>
                    <a href="index.php?page=Roles-RolesForm&mode=DEL&rolescod={{rolescod}}"><i class="fas fa-trash"></i></a>
                    <a href="index.php?page=Roles-RolesForm&mode=DSP&rolescod={{rolescod}}"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            {{endfor rol}}
        </tbody>
    </table>
</section>