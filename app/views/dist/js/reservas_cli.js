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

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

// Peticiones fetch

listarReservas();
mostrarMesa();

function DisplayList(items, wrapper, rows_per_page, page) {
	wrapper.innerHTML = "";
	page--;

	let start = rows_per_page * page;
	let end = start + rows_per_page;
	let paginatedItems = items.slice(start, end);

	var output = "";
	for (let i = 0; i < paginatedItems.length; i++) {
		var item = new Array();
		item[i] = paginatedItems[i];
		output += `
					<tr>
						<td> ${item[i].ESTADO_RESERVACION}  </td>
						<td> ${item[i].ID_RESERVACION}  </td>
						<td> ${item[i].FECHA_RESERVACION}  </td>
						<td> ${item[i].HORA_RESERVACION}  </td>
						<td> ${item[i].ID_MESA}  </td>
						<td> ${item[i].ASIENTO}  </td>
						<td>`;
		if (item[i].ESTADO_RESERVACION === "Activa") {
			output += `<button class='btn-delete' type='button' onclick=cancelarReserva('${item[i].ID_RESERVACION_RESERVA_MESA}')><i class='fas fa-trash-alt'></i></button>
							</td>   
					</tr>`;
		}
		wrapper.innerHTML = output;
	}
}

function listarReservas(search) {
	fetch("../../../models/cliente/reservas/listarReserva.php", {
		method: "POST",
		body: search,
	})
		.then((response) => response.json())
		.then((response) => {
			paginationTable(response);
		});
}

function mostrarMesa() {
	fetch("../../../models/cliente/reservas/mostrarMesa.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			mesa.innerHTML = response;
		});
}

registrar.addEventListener("click", () => {
	const fecha_reserva = document.getElementById("add_fecha_reserva");
	const hora_reserva = document.getElementById("add_hora_reserva");
	const mesa_reserva = document.getElementById("mesa");
	const asientos_reserva = document.getElementById("add_asientos");

	if (
		fecha_reserva.value == "" &&
		hora_reserva.value == "" &&
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
		async function añadirReserva() {
			try {
				console.time("tasks time");
				const add = await fetch("../../../models/cliente/reservas/añadirReserva.php", {
					method: "POST",
					body: new FormData(pop_up_wrap_add),
				})
					.then((response) => response.text())
					.then((response) => {
						if (response == "ok") {
							Swal.fire({
								icon: "success",
								title: "Registrado",
								showConfirmButton: false,
								timer: 1500,
							});
						}
						pop_up_wrap_add.reset();
						listarReservas();
						mostrarMesa();
						pop_up_add.classList.remove("show");
						pop_up_wrap_add.classList.remove("show");
					});

				console.timeEnd("tasks time");
			} catch (err) {
				console.log(err);
			}
		}

		añadirReserva();

		function sendMail() {
			fetch("../../../controller/mail/sendMail_add.php", {
				method: "POST",
				body: new FormData(pop_up_wrap_add),
			})
				.then((response) => response.text())
				.then((response) => {
					console.log(response);
				});
		}

		sendMail();
	}
});

function cancelarReserva(id) {
	Swal.fire({
		title: "¿Esta seguro de que desea cancelar la reserva?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "SI",
		cancelButtonText: "NO",
	}).then((result) => {
		if (result.isConfirmed) {
			async function peticionReserva() {
				try {
					const url = "../../../models/cliente/reservas/cancelarReserva.php";
					const fetchAdd = await fetch(url, { method: "POST", body: id });
					const texto = await fetchAdd.text();
					if (texto == "ok") {
						Swal.fire({
							icon: "success",
							title: "Reserva cancelada",
							showConfirmButton: false,
							timer: 1500,
						});
						listarReservas();
						mostrarMesa();
					}
				} catch (err) {
					console.log(err);
				}
			}

			peticionReserva();

			// async function emailCancel() {
			// 	try {
			// 		const url = "../../../controller/mail/sendMail_delete.php";
			// 		const fetchEmail = await fetch(url, { method: "POST", body: id });
			// 		const texto = await fetchEmail.text();
			// 		console.log(texto);
			// 	} catch (err) {
			// 		console.log(err);
			// 	}
			// }
		
			// emailCancel();
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
