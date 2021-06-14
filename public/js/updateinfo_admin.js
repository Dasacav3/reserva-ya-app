"use strict";

import { URL } from "./modules.js";

listarInfo();

let editInfo = document.getElementById("editarInfo");
let changePass = document.getElementById("changePassword");

editInfo.addEventListener("click", editarInfo, false);
changePass.addEventListener("click", changePassword, false);

let enviar = document.getElementById("enviar");

enviar.addEventListener("click", () => {
	// Verificar que se agregó un archivo
	if (!file) {
		alert("Agrega un archivo");
		return;
	}

	// Crea un objeto FormData
	let data = new FormData();

	// Agrega el archivo
	data.append("photo_user", file);

	// Solo para ver que sí se agregó el archivo
	// console.log(...data);

	fetch(URL + "admin/editarFotoPerfil", {
		method: "POST",
		body: data,
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				Swal.fire({
					icon: "success",
					title: "Foto de perfil actualizada",
					text: "Los cambios se veran reflejados cuando vuelvas a iniciar sesión",
					showConfirmButton: false,
					timer: 1500,
				});
				let foto = document.getElementById("foto");
				img.removeChild(foto);
				dragText.classList.remove("none");
				button.classList.remove("none");
				icon.classList.remove("none");
				dropArea.classList.remove("active");
				dragText.textContent = "Arrastra y suelta tu imagen";
				file = "";
			} else {
				Swal.fire({
					icon: "error",
					title: "La actualización no se pudo realizar",
					showConfirmButton: false,
					timer: 1500,
				});
				let foto = document.getElementById("foto");
				img.removeChild(foto);
				dragText.classList.remove("none");
				button.classList.remove("none");
				icon.classList.remove("none");
				dropArea.classList.remove("active");
				dragText.textContent = "Arrastra y suelta tu imagen";
				file = "";
			}
		});
});

edit.addEventListener("click", () => {
	fetch(URL + "admin/cambioPassword", {
		method: "POST",
		body: new FormData(pop_up_wrap_edit),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				Swal.fire({
					icon: "success",
					title: "Contraseña actualizada",
					showConfirmButton: false,
					timer: 1500,
				});
				pop_up_wrap_edit.reset();
				pop_up_edit.classList.remove("show");
				pop_up_wrap_edit.classList.remove("show");
			} else {
				Swal.fire({
					icon: "error",
					title: "La actualización no se pudo realizar",
					showConfirmButton: false,
					timer: 1500,
				});
			}
		});
});

function listarInfo() {
	fetch(URL + "admin/listarInformacion", {
		method: "POST",
	})
		.then((response) => response.json())
		.then((response) => {
			console.log(response)
			nombre.value = response.nombre_admin;
			apellido.value = response.apellido_admin;
			email.value = response.email_admin;
			cel.value = response.celular_admin;
		});
}

function editarInfo() {
	fetch(URL + "admin/editarInformacion", {
		method: "POST",
		body: new FormData(form_update_info),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				const Toast = Swal.mixin({
					toast: true,
					position: "top-end",
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener("mouseenter", Swal.stopTimer);
						toast.addEventListener("mouseleave", Swal.resumeTimer);
					},
				});

				Toast.fire({
					icon: "success",
					title: "Información actualizada satisfactoriamente",
				});
				listarInfo();
			} else {
				const Toast = Swal.mixin({
					toast: true,
					position: "top-end",
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener("mouseenter", Swal.stopTimer);
						toast.addEventListener("mouseleave", Swal.resumeTimer);
					},
				});

				Toast.fire({
					icon: "error",
					title: "No se pudo actualizar la información",
				});
				listarInfo();
			}
		});
}

// Modal actualizar contraseña

var pop_up_edit = document.getElementById("pop-up-edit");
var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");
var abrir_edit = document.getElementsByClassName("abrirPopup-edit");
var cerrar_edit = document.getElementById("closePopup-edit");

cerrar_edit.addEventListener("click", () => {
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
	pop_up_wrap_edit.reset();
});

function changePassword() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}
