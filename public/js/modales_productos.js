window.addEventListener("DOMContentLoaded", () => {
	// Agregar categoria
	const popupAdd = document.getElementById("pop-up-add");
	const add_category = document.getElementById("add_category");
	const form_categoria = document.getElementById("form_categoria");
	const cerrar_categoria = document.getElementById("cerrar_categoria");

	add_category.addEventListener("click", () => {
		form_categoria.classList.add("show");
		popupAdd.classList.add("show");
	});

	cerrar_categoria.addEventListener("click", () => {
		form_categoria.classList.remove("show");
		popupAdd.classList.remove("show");
	});

	// Editar categoria
	const popupEdit = document.getElementById("pop-up-edit");
	const update_category = document.getElementById("update_category");
	const edit_category = document.getElementById("edit_category");
	const cerrar_actualizacion_categoria = document.getElementById("cerrar_actualizacion_categoria");

	update_category.addEventListener("click", () => {
		popupEdit.classList.add("show");
		edit_category.classList.add("show");
	});

	cerrar_actualizacion_categoria.addEventListener("click", () => {
		edit_category.classList.remove("show");
		popupEdit.classList.remove("show");
	});
	// Agregar producto
	const container_add_product = document.getElementById("container_add_product");
	const add_product = document.getElementById("add_product");
	const form_add_product = document.getElementById("form_add_product");
	const close_add_product = document.getElementById("close_add_product");

	add_product.addEventListener("click", () => {
		container_add_product.classList.add("show");
		form_add_product.classList.add("show");
	});

	close_add_product.addEventListener("click", () => {
		container_add_product.classList.remove("show");
		form_add_product.classList.remove("show");
	});

	// Editar producto
	const container_edit_product = document.getElementById("container_edit_product");
	const form_edit_product = document.getElementById("form_edit_product");
	const Button_close_edit_product = document.getElementById("Button_close_edit_product");
	Button_close_edit_product.addEventListener("click", () => {
		container_edit_product.classList.remove("show");
		form_edit_product.classList.remove("show");
	});

	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		drawCallback: function () {
			enableBtns();
		},
	});

	let btnEdit = document.getElementsByClassName("actualizar_producto");

	setInterval(function () {
		enableBtns(); // user paging is not reset on reload
	}, 1000);

	function enableBtns() {
		for (let i = 0; i < btnEdit.length; i++) {
			btnEdit[i].addEventListener("click", llenarmodal, false);
		}
	}

	// Traer datos ventana modal editar
	function llenarmodal() {
		container_edit_product.classList.add("show");
		form_edit_product.classList.add("show");
		let TraerDatos = this.dataset.id;
		let datos = TraerDatos.split("||");
		$("#ID_EDIT_PRODUCT").val(datos[0]);
		$("#NOMBRE_PRODUCTO_Editar").val(datos[1]);
		$("#DESCRIPCION_PRODUCTO_Editar").val(datos[2]);
		$("#CANTIDAD_PRODUCTO_Editar").val(datos[3]);
		$("#VALOR_PRODUCTO_Editar").val(datos[4]);
	}
});
