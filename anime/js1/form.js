 // hago que obtenga todos los elementos con clases de form_input
 // creo un array
var inputs = document.getElementsByClassName('form_input');
// recorro el array
for(var i=0;i<inputs.length; i++){
	// keyup evalua cuando termino de escribir en mi contenedor de datos de mi formulario
	inputs[i].addEventListener('keyup', function(){
		// creo una condicion que hace si mi elemento es mayor a uno se va a fijar el texto y si no es mayor a uno se quitara
		if(this.value.length>=1) {
			this.nextElementSibling.classList.add('fijar');
		}else {
			this.nextElementSibling.classList.remove('fijar');
		}
	});

}
