var reporte_insumo_container = document.getElementById("reporte_insumo_container");
var reporte_insumo = document.getElementById("reporte_insumo");

var reporte_reserva_container = document.getElementById("reporte_reserva_container");
var reporte_reserva = document.getElementById("reporte_reserva");

var reporte_usuario_container = document.getElementById("reporte_usuario_container");
var reporte_usuario = document.getElementById("reporte_usuario");

function showPopup_add_insumo() {
	reporte_insumo.classList.add("show");
	reporte_insumo_container.classList.add("show");
}

function showPopup_add_reserva() {
	reporte_reserva.classList.add("show");
	reporte_reserva_container.classList.add("show");
}

function showPopup_add_usuario() {
	reporte_usuario.classList.add("show");
	reporte_usuario_container.classList.add("show");
}

var cerrar_add = document.getElementsByClassName("closePopup-add");

for (let i = 0; i < cerrar_add.length; i++) {
	cerrar_add[i].addEventListener("click", () => {
		reporte_insumo.classList.remove("show");
		reporte_insumo_container.classList.remove("show");
		reporte_reserva.classList.remove("show");
		reporte_reserva_container.classList.remove("show");
		reporte_usuario.classList.remove("show");
		reporte_usuario_container.classList.remove("show");
	});
}

mostrarCliente();

function mostrarCliente() {
	fetch("../../../models/admin/reservas/mostrarCliente.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			cliente.innerHTML = response;
		});
}

function generarReporteInsumo() {
	const fecha_inicio = document.getElementById("fecha_inicio_insumo");
	const fecha_final = document.getElementById("fecha_final_insumo");
	if (fecha_inicio.value == "") {
		Swal.fire({
			icon: "error",
			title: "Error",
			text: "La fecha inicio no puede estar vacia",
		});
	} else if (fecha_final.value == "") {
		Swal.fire({
			icon: "error",
			title: "Error",
			text: "La fecha final no puede estar vacia",
		});
	} else {
		fetch("../../../controller/pdf/generateReport.php", {
			method: "POST",
			body: new FormData(reporte_insumo),
		})
			.then((res) => res.text())
			.then((response) => {
				console.log(response);
				(window.location.href = "http://localhost/reservaya-mvc/" + response), "_blank";
			});
	}
}

function generarReporteReserva() {
	const fecha_inicio = document.getElementById("fecha_inicio_reserva");
	const fecha_final = document.getElementById("fecha_final_reserva");
	if (fecha_inicio.value == "") {
		Swal.fire({
			icon: "error",
			title: "Error",
			text: "La fecha inicio no puede estar vacia",
		});
	} else if (fecha_final.value == "") {
		Swal.fire({
			icon: "error",
			title: "Error",
			text: "La fecha final no puede estar vacia",
		});
	} else {
		fetch("../../../controller/pdf/generateReport.php", {
			method: "POST",
			body: new FormData(reporte_reserva),
		})
			.then((res) => res.text())
			.then((response) => {
				console.log(response);
				(window.location.href = "http://localhost/reservaya-mvc/" + response), "_blank";
			});
	}
}

function generarReporteUsuario() {
	const cliente = document.getElementById("cliente");
	if (cliente.value == "") {
		Swal.fire({
			icon: "error",
			title: "Error",
			text: "Debe seleccionar un cliente",
		});
	} else {
		fetch("../../../controller/pdf/generateReport.php", {
			method: "POST",
			body: new FormData(reporte_usuario),
		})
			.then((res) => res.text())
			.then((response) => {
				console.log(response);
				(window.location.href = "http://localhost/reservaya-mvc/" + response), "_blank";
			});
	}
}
