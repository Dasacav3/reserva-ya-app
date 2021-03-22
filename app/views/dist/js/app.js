$(document).ready(function () {
	console.log("jQuery is working");
	fetchReservas();

	$("#search-input").keyup(function (e) {
		if ($("#search-input").val()) {
			let search = $("#search-input").val();
			$.ajax({
				url: "../../../models/reservas/consultarReserva.php",
				type: "POST",
				data: { search },
				success: function (response) {
					let reservas = JSON.parse(response);
					let template = "";
					reservas.forEach((reserva) => {
						console.log(reserva);
						template += `
                        <tr reservaId="${reserva.id}">
                            <td></td>
                            <td>${reserva.estado_reservacion}</td>
                            <td>${reserva.id_reservacion}</td>
                            <td>${reserva.nombre_cliente}</td>
                            <td>${reserva.apellido_cliente}</td>
                            <td>${reserva.fecha_reservacion}</td>
                            <td>${reserva.hora_reservacion}</td>
                            <td>${reserva.numero_mesa}</td>
                        </tr>
                        `;
					});
					$("#reservas").html(template);
				},
			});
		}
	});

	$("#form-reserva").submit((e) => {
		e.preventDefault();
		const postData = {
			fecha: $("#fecha-reserva").val(),
			hora: $("#hora-reserva").val(),
			mesa: $("#numero-mesa").val(),
		};
		console.log(postData);
		// e.preventDefault();
		// const url = edit === false ? '../../../app/models/reservas/añadirReserva.php' : '../../../app/models/reservas/actualizarReserva.php';
		// console.log(postData, url);
		$.post("../../../models/reservas/añadirReserva.php", postData, (response) => {
			console.log(response);
			$("#form-reserva").trigger("reset");
		});
	});

	function fetchReservas() {
		$.ajax({
			url: "../../../models/reservas/listadoReserva.php",
			type: "GET",
			success: function (response) {
				console.log(response);
				const reservas = JSON.parse(response);
				let template = "";
				reservas.forEach((reserva) => {
					console.log(reserva);
					template += `
						<tr reservaId="${reserva.id_reservacion}">
							<td><input type="checkbox" name="" id="${reserva.id_reservacion}" class="reserva-checkbox" value="${reserva.id_reservacion}"></td>
							<td>${reserva.estado_reservacion}</td>
							<td>${reserva.id_reservacion}</td>
							<td>${reserva.nombre_cliente}</td>
							<td>${reserva.apellido_cliente}</td>
							<td>${reserva.fecha_reservacion}</td>
							<td>${reserva.hora_reservacion}</td>
							<td>${reserva.numero_mesa}</td>
						</tr>
					`;
				});
				$("#reservas").html(template);
			},
		});
	}
});
