<h1>{{mode_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Usuarios-UsuariosForm&mode={{mode}}&usercod={{usercod}}" method="post" class="row">
        <div class="row col-6 offset-3">
            <label class="col-4" for="usercod">ID</label>
            <input class="col-8" type="text" name="usercod" id="usercod" value="{{usercod}}" readonly />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="useremail">Correo Electrónico</label>
            <input class="col-8" type="email" name="useremail" id="useremail" value="{{useremail}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="username">Nombre de Usuario</label>
            <input class="col-8" type="text" name="username" id="username" value="{{username}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        {{#if mode != "DEL"}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userpswd">Contraseña</label>
            <input class="col-8" type="password" name="userpswd" id="userpswd" {{#if mode == "INS"}}required{{/if}} />
        </div>
        {{/if}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userest">Estado</label>
            <input class="col-8" type="text" name="userest" id="userest" value="{{userest}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="usertipo">Tipo de Usuario</label>
            <select class="col-8" name="usertipo" id="usertipo" {{#if mode == "DEL"}}disabled{{/if}}>
                <option value="NOR" {{#if usertipo == "NOR"}}selected{{/if}}>Normal</option>
                <option value="CON" {{#if usertipo == "CON"}}selected{{/if}}>Consultor</option>
                <option value="CLI" {{#if usertipo == "CLI"}}selected{{/if}}>Cliente</option>
            </select>
        </div>
        <div class="row col-6 offset-3">
            <button type="submit" class="col-4 offset-4">
                {{#if mode == "INS"}}Crear{{/if}}
                {{#if mode == "UPD"}}Actualizar{{/if}}
                {{#if mode == "DEL"}}Eliminar{{/if}}
            </button>
        </div>
    </form>
</section>
