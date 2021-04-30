"use strict";

// Sidebar Toggle Codes;
var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");
var sidebarCloseIcon = document.getElementById("sidebarIcon");

function toggleSidebar() {
	if (!sidebarOpen) {
		sidebar.classList.add("sidebar_responsive");
		sidebarOpen = true;
	}
}

function closeSidebar() {
	if (sidebarOpen) {
		sidebar.classList.remove("sidebar_responsive");
		sidebarOpen = false;
	}
}

changeActiveLinkAdmin();

function changeActiveLinkAdmin() {
	var URLactual = window.location.href;
	var sidebar = document.getElementById("sidebar__menu");
	var links = sidebar.querySelectorAll(".sidebar__link");
	links.forEach((link) => {
		var a = link.querySelector("a");
		var ancla = a.textContent;
		if (URLactual == "http://localhost/reservaya-mvc/admin" && ancla == "Inicio") {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/updateInfo" &&
			ancla == "Actualizar información"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/reservas" &&
			ancla == "Reservaciones"
		) {
			link.classList.add("active_menu_link");
		} else if (URLactual == "http://localhost/reservaya-mvc/admin/mesas" && ancla == "Mesas") {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/productos" &&
			ancla == "Productos"
		) {
			link.classList.add("active_menu_link");
		} else if (URLactual == "http://localhost/reservaya-mvc/admin/insumos" && ancla == "Insumos") {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/proveedores" &&
			ancla == "Proveedores"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/usuarios" &&
			ancla == "Usuarios"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/admin/informacion" &&
			ancla == "Información"
		) {
			link.classList.add("active_menu_link");
		} else if (URLactual == "http://localhost/reservaya-mvc/admin/soporte" && ancla == "Soporte") {
			link.classList.add("active_menu_link");
		}
	});
}

changeActiveLinkCliente();

function changeActiveLinkCliente() {
	var URLactual = window.location.href;
	var sidebar = document.getElementById("sidebar__menu");
	var links = sidebar.querySelectorAll(".sidebar__link");
	links.forEach((link) => {
		var a = link.querySelector("a");
		var ancla = a.textContent;
		if (URLactual == "http://localhost/reservaya-mvc/cliente" && ancla == "Inicio") {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/cliente/updateInfo" &&
			ancla == "Actualizar información"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/cliente/reservas" &&
			ancla == "Reservaciones"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/cliente/soporte" &&
			ancla == "Soporte"
		) {
			link.classList.add("active_menu_link");
		}
	});
}

changeActiveLinkEmpleado();

function changeActiveLinkEmpleado() {
	var URLactual = window.location.href;
	var sidebar = document.getElementById("sidebar__menu");
	var links = sidebar.querySelectorAll(".sidebar__link");
	links.forEach((link) => {
		var a = link.querySelector("a");
		var ancla = a.textContent;
		if (URLactual == "http://localhost/reservaya-mvc/empleado" && ancla == "Inicio") {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/empleado/updateInfo" &&
			ancla == "Actualizar información"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/empleado/reservas" &&
			ancla == "Reservaciones"
		) {
			link.classList.add("active_menu_link");
		} else if (
			URLactual == "http://localhost/reservaya-mvc/empleado/productos" &&
			ancla == "Productos"
		) {
			link.classList.add("active_menu_link");
		} else if (URLactual == "http://localhost/reservaya-mvc/empleado/soporte" && ancla == "Soporte") {
			link.classList.add("active_menu_link");
		}
	});
}
