const showPopupBtn = document.querySelector(".login-btn");
const hidePopupBtn = document.querySelector(".form-popup .close-btn");
const formPopup = document.querySelector(".form-popup");
const menuBtn = document.querySelector(".menu-btn");
const hideMenuBtn = document.querySelector(".close-btn");
const navbarMenu = document.querySelector(".navbar .links");
const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");

menuBtn.addEventListener("click",() => {
navbarMenu.classList.toggle("show-menu");
});

hideMenuBtn.addEventListener("click", () => menuBtn.click())

//show
showPopupBtn.addEventListener("click", () => {
	document.body.classList.toggle("show-popup");
});
//hide
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

loginSignupLink.forEach(link => {
	link.addEventListener("click", (e) => {
		e.preventDefault();
		formPopup.classList[link.id === "signup-link" ? 'add' : 'remove']("show-signup"); 
	});
});




