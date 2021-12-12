"use strict";

export const URL = window.location.origin + '/';

// Actualización automatica de estado de reserva
export function updateStateReserva() {
	fetch(URL + "reserva/updateEstadoReserva", {
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
		});
}
