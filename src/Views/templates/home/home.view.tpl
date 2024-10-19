<h1>Landing Page</h1>
<hr>

{{foreach productos}}
    <div style="display=flex; flex-direction:column; align-items:center; text-align:center">
        <h2>{{nombre}}</h2>
        <p>{{cantidad}}</p>
        <p>{{precio}}</p>
        <img src="{{imagen}}" alt="{{nombre}}">
        
    </div>
{{endfor productos}}