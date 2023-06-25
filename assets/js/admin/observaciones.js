var paramPage = {
	page: 1,
	limit: 5,
	ua_id: null,
	secre_id: null,
	aa_id: null,
	search: "",
	order: "asc",
	order_by: "id_observacion"
}

//----------------MSJ DE ERROR AL INTENTAR DESCARGAR ARCHIVO----------------
function errorDescarga() {
	mostrarToast('error', 'Error', 'No se pudo encontrar la ruta del archivo');
}

//----------------------OBTENER AREAS AUDITADAS - NUEVO----------------------
function getAreasAuditadas(id_sec = "", id_aa = "") {
	let secretaria_id = $("#secretaria").val();
	let areaAuditada = $("#area_auditada");
	areaAuditada.empty();
	areaAuditada.append(
		'<option disabled selected value="0">Seleccione un area auditada</option>'
	);

	if (secretaria_id == null) secretaria_id = id_sec;
	if (secretaria_id =='') return;

	obtenerAA(secretaria_id, areaAuditada, id_aa);
}

//---------------------------OBTENER AREAS AUDITADAS---------------------------
function getAreasAuditadasList() {
	let secretaria_id = $("#secretaria_busq").val();
	let areaAuditada = $("#aa_busq");

	paramPage.secre_id = secretaria_id;

	if (secretaria_id != '' && document.getElementById('secretaria_busq').type != 'hidden') {
		initSelect(areaAuditada);
		obtenerAA(secretaria_id, areaAuditada);
	} 
	else if (secretaria_id == '') {
		initSelect(areaAuditada);
	}

	loadObs();
}

//---------------------------OBTENER AREAS AUDITADAS---------------------------
function obtenerAA(secretaria_id, areaAuditada, id = "") {
	$.post(
		BASE_URL + "areas-auditadas/getBySecretaria",
		{
			secretaria_id: secretaria_id,
		},
		function (response) {
			if (response.status === "ok") {
				let selec;
				
				if (id == '' && response.data.selected != null) {
					areaAuditada.empty();
					selec = response.data.selected;
				}
				
				response.data.areasAuditadas.forEach((ele) => {
					if (id != '') {
						selec = (id == ele.id_area_auditada) ? "selected" : "";
					}
					areaAuditada.append(
						"<option value=" + ele.id_area_auditada +" " + selec + ">" + ele.nombre_aa + "</option>"
					);
				});
			}
		},
		"json"
	).fail(ajaxErrors);
}

//------------------------OBTENER SECRETARIAS - NUEVO------------------------
function getSecretarias(id = "") {
	let unidadAcademica_id = $("#unidad_academica").val();
	let secretaria = $("#secretaria");
	let area_auditada = $("#area_auditada");
	secretaria.empty();
	secretaria.append(
		'<option disabled selected value="0">Seleccione una secretaría</option>'
	);

	if (unidadAcademica_id =='') return;

	initSelect(area_auditada, 'Seleccione un área auditada');
	obtenerSecretarias(unidadAcademica_id, secretaria, id);
}

//------------------------OBTENER SECRETARIAS BUSQUEDA------------------------
function getSecretariasList() {
	let unidadAcademica_id = $("#ua_busq").val();
	let secretaria = $("#secretaria_busq");
	let areaAuditada = $("#aa_busq");

	paramPage.ua_id = unidadAcademica_id;

	if (unidadAcademica_id != '' && document.getElementById('ua_busq').type != 'hidden') {
		initSelect(secretaria);
		obtenerSecretarias(unidadAcademica_id, secretaria);
	} 
	else if (unidadAcademica_id == '') {
		initSelect(secretaria);
		initSelect(areaAuditada);
	}

	loadObs();
}

//----------------------------OBTENER SECRETARIAS----------------------------
function obtenerSecretarias(unidadAcademica_id, secretaria, id = "") {
	$.post(
		BASE_URL + "secretarias/getByUnidadAcademica",
		{
			unidadAcademica_id: unidadAcademica_id,
		},
		function (response) {
			if (response.status === "ok") {
				let selec = '';
				
				if (id == '' && response.data.selected != null) {
					secretaria.empty();
					selec = response.data.selected;
				}
				
				response.data.secretarias.forEach((ele) => {
					if (id != '') {
						selec = (id == ele.id_secretaria) ? "selected" : "";
					}
					secretaria.append(
						"<option value=" + ele.id_secretaria +" " + selec + ">" + ele.nombre_secretaria + "</option>"
					);
				});
			}
		},
		"json"
	).fail(ajaxErrors);
}

//-----------------------------CREAR OBSERVACION-----------------------------
function addObservacion(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);

	$.ajax({
		url: BASE_URL + "observaciones/crear",
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
		success: function (response) {
			let data = JSON.parse(response);

			if (data.status === "ok") {
				mostrarToast("success", data.title, data.msj);
				e.target.reset(); // setea form
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

//----------------------------ACTUALIZAR OBSERVACION----------------------------
function updateObservacion(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);

	$.ajax({
		url: BASE_URL + "observaciones/actualizar",
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
		success: function (response) {
			let data = JSON.parse(response);

			if (data.status === "ok") {
				loadObs($('#nro_page').val());
				mostrarToast("success", data.title, data.msj);
				$("#cerrarModal").click();
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

//---------------------ACTUALIZAR ESTADO DE LA OBSERVACION---------------------
function updateEstadoObs(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);

	$.ajax({
		url: BASE_URL + "observaciones/actualizar-estado",
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
		success: function (response) {
			let data = JSON.parse(response);

			if (data.status === "ok") {
				loadObs($('#nro_page').val());
				mostrarToast("success", data.title, data.msj);
				$("#cerrarModal").click();
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

//---------------------------BUSQUEDA DE OBSERVACIONES----------------------------
$("#form-search").submit(function (event) {
	/*$('#btn-del-girl').attr("disabled", true);*/
	// var parametros = $(this).serialize();
	loadObs();
	event.preventDefault();
});

// $(".select-show .dropdown-menu").find("a").click(function (e) {
// 	e.preventDefault();
// 	//var param = $(this).attr("href").replace("#", "");
// 	paramPage.total_list = $(this).attr("href").replace("#", "");
// 	var concept = $(this).text();
// 	$("#spn-list-show").html(concept);
// 	total_list = param;
// 	loadObs(1);
// });

//---------------------------OBTENIENE LAS OBSERVACIONES---------------------------
function loadObs(page = 1) {
	paramPage.page = page;
	paramPage.search = $("#txt-search").val();
	paramPage.aa_id = $("#aa_busq").val();

	$.ajax({
		type: "POST",
		url: BASE_URL + "observaciones/load",
		method: "POST",
		dataType: "JSON",
		data: paramPage,
		beforeSend: function () {
			$("#observaciones-main").html(CARGANDO_HTML);
		},
		success: function (response) {
			$("#observaciones-main").html(response.data.view);
		},
		error: ajaxErrors
	});
}

//-----------------------------CREAR OBSERVACION-----------------------------
function addAccionEncarada(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);

	$.ajax({
		url: BASE_URL + "acciones/crear",
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
		success: function (response) {
			let data = JSON.parse(response);

			if (data.status === "ok") {
				loadAcciones(data.data.observacion_id);
				mostrarToast("success", data.title, data.msj);
				//e.target.reset(); // setea form
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

//---------------------OBTENIENE LAS ACCIONES ENCARADAS---------------------
function loadAcciones(observacion_id) {
	$.ajax({
		type: "POST",
		url: BASE_URL + "acciones/load",
		method: "POST",
		dataType: "JSON",
		data: {
			observacion_id: observacion_id
		},
		beforeSend: function () {
			$("#acciones-main").html(CARGANDO_HTML);
		},
		success: function (response) {
			$("#acciones-main").html(response.data.view);
		},
		error: ajaxErrors
	});
}

//---------------------MARCA COMO LEIDA UNA OBSERVACION---------------------
function marcarObsyAccionesLeidas(id_obs) {
	let leidoObs = document.getElementById('leido-obs-' + id_obs);
	let leidoAcciones = document.getElementById('leido-acc-' + id_obs);
  
	if (leidoObs) {
    leidoObs.style.display = 'none';
	}
	if (leidoAcciones) {
    leidoAcciones.style.display = 'none';
	}
}

//---------------------------INICIALIZA UN SELECT---------------------------
function initSelect(ele, nombre = "TODAS") {
	ele.empty();
	ele.append('<option selected value="">' + nombre + '</option>');
}

// $("#extra-large").on("hidden.bs.modal", function () {
// 	// Aquí va el código a disparar en el evento
// 	//console.log('cerrando modal');
// 	loadObs($('#nro_page').val());
// });
function cerrarModalExtraLarge() {
	// $('#extra-large').modal('toggle');
	$('#extra-large').modal('hide');
}