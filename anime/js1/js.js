var imagenes=['img/album2.jpg','img/album3.jpg','img/album4.jpg','img/album5.jpg','img/album6.jpg','img/album7.jpg','img/album8.jpg','img/album10.jpg','img/album9.jpg','img/album11.jpg'],/*creo un array con las imagenes que quiero montrar en pantalla*/
	cont = 0; /*inicio mi contador en 0*/

	function carrousel(contenedor){
		contenedor.addEventListener('click', e => {
			let atras = contenedor.querySelector('.atras'),/*con el query busco mi elemento html pongo la clase para hacerlo*/
			adelante = contenedor.querySelector('.adelante'),
			img = contenedor.querySelector('img'),
			tgt = e.target;/*identificamos el elemento html que dispara el evento*/

		  if(tgt == atras){
		  	if(cont > 0){
		  		img.src = imagenes[cont-1];
		  		cont--;
		  	}else{
		  		img.src = imagenes[imagenes.length -1];/*para que mis imagenes se reptitan siempre es decir sea infinita*/
		  		cont = imagenes.length -1;
		  	}

		  }else if(tgt == adelante){
		  	if(cont<imagenes.length-1){
		  		img.src = imagenes[cont+1];
		  		cont++;
		  	}else{
		  		img.src = imagenes [0];
		  		cont = 0;
		  	}

		  }

		});
	}

	document.addEventListener("DOMContentLoaded", () => {
		let contenedor = document.querySelector('.contenedor');

		carrousel(contenedor);

	});