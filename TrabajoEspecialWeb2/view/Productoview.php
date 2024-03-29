    <?php

    require_once('libs/Smarty.class.php');

    class Productoview {
        private $smarty;

        function __construct(){
            $authHelper = new AuthHelper();
            $userName = $authHelper->getLoggedUserName();
            $isAdmin =$authHelper->isAdmin(); ;            
            
            $this->smarty = new Smarty();
            $this->smarty->assign('BASE_URL',BASE_URL);
            $this->smarty->assign('userName', $userName);
            $this->smarty->assign('isAdmin', $isAdmin);


        }
        //todos los productos
        public function DisplayProductos($Producto,$cat){
            $this->smarty->assign('lista_Productos',$Producto);
            $this->smarty->assign('cat',$cat);
            $this->smarty->display('templates/index.tpl');
        }
        //ordena asc
        public function ordenar($ordenar){
            $this->smarty->assign('orden',$ordenar);
            $this->smarty->display('templates/orden.tpl');
        }
        //precargar form editar
        public function precargar($producto,$categorias){
            $this->smarty->assign('hola',$producto);
            $this->smarty->assign('categorias',$categorias);
            $this->smarty->display('templates/precargar.tpl');   
        }
        //detalle producto
        public function showProducto($producto){
            $this->smarty->assign('productos',$producto);
            $this->smarty->display('templates/detallep.tpl');   
        }
        //comentarios renderizados
        public function DisplayComentariosCSR($id){
            $this->smarty->assign('titulo',"Lista de comentarios CSR");
            $this->smarty->assign('producto',$p);
            $this->smarty->display('templates/vercomentarios.tpl');   
        }
        //imprimir los errores
        public function showError($msgError) {
            echo "<h1>ERROR!</h1>";
            echo "<h2>{$msgError}</h2>";
        }
    }

