<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'alumno') {
		include "modules/alumno/view.php";
	}

	elseif ($_GET['module'] == 'form_alumno') {
		include "modules/alumno/form.php";
	}
	
	elseif ($_GET['module'] == 'nivel') {
		include "modules/nivel/view.php";
	}

	elseif ($_GET['module'] == 'form_nivel') {
		include "modules/nivel/form.php";
	}

	elseif ($_GET['module'] == 'carrera') {
		include "modules/carrera/view.php";
	}

	elseif ($_GET['module'] == 'form_carrera') {
		include "modules/carrera/form.php";
	}

	elseif ($_GET['module'] == 'periodo_academico') {
		include "modules/periodo_academico/view.php";
	}

	elseif ($_GET['module'] == 'form_periodo_academico') {
		include "modules/periodo_academico/form.php";
	}

	elseif ($_GET['module'] == 'jornada') {
		include "modules/jornada/view.php";
	}

	elseif ($_GET['module'] == 'form_jornada') {
		include "modules/jornada/form.php";
	}

	elseif ($_GET['module'] == 'paralelo') {
		include "modules/paralelo/view.php";
	}

	elseif ($_GET['module'] == 'form_paralelo') {
		include "modules/paralelo/form.php";
	}

	elseif ($_GET['module'] == 'matricula') {
		include "modules/matricula/view.php";
	}

	elseif ($_GET['module'] == 'form_matricula') {
		include "modules/matricula/form.php";
	}

	elseif ($_GET['module'] == 'respaldo') {
		include "modules/respaldo/view.php";
	}

	elseif ($_GET['module'] == 'form_respaldo') {
		include "modules/respaldo/form.php";
	}

	elseif ($_GET['module'] == 'medicines_transaction') {
		include "modules/medicines_transaction/view.php";
	}

	elseif ($_GET['module'] == 'form_medicines_transaction') {
		include "modules/medicines_transaction/form.php";
	}
	

	elseif ($_GET['module'] == 'reporte_vista_inscritos') {
		include "modules/reporte_vista_inscritos/view.php";
	}

	elseif ($_GET['module'] == 'reporte_vista_matriculados') {
		include "modules/reporte_vista_matriculados/view.php";
	}

	elseif ($_GET['module'] == 'stock_report') {
		include "modules/stock_report/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>