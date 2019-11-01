    <?php

    require_once('libs/Smarty.class.php');

    class Productoview {
        private $smarty;

        function __construct(){
            $authHelper = new AuthHelper();
            $userName = $authHelper->getLoggedUserName();
            $this->smarty = new Smarty();
            $this->smarty->assign('BASE_URL',BASE_URL);
            $this->smarty->assign('userName', $userName);

        }

        public function DisplayProductos($Producto,$cat){
            $this->smarty->assign('lista_Productos',$Producto);
            $this->smarty->assign('cat',$cat);
            $this->smarty->display('templates/index.tpl');
        }
        
        public function ordenar($ordenar){
            $this->smarty->assign('titulo',"ordenar");
            $this->smarty->assign('orden',$ordenar);
            $this->smarty->display('templates/orden.tpl');
        }
        public function precargar($producto){
            $this->smarty->assign('titulo',"precargar");
            $this->smarty->assign('hola',$producto);
            $this->smarty->display('templates/precargar.tpl');   
        }
        public function showProducto($producto){
            $this->smarty->assign('titulo',"producto");

            $this->smarty->assign('productos',$producto);
            $this->smarty->display('templates/detallep.tpl');   
        }
        public function showError($msgError) {
            echo "<h1>ERROR!</h1>";
            echo "<h2>{$msgError}</h2>";
        }
    }

