window.addEventListener("DOMContentLoaded", () => {
	const URL = "http://localhost/reservaya-mvc/";
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

	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		ajax: {
			url: URL + "insumo/listarInsumos",
			headers: { Accept: "application/json" },
			type: "POST",
			crossDomain: true,
			dataSrc: "",
		},

		columns: [
			{
				data: "ID_INSUMO",
			},
			{
				data: "NOMBRE_INSUMO",
			},
			{
				data: "CANTIDAD_INSUMO",
			},
			{
				data: "FECHA_COMPRA_INSUMO",
			},
			{
				data: "VALOR_INSUMO",
			},
			{
				data: "ID_CATEGORIA_INSUMO",
			},
			{
				data: "ID_PROVEEDOR",
			},
			{
				data: "ID_INSUMO",
			},
		],
		deferRender: true,
		columnDefs: [
			{
				targets: -1,
				data: "ID_INSUMO",
				render: function (data, type, row, meta) {
					return (
						"<button class='abrirPopup-edit btn-edit' data-id='" +
						data +
						"'><i class='fas fa-edit'></i></button><button class='btn-delete' data-id='" +
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

	function enableBtns() {
		let btnEdit = document.getElementsByClassName("btn-edit");
		let btnDelete = document.getElementsByClassName("btn-delete");

		for (let i = 0; i < btnEdit.length; i++) {
			btnEdit[i].addEventListener("click", abrir, false);
			btnEdit[i].addEventListener("click", Editar, false);
		}

		for (let i = 0; i < btnDelete.length; i++) {
			btnDelete[i].addEventListener("click", eliminarInsumos, false);
		}
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

	function Editar() {
		let id = this.dataset.id;
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
						pop_up_edit.classList.remove("show");
						pop_up_wrap_edit.classList.remove("show");
					}
				});
		}
	});

	function eliminarInsumos() {
		let id = this.dataset.id;
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
});
