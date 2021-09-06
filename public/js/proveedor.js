window.addEventListener("DOMContentLoaded", () => {
	var btnAbrirPopup = document.getElementById("btn-abrir-popup"),
		overlay = document.getElementById("overlay"),
		popup = document.getElementById("popup"),
		btnCerrarPopup = document.getElementById("btn-cerrar-popup"),
		overlayEdit = document.getElementById("overlay-edit"),
		popupEdit = document.getElementById("popup-edit"),
		btnCerrarPopupEdit = document.getElementById("btn-cerrar-popup-edit");

	btnAbrirPopup.addEventListener("click", function () {
		overlay.classList.add("active");
		popup.classList.add("active");
	});

	btnCerrarPopup.addEventListener("click", function (e) {
		e.preventDefault();
		overlay.classList.remove("active");
		popup.classList.remove("active");
	});

	$(".hola").on("click", function () {
		overlayEdit.classList.add("active");
		popupEdit.classList.add("active");
	});

	btnCerrarPopupEdit.addEventListener("click", function (e) {
		e.preventDefault();
		overlayEdit.classList.remove("active");
		popupEdit.classList.remove("active");
	});

	function llenarmodal(traerDatos) {
		datos = traerDatos.split("||");
		$("#identificador").val(datos[0]);
		$("#nombre_prov").val(datos[1]);
		$("#direccion_prov").val(datos[2]);
		$("#persona_encargada").val(datos[3]);
		$("#telefono_prov").val(datos[4]);
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
				data: "0",
			},
			{
				data: "1",
			},
			{
				data: "2",
			},
			{
				data: "3",
			},
			{
				data: "4",
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
		datatable.ajax.reload(null, false); // user paging is not reset on reload
	}, 50000);
});
