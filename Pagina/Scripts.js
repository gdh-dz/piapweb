var imagenes = ["./imagenes/sandia.png", "./imagenes/aguacate.png", "./imagenes/brocoli.png"]; 
var indice = 0;
var tiempoIntervalo = 3000; 

function cambiarImagen() {
  var imagen = document.querySelector('.anuncio-imagen');
  imagen.src = imagenes[indice];
  
  indice++;
  if (indice === imagenes.length) {
    indice = 0;
  }
}

setInterval(cambiarImagen, tiempoIntervalo);
