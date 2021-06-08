const popupAdd = document.getElementById("pop-up-add");
const add_category = document.getElementById("add_category");
const form_categoria = document.getElementById("form_categoria");
const cerrar_categoria = document.getElementById("cerrar_categoria");

add_category.addEventListener("click", () => {
	form_categoria.classList.add("show");
	popupAdd.classList.add("show");
});

cerrar_categoria.addEventListener("click", () => {
	form_categoria.classList.remove("show");
	popupAdd.classList.remove("show");
});


const popupEdit = document.getElementById("pop-up-edit");
const update_category = document.getElementById("update_category");
const edit_category = document.getElementById("edit_category");
const cerrar_actualizacion_categoria = document.getElementById("cerrar_actualizacion_categoria");

update_category.addEventListener("click", () => {
	popupEdit.classList.add("show");
	edit_category.classList.add("show1");
});

cerrar_actualizacion_categoria.addEventListener("click", () => {
	edit_category.classList.remove("show1");
	popupEdit.classList.remove("show");
});
