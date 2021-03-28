function listarUsuarios() {
	fetch("../../models/usuarios/listarUser.php", {
		method: "POST",
	})
		.then((response) => response.text())
		.then((response) => {
			usuarios.innerHTML = response;
		});
}

listarUsuarios();
