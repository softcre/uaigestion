var paramPage = {
	page: 1,
	limit: 5,
	ua_id: null,
	aa_id: null,
	search: "",
	order: "asc",
	order_by: "id_observacion"
}

//----------------------OBTENER AREAS AUDITADAS - NUEVO----------------------
function getAreasAuditadas(id = "") {
	let unidadAcademica_id = $("#unidad_academica").val();
	let areaAuditada = $("#area_auditada");
	areaAuditada.empty();
	areaAuditada.append(
		'<option disabled selected value="0">Seleccione un area auditada</option>'
	);

	if (unidadAcademica_id == 0) return;

	obtenerAA(unidadAcademica_id, areaAuditada, id);
}

//---------------------------OBTENER AREAS AUDITADAS---------------------------
function getAreasAuditadasList() {
	let unidadAcademica_id = $("#ua_busq").val();
	let areaAuditada = $("#aa_busq");
	areaAuditada.empty();
	areaAuditada.append('<option selected value="">TODAS</option>');

	if (areaAuditada == 0) return;

	paramPage.ua_id = unidadAcademica_id;
	loadObs()
	obtenerAA(unidadAcademica_id, areaAuditada);
}

//---------------------------OBTENER AREAS AUDITADAS---------------------------
function obtenerAA(unidadAcademica_id, areaAuditada, id = "") {
	$.post(
		BASE_URL + "areas-auditadas/getByUnidadAcademica",
		{
			unidadAcademica_id: unidadAcademica_id,
		},
		function (data) {
			if (data.status === "ok") {
				//segmento.prop("disabled", false);
				data.data.forEach((ele) => {
					let selec = id == ele.id_area_auditada ? "selected" : "";

					areaAuditada.append(
						"<option value=" + ele.id_area_auditada +" " + selec + ">" + ele.nombre_aa + "</option>"
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