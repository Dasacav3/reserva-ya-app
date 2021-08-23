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

	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		ajax: {
			url: URL + "reserva/listarReserva",
			type: "POST",
			dataSrc: "",
		},

		columns: [
			{
				data: "ESTADO_RESERVACION",
			},
			{
				data: "ID_RESERVACION",
			},
			{
				data: "FECHA_RESERVACION",
			},
			{
				data: "HORA_RESERVACION",
			},
			{
				data: "ID_MESA",
			},
			{
				data: "ASIENTO",
			},
			{
				data: "ID_RESERVACION_RESERVA_MESA",
			},
		],
		deferRender: true,
		columnDefs: [
			{
				targets: -1,
				data: "ID_RESERVACION_RESERVA_MESA",
				render: function (data, type, row, meta) {
					return (
						"<button class='abrirPopup-edit btn-edit' id='btnEdit-" +
						data +
						"'><i class='fas fa-edit'></i></button>"
					);
				},
			},
		],
		drawCallback: function () {
			enableBtns();
		},
	});

	setInterval(function () {
		datatable.ajax.reload(null, false); // user paging is not reset on reload
	}, 50000);

	
	mostrarMesa();

	function enableBtns() {
		for (let i = 0; i < btnCancel.length; i++) {
			btnCancel[i].addEventListener("click", cancelarReserva, false);
		}
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
		const capacidad_mesa = mesa_reserva.value.split("-");
		let capacidad = capacidad_mesa[1];

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
			asientos_reserva.value > capacidad ||
			asientos_reserva.value == ""
		) {
			Swal.fire({
				title: "Error",
				text: `El numero de asientos no puede estar vacio ni ser mayor a ${capacidad} por reservación`,
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
				fetch(URL + "email/sendEmailAdd", {
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
});
