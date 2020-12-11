var urlParams = new URLSearchParams(window.location.search);
var editVal = urlParams.get('edit');
$.getJSON('http://evera.challenge.trinom.io/api/courses', function(data) {
	var ele = document.getElementById('checkboxForm');
	for (var i = 0; i < data.length; i++) {
	
		ele.innerHTML += '<div class="col s4 cbox"><p><label><input type="checkbox" name="' + data[i].id + '" id="' + data[i].id + '" value="yes"/><span>' + data[i].name + '</span></label></p></div>'
	}
	
	ele.innerHTML += '<br><a onclick="enviarAJson();" class="waves-effect waves-light btn nicebtn objpadding cyan darken-1">Subir</a>'

	loadData();
	
	var elem = document.getElementById('preloader')
	elem.parentNode.removeChild(elem);
});

function enviarAJson() {
	var first_name = document.getElementById("text").value;
	var last_name = document.getElementById("surname").value;
	var email = document.getElementById("email").value;
	var selected_courses = [];
	var amountOfObjects;

	if (!($("#checkboxForm input:checkbox:checked").length > 0)) {
		M.toast({
			html: '¡No introduciste ningún curso!',
			classes: 'rounded'
		});
		return;
	}

	var dateObj = new Date();
	var curTime = dateObj.toISOString();
	var jsonObj = {
		'id': 0,
		'first_name': first_name,
		'last_name': last_name,
		'email': email,
		'created_at': curTime,
		'updated_at': curTime,
		'courses': []
	}

	$.getJSON('http://evera.challenge.trinom.io/api/courses', function(data) {

		amountOfObjects = data.length;
		for (var i = 0; i < amountOfObjects; i++) {
			selected_courses[i] = document.getElementById(data[i].id).checked;
		}

		for (var i = 0; i < data.length; i++) {
			if (selected_courses[i] == true) {
				jsonObj.courses.push({
					'id': (i + 1),
					'name': 'placeholder',
					'language_code': 'ph',
					'level_id': 0,
					'created_at': curTime,
					'updated_at': curTime,
					'level': {
						'id': 0,
						'name': 'placeholder'
					},
					'language': {
						'code': 'placeholder',
						'name': 'placeholder'
					}
				})
			}
		}

		if (editVal == "true") {
			var peoplesId = urlParams.get('id');
			var url = "http://evera.challenge.trinom.io/api/peoples/" + peoplesId;
			var peoplesType = "PUT";
			var peoplesTerm = "actualizado";
		} else {
			var url = "http://evera.challenge.trinom.io/api/peoples";
			var peoplesType = "POST";
			var peoplesTerm = "subido";
		}
		$.ajax({
			url: url,
			type: peoplesType,
			data: JSON.stringify(jsonObj),
			contentType: "application/json",
			dataType: 'json',
			error: function(xhr, status, error) {
				console.log(error);
				errores = JSON.parse(xhr.responseText);
				for (var key in errores.errors) {
					for (var error in errores.errors[key]) {
						switch (errores.errors[key][error]) {
							case "The first name field is required.":
								M.toast({
									html: "Se requiere escribir el usuario.",
									classes: 'rounded'
								});
								break;
							case "The last name field is required.":
								M.toast({
									html: "Se requiere la contraseña.",
									classes: 'rounded'
								});
								break;
							case "The email field is required.":
								M.toast({
									html: "Se requiere escribir el rango.",
									classes: 'rounded'
								});
								break;
							default:
								M.toast({
									html: errores.errors[key][error],
									classes: 'rounded'
								});
								break;
						}
					}
				}
			},
			success: function() {
				var toastHTML = '<span>¡Tu entrada se ha ' + peoplesTerm + ' con éxito!</span><a href="./index.html"><button class="btn-flat toast-action">Mirar</button></a>';
				M.toast({
					html: toastHTML,
					classes: 'rounded'
				});
			}
		});
	});
}

function loadData() {
	if (editVal == "true") {
		var first = document.getElementById('text');
		var last = document.getElementById('surname');
		var email = document.getElementById('email');
		var courseArray = JSON.parse(urlParams.get('courses'));

		first.value = urlParams.get('first_name');
		last.value = urlParams.get('last_name');
		email.value = urlParams.get('email');

		$("input:checkbox").each(function() {
			if ($(this).attr('id') != undefined) {
				for (j=0; j<courseArray.length; j++) {
					if ($(this).attr('id') == courseArray[j]) {
						$(this).prop('checked', true);
					}
				}
			}
		});
	}
}

function esModificar() {
	if (editVal == "true") {
		document.title = "Modificar persona - APIHook";
		var title = document.getElementById('mainTitle');
		title.innerHTML = "Modificar una persona"
	}
}

$(document).ready(function() {
	esModificar();
});