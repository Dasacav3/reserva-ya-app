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
