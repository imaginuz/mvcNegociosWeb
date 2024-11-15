<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Funciones-FuncionesForm&mode={{mode}}&fncod={{fncod}}" method="POST" class="row">
        {{with funcion}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="fncod">Código de Función</label>
            <input class="col-8" type="text" name="fncod" id="fncod" value="{{fncod}}" {{~readonly_fncod}}>
            {{if ~fncod_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~fncod_error}}
                    <li>{{this}}</li>
                    {{endfor ~fncod_error}}
                </ul>
            </div>
            {{endif ~fncod_haserror}}

            <input type="hidden" name="xssToken" value="{{~xssToken}}" />
        </div>
        
        <div class="row col-6 offset-3">
            <label class="col-4" for="fndsc">Descripción de Función</label>
            <input class="col-8" type="text" name="fndsc" id="fndsc" value="{{fndsc}}" {{~readonly}}>
            {{if ~fndsc_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~fndsc_error}}
                    <li>{{this}}</li>
                    {{endfor ~fndsc_error}}
                </ul>
            </div>
            {{endif ~fndsc_haserror}}
        </div>
        
        <div class="row col-6 offset-3">
            <label class="col-4" for="fnest">Estado de Función</label>
            <input class="col-8" type="text" name="fnest" id="fnest" value="{{fnest}}" {{~readonly}}>
            {{if ~fnest_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~fnest_error}}
                    <li>{{this}}</li>
                    {{endfor ~fnest_error}}
                </ul>
            </div>
            {{endif ~fnest_haserror}}
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="fntyp">Tipo de Función</label>
            <input class="col-8" type="text" name="fntyp" id="fntyp" value="{{fntyp}}" {{~readonly}}>
            {{if ~fntyp_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~fntyp_error}}
                    <li>{{this}}</li>
                    {{endfor ~fntyp_error}}
                </ul>
            </div>
            {{endif ~fntyp_haserror}}
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

        {{endwith funcion}}
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("btnCancelar").addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("index.php?page=Funciones-FuncionesList");
            });
        });
    </script>
</section>