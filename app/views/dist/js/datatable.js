// function listarReservas(search) {
// 	fetch("../../../models/admin/reservas/listarReserva.php", {
// 		method: "POST",
// 		body: search,
// 	})
// 		.then((response) => response.json())
// 		.then((response) => {
// 			const list_items = response;

function paginationTable(list_items) {
	const list_element = document.getElementById("reservas");
	const pagination_element = document.getElementById("pagination");

	let current_page = 1;
	let rows = 5;

	function DisplayList(items, wrapper, rows_per_page, page) {
		wrapper.innerHTML = "";
		page--;

		let start = rows_per_page * page;
		let end = start + rows_per_page;
		let paginatedItems = items.slice(start, end);

		var output = "";
		for (let i = 0; i < paginatedItems.length; i++) {
			var item = new Array();
			item[i] = paginatedItems[i];
			output += `
						<tr>
							<td> ${item[i].ESTADO_RESERVACION}  </td>
							<td> ${item[i].ID_RESERVACION}  </td>
							<td> ${item[i].NOMBRE_CLIENTE}  </td>
							<td> ${item[i].APELLIDO_CLIENTE}  </td>
							<td> ${item[i].FECHA_RESERVACION}  </td>
							<td> ${item[i].HORA_RESERVACION}  </td>
							<td> ${item[i].ID_MESA}  </td>
							<td> ${item[i].ID_RESERVACION}  </td>
							<td>`;
			if (item[i].ESTADO_RESERVACION === "Activa") {
				output += `<button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('${item[i].ID_RESERVACION_RESERVA_MESA}');abrir()><i class='fas fa-edit'></i></button>`;
			}
			output += `<button class='btn-delete' type='button' onclick=eliminarReserva('${item[i].ID_RESERVACION_RESERVA_MESA}')><i class='fas fa-trash-alt'></i></button>
								</td>   
						</tr>`;
			wrapper.innerHTML = output;
		}
	}

	function SetupPaginations(items, wrapper, rows_per_page) {
		wrapper.innerHTML = "";

		let page_count = Math.ceil(items.length / rows_per_page);
		for (let i = 1; i <= page_count; i++) {
			let btn = PaginationButton(i, items);
			wrapper.appendChild(btn);
		}
	}

	function PaginationButton(page, items) {
		let button = document.createElement("button");
		button.innerText = page;

		if (current_page == page) button.classList.add("active");

		button.addEventListener("click", () => {
			current_page = page;
			DisplayList(items, list_element, rows, current_page);

			let current_btn = document.querySelector(".pagenumbers button.active");
			current_btn.classList.remove("active");

			button.classList.add("active");
		});

		return button;
	}

	DisplayList(list_items, list_element, rows, current_page);
	SetupPaginations(list_items, pagination_element, rows);
	// });
}
// }
