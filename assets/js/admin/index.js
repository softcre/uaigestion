const BASE_URL = 'http://localhost/uaigestion/api/';
const CARGANDO_HTML = `<div class="text-center text-primary my-4"><i class="fas fa-spinner fa-pulse fa-3x mb-3"></i><h6><b>Cargando ...</b></h6></div>`;

// DEFINICION DE TOAST (alert)
const Toast = Swal.mixin({
	toast: true,
	position: "top",
	showConfirmButton: false,
	timer: 6000,
});

//---------------------MUESTRA MENSAJE TOAST---------------------
function mostrarToast(icon, titulo, msj) {
	Toast.fire({
		icon: icon,
		title: titulo,
		text: msj,
	});
}

//-------------CARGA VISTA MODAL DE FORMULARIO (small)------------
function cargarFormSmall(metodo) {
	$.post(metodo, function (data) {
		$("#modal-small").html(data);
	}).fail(ajaxErrors);
}

//-------------CARGA VISTA MODAL DE FORMULARIO (large)------------
function cargarFormLarge(metodo) {
	$("#modal-large").html(CARGANDO_HTML);

	$.post(metodo, function (data) {
		$("#modal-large").html(data);
	}).fail(ajaxErrors);
}

//----------CARGA VISTA MODAL DE FORMULARIO (extra-large)---------
function cargarFormExtraLarge(metodo) {
	$("#modal-extra-large").html(CARGANDO_HTML);

	$.post(metodo, function (data) {
		$("#modal-extra-large").html(data);
	}).fail(ajaxErrors);
}

//------------------ALTA - MODIFICACION GENERAL------------------
function altaUpdate(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);

	$.ajax({
		url: e.target.action,
		method: "POST",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function () {
			btn.disabled = true;
			btn.children[0].classList.remove("d-none");
			btn.children[1].classList.add("d-none");
		},
		success: function (resp) {
			let data = JSON.parse(resp);

			if (data.status === "ok") {
				if (data.data.selector != undefined) {
					// solo cuando hay que recargar tablas
					let selector = data.data.selector.toLowerCase();
					$("#" + selector + "-main").html(data.data.view);
					formatoTabla('tbl' + data.data.selector); 
				}

				mostrarToast("success", data.title, data.msj);

				if (data.data.url != undefined) {
					setTimeout(() => (location.href = data.data.url), 1500);
				} else {
					$('#cerrarModal').click();
				}
			} else {
				mostrarErrors(data.title, data.errors);
			}
		},
		error: ajaxErrors,
		complete: function () {
			btn.disabled = false;
			btn.children[0].classList.add("d-none");
			btn.children[1].classList.remove("d-none");
		},
	});
}

//----------------CAMBIA EL ESTADO DE UN REGISTRO----------------
function bajaRegistro(e, metodo, titulo, msj) {
	Swal.fire({
		title: "¿" + titulo + "?",
		text: msj,
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: "#2c9faf",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sí!",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.value) {
			$.post(metodo, function (data) {
					if (data.status === 'ok') {
						mostrarToast("success", data.title, data.msj);
						$(e).closest("tr").fadeOut(1200);
					} else {
						mostrarErrors(data.title, data.errors);
					}
				},
				"json"
			).fail(ajaxErrors);
		}
	});
}

//----------------ABRIR VENTANA PARA CARGAR FOTO----------------
function abrirExplorer() {
	$('#ing-foto').click();
}

//--------------------------SUBIR FOTO--------------------------
function subirFoto(input) {
	if (validarFile(input)) return;

	if (input.files && input.files[0]) {
		let reader = new FileReader();

		reader.onload = function (e) {
			$("#foto").attr("src", e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}

//-----------------VALIDAR EXTENSION DE ARCHIVO-----------------
function validarFile(all) {
	$("#noFoto").addClass("d-none");
	//EXTENSIONES Y TAMANO PERMITIDO.
	let extensiones_permitidas = [".png", ".bmp", ".jpg", ".jpeg"];
	//let tamano = 8; // EXPRESADO EN MB.
	let rutayarchivo = all.value;
	let ultimo_punto = all.value.lastIndexOf(".");
	let extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
	if (rutayarchivo == "") return false;

	if (extensiones_permitidas.indexOf(extension.toLowerCase()) == -1) {
		$("#noFoto").removeClass("d-none");
		$("#noFoto > small").text("Extensión de archivo no valida");
		document.getElementById(all.id).value = "";
		setTimeout(function () {
			$("#noFoto").fadeOut(1500);
		}, 4000);
		return true; // Si la extension es no válida ya no chequeo lo de abajo.
	}
	// if ((all.files[0].size / 1048576) > tamano) {
	// 	alert("El archivo no puede superar los " + tamano + "MB");
	// 	document.getElementById(all.id).value = "";
	// 	return true;
	// }
	return false;
}

//---------------------DA FORMATO A TABLA---------------------
function formatoTabla(tabla) {
	return $("#" + tabla).DataTable({
		responsive: true,
		autoWidth: false,
		order: [],
		language: {
			processing: "Procesando...",
			search: "Buscar",
			lengthMenu: "Mostrar _MENU_ registros",
			info: "Desde _START_ a _END_ de _TOTAL_ registros",
			infoEmpty: "No existen datos",
			infoFiltered: "(Total filtrado de _MAX_ registros)",
			infoPostFix: "",
			loadingRecords: "Guardando...",
			zeroRecords: "Sin registros",
			emptyTable: "No hay datos disponibles",
			paginate: {
				first: "Inicio",
				previous: "Anterior",
				next: "Próximo",
				last: "Ultimo",
			},
			aria: {
				sortAscending: ": Activar para ordenar la columna en orden ascendente",
				sortDescending:
					": Activar para ordenar la columna en orden descendente.",
			},
		},
		initComplete: function () {
			// saber si la tabla esta definida
			if ($.fn.dataTable.isDataTable("#" + tabla)) {
				let objTabla = $("#" + tabla).DataTable();
				volverApagina(objTabla);
			}
		},
	});
}

//---------------VUELVE A PAGINA ESPECIFICA TABLE---------------
function volverApagina(tabla) {
	let pagina = localStorage.getItem("pagina_actual");

	// Preguntamos si existe el item
	if (pagina != undefined) {
		//Decimos a la table que cargue la página requerida
		tabla.page(parseInt(pagina)).draw("page");

		//Eliminamos el item para que no genere conflicto a la hora de dar click en otro botón detalle
		localStorage.removeItem("pagina_actual");
	}
}

//------------------------MUESTRA ERRORES------------------------
function mostrarErrors(titulo, errores) {
	let div = document.createElement("div");
	let ul = document.createElement("ul");

	for (let error in errores) {
		let li = document.createElement("li");
		let text = document.createTextNode(errores[error]);
		li.appendChild(text);
		ul.appendChild(li);
	}

	ul.style.setProperty("list-style", "none");
	ul.classList.add("p-0", "my-1");
	div.appendChild(ul);
	div.classList.add("alert", "alert-danger", "text-sm", "text-left", "py-1");

	Swal.fire({
		icon: "error",
		title: titulo,
		html: div,
		confirmButtonColor: "#5bc0de",
		confirmButtonText: "Aceptar",
	});
}

//------------------------ERRORES DE AJAX------------------------
function ajaxErrors(jqXHR, textStatus) {
	if (jqXHR.status === 0) {
		Swal.fire("Sin Conexion", "Verifique su conexion a internet!", "error");
	} else if (jqXHR.status == 404) {
		Swal.fire("Error (404)", "No se encontro la pagina solicitada!", "error");
	} else if (jqXHR.status == 500) {
		Swal.fire("Error (500)", "Hubo un Error en el Servidor!", "error");
	} else if (textStatus === "parsererror") {
		Swal.fire("Error", "Requested JSON parse failed.", "error");
	} else if (textStatus === "timeout") {
		Swal.fire("Error", "Time out error.", "error");
	} else if (textStatus === "abort") {
		Swal.fire("Error", "Ajax request aborted.", "error");
	} else {
		Swal.fire("Error", "Uncaught Error: " + jqXHR.responseText, "error");
	}
}