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
var cerrar_edit = document.getElementById("closePopup-edit");

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

cerrar_edit.addEventListener("click", () => {
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
});

// Peticiones fetch

listarReservas();
mostrarCliente();
mostrarMesa();

function listarReservas(search) {
	fetch("../../../models/admin/reservas/listarReserva.php", {
		method: "POST",
		body: search,
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
		});
}

function mostrarCliente() {
	fetch("../../../models/admin/reservas/mostrarCliente.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			cliente.innerHTML = response;
		});
}

function mostrarMesa() {
	fetch("../../../models/admin/reservas/mostrarMesa.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			mesa.innerHTML = response;
		});
}

registrar.addEventListener("click", () => {
	const cliente_reserva = document.getElementById("cliente");
	const fecha_reserva = document.getElementById("add_fecha_reserva");
	const hora_reserva = document.getElementById("add_hora_reserva");
	const mesa_reserva = document.getElementById("mesa");
	const asientos_reserva = document.getElementById("add_asientos");

	if (
		fecha_reserva.value == "" &&
		hora_reserva.value == "" &&
		cliente_reserva.value == "" &&
		mesa_reserva.value == "" &&
		asientos_reserva.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	} else if (fecha_reserva.value == "") {
		Swal.fire({
			title: "Error",
			text: "La fecha de reserva no pude estar vacia",
			icon: "error",
		});
	} else if (cliente_reserva.value < 0 || cliente_reserva.value == "") {
		Swal.fire({
			title: "Error",
			text: "El cliente no puede estar vacio",
			icon: "error",
		});
	} else if (
		hora_reserva.value < "12:00" ||
		hora_reserva.value > "22:00" ||
		hora_reserva.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "La hora de reservacion debe estar entre 12:00 pm y 10:00 pm",
			icon: "error",
		});
	} else if (mesa_reserva.value < 0 || mesa_reserva.value == "") {
		Swal.fire({
			title: "Error",
			text: "El numero de mesa no puede estar vacio",
			icon: "error",
		});
	} else if (
		asientos_reserva.value < 0 ||
		asientos_reserva.value > 8 ||
		asientos_reserva.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "El numero de asientos no puede estar vacio ni ser mayor a 8 por reservación",
			icon: "error",
		});
	} else {
		fetch("../../../models/admin/reservas/añadirReserva.php", {
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
					listarReservas();
					mostrarMesa();
					pop_up_add.classList.remove("show");
					pop_up_wrap_add.classList.remove("show");
				}
			});
		fetch("../../../controller/sendMail_add.php", {
			method: "POST",
			body: new FormData(pop_up_wrap_add),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
			});
	}
});

function Editar(id) {
	fetch("../../../models/admin/reservas/actualizarReserva.php", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			id_reserva.value = response.ID_RESERVACION;
			cliente1.value = response.ID_CLIENTE;
			estado.value = response.ESTADO_RESERVACION;
			edit_fecha_reserva.value = response.FECHA_RESERVACION;
			edit_hora_reserva.value = response.HORA_RESERVACION;
			edit_mesa.value = response.ID_MESA;
			edit_asientos.value = response.ASIENTO;
		});
}

edit.addEventListener("click", () => {
	const fecha_reserva1 = document.getElementById("edit_fecha_reserva");
	const hora_reserva1 = document.getElementById("edit_hora_reserva");
	const estado_reserva = document.getElementById("estado");
	const asientos_reserva1 = document.getElementById("edit_asientos");

	if (fecha_reserva1.value == "" || fecha_reserva1.value == "0000-00-00") {
		Swal.fire({
			title: "Error",
			text: "El campo no pude estar vacio ni puede hacer una reservacion en el pasado",
			icon: "error",
		});
	} else if (
		hora_reserva1.value < "12:00:00" ||
		hora_reserva1.value > "22:00:00" ||
		hora_reserva1.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "La hora de reservacion debe estar entre 12:00 pm y 10:00 pm",
			icon: "error",
		});
	} else if (estado_reserva.value <= 0 || estado_reserva.value == "") {
		Swal.fire({
			title: "Error",
			text: "El estado de la reserva no puede estar vacio",
			icon: "error",
		});
	} else if (
		asientos_reserva1.value <= 0 ||
		asientos_reserva1.value > 8 ||
		asientos_reserva1.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "El numero de asientos no puede estar vacio ni ser mayor a 8 por reservación",
			icon: "error",
		});
	} else {
		fetch("../../../models/admin/reservas/editarReserva.php", {
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
					listarReservas();
					mostrarMesa();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
				}
			});
		fetch("../../../controller/sendMail_edit.php", {
			method: "POST",
			body: new FormData(pop_up_wrap_edit),
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
			});
	}
});

function eliminarReserva(id) {
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
			fetch("../../../models/admin/reservas/eliminarReserva.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					console.log(response);
					listarReservas();
					mostrarMesa();
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
		listarReservas();
	} else {
		listarReservas(valor);
	}
});
