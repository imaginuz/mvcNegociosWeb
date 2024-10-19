<h1>Landing Page</h1>
<hr>

{{foreach productos}}
    <div style="display:flex; flex-direction:column; align-items:center; text-align:center;">
        <h2>{{nombre}}</h2>
        <p>{{cantidad}} | {{precio}}</p>
        <img src="{{imagen}}" alt="Bebida">
    </div>
    <hr>
{{endfor productos}}