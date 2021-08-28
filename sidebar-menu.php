<?php 

if ($_SESSION['permisos_acceso']=='Super Admin') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  // pestaña nivel
  if ($_GET["module"]=="nivel" || $_GET["module"]=="form_nivel") { ?>
    <li class="active">
      <a href="?module=nivel"><i class="fa fa-line-chart"></i> Nivel </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=nivel"><i class="fa fa-line-chart"></i> Nivel </a>
      </li>
  <?php
  }
  //Pestaña carrera
  if ($_GET["module"]=="carrera" || $_GET["module"]=="form_carrera") { ?>
    <li class="active">
      <a href="?module=carrera"><i class="fa fa-graduation-cap"></i> Carrera </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=carrera"><i class="fa fa-graduation-cap"></i> Carrera </a>
      </li>
  <?php
  }

  // Pestaña periodo academico

  if ($_GET["module"]=="periodo_academico" || $_GET["module"]=="form_periodo_academico") { ?>
    <li class="active">
      <a href="?module=periodo_academico"><i class="fa fa-calendar-plus-o"></i> Periodo Académico </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=periodo_academico"><i class="fa fa-calendar-plus-o"></i> Periodo Académico </a>
      </li>
  <?php
  }

  //Pestaña jornada

  if ($_GET["module"]=="jornada" || $_GET["module"]=="form_jornada") { ?>
    <li class="active">
      <a href="?module=jornada"><i class="fa fa-clock-o"></i> Jornada </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=jornada"><i class="fa fa-clock-o"></i> Jornada </a>
      </li>
  <?php
  }

    //Pestaña de paralelos

  if ($_GET["module"]=="paralelo" || $_GET["module"]=="form_paralelo") { ?>
    <li class="active">
      <a href="?module=paralelo"><i class="fa fa-font"></i> Paralelo </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=paralelo"><i class="fa fa-font"></i> Paralelo </a>
      </li>
  <?php
  }

  // Pestaña Inscripcion y matricula

  if ($_GET["module"]=="alumno") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-folder"></i> <span>Administracón académica</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=alumno"><i class="fa fa-file"></i> Ficha de inscripción</a></li>
            <li><a href="?module=matricula"><i class="fa fa-file"></i> Matricula</a></li>
          </ul>
      </li>
    <?php
  }

  
  elseif ($_GET["module"]=="matricula") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-folder"></i> <span>Administracón académica</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=alumno"><i class="fa fa-file"></i> Ficha de inscripción </a></li>
            <li class="active"><a href="?module=matricula"><i class="fa fa-file"></i> Matricula </a></li>
          </ul>
      </li>
    <?php
  }

  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-folder"></i> <span>Administracón académica</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=alumno"><i class="fa fa-file"></i> Ficha de inscripción </a></li>
            <li><a href="?module=matricula"><i class="fa fa-file"></i> Matricula </a></li>
          </ul>
      </li>
    <?php
  }

  ///////////
  //Reportes

  if ($_GET["module"]=="reporte_vista_inscritos") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos</a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check"></i> Estudiantes Matriculados</a></li>
          </ul>
      </li>
    <?php
  }

  
  elseif ($_GET["module"]=="reporte_vista_matriculados") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li class="active"><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
          </ul>
      </li>
    <?php
  }

  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
          </ul>
      </li>
    <?php
  }
	
  //Pestaña usuarios

	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

  if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
    <li class="active">
      <a href="?module=respaldo"><i class="fa fa-database"></i> Respaldo</a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=respaldo"><i class="fa fa-database"></i> Respaldo</a>
      </li>
  <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

elseif ($_SESSION['permisos_acceso']=='Gerente') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}


   //Reportes

  if ($_GET["module"]=="reporte_vista_inscritos") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos</a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check"></i> Estudiantes Matriculados</a></li>
          </ul>
      </li>
    <?php
  }

  
  elseif ($_GET["module"]=="reporte_vista_matriculados") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li class="active"><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
          </ul>
      </li>
    <?php
  }

  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
          </ul>
      </li>
    <?php
  }
  

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Almacen') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  // Pestaña Inscripcion 

  if ($_GET["module"]=="alumno" || $_GET["module"]=="form_alumno") { ?>
    <li class="active">
      <a href="?module=alumno"><i class="fa fa-calendar-plus-o"></i>Inscripciones </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=alumno"><i class="fa fa-calendar-plus-o"></i>Inscripciones </a>
      </li>
  <?php
  }

  // Pestaña de matricula


  if ($_GET["module"]=="matricula" || $_GET["module"]=="form_matricula") { ?>
    <li class="active">
      <a href="?module=matricula"><i class="fa fa-calendar-plus-o"></i> Matricula </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=matricula"><i class="fa fa-calendar-plus-o"></i> Matricula </a>
      </li>
  <?php
  }


  
   //Reportes

  if ($_GET["module"]=="reporte_vista_inscritos") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos</a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check"></i> Estudiantes Matriculados</a></li>
            <li class="active"><a href="?module=stock_report"><i class="fa fa-check "></i> Generar Matriculados </a></li>
          </ul>
      </li>
    <?php
  }

  
  elseif ($_GET["module"]=="reporte_vista_matriculados") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li class="active"><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
          </ul>
      </li>
    <?php
  }

  elseif ($_GET["module"]=="stock_report") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li class="active"><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
            <li class="active"><a href="?module=stock_report"><i class="fa fa-check "></i> Generar Matriculados </a></li>
          </ul>
      </li>
    <?php
  }

  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-bar-chart"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_vista_inscritos"><i class="fa fa-check"></i> Estudiantes Inscritos </a></li>
            <li><a href="?module=reporte_vista_matriculados"><i class="fa fa-check "></i> Estudiantes Matriculados </a></li>
            <li class="active"><a href="?module=stock_report"><i class="fa fa-check "></i> Generar Matriculados </a></li>
          </ul>
      </li>
    <?php
  }
  

  //*Pestaña modificar contraseña*/

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>