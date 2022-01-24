<?php
session_start();
//-- Contenido --
if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
	if (isset($_GET['ruta'])) {
		if (
			$_GET['ruta'] == "inicio" ||
			$_GET['ruta'] == "nosotros" ||
			$_GET['ruta'] == "pruebas" ||
			$_GET['ruta'] == "empleados" ||
			$_GET['ruta'] == "clientes" ||
			$_GET['ruta'] == "colores" ||
			$_GET['ruta'] == "proveedor"||
			$_GET['ruta'] == "productos"||
			$_GET['ruta'] == "marcas" ||
			$_GET['ruta'] == "categorias" ||
			$_GET['ruta'] == "ordenventa" ||
			$_GET['ruta'] == "venta" ||
			$_GET['ruta'] == "salir" 
		) {
			require_once 'views/modulos/header.php';
			echo '<div class="main-content">';
			echo '<div class="page-content">';
			echo '<div class="container-fluid">';
			include_once "views/modulos/" . $_GET['ruta'] . ".php";
			echo '</div>';
			echo '</div>';
			echo '</div>';
			require_once 'views/modulos/footer.php';
		} else {
			if ($_GET['ruta'] == "login") {
				require_once 'views/modulos/header.php';
				include_once "views/modulos/login.php";
				require_once 'views/modulos/footer.php';
			} else {
				include_once "views/modulos/404.php";
			}
		}
	} else {
		require_once 'views/modulos/header.php';
		include_once "views/modulos/login.php";
		require_once 'views/modulos/footer.php';
	}
} else {
	if (isset($_GET['ruta'])) {
		if ($_GET['ruta'] == "login") {
			require_once 'views/modulos/header.php';
			include_once "views/modulos/login.php";
			require_once 'views/modulos/footer.php';
			include_once "views/modulos/" . $_GET['ruta'] . ".php";
		} else {
			
			include_once "views/modulos/404.php";
		}
	} else {
		require_once 'views/modulos/header.php';
		include_once "views/modulos/login.php";
		require_once 'views/modulos/footer.php';
		include_once "views/modulos/login.php";
	}
}
