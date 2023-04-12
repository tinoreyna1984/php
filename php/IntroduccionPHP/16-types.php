<?php 
// ahora PHP puede ser fuertemente tipado
declare(strict_types=1); // se declara la fortificación de tipo
include 'includes/header.php';

function usuarioAutenticado(bool $autenticado) : ?string {
    if($autenticado) {
        return "El Usuario esta autenticado";
    } else {
        return null;
    }
}

$usuario = usuarioAutenticado(false);
echo $usuario;

include 'includes/footer.php';