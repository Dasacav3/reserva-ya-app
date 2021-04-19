function paginationTable(list_items) {
	const list_element = document.getElementById("table_elements");
	const pagination_element = document.getElementById("pagination");

	let current_page = 1;
	let rows = 5;

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
}
