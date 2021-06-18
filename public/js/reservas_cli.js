"use strict";

import { URL, updateStateReserva } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	updateStateReserva();
	// Modal añadir y editar
	var pop_up_add = document.getElementById("pop-up-add");
	var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

	var pop_up_edit = document.getElementById("pop-up-edit");
	var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");

	var abrir_add = document.getElementById("abrirPopup-add");

	function showPopup_add() {
		pop_up_add.classList.add("show");
		pop_up_wrap_add.classList.add("show");
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

	function enableBtns() {
		for (let i = 0; i < btnCancel.length; i++) {
			btnCancel[i].addEventListener("click", cancelarReserva, false);
		}
	}

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
				output += `<button class='btn-delete' id='btnDelete-${item[i].ID_RESERVACION_RESERVA_MESA}'><i class='fas fa-trash-alt'></i></button>
							</td>   
					</tr>`;
			}
			wrapper.innerHTML = output;
		}
	}

	function paginationTable(list_items) {
		const list_element = document.getElementById("table_elements");
		const pagination_element = document.getElementById("pagination");

		let current_page = 1;
		let rows = 5;

		function SetupPaginations(items, wrapper, rows_per_page) {
			wrapper.innerHTML = "";

			let page_count = Math.ceil(items.length / rows_per_page);
			for (let i = 1; i <= page_count; i++) {
				let btn = PaginationButton(i, items);
				wrapper.appendChild(btn);
			}
		}

		function PaginationButton(page, items) {
			let button = document.createElement("button");
			button.innerText = page;

			if (current_page == page) button.classList.add("active");

			button.addEventListener("click", () => {
				current_page = page;
				DisplayList(items, list_element, rows, current_page);

				let current_btn = document.querySelector(".pagenumbers button.active");
				current_btn.classList.remove("active");

				button.classList.add("active");

				enableBtns();
			});

			return button;
		}

		DisplayList(list_items, list_element, rows, current_page);
		SetupPaginations(list_items, pagination_element, rows);
	}

	function listarReservas(search) {
		fetch(URL + "reserva/listarReserva", {
			method: "POST",
			body: search,
		})
			.then((response) => response.json())
			.then((response) => {
				paginationTable(response);
				enableBtns();
			});
	}

	function mostrarMesa() {
		fetch(URL + "reserva/listarMesa", {
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
					const add = await fetch(URL + "reserva/añadirReservaCli", {
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
				fetch(URL + "app/controller/mail/sendMail_add.php", {
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

	let btnCancel = document.getElementsByClassName("btn-delete");

	function cancelarReserva() {
		let idObj = this.getAttribute("id");
		let id = idObj.split("-");
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
				try {
					fetch(URL + "reserva/cancelarReserva", {
						method: "POST",
						body: id[1],
					})
						.then((response) => response.text())
						.then((response) => {
							console.log(response);
						});
					Swal.fire({
						icon: "success",
						title: "Reserva cancelada",
						showConfirmButton: false,
						timer: 1500,
					});
					listarReservas();
					mostrarMesa();
				} catch (err) {
					console.log(err);
				}
				sendMailCancel(id[1]);
			}
		});
	}

	function sendMailCancel(id) {
		fetch(URL + "email/sendEmailCancel", {
			method: "POST",
			body: id,
		})
			.then((response) => response.text())
			.then((response) => {
				console.log(response);
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
});
