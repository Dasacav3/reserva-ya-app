// Modal
var pop_up_add = document.getElementById("pop-up-add");
var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

var pop_up_edit = document.getElementById("pop-up-edit");
var pop_up_wrap_edit = document.getElementById("pop-up-wrap-edit");

var abrir_add = document.getElementById("abrirPopup-add");
var abrir_edit = document.getElementById("abrirPopup-edit");

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

abrir_edit.addEventListener("click", () => {
	showPopup_edit();
});

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

function listarReservas() {
	fetch("../../models/reservas/listarReserva.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
		});
}

registrar.addEventListener("click", () => {
	fetch("../../models/reservas/añadirReserva.php", {
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
			}
		});
});
