// Modal
var pop_up_add = document.getElementById("pop-up-add");
var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

var pop_up_edit = document.getElementById("pop-up-edit");
var pop_up_wrap_edit = document.getElementById("pop_up_wrap_edit");

var abrir_add = document.getElementById("abrirPopup-add");
// var abrir_edit = document.getElementById("abrirPopup-edit");

var abrir_edit = document.getElementsByClassName('abrirPopup-edit');

function abrir(){
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

function showPopup_edit() {
	pop_up_edit.classList.add("show");
	pop_up_wrap_edit.classList.add("show");
}

abrir_add.addEventListener("click", () => {
	showPopup_add();
});

// abrir_edit.addEventListener("click", () => {
// 	showPopup_edit();
// });

var cerrar_add = document.getElementById("closePopup-add");
var cerrar_edit = document.getElementById("closePopup-edit");

cerrar_add.addEventListener('click', () =>{
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
})

cerrar_edit.addEventListener('click', () =>{
	pop_up_edit.classList.remove("show");
	pop_up_wrap_edit.classList.remove("show");
})

		
		
// Peticiones fetch

listarReservas();
mostrarCliente();
mostrarMesa();

function listarReservas(search) {
	fetch("../../../models/admin/reservas/listarReserva.php", {
		method: "POST",
		body: search	
	})
		.then((response) => response.text())
		.then((response) => {
			reservas.innerHTML = response;
		});
}

function mostrarCliente(){
	fetch("../../../models/admin/reservas/mostrarCliente.php", {
		method: "POST"	
	})
		.then((response) => response.text())
		.then((response) => {
			cliente.innerHTML = response;
		});
}

function mostrarMesa(){
	fetch("../../../models/admin/reservas/mostrarMesa.php", {
		method: "POST"	
	})
		.then((response) => response.text())
		.then((response) => {
			mesa.innerHTML = response;
		});
}

registrar.addEventListener("click", () => {
	fetch("../../../models/admin/reservas/añadirReserva.php", {
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
				pop_up_wrap_add.reset();
				listarReservas();
			}
		});
});

function Editar(id) {
	fetch("../../../models/admin/reservas/actualizarReserva.php", {
		method: "POST",
		body: id,
	})
		.then((response) => response.json())
		.then((response) => {
			id_reserva.value = response.ID_RESERVACION;
			cliente1.value = response.ID_CLIENTE;
			estado.value = response.ESTADO_RESERVACION;
			edit_fecha_reserva.value = response.FECHA_RESERVACION;
			edit_hora_reserva.value = response.HORA_RESERVACION;
			edit_mesa.value = response.ID_MESA;
			edit_asientos.value = response.ASIENTO;
		});
}

edit.addEventListener("click", () => {
	fetch("../../../models/admin/reservas/editarReserva.php",{
		method: "POST",
		body: new FormData(pop_up_wrap_edit)
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
				listarReservas();
			}
		})
});

function eliminarReserva(id) {
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
			fetch("../../../models/admin/reservas/eliminarReserva.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					console.log(response);
					listarReservas();
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

search_input.addEventListener("keyup", () =>{
	const valor = search_input.value;
	if(valor == ""){
		listarReservas();
	}else{
		listarReservas(valor)
	}
});