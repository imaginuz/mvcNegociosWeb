<h1>Listado de Usuarios</h1>
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
                <th>Código</th>
                <th>Correo electrónico</th>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Fecha de creación</th>
                <th>Estado de la contraseña</th>
                <th>Fecha de expiración de la contraseña</th>
                <th>Estado del usuario</th>
                <th>Código de activación</th>
                <th>Código de cambio de contraseña</th>
                <th>Tipo de usuario</th>
                <th><a href="index.php?page=Usuarios-UsuariosForm&mode=INS"><i class="fas fa-plus"></i></th>
            </tr>
        </thead>

        <tbody>
            {{foreach usuario}}
            <tr>
                <td>{{usercod}}</td>
                <td>{{useremail}}</td>
                <td>{{username}}</td>
                <td>{{userpswd}}</td>
                <td>{{userfching}}</td>
                <td>{{userpswdest}}</td>
                <td>{{userpswdexp}}</td>
                <td>{{userest}}</td>
                <td>{{useractcod}}</td>
                <td>{{userpswdchg}}</td>
                <td>{{usertipo}}</td>
                <td>
                    <a href="index.php?page=Usuarios-UsuariosForm&mode=UPD&usercod={{usercod}}"> <i class="fas fa-edit"></i></a>
                    <a href="index.php?page=Usuarios-UsuariosForm&mode=DEL&usercod={{usercod}}"> <i class="fas fa-trash"></i></a>
                    <a href="index.php?page=Usuarios-UsuariosForm&mode=DSP&usercod={{usercod}}"> <i class="fas fa-eye"></i></a>
                </td>
            </tr>
            {{endfor usuario}}
        </tbody>
    </table>
</section>