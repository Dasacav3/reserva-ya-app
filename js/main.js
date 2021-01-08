"use strict";

// Main Navbar Toggle

document.querySelector(".menu-btn").addEventListener("click", () => {
	document.querySelector(".nav-bar__nav-ul").classList.toggle("show");
});

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

ScrollReveal().reveal("#body", { delay: 300 });
