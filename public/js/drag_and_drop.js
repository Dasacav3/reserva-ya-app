const dropArea = document.querySelector(".drag-area"),
	dragText = dropArea.querySelector("header"),
	icon = dropArea.querySelector(".icon"),
	button = dropArea.querySelector("button"),
	input = dropArea.querySelector("input"),
	img = dropArea.querySelector(".img"),
	enviar = document.querySelector("#enviar"),
	listar = document.querySelector("#listar"),
	actualizar = document.querySelector("#actualizar"),
	limpiar = document.querySelector("#limpiar");
let file;

button.onclick = () => {
	input.click();
};

input.addEventListener("change", function () {
	// Esta variable file es donde se almacena el archivo como un objeto
	file = this.files[0];
	dropArea.classList.add("active");
	showFile();
});

dropArea.addEventListener("dragover", (event) => {
	event.preventDefault();
	dropArea.classList.add("active");
	dragText.textContent = "Suelta para cargar tu imagen";
});

dropArea.addEventListener("dragleave", () => {
	dropArea.classList.remove("active");
	dragText.textContent = "Arrastra y suelta tu imagen";
});

dropArea.addEventListener("drop", (event) => {
	event.preventDefault();
	file = event.dataTransfer.files[0];
	// Mostrar archivo
	showFile();
});

// Esta funcion valida la extension de la imagen y la renderiza para insertarla por pantalla
function showFile() {
	let fileType = file.type;
	let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
	if (validExtensions.includes(fileType)) {
		let fileReader = new FileReader();
		fileReader.onload = () => {
			let fileURL = fileReader.result;
			var imgTag = `<img src="${fileURL}" alt="" id="foto">`;
			img.innerHTML = imgTag;
			dragText.classList.add("none");
			button.classList.add("none");
			icon.classList.add("none");
		};
		fileReader.readAsDataURL(file);
	} else {
		alert("This is not an Image File!");
		dropArea.classList.remove("active");
		dragText.textContent = "Arrastra y suelta tu imagen";
	}
}

limpiar.addEventListener("click", () => {
	let foto = document.getElementById('foto');
	img.removeChild(foto);
	dragText.classList.remove("none");
	button.classList.remove("none");
	icon.classList.remove("none");
	dropArea.classList.remove("active");
	dragText.textContent = "Arrastra y suelta tu imagen";
	file = "";
	
});
