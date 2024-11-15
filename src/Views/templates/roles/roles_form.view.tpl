<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Roles-RolesForm&mode={{mode}}&rolescod={{rolescod}}" method="POST" class="row">
        {{with rol}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolescod">Código de Rol</label>
            <input class="col-8" type="text" name="rolescod" id="rolescod" value="{{rolescod}}" {{~readonly_rolescod}}>
            {{if ~rolescod_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~rolescod_error}}
                    <li>{{this}}</li>
                    {{endfor ~rolescod_error}}
                </ul>
            </div>
            {{endif ~rolescod_haserror}}

            <input type="hidden" name="xssToken" value="{{~xssToken}}" />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolesdsc">Descripción del Rol</label>
            <input class="col-8" type="text" name="rolesdsc" id="rolesdsc" value="{{rolesdsc}}" {{~readonly}}>
            {{if ~rolesdsc_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~rolesdsc_error}}
                    <li>{{this}}</li>
                    {{endfor ~rolesdsc_error}}
                </ul>
            </div>
            {{endif ~rolesdsc_haserror}}
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolesest">Estado del Rol</label>
            <input class="col-8" type="text" name="rolesest" id="rolesest" value="{{rolesest}}" {{~readonly}}>
            {{if ~rolesest_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~rolesest_error}}
                    <li>{{this}}</li>
                    {{endfor ~rolesest_error}}
                </ul>
            </div>
            {{endif ~rolesest_haserror}}
        </div>

        <div class="row col-6 offset-3 flex-end">
            {{if ~showConfirm}}
            <p>
                <button type="submit" class="primary">Confirmar</button> &nbsp;
                {{endif ~showConfirm}}
                <button id="btnCancelar" class="btn">Cancelar</button>
            </p>
        </div>

        {{if ~global_haserror}}
        <div class="error">
            <ul>
                {{foreach ~global_error}}
                <li>{{this}}</li>
                {{endfor ~global_error}}
            </ul>
        </div>
        {{endif ~global_haserror}}

        {{endwith rol}}
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("btnCancelar").addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("index.php?page=Roles-RolesList");
            })
        });
    </script>
</section>