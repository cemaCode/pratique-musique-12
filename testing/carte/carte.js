var map = document.querySelector('#map');
var chemins  = map.querySelectorAll(".map__image a");

var currentCommune = document.getElementById("currentCommune");


chemins.forEach(function(path) {
    path.addEventListener('click',function(e) {
        alert("On va chercher dans : "+  path.id );
    });
    

    path.addEventListener('mouseleave',function(e) {
        currentCommune.textContent = "";
        
    });
    path.addEventListener('mouseenter',function(e) {
        console.log(path.id);
        
        currentCommune.textContent = path.id.toString();
    })
});

