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

	//Funciones paginación

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
						<td> ${item[i].ID_MESA}  </td>
						<td> ${item[i].CAPACIDAD_MESA}  </td>
                        <td> ${item[i].ESTADO_MESA}  </td>
						<td>
                        <button class='btn-edit' id='btnEdit-${item[i].ID_MESA}'><i class='fas fa-edit'></i></button>
                        <button class='btn-delete' id='btnDelete-${item[i].ID_MESA}'><i class='fas fa-trash-alt'></i></button>
                        </td>   
					</tr>`;
			wrapper.innerHTML = output;
		}
	}

	// Funciones core

	getMesas();

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
						getMesas();
						closeModalAdd();
					} else {
						Swal.fire("Error", "Hubo un problema", "error");
					}
				});
		}
	}

	function getMesas(busqueda) {
		fetch(URL + "mesa/obtenerTodo", {
			method: "POST",
			body: busqueda,
		})
			.then((response) => response.json())
			.then((response) => {
				paginationTable(response);
				console.log(response);
				enableBtns();
			});
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
						getMesas();
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
							getMesas();
						} else {
							Swal.fire("Error", "Hubo un problema", "error");
						}
					});
			}
		});
	}

	let search = document.getElementById("search_input");
	search.addEventListener("keyup", () => {
		let busqueda = search.value;
		if (busqueda.value == "") {
			getMesas();
		} else {
			getMesas(busqueda);
		}
	});
});
