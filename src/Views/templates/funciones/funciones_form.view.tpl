<h1>{{mode_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Funciones-FuncionesForm&mode={{mode}}&fncod={{fncod}}" method="post" class="row">
        <div class="row col-6 offset-3">
            <label class="col-4" for="fncod">Código</label>
            <input class="col-8" type="text" name="fncod" id="fncod" value="{{fncod}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="fndsc">Descripción</label>
            <input class="col-8" type="text" name="fndsc" id="fndsc" value="{{fndsc}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="fnest">Estado</label>
            <input class="col-8" type="text" name="fnest" id="fnest" value="{{fnest}}" required {{#if mode == "DEL"}}readonly{{/if}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="fntyp">Tipo</label>
            <input class="col-8" type="text" name="fntyp" id="fntyp" value="{{fntyp}}" required {{#if mode == "DEL"}}readonly{{/if}} />
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
