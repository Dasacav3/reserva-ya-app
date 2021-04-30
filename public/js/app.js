function loginUser() {
	fetch("http://localhost/reservaya-mvc/app/models/loginUser.php", {
		method: "POST",
		body: new FormData(form),
	})
		.then((response) => response.text())
		.then((response) => {
			console.log(response);
			if (response.trim() == "administrador") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/admin";
				});
			} else if (response.trim() == "empleado") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/empleado";
				});
			} else if (response.trim() == "cliente") {
				Swal.fire({
					title: "Ingreso exitoso",
					icon: "success",
					showConfirmButton: false,
					timer: 1500,
				}).then(() => {
					window.location = "http://localhost/reservaya-mvc/cliente";
				});
			} else if (response.trim() == "usuario o contraseña incorrecto") {
				Swal.fire({
					title: "Vuelve a intentarlo",
					text: "Usuario o contraseña incorrectos",
					icon: "error",
					showConfirmButton: false,
					timer: 1500,
				});
			} else if (response.trim() == "el usuario no esta activo en el sistema") {
				Swal.fire({
					title: "Su usuario no esta activo en el sistema",
					text: "Comunicate con el administrador, si consideras que es un error",
					icon: "error",
					showConfirmButton: false,
					timer: 1500,
				});
			} else {
				Swal.fire({
					title: "Este usuario no existe",
					text: "Comunicate con el administrador, para obtener mas información",
					icon: "error",
					showConfirmButton: false,
					timer: 1500,
				});
			}
			form.reset();
		});
}

// Actualización automatica de estado de reserva
function updateStateReserva() {
	fetch("http://localhost/reservaya-mvc/app/controller/reservas/reservasEstado.php", {
		method: "POST",
	})
		.then((res) => res.text())
		.then((response) => {
			console.log(response);
		});
}

// Modo oscuro

const btnSwitch = document.querySelector("#switch");
btnSwitch.addEventListener("click", () => {
	document.body.classList.toggle("dark");
	btnSwitch.classList.toggle("active");

	// Guardamos el modo en localstorage.
	if (document.body.classList.contains("dark")) {
		localStorage.setItem("dark-mode", "true");
	} else {
		localStorage.setItem("dark-mode", "false");
	}
});

// Obtenemos el modo actual.
if (localStorage.getItem("dark-mode") === "true") {
	document.body.classList.add("dark");
	btnSwitch.classList.add("active");
} else {
	document.body.classList.remove("dark");
	btnSwitch.classList.remove("active");
}

// Contador de inactividad

function Counter(options) {
	var timer;
	var instance = this;
	var segundos = options.seconds || 10;
	var seconds = options.seconds || 10;
	var onUpdateStatus = options.onUpdateStatus || function () {};
	var onCounterEnd = options.onCounterEnd || function (seconds) {};
	var onCounterStart = options.onCounterStart || function () {};

	function decrementCounter() {
		onUpdateStatus(seconds);
		if (seconds === 0) {
			stopCounter();
			onCounterEnd(seconds);
			return;
		}
		seconds--;
	}

	function startCounter() {
		onCounterStart();
		clearInterval(timer);
		timer = 0;
		decrementCounter();
		timer = setInterval(decrementCounter, 1000);
	}

	function stopCounter() {
		clearInterval(timer);
	}

	function updateCounter() {
		seconds = segundos;
	}

	return {
		start: function () {
			startCounter();
		},
		stop: function () {
			stopCounter();
		},
		update: function () {
			updateCounter();
		},
	};
}
var countdown = new Counter({
	// number of seconds to count down
	seconds: 600,

	onCounterStart: function () {},

	// callback function for each second
	onUpdateStatus: function (second) {
		// console.log(second);
	},

	// callback function for final action after countdown
	onCounterEnd: function (seconds) {
		alert("Sesión expirada por inactividad");
		top.location.href = "http://localhost/reservaya-mvc/app/models/logout.php";
	},
});
