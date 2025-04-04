<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/delete.php";
require_once __DIR__ . "/../lib/php/devuelveNoContent.php";
require_once "Bd.php";
$conexion = Bd::pdo();
require_once __DIR__ . "/TABLA_PASATIEMPO.php";

ejecutaServicio(function () {
 $id = recuperaIdEntero("id");
 delete(pdo: Bd::pdo(), from: PASATIEMPO, where: [PAS_ID => $id]);
 devuelveNoContent();
});
