var pop_up_add = document.getElementById("pop-up-add");
var pop_up_wrap_add = document.getElementById("pop_up_wrap_add");

function showPopup_add() {
	pop_up_add.classList.add("show");
	pop_up_wrap_add.classList.add("show");
}

var cerrar_add = document.getElementById("closePopup-add");

cerrar_add.addEventListener("click", () => {
	pop_up_add.classList.remove("show");
	pop_up_wrap_add.classList.remove("show");
});

// function generarReporteInsumo() {}

function generarReporteReserva() {
	fetch("../../../controller/pdf/generateReport.php", {
		method: "POST",
		body: new FormData(pop_up_wrap_add),
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
			window.location.href = "http://localhost/reservaya-mvc/"+response,"_blank";
		});
}
