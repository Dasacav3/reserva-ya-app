const formulario = document.getElementById("form");
const inputs = document.querySelectorAll("#form input");

const expresiones = {
	user_name: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	password: /^.{4,12}$/, // 4 a 12 digitos.
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
};

const validarFormulario = (e) => {
	switch(e.target.name){
		case "user_name":
			if(expresiones.user_name.test(e.target.value)){

			}else{
				document,getElementById('')
			}
		break;
		case "nombre":

		break;
		case "apellido":

		break;
		case "password":

		break;
		case "password2":

		break;
		case "email":

		break;
		case "nacimiento":

		break;
	}
};

inputs.forEach((input) => {
	input.addEventListener("keyup", validarFormulario);
	input.addEventListener("blur", validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked ){
		formulario.reset();
		alert("Registrado exitosamente");
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});
