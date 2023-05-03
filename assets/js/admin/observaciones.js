
//----------------------OBTENER SEGMENTOS----------------------
function getAreasAuditadas(id = '') {
	let unidadAcademica_id = $('#unidad_academica').val();
	let areaAuditada = $('#area_auditada');
	areaAuditada.empty();
	areaAuditada.append('<option disabled selected value="0">Seleccione un area auditada</option>');

	if (unidadAcademica_id == 0) return;

	obtenerAA(unidadAcademica_id, areaAuditada, id);
};

function getAreasAuditadasList() {
	let unidadAcademica_id = $('#ua_busq').val();
	let areaAuditada = $('#aa_busq');
	areaAuditada.empty();
	areaAuditada.append('<option selected value="">TODAS</option>');

	if (areaAuditada == 0) return;

	obtenerAA(unidadAcademica_id, areaAuditada);
};

function obtenerAA(unidadAcademica_id, areaAuditada, id = '') {
	$.post(BASE_URL + 'api/areas-auditadas/getByUnidadAcademica', {
		unidadAcademica_id: unidadAcademica_id
	}, function (data) {
		if (data.status === "ok") {
      //segmento.prop("disabled", false);
			data.data.forEach(ele => {
				let selec = (id == ele.id_area_auditada) ? 'selected' : '';

				areaAuditada.append('<option value=' + ele.id_area_auditada + ' ' + selec + '>' + ele.nombre_aa + '</option>');
			});
		}
	}, 'json').fail(ajaxErrors);
}


//------------------ALTA - MODIFICACION GENERAL------------------
function addObservacion(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);
	
	$.ajax({
		url: BASE_URL + 'api/observaciones/crear',
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
				/*
				if (data.data.selector != undefined) {
					// solo cuando hay que recargar tablas
					let selector = data.data.selector.toLowerCase();
					$("#" + selector + "-main").html(data.data.view);
					formatoTabla('tbl' + data.data.selector); 
				}
				*/

				mostrarToast("success", data.title, data.msj);
				e.target.reset();
				// if (data.data.url != undefined) {
				// 	setTimeout(() => (location.href = data.data.url), 1500);
				// } else {
				// 	$('#cerrarModal').click();
				// }
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


//------------------ALTA - MODIFICACION GENERAL------------------
function updateObservacion(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	const btnName = "btnForm" + e.target.name;
	const btn = document.getElementById(btnName);
	
	$.ajax({
		url: BASE_URL + 'api/observaciones/actualizar',
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
				/*
				if (data.data.selector != undefined) {
					// solo cuando hay que recargar tablas
					let selector = data.data.selector.toLowerCase();
					$("#" + selector + "-main").html(data.data.view);
					formatoTabla('tbl' + data.data.selector); 
				}
				*/

				mostrarToast("success", data.title, data.msj);
				$('#cerrarModal').click();
				// if (data.data.url != undefined) {
				// 	setTimeout(() => (location.href = data.data.url), 1500);
				// } else {
				// 	$('#cerrarModal').click();
				// }
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

function getObservaciones(e) {
	e.preventDefault();
	const formData = new FormData(e.target);
	let btnBuscar = document.getElementById("btnFormPage");

	$.ajax({
		url: BASE_URL + 'api/observaciones/getByAreaAuditada',
		method: "POST",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		beforeSend: function () {
			btnBuscar.disabled = true;
			btnBuscar.children[0].classList.remove("d-none");
			btnBuscar.children[1].classList.add("d-none");
		},
		success: function (resp) {
			let data = JSON.parse(resp);

			if (data.status === "ok") {
				$("#observaciones-main").html(data.data.view);
				formatoTabla("tblObservaciones");
			}
		},
		error: ajaxErrors,
		complete: function () {
			btnBuscar.disabled = false;
			btnBuscar.children[0].classList.add("d-none");
			btnBuscar.children[1].classList.remove("d-none");
		},
	});
}