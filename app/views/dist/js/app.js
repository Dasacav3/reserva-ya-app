function loginUser() {
	fetch("../models/loginUser.php", {
		method: "POST",
		body: new FormData(form),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response == "administrador") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/app/views/admin/dashboard.php";
				});
			} else if (response == "empleado") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/app/views/empleado/dashboard.php";
				});
			} else if (response == "cliente") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/app/views/cliente/dashboard.php";
				});
			} else if (response == "usuario o contraseña incorrecto") {
				Swal.fire({
					title: 'Vuelve a intentarlo',
					text: 'Usuario o contraseña incorrectos',
					icon: 'error',
					showConfirmButton: false,
					timer: 1500,
				})
			}else if (response == "el usuario no esta activo en el sistema") {
				Swal.fire({
					title: 'Su usuario no esta activo en el sistema',
					text: 'Comunicate con el administrador, si consideras que es un error',
					icon: 'error',
					showConfirmButton: false,
					timer: 1500,
				})
			}else {
				Swal.fire({
					title: 'Este usuario no existe',
					text: 'Comunicate con el administrador, para obtener mas información',
					icon: 'error',
					showConfirmButton: false,
					timer: 1500,
				});
			}
			form.reset();
		});
}

function updateStateReserva() {
	fetch("../../../controller/reservas/reservasEstado.php", {
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
		});
}
