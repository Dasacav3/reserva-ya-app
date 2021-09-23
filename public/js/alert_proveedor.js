// $(".prueba").on("click", function (e) {
// 	e.preventDefault();
// 	const LINK = $(this).attr("href");
// 	Swal.fire({
// 		title: "¿Deseas Eliminar?",
// 		text: "Esta acción no se puede revertir",
// 		icon: "warning",
// 		showCancelButton: true,
// 		confirmButtonColor: "#3085d6",
// 		cancelButtonColor: "#d33",
// 		confirmButtonText: "Aceptar",
// 		cancelButtonText: "Cancelar",
// 	}).then((result) => {
// 		if (result.isConfirmed) {
// 			Swal.fire("Eliminado", "El proveedor ha sido eliminado", "success");
// 		}
// 		if (result.value) {
// 			document.location.href = LINK;
// 		}
// 	});
// });
