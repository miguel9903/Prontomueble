<?php
$indice = $_POST["indice"];
unset($_SESSION['carrito'][$indice]);
$datos = array_values($_SESSION['carrito']);
unset($_SESSION['carrito']);
$_SESSION['carrito'] = $datos;