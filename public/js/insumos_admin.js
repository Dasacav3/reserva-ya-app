const url = "http://192.168.213.129/";

// Modal añadir y editar
var pop_up_add = document.getElementById("pop-up-add");
var pop_up_add_categoria = document.getElementById("pop-up-add-categoria");
var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");
var pop_up_wrap_add_categoria = document.getElementById("pop_up_wrap_add_categoria");

var pop_up_edit = document.getElementById("pop-up-edit");
var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");

var abrir_add = document.getElementById("abrirPopup-add");
var abrir_add_categoria = document.getElementById("abrirPopup-add-categoria");

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

function showPopup_add_categoria() {
	pop_up_add_categoria.classList.add("show");
	pop_up_wrap_add_categoria.classList.add("show");
}

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

abrir_add.addEventListener("click", () => {
	showPopup_add();
});

abrir_add_categoria.addEventListener("click", () => {
	showPopup_add_categoria();
});

var cerrar_add = document.getElementById("closePopup-add");
var cerrar_edit = document.getElementById("closePopup-edit");
var cerrar_add_category = document.getElementById("closePopup-add-category");

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

cerrar_edit.addEventListener("click", () => {
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
});

cerrar_add_category.addEventListener("click", () => {
	pop_up_add_categoria.classList.remove("show");
	pop_up_wrap_add_categoria.classList.remove("show");
});

var pop_up_edit_categoria = document.getElementById("pop-up-edit-categoria");
var pop_up_wrap_edit_categoria = document.getElementById("pop_up_wrap_edit_categoria");
var cerrar_edit_category = document.getElementById("closePopup-edit-category");
var abrir_edit_category = document.getElementById("abrirPopup-edit-categoria");

abrir_edit_category.addEventListener("click", () => {
	showPopup_edit_categoria();
});

function showPopup_edit_categoria() {
	pop_up_edit_categoria.classList.add("show");
	pop_up_wrap_edit_categoria.classList.add("show");
}

cerrar_edit_category.addEventListener("click", () => {
	pop_up_edit_categoria.classList.remove("show");
	pop_up_wrap_edit_categoria.classList.remove("show");
});

// Peticiones fetch

listarInsumos();
mostrarProveedor();
mostrarCategoria();

function mostrarProveedor() {
	fetch(URL + "insumo/listarProveedor", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			proveedor.innerHTML = response;
		});
}

function mostrarCategoria() {
	fetch(URL + "insumo/listarCategoria", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			categoria_add.innerHTML = response;
			categoria_edit.innerHTML = response;
		});
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
						<td> ${item[i].ID_INSUMO}  </td>
						<td> ${item[i].NOMBRE_INSUMO}  </td>
						<td> ${item[i].CANTIDAD_INSUMO}  </td>
						<td> ${item[i].FECHA_COMPRA_INSUMO}  </td>
						<td> ${item[i].VALOR_INSUMO}  </td>
						<td> ${item[i].ID_PROVEEDOR}  </td>
						<td> ${item[i].ID_CATEGORIA_INSUMO}  </td>
						<td>
                        <button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('${item[i].ID_INSUMO}');abrir()><i class='fas fa-edit'></i></button>
                        <button class='btn-delete' type='button' onclick=eliminarInsumos('${item[i].ID_INSUMO}')><i class='fas fa-trash-alt'></i></button>
                        </td>
					</tr>`;
		wrapper.innerHTML = output;
	}
}

function listarInsumos(search) {
	fetch(URL + "insumo/listarInsumos", {
		method: "POST",
		body: search,
	})
		.then((response) => response.json())
		.then((response) => {
			paginationTable(response);
		});
}

registrar.addEventListener("click", () => {
	const nombre_insumo = document.getElementById("nombre");
	const cantidad_insumos = document.getElementById("cantidad");
	const fecha_compra = document.getElementById("add_fecha_compra");
	const valor = document.getElementById("add_valor");
	const proveedor = document.getElementById("proveedor");
	const id_categoria = document.getElementById("categoria_add");

	if (
		nombre_insumo.value == "" &&
		cantidad_insumos.value == "" &&
		fecha_compra.value == "" &&
		valor.value == "" &&
		proveedor.value == "" &&
		id_categoria.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	} else if (nombre_insumo.value < 0 || nombre_insumo.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre del insumo no puede estar vacia",
			icon: "error",
		});
	} else if (cantidad_insumos.value < 0 || cantidad_insumos.value == "") {
		Swal.fire({
			title: "Error",
			text: "La cantidad de insumos no puede estar vacio",
			icon: "error",
		});
	} else if (fecha_compra.value == "") {
		Swal.fire({
			title: "Error",
			text: "La fecha de compra no puede estar vacio",
			icon: "error",
		});
	} else if (valor.value < 0 || valor.value == "") {
		Swal.fire({
			title: "Error",
			text: "El valor del insumo no puede estar vacio",
			icon: "error",
		});
	} else if (proveedor.value < 0 || proveedor.value == "") {
		Swal.fire({
			title: "Error",
			text: "El proveedor no puede estar vacio",
			icon: "error",
		});
	} else if (id_categoria.value < 0 || id_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "La categoria no puede estar vacio",
			icon: "error",
		});
	} else {
		async function añadirInsumos() {
			try {
				console.time("tasks time");
				const add = await fetch(URL + "insumo/añadirInsumo", {
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
						listarInsumos();
						mostrarCategoria();
						pop_up_add.classList.remove("show");
						pop_up_wrap_add.classList.remove("show");
					});

				console.timeEnd("tasks time");
			} catch (err) {
				console.log(err);
			}
		}

		añadirInsumos();
	}
});

registrarCategoria.addEventListener("click", () => {
	const nombre_categoria = document.getElementById("nombreCategoria");

	if (nombre_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	} else if (nombre_categoria.value < 0 || nombre_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre de la categoria no puede estar vacia",
			icon: "error",
		});
	} else {
		async function anadirCategoria() {
			try {
				console.time("tasks time");
				const add = await fetch(URL + "insumo/añadirCategoriaInsumo", {
					method: "POST",
					body: new FormData(pop_up_wrap_add_categoria),
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
						pop_up_wrap_add_categoria.reset();
						pop_up_add_categoria.classList.remove("show");
						pop_up_wrap_add_categoria.classList.remove("show");
						mostrarCategoria();
						mostrarProveedor();
					});

				console.timeEnd("tasks time");
			} catch (err) {
				console.log(err);
			}
		}
		anadirCategoria();
	}
});

editarCategoria.addEventListener("click", () => {
	let id_categoria = document.getElementById("idCategoriaInsumo");
	const nombre_categoria = document.getElementById("nombreCategoria_edit");

	if (nombre_categoria.value == "" && id_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	} else if (nombre_categoria.value < 0 || nombre_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre de la categoria no puede estar vacia",
			icon: "error",
		});
	} else {
		async function actualizarCategoria() {
			try {
				console.time("tasks time");
				const add = await fetch(URL + "insumo/editarCategoriaInsumo", {
					method: "POST",
					body: new FormData(pop_up_wrap_edit_categoria),
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
						pop_up_wrap_edit_categoria.reset();
						pop_up_edit_categoria.classList.remove("show");
						pop_up_wrap_edit_categoria.classList.remove("show");
						mostrarCategoria();
						mostrarProveedor();
					});

				console.timeEnd("tasks time");
			} catch (err) {
				console.log(err);
			}
		}
		actualizarCategoria();
	}
});

function Editar(id) {
	fetch(URL + "insumo/listarDatosInsumo", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			console.log(response);
			id_insumo.value = response.ID_INSUMO;
			nombreEditar.value = response.NOMBRE_INSUMO;
			cantidadEditar.value = response.CANTIDAD_INSUMO;
			add_fecha_compra_editar.value = response.FECHA_COMPRA_INSUMO;
			add_valor_Editar.value = response.VALOR_INSUMO;
			proveedorEditar.value = response.ID_PROVEEDOR;
			categoriaEditar.value = response.ID_CATEGORIA_INSUMO;
		});
}

edit.addEventListener("click", function () {
	const id_insumo = document.getElementById("id_insumo");
	const nombre_insumo = document.getElementById("nombreEditar");
	const cantidad_insumos = document.getElementById("cantidadEditar");
	const fecha_compra = document.getElementById("add_fecha_compra_editar");
	const valor = document.getElementById("add_valor_Editar");
	const proveedor = document.getElementById("proveedorEditar");
	const id_categoria = document.getElementById("categoriaEditar");

	if (
		id_insumo.value == "" &&
		nombre_insumo.value == "" &&
		cantidad_insumos.value == "" &&
		fecha_compra.value == "" &&
		valor.value == "" &&
		proveedor.value == "" &&
		id_categoria.value == ""
	) {
		Swal.fire({
			title: "Error",
			text: "Diligencia todos los campos",
			icon: "error",
		});
	} else if (nombre_insumo.value < 0 || nombre_insumo.value == "") {
		Swal.fire({
			title: "Error",
			text: "El nombre del insumo no puede estar vacia",
			icon: "error",
		});
	} else if (cantidad_insumos.value < 0 || cantidad_insumos.value == "") {
		Swal.fire({
			title: "Error",
			text: "La cantidad de insumos no puede estar vacio",
			icon: "error",
		});
	} else if (fecha_compra.value == "") {
		Swal.fire({
			title: "Error",
			text: "La fecha de compra no puede estar vacio",
			icon: "error",
		});
	} else if (valor.value < 0 || valor.value == "") {
		Swal.fire({
			title: "Error",
			text: "El valor del insumo no puede estar vacio",
			icon: "error",
		});
	} else if (proveedor.value < 0 || proveedor.value == "") {
		Swal.fire({
			title: "Error",
			text: "El proveedor no puede estar vacio",
			icon: "error",
		});
	} else if (id_categoria.value < 0 || id_categoria.value == "") {
		Swal.fire({
			title: "Error",
			text: "La categoria no puede estar vacio",
			icon: "error",
		});
	} else {
		fetch(URL + "insumo/editarInsumos", {
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
					listarInsumos();
					pop_up_edit.classList.remove("show");
					pop_up_wrap_edit.classList.remove("show");
				}
			});
	}
});

function eliminarInsumos(id) {
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
			fetch(URL + "insumo/eliminarInsumos", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					listarInsumos();
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
		listarInsumos();
	} else {
		listarInsumos(valor);
	}
});
