function updateStateReserva() {
	fetch("../../../controller/reservas/reservasEstado.php", {
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
		});
}
