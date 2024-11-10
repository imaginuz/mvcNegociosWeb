<h1>{{mode_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Roles-RolesForm&mode={{mode}}&rolescod={{rolescod}}" method="post" class="row">
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolescod">Código</label>
            <input class="col-8" type="text" name="rolescod" id="rolescod" value="{{rolescod}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolesdsc">Descripción</label>
            <input class="col-8" type="text" name="rolesdsc" id="rolesdsc" value="{{rolesdsc}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolesest">Estado</label>
            <input class="col-8" type="text" name="rolesest" id="rolesest" value="{{rolesest}}" required {{#if mode == "DEL"}}readonly{{/if}} />
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
