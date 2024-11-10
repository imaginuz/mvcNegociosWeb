<h1>Listado de Usuarios</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Fecha de Ingreso</th>
                <th>Estado</th>
                <th><a href="index.php?page=Usuarios-UsuariosForm&mode=INS"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach usuarios}}
                <tr>
                    <td>{{usercod}}</td>
                    <td>{{useremail}}</td>
                    <td>{{username}}</td>
                    <td>{{userfching}}</td>
                    <td>{{userest}}</td>
                    <td>
                        <a href="index.php?page=Usuarios-UsuariosForm&mode=UPD&usercod={{usercod}}"><i class="fas fa-edit"></i></a>
                        <a href="index.php?page=Usuarios-UsuariosForm&mode=DEL&usercod={{usercod}}" onclick="return confirm('¿Está seguro de eliminar este usuario?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            {{endforeach}}
        </tbody>
    </table>
</section>
