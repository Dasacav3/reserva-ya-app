listarUsuarios();

function listarUsuarios(busqueda) {
	fetch("../../../models/admin/usuarios/listarUser.php", {
		method: "POST",
		body: busqueda,
	})
		.then((response) => response.text())
		.then((response) => {
			usuarios.innerHTML = response;
		});
}

registrar.addEventListener("click", () => {
	const doc = document.getElementById("doc_emp");
	const nombre = document.getElementById("name_emp");
	const apellido = document.getElementById("last_emp");
	const email = document.getElementById("email_emp");
	const cel = document.getElementById("cel_emp");
	const pass = document.getElementById("pass_emp");
	const pass2 = document.getElementById("pass_emp2");

	if(doc.value == "" && nombre.value == "" && apellido.value == "" && email.value == "" && cel.value == "" && pass.value == "" && pass2.value == ""){
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	}else if (doc.value == "") {
		Swal.fire({
			title: "Error",
			text: "El documento del usuario no puede estar vacio",
			icon: "error",
		});
	} else if (nombre.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre del empleado no puede estar vacio",
			icon: "error",
		});
	} else if (apellido.value == "") {
		Swal.fire({
			title: "Error",
			text: "El apellido del empleado no puede estar vacio",
			icon: "error",
		});
	} else if (email.value == "" || !expresiones.correo.test(email.value)) {
		Swal.fire({
			title: "Error",
			text: "El email del empleado debe ser valido y no puede estar vacio",
			icon: "error",
		});
	} else if (cel.value == "" || !expresiones.telefono.test(cel.value)) {
		Swal.fire({
			title: "Error",
			text: "El numero de celular del empleado no puede estar vacio",
			icon: "error",
		});
	}else if(pass.value == "" || pass.value.length < 12){
		Swal.fire({
			title: "Error",
			text: "La contraseña no debe estar vacia y debe tener minimo 12 caracteres",
			icon: "error",
		});
	} else if(pass2.value == "" || pass2.value != pass.value){
		Swal.fire({
			title: "Error",
			text: "La contraseña no coinciden",
			icon: "error",
		});
	} else {
		fetch("../../../models/admin/usuarios/añadirUser.php", {
			method: "POST",
			body: new FormData(pop_up_wrap_add),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
					Swal.fire({
						icon: "success",
						title: "Registrado",
						showConfirmButton: false,
						timer: 1500,
					});
					pop_up_wrap_add.reset();
					listarUsuarios();
					pop_up_add.classList.remove("show");
					pop_up_wrap_add.classList.remove("show");
				}
			});
	}
});

function Editar(id) {
	fetch("../../../models/admin/usuarios/actualizarUser.php", {
		method: "POST",
		body: id,
	})
		.then((response) => response.text())
		.then((response) => {
			pop_up_wrap_edit.innerHTML = response;
		});
}

function editarEmpleado() {
	const estado = document.getElementById("estado_usuario");
	const doc = document.getElementById("doc_emp_1");
	const nombre = document.getElementById("name_emp_1");
	const apellido = document.getElementById("last_emp_1");
	const email = document.getElementById("email_emp_1");
	const cel = document.getElementById("cel_emp_1");

	if (estado.value == "") {
		Swal.fire({
			title: "Error",
			text: "El estado de usuario no puede estar vacio",
			icon: "error",
		});
	} else if (doc.value == "") {
		Swal.fire({
			title: "Error",
			text: "El documento del usuario no puede estar vacio",
			icon: "error",
		});
	} else if (nombre.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre del empleado no puede estar vacio",
			icon: "error",
		});
	} else if (apellido.value == "") {
		Swal.fire({
			title: "Error",
			text: "El apellido del empleado no puede estar vacio",
			icon: "error",
		});
	} else if (email.value == "" || !expresiones.correo.test(email.value)) {
		Swal.fire({
			title: "Error",
			text: "El email del empleado debe ser valido y no puede estar vacio",
			icon: "error",
		});
	} else if (cel.value == "" || !expresiones.telefono.test(cel.value)) {
		Swal.fire({
			title: "Error",
			text: "El numero de celular del empleado no puede estar vacio",
			icon: "error",
		});
	} else {
		fetch("../../../models/admin/usuarios/editarUser.php", {
			method: "POST",
			body: new FormData(pop_up_wrap_edit),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
					Swal.fire({
						icon: "success",
						title: "Modificación",
						showConfirmButton: false,
						timer: 1500,
					});
					pop_up_wrap_edit.reset();
					listarUsuarios();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
				}
			});
	}
}

function editarCliente() {
	const estado = document.getElementById("estado_usuario");
	const fecha = document.getElementById("fecha_cliente_1");
	const nombre = document.getElementById("name_cliente_1");
	const apellido = document.getElementById("last_cliente_1");
	const email = document.getElementById("email_cliente_1");
	const cel = document.getElementById("cel_cliente_1");

	if (estado.value == "") {
		Swal.fire({
			title: "Error",
			text: "El estado de usuario no puede estar vacio",
			icon: "error",
		});
	} else if (fecha.value == "") {
		Swal.fire({
			title: "Error",
			text: "La fecha de nacimiento del usuario no puede estar vacia",
			icon: "error",
		});
	} else if (nombre.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre del cliente no puede estar vacio",
			icon: "error",
		});
	} else if (apellido.value == "") {
		Swal.fire({
			title: "Error",
			text: "El apellido del cliente no puede estar vacio",
			icon: "error",
		});
	} else if (email.value == "" || !expresiones.correo.test(email.value)) {
		Swal.fire({
			title: "Error",
			text: "El email del cliente debe ser valido y no puede estar vacio",
			icon: "error",
		});
	} else if (cel.value == "" || !expresiones.telefono.test(cel.value)) {
		Swal.fire({
			title: "Error",
			text: "El numero de celular del cliente no puede estar vacio",
			icon: "error",
		});
	} else {
		fetch("../../../models/admin/usuarios/editarUser.php", {
			method: "POST",
			body: new FormData(pop_up_wrap_edit),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
				if (response == "ok") {
					Swal.fire({
						icon: "success",
						title: "Modificación",
						showConfirmButton: false,
						timer: 1500,
					});
					pop_up_wrap_edit.reset();
					listarUsuarios();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
				}
			});
	}
}

function eliminarUser(id) {
	Swal.fire({
		title: "¿Esta seguro de eliminar?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "SI",
		cancelButtonText: "NO",
	}).then((result) => {
		if (result.isConfirmed) {
			fetch("../../../models/admin/usuarios/eliminarUser.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					listarUsuarios();
					Swal.fire({
						icon: "success",
						title: "Eliminado",
						showConfirmButton: false,
						timer: 1500,
					});
				});
		}
	});
}

search_input.addEventListener("keyup", () => {
	const valor = search_input.value;
	if (valor == "") {
		listarUsuarios();
	} else {
		listarUsuarios(valor);
	}
});

// Modal añadir y editar
var pop_up_add = document.getElementById("pop-up-add");
var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

var pop_up_edit = document.getElementById("pop-up-edit");
var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");

var abrir_add = document.getElementById("abrirPopup-add");
var abrir_edit = document.getElementsByClassName("abrirPopup-edit");

function abrir() {
	for (var i = 0; i < abrir_edit.length; i++) {
		abrir_edit[i].addEventListener("click", () => {
			showPopup_edit();
		});
	}
}

function showPopup_add() {
	pop_up_add.classList.add("show");
	pop_up_wrap_add.classList.add("show");
}

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

abrir_add.addEventListener("click", () => {
	showPopup_add();
});

var cerrar_add = document.getElementById("closePopup-add");
var cerrar_edit = document.getElementsByClassName("closePopup-edit");

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

function cerrar() {
	for (var i = 0; i < cerrar_edit.length; i++) {
		cerrar_edit[i].addEventListener("click", () => {
			pop_up_edit.classList.remove("show");
			pop_up_wrap_edit.classList.remove("show");
		});
	}
}
