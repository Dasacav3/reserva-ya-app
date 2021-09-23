"use strict";

import { URL } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	const datatable = $(".datatable").DataTable({
		responsive: true,
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
		},
		ajax: {
			url: URL + "proveedor/listarProveedor",
			type: "POST",
			dataSrc: "",
		},

		columns: [
			{
				data: "ID_PROVEEDOR",
			},
			{
				data: "NOMBRE_PROVEEDOR",
			},
			{
				data: "DIRECCION_PROVEEDOR",
			},
			{
				data: "PERSONA_ENCARGADA",
			},
			{
				data: "TELEFONO_PROVEEDOR",
			},
			{
				data: "ID_PROVEEDOR",
				render: function (data, type, row, meta) {
					return `
						<a>
							<button class="btn-edit hola" data-id='${data}'><i class='fas fa-edit'></i></button>
						</a>
						<a href="${URL}app/models/admin/proveedores/eliminaprov2.php?id=${data}" class="prueba">
							<button class="btn-delete"><i class='fas fa-trash-alt'></i></button>
						</a>
						`;
				},
			},
		],
		drawCallback: function () {
			enableBtns();
		},
	});

	setInterval(function () {
		enableBtns();
	}, 1000);

	function enableBtns() {
		let btnAbrirPopup = document.getElementById("btn-abrir-popup"),
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
			let id = this.dataset.id;
			console.log(id);
			fetch(URL + "proveedor/obtenerProveedor", {
				method: "POST",
				body: id,
			})
				.then((req) => req.json())
				.then((res) => {
					console.log(res);
					$("#identificador").val(res.ID_PROVEEDOR);
					$("#nombre_prov").val(res.NOMBRE_PROVEEDOR);
					$("#direccion_prov").val(res.DIRECCION_PROVEEDOR);
					$("#persona_encargada").val(res.PERSONA_ENCARGADA);
					$("#telefono_prov").val(res.TELEFONO_PROVEEDOR);
				});
			overlayEdit.classList.add("active");
			popupEdit.classList.add("active");
		});

		btnCerrarPopupEdit.addEventListener("click", function (e) {
			e.preventDefault();
			overlayEdit.classList.remove("active");
			popupEdit.classList.remove("active");
		});

		$(".prueba").on("click", function (e) {
			e.preventDefault();
			const LINK = $(this).attr("href");
			Swal.fire({
				title: "¿Deseas Eliminar?",
				text: "Esta acción no se puede revertir",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Aceptar",
				cancelButtonText: "Cancelar",
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire("Eliminado", "El proveedor ha sido eliminado", "success");
				}
				if (result.value) {
					document.location.href = LINK;
				}
			});
		});
	}
});
