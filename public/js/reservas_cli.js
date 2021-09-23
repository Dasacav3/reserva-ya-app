"use strict";

import { URL, updateStateReserva } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	updateStateReserva();
	listarReservasActivas();

	let reserva_add_form = document.getElementById("reserva-add");
	let cards_container = document.getElementById("reserva-container");

	let modalHistorial = document.getElementById("pop-up-edit");
	let modalHistorial2 = document.getElementById("datatable-container");

	let btnOpenHistorial = document.getElementById("btn-historial");
	let btnCloseHistorial = document.getElementById("btn-close-historial");

	btnOpenHistorial.addEventListener("click", () => {
		modalHistorial.classList.add("show");
		modalHistorial2.classList.add("show");
	});

	btnCloseHistorial.addEventListener("click", () => {
		modalHistorial.classList.remove("show");
		modalHistorial2.classList.remove("show");
	});

	// Peticiones fetch

	function listarReservasActivas() {
		fetch(URL + "reserva/listarReserva", {
			method: "POST",
		})
			.then((res) => res.json())
			.then((data) => {
				let cards = "";
				for (let i = 0; i < data.length; i++) {
					if (data[i]["ESTADO_RESERVACION"] == "Activa") {
						cards += `
						<div class="reserva-card">
							<p class="reserva-add-card-title">Reserva # 00876${data[i]["ID_RESERVACION"]} </p>
							<p>Mesa: ${data[i]["ID_MESA"]} </p>
							<p>Asientos: ${data[i]["ASIENTO"]}</p>
							<p>Hora:  ${data[i]["HORA_RESERVACION"]}</p>
							<p>Fecha: ${data[i]["FECHA_RESERVACION"]} </p>
							<button class="cancelar btn-delete" id="btnEdit-${data[i]["ID_RESERVACION_RESERVA_MESA"]}" ><i class="fas fa-trash"></i> Cancelar</button>
						</div>
						`;
					}
				}
				cards_container.innerHTML = cards;
				enableBtns();
			});
	}

	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		ajax: {
			url: URL + "reserva/listarReserva2",
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
		],
		deferRender: true,
		drawCallback: function () {
			enableBtns();
		},
	});

	setInterval(function () {
		enableBtns(); // user paging is not reset on reload
	}, 1000);

	mostrarMesa();

	function enableBtns() {
		let btnCancel = document.getElementsByClassName("btn-delete");
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
						body: new FormData(reserva_add_form),
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
							datatable.ajax.reload(null, false);
							reserva_add_form.reset();
							listarReservasActivas();
							mostrarMesa();
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
					body: new FormData(reserva_add_form),
				})
					.then((response) => response.text())
					.then((response) => {
						console.log(response);
					});
			}

			sendMail();
		}
	});

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
					listarReservasActivas();
					datatable.ajax.reload(null, false);
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
