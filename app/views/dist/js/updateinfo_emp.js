// listarInfo();

subir_photo.addEventListener("click", () => {
	fetch("../../../models/empleado/usuarios/añadirFotoPerfil.php", {
		method: "POST",
		body: new FormData(photo_user_form),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "ok") {
				Swal.fire({
					icon: "success",
					title: "Foto de perfil actualizada",
					showConfirmButton: false,
					timer: 1500,
				});
				photo_user_form.reset();
			} else {
				Swal.fire({
					icon: "error",
					title: "La actualización no se pudo realizar",
					showConfirmButton: false,
					timer: 1500,
				});
				photo_user_form.reset();
			}
		});
});

// edit.addEventListener("click", () => {
// 	fetch("../../../models/cliente/informacion/cambioPassword.php", {
// 		method: "POST",
// 		body: new FormData(pop_up_wrap_edit),
// 	})
// 		.then((response) => response.text())
// 		.then((response) => {
// 			console.log(response);
// 			if (response == "ok") {
// 				Swal.fire({
// 					icon: "success",
// 					title: "Contraseña actualizada",
// 					showConfirmButton: false,
// 					timer: 1500,
// 				});
// 				pop_up_wrap_edit.reset();
// 				pop_up_edit.classList.remove("show");
// 				pop_up_wrap_edit.classList.remove("show");
// 			} else {
// 				Swal.fire({
// 					icon: "error",
// 					title: "La actualización no se pudo realizar",
// 					showConfirmButton: false,
// 					timer: 1500,
// 				});
// 			}
// 		});
// });

// function listarInfo() {
// 	fetch("../../../models/cliente/informacion/listarInfo.php", {
// 		method: "POST",
// 	})
// 		.then((response) => response.json())
// 		.then((response) => {
// 			nombre.value = response.nombre_cliente;
// 			apellido.value = response.apellido_cliente;
// 			fecha.value = response.fecha_nacimiento_cliente;
// 			email.value = response.email_cliente;
// 			cel.value = response.celular_cliente;
// 		});
// }

// function editarInfo() {
// 	fetch("../../../models/cliente/informacion/editarInfo.php", {
// 		method: "POST",
// 		body: new FormData(form_update_info),
// 	})
// 		.then((response) => response.text())
// 		.then((response) => {
//             console.log(response);
// 			if (response == "ok") {
// 				const Toast = Swal.mixin({
// 					toast: true,
// 					position: "top-end",
// 					showConfirmButton: false,
// 					timer: 3000,
// 					timerProgressBar: true,
// 					didOpen: (toast) => {
// 						toast.addEventListener("mouseenter", Swal.stopTimer);
// 						toast.addEventListener("mouseleave", Swal.resumeTimer);
// 					},
// 				});

// 				Toast.fire({
// 					icon: "success",
// 					title: "Información actualizada satisfactoriamente",
// 				});
//                 listarInfo()
// 			} else {
// 				const Toast = Swal.mixin({
// 					toast: true,
// 					position: "top-end",
// 					showConfirmButton: false,
// 					timer: 3000,
// 					timerProgressBar: true,
// 					didOpen: (toast) => {
// 						toast.addEventListener("mouseenter", Swal.stopTimer);
// 						toast.addEventListener("mouseleave", Swal.resumeTimer);
// 					},
// 				});

// 				Toast.fire({
// 					icon: "error",
// 					title: "No se pudo actualizar la información",
// 				});
//                 listarInfo()
// 			}
// 		});
// }

// // Modal actualizar contraseña

// var pop_up_edit = document.getElementById("pop-up-edit");
// var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");
// var abrir_edit = document.getElementsByClassName("abrirPopup-edit");
// var cerrar_edit = document.getElementById("closePopup-edit");

// cerrar_edit.addEventListener("click", () => {
// 	pop_up_edit.classList.remove("show");
// 	pop_up_wrap_edit.classList.remove("show");
// 	pop_up_wrap_edit.reset();
// });

// function changePassword() {
// 	pop_up_edit.classList.add("show");
// 	pop_up_wrap_edit.classList.add("show");
// }
