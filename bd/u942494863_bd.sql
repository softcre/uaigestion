-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-05-2023 a las 23:13:16
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u942494863_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_auditadas`
--

CREATE TABLE `areas_auditadas` (
  `id_area_auditada` int(11) NOT NULL,
  `ua_id` int(11) NOT NULL,
  `nombre_aa` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas_auditadas`
--

INSERT INTO `areas_auditadas` (`id_area_auditada`, `ua_id`, `nombre_aa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dirección de Gestión Económico Financiera', '2023-05-08 19:27:01', NULL, NULL),
(2, 1, 'Tesorería', '2023-05-08 19:27:01', NULL, NULL),
(3, 1, 'Dirección Gestión de Estudios', '2023-05-08 19:27:01', NULL, NULL),
(4, 1, 'Secretaría académica', '2023-05-08 19:27:01', NULL, NULL),
(5, 2, 'General', '2023-05-08 19:27:01', NULL, NULL),
(6, 3, 'General', '2023-05-08 19:27:01', NULL, NULL),
(7, 4, 'General', '2023-05-08 19:27:01', NULL, NULL),
(8, 5, 'General', '2023-05-08 19:27:01', NULL, NULL),
(9, 6, 'General', '2023-05-08 19:27:01', NULL, NULL),
(10, 7, 'General', '2023-05-08 19:27:01', NULL, NULL),
(11, 8, 'General', '2023-05-08 19:27:01', NULL, NULL),
(12, 9, 'General', '2023-05-08 19:27:01', NULL, NULL),
(13, 10, 'Dirección de Gestión y Desarrollo de Personas', '2023-05-08 19:27:01', NULL, NULL),
(14, 10, 'Dirección de Gestión Económico Financiera', '2023-05-08 19:27:01', NULL, NULL),
(15, 10, 'Dirección de Gestión Académica', '2023-05-08 19:27:01', NULL, NULL),
(16, 10, 'Dirección de Gestión de Estudios', '2023-05-08 19:27:01', NULL, NULL),
(17, 11, 'General', '2023-05-08 19:27:01', NULL, NULL),
(18, 12, 'General', '2023-05-08 19:27:01', NULL, NULL),
(19, 13, 'General', '2023-05-08 19:27:01', NULL, NULL),
(20, 14, 'General', '2023-05-08 19:27:01', NULL, NULL),
(21, 15, 'General', '2023-05-08 19:27:01', NULL, NULL),
(22, 16, 'General', '2023-05-08 19:27:01', NULL, NULL),
(23, 17, 'General', '2023-05-08 19:27:01', NULL, NULL),
(24, 18, 'General', '2023-05-08 19:27:01', NULL, NULL),
(25, 19, 'General', '2023-05-08 19:27:01', NULL, NULL),
(26, 20, 'General', '2023-05-08 19:27:01', NULL, NULL),
(28, 22, 'Dirección de Gestión Económico Financiera', '2023-05-08 19:27:01', NULL, NULL),
(29, 22, 'Dirección Gestión de Estudios', '2023-05-08 19:27:01', NULL, NULL),
(30, 23, 'General', '2023-05-08 19:27:01', NULL, NULL),
(31, 24, 'General', '2023-05-08 19:27:01', NULL, NULL),
(32, 10, 'Secretaría de Investigación y Posgrado', '2023-05-11 14:23:32', '2023-05-11 14:22:46', NULL),
(37, 21, 'Dirección Gestión Administrativa', '2023-05-11 14:29:06', '2023-05-11 14:27:54', NULL),
(38, 21, 'Dirección Económico Financiera', '2023-05-11 14:29:06', '2023-05-11 14:27:54', NULL),
(39, 22, 'Dirección Gestión Académica', '2023-05-11 14:32:34', '2023-05-11 14:32:01', NULL),
(40, 22, 'Secretaría de Postgrado', '2023-05-11 14:33:55', '2023-05-11 14:33:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervenciones`
--

CREATE TABLE `intervenciones` (
  `id_intervencion` bigint(20) NOT NULL,
  `observacion_id` bigint(20) NOT NULL,
  `descripcion_intervencion` text NOT NULL,
  `fecha_intervencion` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` bigint(20) NOT NULL,
  `area_auditada_id` int(11) NOT NULL,
  `impacto_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `fecha_observacion` date NOT NULL,
  `proyecto` varchar(255) NOT NULL,
  `nro_informe_uai` varchar(150) NOT NULL,
  `detalle_observacion` text NOT NULL,
  `fecha_seguimiento` date NOT NULL,
  `detalle_recomendacion` text NOT NULL,
  `area_involucrada` varchar(255) DEFAULT NULL,
  `responsable_implementacion` varchar(255) DEFAULT NULL,
  `fecha_estimada_reg` date DEFAULT NULL,
  `leido` int(11) NOT NULL,
  `usuario_creater` int(11) NOT NULL,
  `usuario_updater` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observacion`, `area_auditada_id`, `impacto_id`, `estado_id`, `plan_id`, `fecha_observacion`, `proyecto`, `nro_informe_uai`, `detalle_observacion`, `fecha_seguimiento`, `detalle_recomendacion`, `area_involucrada`, `responsable_implementacion`, `fecha_estimada_reg`, `leido`, `usuario_creater`, `usuario_updater`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, 3, 1, 7, '2014-11-03', 'Movimiento de Fondos y Valores', '38/2014', 'Los agentes que intervienen en el proceso no tienen asignación formal de sus funciones.', '2017-12-31', 'Definir y aprobar formalmente un manual de procedimientos administrativos que contemple la totalidad de los circuitos administrativos y de control interno que se emplean en los movimientos de fondos y valores, definiendo además  claramente las tareas, actividades y procedimientos de control interno de cada uno de los agentes de las áreas intervinientes', NULL, NULL, NULL, 1, 3, NULL, '2023-05-11 13:57:05', NULL, NULL),
(2, 14, 2, 1, 8, '2015-12-21', 'Compras y Contrataciones', '48/2015', 'La Facultad carece de un procedimiento y/o circuito administrativo formalmente definido para el proceso de compras y contrataciones que contenga los controles a realizar en cada una de las intervenciones.', '2016-08-31', 'Elaborar Manual de Circuitos y Procedimientos Administrativos que defina en forma precisa y clara las responsabilidades y funciones de las áreas intervinientes y determine el procedimiento de generación, ejecución y control de las operaciones administrativas para el proceso de compras y contrataciones.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-11 14:03:07', NULL, NULL),
(3, 14, 2, 1, 8, '2015-12-21', 'Compras y Contrataciones', '48/2015', 'En los expedientes Nros. 09-2014-04833, 09-2014-05900, 09-2014-02740 y 09-2014-06177 la fecha de la constancia de imputación del compromiso es posterior a la fecha de la orden de compra.', '2016-08-31', 'Corregir mediante el procedimiento administrativo que corresponda.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-11 15:15:52', NULL, NULL),
(4, 14, 2, 1, 8, '2015-12-21', 'Compras y Contrataciones', '48/2015', 'No se verifica constancia de la intervención de la Comisión de Recepción en el expediente Nº 09-2014-02740, orden de compra Nº 76.', '2016-08-31', 'Corregir mediante el procedimiento administrativo que corresponda.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-12 15:59:58', NULL, NULL),
(5, 16, 2, 1, 8, '2015-06-05', 'Otorgamiento de Títulos', '18/2015', 'Ausencia de manual de procedimientos y/o circuito administrativo debidamente aprobado por autoridad competente, en el área de  la Secretaría Académica.', '2022-09-15', 'Se deberá definir y aprobar un manual de procedimiento y/o circuito administrativo en  el área auditada, con definición específica de las tareas, actividades y responsabilidades de cada agente, que si bien ésta UAI constató la existencia de documentos internos que se aplican para la tramitación de títulos, es necesario dictar un reglamento en donde se establezcan los criterios fundamentales y los límites de acción de cada sector de la organización, detallándose en los mismos los pasos a cumplir por los diferentes sectores de manera que los operadores puedan tener una guía eficaz sobre cómo proceder para el logro del objetivo.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-15 16:36:49', NULL, NULL),
(6, 32, 2, 1, 8, '2015-06-05', 'Otorgamiento de Titulos', '18/2015', 'Ausencia de manual de procedimientos y/o circuito administrativo debidamente aprobado por autoridad competente, en el área de la Secretaría de Investigación y Posgrado.', '2022-09-15', 'Se deberá definir y aprobar un manual de procedimiento y/o circuito administrativo en el área auditada, con definición específica de las tareas, actividades y responsabilidades de cada agente.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 11:43:28', NULL, NULL),
(7, 16, 2, 1, 8, '2015-06-05', 'Otorgamiento de Titulos', '18/2015', 'Se detectaron los siguientes defectos formales en los legajos de alumnos de Grado: \r\na) No se encuentran debidamente foliados, por ejemplo los Legajos Nº 11127, 9551, 11271, 11308, 13528, 13106,12663, 11373, 10358, 12859, 11741, 6491, 14520, 13394, 12151, 13069. \r\nLas actas de examen de los alumnos de Grado: \r\na) Falta la aclaración de firma de los docentes del tribunal examinador, como por ejemplo en el acta Nº J-19/604. \r\nb) Las actas de examen originales se encuentran físicamente en el área de Bedelía. Deberían estar encuadernadas cronológicamente y físicamente almacenadas en el área de gestión de estudios.', '2022-09-15', 'Corregir, a través del procedimiento pertinente, los hallazgos mencionados.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:08:53', NULL, NULL),
(8, 32, 2, 1, 8, '2015-06-05', 'Otorgamiento de Titulos', '18/2015', 'Se detectaron los siguientes defectos formales en los legajos de alumnos de Posgrado: a) El legajo de la alumna Vallejos, Silvina Vanesa, no se encuentra debidamente foliado, tampoco se verifica la intervención del funcionario responsable.', '2022-09-15', 'Corregir, a través del procedimiento pertinente, los hallazgos mencionados.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:13:33', NULL, NULL),
(9, 13, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'Falta de Manuales de Procedimientos formales definidos aprobados para el desarrollo de las tareas y actividades del área.', '2021-11-30', 'Definir formalmente los procedimientos operativos relevantes y periódicos del área, reglamentarlos, formalizar la implementación y dar a conocer de manera efectiva al personal involucrado.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:23:31', NULL, NULL),
(10, 13, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'La certificación del servicio del personal Docente se realiza mediante una planilla de asistencia de confección manual cuyo punto de control efectivo de su confección se encuentra al finalizar cada mes la cual debe ser entregada en la Secretaria del Departamento quien a su vez remite la misma a la Dirección de Personal de la Facultad.', '2021-11-30', 'Implementar una herramienta automatizada que mejore la calidad y frecuencia de los controles de asistencia y minimice los riesgos de manipulación de la información durante el mes que se certifica la prestación del servicio, como también adaptar los controles de prestación de servicios a la situación que implica el incremento constante del trabajo a distancia  y el dictado de clases que se realicen en forma virtual sin la presencia del personal Docente en al sede de la Unidad Académica.', NULL, NULL, NULL, 1, 3, 3, '2023-05-16 13:24:45', NULL, NULL),
(11, 13, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'El sistema informático utilizado para la registración de asistencia de personal No Docente carece de acto administrativo pertinente que apruebe los procesos y procedimientos utilizados y autorice su implementación.', '2021-11-30', 'Formalizar por acto administrativo pertinente, procesos y procedimientos de utilización del sistema informático de registración de asistencia del personal No Docente, como así también la definición de accesos y usuarios.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:25:41', NULL, NULL),
(12, 13, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'La resolución de designación del personal responsable de operar el sistema SIU-MAPUCHE no especifica atributos de acceso y/o nivel operativo asignado para cada agente encargado de operar en el sistema SIU-MAPUCHE.', '2021-11-30', 'Especificar claramente mediante acto administrativo el perfil de acceso de cada agente encargado de operar en el sistema SIU-MAPUCHE y los atributos operativos que dicho perfil de acceso la confiere.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:26:54', NULL, NULL),
(13, 13, 3, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'Ausencia en los legajos únicos de las DDJJ de incompatibilidades y documentaciones correspondientes a los años 2020 y 2021, como también falta de aplicación de aspectos formales como ser, foliados incompletos o nulos.', '2021-11-30', 'A fin de dar cumplimiento a las normativas vigentes, actualizar legajos con la documentación faltante y realizar las acciones administrativas que permitan contar con una base de legajos actualizados. Asimismo, se recomienda implementar en el corto plazo a nivel Universidad legajos únicos electrónicos.', NULL, NULL, NULL, 1, 3, 3, '2023-05-16 13:29:02', NULL, NULL),
(14, 38, 3, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'No existe una estructura organizativa formalmente aprobada. No existe un Manual de Misiones y Funciones de acuerdo a la Estructura ni existen Manuales de Procedimiento. Falta de cobertura de cargos y funciones esenciales', '2020-10-26', 'Elaborar la Estructura Orgánico Funcional del I.S.S.U.N.N.E, y su correspondiente Manual de Misiones y Funciones y elevar para su aprobación ante el Consejo Superior de la Universidad; en un todo de acuerdo con las normas específicas que deban ser cumplidas. Asimismo elaborar Manual de Procedimientos. Cubrir los cargos con sus correspondientes funciones de carácter esencial para evitar riesgos que podrían afectar a la organización. Se recomienda urgente trámite.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 13:54:28', NULL, NULL),
(15, 38, 3, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'El área auditada no realizó las tareas de cierre del ejercicio el último día hábil del ejercicio 2019.', '2020-10-25', 'Realizar el último día hábil de cada cierre del ejercicio las actividades que comprenden los arqueos de fondos y valores, corte de documentación y cierre de libros. La información resultante debe ser incluida en los anexos 1 a 17 de los Lineamientos Básicos de Control Interno y suscriptas por los responsables interviniente dichas actividades.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:07:45', NULL, NULL),
(16, 38, 1, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Existe inconsistencia numérica entre los valores declarados en Anexo 1 “Efectivo Recontado en Tesorería”, la registración en el sistema SIU Pilagá y el importe expuesto en los Cuadros de Cierres y Balances 2019 Presupuestario y Extrapresupuestario', '2020-10-26', 'El efectivo recontado en tesorería se debe registrar correctamente en el sistema SIU Pilagá y exponer al cierre en la cuenta Caja del rubro disponibildades del Activo del Balance Presupuestario y Extrapresupuestario. Exposición Incorrecta se expuso como Caja lo que corresponde a  Fondos Rotatorios (Presupuestario) $2.084.625,00. $ Diferencia no encontrada de $ 23.913,00.\r\nSe recomienda registrar y exponer correctamente y conciliar e informar la diferencia no hallada. \r\nSe recomienda unificar las bases buscando a través de la Contaduría General de la UNNE la manera de tener en una sola base toda la información.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:10:02', NULL, NULL),
(17, 38, 1, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Existe inconsistencia numérica entre la información declarada en Anexo 2 “Cheques Propios en Cartera” y los importes expuestos en los Cuadros de Cierres y Balances 2019 Presupuestario y Extrapresupuestario.', '2020-10-26', 'Los cheques en cartera deben ser registrados en el sistema SIU Pilagá utilizando las opciones disponibles de manera de reflejar el real estado de los mismos, como también de poder listar los cheques que se encuentran emitidos pero no entregados al proveedor/acreedor; lo que permitirá emitir el listado “Cheques en cartera” (Por ej. Pagado/En cartera/ Anulado).', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:12:13', NULL, NULL),
(18, 38, 2, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Existe inconsistencia numérica entre la información declarada en Anexo 4 “Documentación Obrante en Tesorería” y los saldos de la Cuentas Comerciales a Pagar expuestos en los Cuadros de Cierres y Balances 2019 Presupuestario y Extrapresupuestario.', '2020-10-26', 'En caso de corresponder se deberá exponer en forma correcta la información solicitada en el Anexo 4.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:13:45', NULL, NULL),
(19, 38, 1, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Se incluyo en el anexo 5 “Efectivo Recontado de Caja Chica o Fondo Permanente” a los anticipos de caja chica pendientes de rendición al cierre del ejercicio las que se deben incluir en el Anexo 6 “Anticipo de Cajas Chicas o Fondos Permanentes Pendientes de Rendición”.', '2020-10-26', 'Corregir la información expuesta en los anexos 5 “Efectivo Recontado de Caja Chica o Fondo Permanente” y Anexo 6 “Anticipo de Cajas Chicas o Fondos Permanentes Pendientes de Rendición”.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:19:03', NULL, NULL),
(20, 38, 3, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'En Anexo 12 “Corte de Chequeras” el último cheque emitido de la cuenta corriente N° 221.10238/93 del Banco de la Nación Argentina no posee registración contable.', '2020-10-26', 'Se deberá asegurar que todos los ingresos y egresos deben ser registrados en el sistema SIU Pilagá.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:20:40', NULL, NULL),
(21, 38, 2, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'En Anexo 13 “Corte de Documentación” falta acompañar la documentación de respaldo de los últimos documentos emitidos.', '2020-10-26', 'Adjuntar la documentación faltante.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:22:18', NULL, NULL),
(22, 38, 3, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Se observa que se ha transcripto en el Anexo 15 lo que resulta de las bases presupuestarias y extrapresupuestarias del listado Ingresos Corrientes del Sistema SIU Pilagá, no siendo conceptualmente correcta la totalidad recursos.', '2020-10-26', 'La información sobre los recursos propios serán verificadas con posterioridad al aislamiento social preventivo y obligatorio por lo que en dicha oportunidad se realizará la recomendación. Se deja constancia que la base de datos al 31 de diciembre de 2019 es parte de la información de esta auditoría.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:24:29', NULL, NULL),
(23, 38, 3, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'Falta de un Reglamento que estipule los criterios y políticas de administración relacionados con las Inversiones Financieras del Instituto.', '2020-10-26', 'En aras de establecer una sana práctica administrativa, se hace necesario que se disponga de un instrumento que defina las políticas que en materia de Inversiones Financieras, oriente y regule la colocación de los recursos financieros de la Institución.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:25:25', NULL, NULL),
(24, 38, 2, 1, 13, '2020-10-26', 'Cierre de Ejercicio', '13/2020', 'La Unidad Auditada no remite a la Unidad de Auditoria Interna la aprobación de los recursos propios como establece la Resolución Rectoral Nº 0683/08 “Lineamientos Básicos de Control Interno sobre los Recursos Propios y Gastos”.', '2020-10-26', 'Cumplir con lo establecido por la normativa mencionada en lo referente a la aprobación de los recursos propios en forma mensual con documentación de respaldo.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:26:57', NULL, NULL),
(25, 37, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'La Estructura Orgánico Funcional y Manual de Misiones y funciones del ISSUNNE como Instituto dependiente del Rectorado se encuentra aprobada por Resolución Nº 1115/18 del Consejo Superior. No obstante, no existe manual de misiones y funciones ni procedimientos formalmente definidos aprobados para  el desarrollo de las tareas y actividades del área.', '2021-11-30', 'Definir formalmente el manual de misiones y funciones y los procedimientos operativos relevantes y periódicos del área, reglamentarlos, formalizar la implementación y dar a conocer de manera efectiva al personal involucrado.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:30:27', NULL, NULL),
(26, 37, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'Se constató que la Res. 2629/20 R- designa a la Srta. Andrea Guerrero para cumplir tareas administrativas en ISSUNNE del 1 enero 2021 al 31 Diciembre 2021- planta  temporaria.  La Res. de la Srta. Andrea Guerrero No asigna a la misma al  Área de Personal.', '2021-11-30', 'Se sugiere asignar formalmente las actividades de la Srta. Andrea Guerrero al Dpto. de Personal del ISSUNNE.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:33:29', NULL, NULL),
(27, 37, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'El sistema informático de control de asistencia de personal no se encuentra aprobado y reglamentado por acto administrativo pertinente.', '2021-11-30', 'efectuar la aprobación formal y la reglamentación de la funcionalidad del sistema informático  para control de asistencia.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:34:48', NULL, NULL),
(28, 37, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'A los agentes cuyas huellas dactilares no pueden ser leídas por el sistema de registración de ingreso/egreso de personal se les asigna usuario y contraseña para la registración de su asistencia.', '2021-11-30', 'Se sugiere incorporar la opción del reconocimiento facial para todo el personal, de modo de tener dos formas de registración efectiva para cada agente.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:41:37', NULL, NULL),
(29, 37, 3, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'El personal que tiene acceso operativo al sistema informático se desempeña tanto en el Dpto. de Personal como en el área de Informática del Instituto, utilizan el mismo usuario y contraseña para el acceso.  De acuerdo a lo relevado, las dos áreas de trabajo utilizan las mismas credenciales de acceso y poseen iguales perfiles operativos.', '2021-11-30', 'Cada agente que posea un acceso a un sistema de información debe poseer un identificador de usuario único que identifique a la persona, un perfil operativo asignado y autorización formal donde se describa el perfil operativo de acceso otorgado.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:44:21', NULL, NULL),
(30, 37, 3, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'El personal de las delegaciones secundarias del Instituto, remiten el registro de asistencia de manera telefónica a la oficina de personal en sede central del ISSUNNE.', '2021-11-30', 'Se sugiere diseñar e implementar un mecanismo de control de asistencia eficiente y efectivo en el lugar de la prestación del servicio. Es conveniente que la certificación del servicio se realice de alguna de determinada forma presencial en el lugar donde se realizan las actividades.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 14:45:37', NULL, NULL),
(31, 37, 2, 1, 14, '2021-11-30', 'Capital Humano', '28/2021', 'a)El personal del área auditada responsable de operar en el sistema SIU-MAPUCHE no tiene asignado formalmente la tarea de operar en el sistema, así como no se pudo determinar los atributos de acceso y/o nivel operativo asignado al personal para operar dentro del sistema SIU-MAPUCHE.\r\nb)No fue posible constatar identificadores y clave de acceso al sistema SIU-MAPUCHE.\r\nc)El personal no tiene conocimiento de la aprobación formal de un manual de operación para el sistema SIU-MAPUCHE. No obstante, recibe instructivos y capacitaciones para la operación de los distintos módulos del Sistema.\r\nd)No existe acto administrativo que indique la comprensión y aceptación formal por parte del personal involucrado, referida a las atribuciones operativas que implica el acceso otorgado para la operación del sistema SIU-MAPUCHE.', '2021-11-30', 'a) Dictar acto administrativo que asigne formalmente la tarea de operar en el sistema de Liq. de haberes, se defina nivel de acceso y atributos operativos asignado a cada personal autorizado a operar en el sistema  SIU-MAPUCHE. Los agentes deben notificarse y aceptar la operación del sistema asignada.\r\nb) Definir credenciales de acceso al sistema que sean únicas para cada agente encargado  de la operación.', NULL, NULL, NULL, 1, 3, 3, '2023-05-16 14:47:21', NULL, NULL),
(32, 38, 2, 4, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'No se deja constancia de los arqueos diarios de los producidos percibidos (Anexo I – Res. Rectoral Nº0683/08 “Lineamientos Básicos de Control Interno de Recursos Propios y Gastos”).', '2022-12-30', 'Realizar el arqueo diario de acuerdo a la norma citada.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:23:15', NULL, NULL),
(33, 38, 2, 1, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'Los recursos propios registrados en el sistema SIU Pilagá según concepto Posnet, Recaudación de servicio ISSUNNE vía Posnet, engloba los ingresos percibidos por esa modalidad de pago sin desagregar por concepto de ingreso.', '2022-12-30', 'Registrar  los ingresos en el sistema SIU Pilagá por concepto de recaudación.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:25:01', NULL, NULL),
(34, 38, 2, 1, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'Falta de control de las recaudaciones realizadas por los puntos de ventas distintos de la sede central de Corrientes.', '2022-12-30', 'Formalizar los mecanismos de rendiciones de las sedes del ISSUNNE solicitando adjuntar los comprobantes de recaudación numerados en forma correlativa y depósitos bancarios realizados o la recaudación a depositar.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:27:37', NULL, NULL),
(35, 38, 2, 1, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'Falta de control del área de contaduría de los recibos manuales emitidos con los comprobantes de depósito bancario de las recaudaciones.', '2022-12-30', 'El área de Contaduría debe realizar un control cruzado de comprobantes  recaudación del área de tesorería con los depósitos bancarios.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:28:35', NULL, NULL),
(36, 38, 2, 1, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'No se emiten recibos por los ingresos mediante transferencias bancarias.', '2022-12-30', 'Emitir Recibos por todos los ingresos independientemente de la modalidad de cobro.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:30:53', NULL, NULL),
(37, 38, 3, 1, 15, '2022-12-30', 'Recursos Propios', '35/2022', 'No se cuenta con un sistema informático para la emisión de comprobantes de recaudación de los recursos propios.', '2022-12-30', 'Considerar la posibilidad de contar con un sistema informático que permita la emisión de comprobantes de recaudación.', NULL, NULL, NULL, 1, 3, NULL, '2023-05-16 15:33:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_acciones`
--

CREATE TABLE `observacion_acciones` (
  `id_accion` bigint(20) NOT NULL,
  `observacion_id` bigint(20) NOT NULL,
  `accion_encarada` text NOT NULL,
  `archivo_adjunto` varchar(255) NOT NULL,
  `leido` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_estados`
--

CREATE TABLE `observacion_estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observacion_estados`
--

INSERT INTO `observacion_estados` (`id_estado`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sin acción correctiva', '2023-04-23 22:41:16', NULL, NULL),
(2, 'Con acción correctiva', '2023-04-23 22:41:16', NULL, NULL),
(3, 'En implementación', '2023-04-23 22:41:49', NULL, NULL),
(4, 'Regularizada', '2023-04-23 22:41:49', NULL, NULL),
(5, 'No regularizable', '2023-04-23 22:42:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_impactos`
--

CREATE TABLE `observacion_impactos` (
  `id_impacto` int(11) NOT NULL,
  `impacto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observacion_impactos`
--

INSERT INTO `observacion_impactos` (`id_impacto`, `impacto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAJO', '2023-04-23 22:44:54', NULL, NULL),
(2, 'MEDIO', '2023-04-23 22:44:54', NULL, NULL),
(3, 'ALTO', '2023-04-23 22:45:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_planes`
--

CREATE TABLE `observacion_planes` (
  `id_plan` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observacion_planes`
--

INSERT INTO `observacion_planes` (`id_plan`, `plan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2008, '2023-04-28 22:55:49', NULL, NULL),
(2, 2009, '2023-04-30 19:21:50', NULL, NULL),
(3, 2010, '2023-04-30 19:21:50', NULL, NULL),
(4, 2011, '2023-04-30 19:22:01', NULL, NULL),
(5, 2012, '2023-04-30 19:22:01', NULL, NULL),
(6, 2013, '2023-04-30 19:22:13', NULL, NULL),
(7, 2014, '2023-04-30 19:22:13', NULL, NULL),
(8, 2015, '2023-04-30 19:22:38', NULL, NULL),
(9, 2016, '2023-04-30 19:22:38', NULL, NULL),
(10, 2017, '2023-04-30 19:22:49', NULL, NULL),
(11, 2018, '2023-04-30 19:22:49', NULL, NULL),
(12, 2019, '2023-04-30 19:23:01', NULL, NULL),
(13, 2020, '2023-04-30 19:23:01', NULL, NULL),
(14, 2021, '2023-04-30 19:23:11', NULL, NULL),
(15, 2022, '2023-04-30 19:23:11', NULL, NULL),
(16, 2023, '2023-04-30 19:23:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_academicas`
--

CREATE TABLE `unidades_academicas` (
  `id_ua` int(11) NOT NULL,
  `nombre_ua` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades_academicas`
--

INSERT INTO `unidades_academicas` (`id_ua`, `nombre_ua`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arquitectura y Urbanismo', '2023-04-23 22:32:35', NULL, NULL),
(2, 'Artes, Diseño y Ciencias de la Cultura', '2023-04-23 22:32:35', NULL, NULL),
(3, 'Campus Deodoro Roca', '2023-04-23 22:32:35', NULL, NULL),
(4, 'Campus resistencia', '2023-04-23 22:32:35', NULL, NULL),
(5, 'Campus de la Reforma', '2023-04-23 22:32:35', NULL, NULL),
(6, 'Campus Sargento Cabral', '2023-04-23 22:32:35', NULL, NULL),
(7, 'CEGAE', '2023-04-23 22:32:35', NULL, NULL),
(8, 'Ciencias Agrarias', '2023-04-23 22:32:35', NULL, NULL),
(9, 'Ciencias Económicas', '2023-04-23 22:32:35', NULL, NULL),
(10, 'Ciencias Exactas y Naturales y Agrimensura', '2023-04-23 22:32:35', NULL, NULL),
(11, 'Ciencias Veterinarias', '2023-04-23 22:32:35', NULL, NULL),
(12, 'Derecho y Ciencias Sociales y Políticas', '2023-04-23 22:32:35', NULL, NULL),
(13, 'Dirección de Bibliotecas', '2023-04-23 22:32:35', NULL, NULL),
(14, 'Eragia', '2023-04-23 22:32:35', NULL, NULL),
(15, 'Humanidades', '2023-04-23 22:32:35', NULL, NULL),
(16, 'Ingeniería', '2023-04-23 22:32:35', NULL, NULL),
(17, 'Instituto Agrotécnico', '2023-04-23 22:32:35', NULL, NULL),
(18, 'Instituto de Ciencias Criminalisticas y Criminología', '2023-04-23 22:32:35', NULL, NULL),
(19, 'Instituto de Medicina regional', '2023-04-23 22:32:35', NULL, NULL),
(20, 'Instituto Rectorado', '2023-04-23 22:32:35', NULL, NULL),
(21, 'ISSUNNE', '2023-04-23 22:32:35', NULL, NULL),
(22, 'Medicina', '2023-04-23 22:32:35', NULL, NULL),
(23, 'Odontología', '2023-04-23 22:32:35', NULL, NULL),
(24, 'Secretaria General de Extensión Universitaria', '2023-04-23 22:32:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `telefono`, `foto`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin', 'UAI', '', 'no-user.jpg', 'superadmin@seguimientosuai.unne.edu.ar', '$2y$10$6O97Y/KXgg3PfEK4UZSEieML92b5tMKHXFXSf8gRv7pJ5rBU/iD1.', '2023-04-23 19:38:55', '2023-04-23 20:36:10', NULL),
(2, 'Supervisor', 'UAI', NULL, 'no-user.jpg', 'supervisor@seguimientosuai.unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:20:38', NULL, NULL),
(3, 'Operador', 'UAI', NULL, 'no-user.jpg', 'operador@seguimientosuai.unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:22:24', NULL, NULL),
(4, 'Dana ', 'Zimerman', NULL, 'no-user.jpg', 'dana_zimerman@hotmail.com', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-05 21:24:33', NULL, NULL),
(5, 'José Vicente', 'Pirelli', NULL, 'no-user.jpg', 'tesoreria_issunne@unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-18 02:18:03', '2023-05-18 02:17:31', NULL),
(6, 'Sergio Fabián', 'Fournier', NULL, 'no-user.jpg', 'contable_issunne@unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-22 22:36:49', '2023-05-22 22:35:41', NULL),
(7, 'Sergio Andrés', 'Mendoza Bazan ', NULL, 'no-user.jpg', 'mendozasergio@seguimientosuai.unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-22 22:36:49', '2023-05-22 22:35:41', NULL),
(8, 'Andrea', 'Guerrero', NULL, 'no-user.jpg', 'personal_issunne@unne.edu.ar', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-22 22:41:46', '2023-05-22 22:40:59', NULL),
(9, 'Ernesto', 'Romero', NULL, 'no-user.jpg', 'personal.issunne@gmail.com', '$2y$10$a50ZZ4nzPH8q.KBxNEhvDeJeAdfoOZPQnLI5IgBZZ7YORDdeokNOW', '2023-05-22 22:41:46', '2023-05-22 22:40:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_permisos`
--

CREATE TABLE `usuarios_permisos` (
  `id_permiso` bigint(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_tipo_id` int(11) NOT NULL,
  `unidad_academica_id` int(11) DEFAULT NULL,
  `area_auditada_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_permisos`
--

INSERT INTO `usuarios_permisos` (`id_permiso`, `usuario_id`, `usuario_tipo_id`, `unidad_academica_id`, `area_auditada_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, NULL, '2023-05-11 03:57:13', '2023-05-11 03:57:02', NULL),
(2, 2, 2, 2, NULL, '2023-05-11 03:57:27', '2023-05-11 03:57:15', NULL),
(3, 3, 3, 3, NULL, '2023-05-11 03:57:35', '2023-05-11 03:57:29', NULL),
(4, 4, 5, 21, NULL, '2023-05-11 03:57:46', '2023-05-11 03:57:42', NULL),
(5, 5, 4, 21, 38, '2023-05-18 02:18:47', '2023-05-18 02:18:33', NULL),
(6, 6, 4, 21, 38, '2023-05-22 22:38:17', '2023-05-22 22:37:55', NULL),
(7, 7, 4, 21, 38, '2023-05-22 22:38:17', '2023-05-22 22:37:55', NULL),
(8, 8, 4, 21, 37, '2023-05-22 22:42:32', '2023-05-22 22:42:07', NULL),
(9, 9, 4, 21, 37, '2023-05-22 22:42:32', '2023-05-22 22:42:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipo`
--

CREATE TABLE `usuarios_tipo` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_tipo`
--

INSERT INTO `usuarios_tipo` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(3, 'OPERADOR'),
(1, 'SUPERADMIN'),
(2, 'SUPERVISOR'),
(4, 'UA_GENERAL'),
(5, 'UA_SUPERADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  ADD PRIMARY KEY (`id_area_auditada`),
  ADD KEY `ua_id` (`ua_id`);

--
-- Indices de la tabla `intervenciones`
--
ALTER TABLE `intervenciones`
  ADD PRIMARY KEY (`id_intervencion`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `area_auditada_id` (`area_auditada_id`),
  ADD KEY `impacto_id` (`impacto_id`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indices de la tabla `observacion_acciones`
--
ALTER TABLE `observacion_acciones`
  ADD PRIMARY KEY (`id_accion`);

--
-- Indices de la tabla `observacion_estados`
--
ALTER TABLE `observacion_estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `observacion_impactos`
--
ALTER TABLE `observacion_impactos`
  ADD PRIMARY KEY (`id_impacto`);

--
-- Indices de la tabla `observacion_planes`
--
ALTER TABLE `observacion_planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  ADD PRIMARY KEY (`id_ua`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  MODIFY `id_area_auditada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `intervenciones`
--
ALTER TABLE `intervenciones`
  MODIFY `id_intervencion` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `observacion_acciones`
--
ALTER TABLE `observacion_acciones`
  MODIFY `id_accion` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observacion_estados`
--
ALTER TABLE `observacion_estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `observacion_impactos`
--
ALTER TABLE `observacion_impactos`
  MODIFY `id_impacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `observacion_planes`
--
ALTER TABLE `observacion_planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  MODIFY `id_ua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  MODIFY `id_permiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas_auditadas`
--
ALTER TABLE `areas_auditadas`
  ADD CONSTRAINT `areas_auditadas_ibfk_1` FOREIGN KEY (`ua_id`) REFERENCES `unidades_academicas` (`id_ua`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`area_auditada_id`) REFERENCES `areas_auditadas` (`id_area_auditada`),
  ADD CONSTRAINT `observaciones_ibfk_2` FOREIGN KEY (`impacto_id`) REFERENCES `observacion_impactos` (`id_impacto`),
  ADD CONSTRAINT `observaciones_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `observacion_estados` (`id_estado`),
  ADD CONSTRAINT `observaciones_ibfk_4` FOREIGN KEY (`plan_id`) REFERENCES `observacion_planes` (`id_plan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
