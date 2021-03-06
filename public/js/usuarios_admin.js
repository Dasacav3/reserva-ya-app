"use strict";
import { URL } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	// Modal añadir y editar
	let pop_up_add = document.getElementById("pop-up-add");
	let pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

	let pop_up_edit = document.getElementById("pop-up-edit");
	let pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");

	let abrir_add = document.getElementById("abrirPopup-add");
	let abrir_edit = document.getElementsByClassName("abrirPopup-edit");

	let cerrar_edit = document.getElementsByClassName("closePopup");

	function abrir() {
		for (let i = 0; i < abrir_edit.length; i++) {
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

	let cerrar_add = document.getElementById("closePopup-add");

	cerrar_add.addEventListener("click", () => {
		pop_up_add.classList.remove("show");
		pop_up_wrap_add.classList.remove("show");
	});

	listarUsuarios();

	function DisplayList(items, wrapper, rows_per_page, page) {
		wrapper.innerHTML = "";
		page--;

		let start = rows_per_page * page;
		let end = start + rows_per_page;
		let paginatedItems = items.slice(start, end);

		let output = "";
		for (let i = 0; i < paginatedItems.length; i++) {
			let item = new Array();
			item[i] = paginatedItems[i];
			output += `
					<tr>
						<td> ${item[i].ID_USUARIO}  </td>
						<td> ${item[i].NOMBRE_USUARIO}  </td>
						<td> ${item[i].TIPO_USUARIO}  </td>
						<td> ${item[i].ESTADO_USUARIO}  </td>
						<td>
							<button class='abrirPopup-edit btn-edit' id='btnEdit-${item[i].ID_USUARIO}'><i class='fas fa-edit'></i></button>
							<button class='btn-delete' id='btnDelete-${item[i].ID_USUARIO}'><i class='fas fa-trash-alt'></i></button>
						</td>   
					</tr>`;
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

	function enableBtns() {
		for (let i = 0; i < btnEdit.length; i++) {
			btnEdit[i].addEventListener("click", Editar, false);
		}
		for (let i = 0; i < btnDelete.length; i++) {
			btnDelete[i].addEventListener("click", eliminarUser, false);
		}
	}

	function listarUsuarios(busqueda) {
		fetch(URL + "usuario/listarUsuarios", {
			method: "POST",
			body: busqueda,
		})
			.then((response) => response.json())
			.then((response) => {
				paginationTable(response);
				enableBtns();
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

		if (
			doc.value == "" &&
			nombre.value == "" &&
			apellido.value == "" &&
			email.value == "" &&
			cel.value == "" &&
			pass.value == "" &&
			pass2.value == ""
		) {
			Swal.fire({
				title: "Error",
				text: "Diligencia todos los campos",
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
		} else if (pass.value == "" || pass.value.length < 12) {
			Swal.fire({
				title: "Error",
				text: "La contraseña no debe estar vacia y debe tener minimo 12 caracteres",
				icon: "error",
			});
		} else if (pass2.value == "" || pass2.value != pass.value) {
			Swal.fire({
				title: "Error",
				text: "La contraseña no coinciden",
				icon: "error",
			});
		} else {
			fetch(URL + "usuario/añadirEmpleado", {
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

	let btnEdit = document.getElementsByClassName("btn-edit");

	function Editar() {
		abrir();
		let idObj = this.getAttribute("id");
		let id = idObj.split("-");
		fetch(URL + "usuario/listarDatosUsuario", {
			method: "POST",
			body: id[1],
		})
			.then((response) => response.text())
			.then((response) => {
				pop_up_wrap_edit.innerHTML = response;
				for (let i = 0; i < cerrar_edit.length; i++) {
					cerrar_edit[i].addEventListener("click", () => {
						pop_up_edit.classList.remove("show");
						pop_up_wrap_edit.classList.remove("show");
					});
				}
				let btnEditarEmpleado = document.getElementById("editarEmpleado");
				let btnEditarCliente = document.getElementById("editarCliente");
				if (btnEditarCliente !== null) {
					btnEditarCliente.addEventListener("click", editarCliente, false);
				} else if (btnEditarEmpleado !== null) {
					btnEditarEmpleado.addEventListener("click", editarEmpleado, false);
				}
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
			fetch(URL + "usuario/editarEmpleado", {
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
			fetch(URL + "usuario/editarCliente", {
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

	let btnDelete = document.getElementsByClassName("btn-delete");

	function eliminarUser() {
		let idObj = this.getAttribute("id");
		let id = idObj.split("-");
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
				fetch(URL + "usuario/eliminarUsuarios", {
					method: "POST",
					body: id[1],
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
});
