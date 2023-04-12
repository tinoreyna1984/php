<?php include 'includes/header.php';

interface IContenidoCMS {
    public function getId();
    public function getFecha();
    public function setFecha($fecha);
    public function getAutor();
    public function setAutor($autor);
}

abstract class ContenidoCMS {
    protected $id;
    protected $title;
    protected $fecha;
    protected $autor;

    public function __construct($id, $title, $autor)
    {
        // parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->fecha = date("YYYYMMDD");
        $this->autor = $autor;
    }

    public function getId(){
        return $this->id;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

}

class Post extends ContenidoCMS implements IContenidoCMS {
    
    protected $archivos_multimedia;
    protected $texto;
    protected $comentarios;
    
    public function __construct($id, $title, $autor, $texto, $archivos_multimedia = [])
    {
        parent::__construct($id, $title, $autor);
        $this->texto = $texto;
        $this->archivos_multimedia = $archivos_multimedia;
        $this->comentarios = [];
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }


    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function getArchivos(){
        return $this->archivos_multimedia;
    }
    public function setArchivos($archivos_multimedia){
        $this->archivos_multimedia = $archivos_multimedia;
    }

    public function getComentarios(){
        return $this->comentarios;
    }
    public function setComentarios($comentario){
        array_push($this->comentarios, $comentario);
    }

}

class Comentario extends ContenidoCMS {

    protected $titulo_comentario;
    protected $contenido_comentario;

    public function __construct($titulo_comentario, $contenido_comentario){
        $this->titulo_comentario = $titulo_comentario;
        $this->contenido_comentario = $contenido_comentario;
    }

    public function getComentario(){
        return $this;
    }

    public function setComentario($titulo_comentario, $contenido_comentario){
        $this->titulo_comentario = $titulo_comentario;
        $this->contenido_comentario = $contenido_comentario;
    }
}

$miPost = new Post(1, "Mi primer post", "Tino", "Este es mi primer post");
var_dump($miPost->getTitle()); // --> string(14) "Mi primer post"
$comentario01 = new Comentario("Genial tu post", "Me gusta que te estés esforzando");
$comentario02 = new Comentario("Enhorabuena", "Te deseo éxitos");
var_dump($comentario01->getComentario()); /*
        ["titulo_comentario":protected]=>
        string(14) "Genial tu post"
        ["contenido_comentario":protected]=>
        string(33) "Me gusta que te estés esforzando"
 */
$miPost->setComentarios($comentario01);
$miPost->setComentarios($comentario02);
var_dump($miPost->getComentarios());

include 'includes/footer.php';