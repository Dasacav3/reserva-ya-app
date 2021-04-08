// Formulario de registro

const formulario = document.getElementById("form");
const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");
const fechaNacimiento = document.getElementById("nacimiento");
const cel = document.getElementById("cel");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const pass2 = document.getElementById("password2");
const terminos = document.getElementById("terminos");
const error = document.getElementById("warnings");

registrar.addEventListener("click", () => {
	let warnings = "";
	let registrar = false;
	error.innerHTML = "";

	if (!expresiones.nombre.test(nombre.value)) {
		warnings += `<p>El nombre es invalido <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (!expresiones.nombre.test(apellido.value)) {
		warnings += `<p>El apellido es invalido <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	const date = fechaNacimiento.value;
	const dateBirth = new Date(date);
	const dateNow = new Date();

	const result = dateNow.getFullYear() - dateBirth.getFullYear();

	if (result < 18 || fechaNacimiento.value == "") {
		warnings += `<p>La fecha de nacimiento es invalida <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (!expresiones.telefono.test(cel.value)) {
		warnings += `<p>El celular es invalido <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (!expresiones.correo.test(email.value)) {
		warnings += `<p>El email es invalido <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (!expresiones.password.test(pass.value)) {
		warnings += `<p>La contraseña es invalida <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (pass.value.length < 12) {
		warnings += `<p>La contraseña debe tener 12 caracteres como minimo <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (pass.value != pass2.value) {
		warnings += `<p>Las contraseñas no coinciden <i class="fas fa-times-circle"></i><p/>`;
		registrar = true;
	}

	if (registrar) {
		error.innerHTML = warnings;
	} else {
		error.innerHTML = "";
		fetch("../models/signupUser.php", {
			method: "POST",
			body: new FormData(form),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
					Swal.fire({
						title: "Usuario registrado exitosamente",
						icon: "success",
						showConfirmButton: false,
						timer: 2000,
					}).then(() => {
						form.reset();
						window.location = "http://localhost/reservaya-mvc/app/views/login.php";
					});
				}else {
					Swal.fire({
						title: "El nombre de usuario (email) ya ha sido registrado",
						icon: "error",
						showConfirmButton: false,
						timer: 2000,
					});
					form.reset();
				}
			});
	}
});
