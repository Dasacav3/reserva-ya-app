"use strict";

import { URL } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {
	// Sidebar Toggle Codes;
	let sidebarOpen = false;
	let sidebar = document.getElementById("sidebar");
	let sidebarCloseIcon = document.getElementById("sidebarIcon");
	let btnNavbar = document.getElementById("nav_icon");

	if (btnNavbar) {
		btnNavbar.addEventListener("click", toggleSidebar, false);
	}

	if (sidebarCloseIcon) {
		sidebarCloseIcon.addEventListener("click", closeSidebar, false);
	}

	function toggleSidebar() {
		if (!sidebarOpen) {
			if (sidebar) {
				sidebar.classList.add("sidebar_responsive");
				sidebarOpen = true;
			}
		}
	}

	function closeSidebar() {
		if (sidebarOpen) {
			if (sidebar) {
				sidebar.classList.remove("sidebar_responsive");
				sidebarOpen = false;
			}
		}
	}

	changeActiveLinkAdmin();

	function changeActiveLinkAdmin() {
		let URLactual = window.location.href;
		let sidebar = document.getElementById("sidebar__menu");
		let links = sidebar.querySelectorAll(".sidebar__link");
		links.forEach((link) => {
			let a = link.querySelector("a");
			let ancla = a.textContent;
			if (
				(URLactual == URL + "admin" && ancla == "Inicio") ||
				(URLactual == URL + "admin#" && ancla == "Inicio")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/updateInfo" && ancla == "Actualizar información") ||
				(URLactual == URL + "admin/updateInfo#" && ancla == "Actualizar información")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/reservas" && ancla == "Reservaciones") ||
				(URLactual == URL + "admin/reservas#" && ancla == "Reservaciones")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/mesas" && ancla == "Mesas") ||
				(URLactual == URL + "admin/mesas#" && ancla == "Mesas")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/productos" && ancla == "Productos") ||
				(URLactual == URL + "admin/productos#" && ancla == "Productos")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/insumos" && ancla == "Insumos") ||
				(URLactual == URL + "admin/insumos#" && ancla == "Insumos")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/proveedores" && ancla == "Proveedores") ||
				(URLactual == URL + "admin/proveedores#" && ancla == "Proveedores")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/usuarios" && ancla == "Usuarios") ||
				(URLactual == URL + "admin/usuarios#" && ancla == "Usuarios")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/reportes" && ancla == "Reportes") ||
				(URLactual == URL + "admin/reportes#" && ancla == "Reportes")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "admin/soporte" && ancla == "Soporte") ||
				(URLactual == URL + "admin/soporte#" && ancla == "Soporte")
			) {
				link.classList.add("active_menu_link");
			}
		});
	}

	changeActiveLinkCliente();

	function changeActiveLinkCliente() {
		let URLactual = window.location.href;
		let sidebar = document.getElementById("sidebar__menu");
		let links = sidebar.querySelectorAll(".sidebar__link");
		links.forEach((link) => {
			let a = link.querySelector("a");
			let ancla = a.textContent;
			if (
				(URLactual == URL + "cliente" && ancla == "Inicio") ||
				(URLactual == URL + "cliente#" && ancla == "Inicio")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "cliente/updateInfo" && ancla == "Actualizar información") ||
				(URLactual == URL + "cliente/updateInfo#" && ancla == "Actualizar información")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "cliente/reservas" && ancla == "Reservaciones") ||
				(URLactual == URL + "cliente/reservas#" && ancla == "Reservaciones")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "cliente/soporte" && ancla == "Soporte") ||
				(URLactual == URL + "cliente/soporte#" && ancla == "Soporte")
			) {
				link.classList.add("active_menu_link");
			}
		});
	}

	changeActiveLinkEmpleado();

	function changeActiveLinkEmpleado() {
		let URLactual = window.location.href;
		let sidebar = document.getElementById("sidebar__menu");
		let links = sidebar.querySelectorAll(".sidebar__link");
		links.forEach((link) => {
			let a = link.querySelector("a");
			let ancla = a.textContent;
			if (
				(URLactual == URL + "empleado" && ancla == "Inicio") ||
				(URLactual == URL + "empleado#" && ancla == "Inicio")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "empleado/updateInfo" && ancla == "Actualizar información") ||
				(URLactual == URL + "empleado/updateInfo#" && ancla == "Actualizar información")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "empleado/reservas" && ancla == "Reservaciones") ||
				(URLactual == URL + "empleado/reservas#" && ancla == "Reservaciones")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "empleado/productos" && ancla == "Productos") ||
				(URLactual == URL + "empleado/productos#" && ancla == "Productos")
			) {
				link.classList.add("active_menu_link");
			} else if (
				(URLactual == URL + "empleado/soporte" && ancla == "Soporte") ||
				(URLactual == URL + "empleado/soporte#" && ancla == "Soporte")
			) {
				link.classList.add("active_menu_link");
			}
		});
	}
});
