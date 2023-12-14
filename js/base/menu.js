$(document).ready(function () {
$(document).on('click', '#cerrarses', function(event) {
    window.location.href="logout.php";
});
const dropdownTitle = document.querySelector('#MenuDrp');
$(document).on('click', '.btnquien', function(event) {
	window.location.href = "?op=conocenos";
});
$(document).on('click', '#mis_solicitudes', function(event) {
	window.location.href ="?op=solicitudes";
});
$(document).on('click', '#mis_usuarios', function(event) {
	window.location.href ="?op=usuarios";
});
$(document).on('click', '#logo', function(event) {
	window.location.href="?op=home";
});
//vincula listeners a estos elementos
dropdownTitle.addEventListener('click', toggleMenuDisplay);
});//ready
function toggleMenuDisplay(e) {
	const dropdown = e.currentTarget.parentNode;
	const menu = dropdown.querySelector('.menud');
	const menu_avatar = dropdown.querySelector('#MenuDrp');
	toggleClass(menu, 'hide');
}
function toggleClass(elem, className) {
	if (elem.className.indexOf(className) !== -1) {
		elem.className = elem.className.replace(className, '');
	} else {
		elem.className = elem.className.replace(/\s+/g, ' ') + ' ' + className;
	}

	return elem;
}