"use strict";

export const URL = "http://localhost/reservaya-mvc/";

// Actualización automatica de estado de reserva
export function updateStateReserva() {
	fetch(URL + "app/controller/reservas/reservasEstado.php", {
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
		});
}
