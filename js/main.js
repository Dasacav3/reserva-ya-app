var navSmoothScroll = () => {
	var navbarLinks = document.querySelector(".nav-bar-link");

	for (let n in navbarLinks) {
		if (navbarLinks.hasOwnProperty(n)) {
			navbarLinks[n].addEventListener("click", (e) => {
				e.preventDefault();
                document.querySelector(navbarLinks[n].hash)
                .scrollIntoView({
					behavior: "smooth",
				});
			});
		}
	}
};

navSmoothScroll();

ScrollReveal().reveal('.body', { duration: 600, delay: 500, easing: 'cubic-bezier(0.5, 0, 0, 1)' });