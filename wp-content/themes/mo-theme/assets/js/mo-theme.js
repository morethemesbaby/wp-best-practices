/**
 * Javascript functions for the Mo Theme
 */


// Click on the hamburger menu
var menuHamburgerClick = function(ID) {
	var menuHamburger = document.querySelector('.header-menu-hamburger');
	var menuMain = document.querySelector('.header-menu');

	function onViewChange(event) {
		menuMain.classList.toggle('header-menu--closed');
		menuHamburger.classList.toggle('header-menu-hamburger--closed');
		event.stopPropagation();
	}

	menuHamburger.addEventListener('click', onViewChange, false);
}


// Run functions once the document is ready
document.addEventListener('DOMContentLoaded', function(){
	if (document.querySelector('.header-menu-hamburger')) {
		menuHamburgerClick('.header-menu-hamburger');
	}
}, false);