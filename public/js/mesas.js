"use strict";

import { URL } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	// Modal añadir
	let containerFormAdd = document.getElementById("pop-up-add");
	let formAdd = document.getElementById("addMesaForm");

	let btnFormAddOpen = document.getElementById("abrirPopup-add");
	btnFormAddOpen.addEventListener("click", openModalAdd, false);

	let btnFormAddClose = document.getElementById("closePopup-add");
	btnFormAddClose.addEventListener("click", closeModalAdd, false);

	let sendFormAdd = document.getElementById("registrar");
	sendFormAdd.addEventListener("click", addMesas, false);

	// Modal editar
	let containerFormEdit = document.getElementById("pop-up-edit");
	let formEdit = document.getElementById("editMesaForm");

	let btnFormEditClose;
	let btnFormEdit;

	// Funciones modal añadir
	function openModalAdd() {
		containerFormAdd.classList.add("show");
		formAdd.classList.add("show");
	}

	function closeModalAdd() {
		containerFormAdd.classList.remove("show");
		formAdd.classList.remove("show");
	}

	// Funciones modal editar
	function openModalEdit() {
		containerFormEdit.classList.add("show");
		formEdit.classList.add("show");
	}

	function closeModalEdit() {
		containerFormEdit.classList.remove("show");
		formEdit.classList.remove("show");
	}

	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		ajax: {
			url: URL + "mesa/obtenerTodo",
			type: "POST",
			dataSrc: "",
		},

		columns: [
			{
				data: "ID_MESA",
			},
			{
				data: "CAPACIDAD_MESA",
			},
			{
				data: "ESTADO_MESA",
			},
			{
				data: "ID_MESA",
			},
		],
		deferRender: true,
		columnDefs: [
			{
				targets: -1,
				data: "ID_MESA",
				render: function (data, type, row, meta) {
					return (
						"<button class='btn-edit' id='btnEdit-" +
						data +
						"'><i class='fas fa-edit'></i></button><button class='btn-delete' id='btnDelete-" +
						data +
						"'><i class='fas fa-trash-alt'></i></button>"
					);
				},
			},
		],
		drawCallback: function () {
			enableBtns();
		},
	});

	setInterval(function () {
		enableBtns(); // user paging is not reset on reload
	}, 1000);

	// Funciones core

	function enableBtns() {
		for (let i = 0; i < btnDelete.length; i++) {
			btnDelete[i].addEventListener("click", deleteMesa, false);
		}

		for (let i = 0; i < btnEdit.length; i++) {
			btnEdit[i].addEventListener("click", getDataMesa, false);
		}
	}

	function addMesas() {
		let capacidadMesa = document.getElementById("capacidadMesa");

		if (capacidadMesa.value < 1) {
			Swal.fire({
				title: "Error",
				text: "La capacidad de la mesa no puede ser menor a 1",
				icon: "error",
			});
		} else {
			fetch(URL + "mesa/añadir", {
				method: "POST",
				body: new FormData(formAdd),
			})
				.then((response) => response.text())
				.then((response) => {
					console.log(response);
					if (response == "ok") {
						Swal.fire("Existoso", "La mesa ha sido registrada", "success");
						closeModalAdd();
					} else {
						Swal.fire("Error", "Hubo un problema", "error");
					}
				});
		}
	}

	let btnEdit = document.getElementsByClassName("btn-edit");

	function getDataMesa() {
		let idAttr = this.getAttribute("id");
		let id = idAttr.split("-");
		openModalEdit();
		fetch(URL + "mesa/obtener", {
			method: "POST",
			body: id[1],
		})
			.then((response) => response.text())
			.then((response) => {
				formEdit.innerHTML = response;
				btnFormEditClose = document.getElementById("closePopup-edit");
				btnFormEditClose.addEventListener("click", closeModalEdit, false);
				btnFormEdit = document.getElementById("edit");
				btnFormEdit.addEventListener("click", updateMesa, false);
			});
	}

	function updateMesa() {
		let capacidadMesa = document.getElementById("capacidadMesaUpdate");

		if (capacidadMesa.value < 1) {
			Swal.fire({
				title: "Error",
				text: "La capacidad de la mesa no puede ser menor a uno",
				icon: "error",
			});
		} else {
			fetch(URL + "mesa/actualizar", {
				method: "POST",
				body: new FormData(formEdit),
			})
				.then((response) => response.text())
				.then((response) => {
					console.log(response);
					if (response == "ok") {
						Swal.fire("Existoso", "La mesa ha sido actualizada", "success");
						closeModalEdit();
					} else {
						Swal.fire("Error", "Hubo un problema", "error");
					}
				});
		}
	}

	let btnDelete = document.getElementsByClassName("btn-delete");

	function deleteMesa() {
		let idAttr = this.getAttribute("id");
		let id = idAttr.split("-");
		Swal.fire({
			title: "¿Esta seguro de que desea eliminar la mesa?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar",
		}).then((result) => {
			if (result.isConfirmed) {
				fetch(URL + "mesa/eliminar", {
					method: "POST",
					body: id[1],
				})
					.then((response) => response.text())
					.then((response) => {
						console.log(response);
						if (response == "ok") {
							Swal.fire("Existoso", "La mesa ha sido eliminada", "success");
						} else {
							Swal.fire("Error", "Hubo un problema", "error");
						}
					});
			}
		});
	}
});
