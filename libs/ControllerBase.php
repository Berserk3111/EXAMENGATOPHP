<?php
class ControllerBase{

    public function __construct() {
		require_once 'Connect.php';
        require_once 'EntityBase.php';
        require_once 'ModelBase.php';
        
        foreach(glob("models/*.php") as $file){
            require_once $file;
        }
    }
    
    public function view($view,$data){
        foreach ($data as $id_assoc => $value) {
            ${$id_assoc}=$value; 
        }
        
        require_once 'libs/HelpViews.php';
        $helper=new HelpViews();
    
        require_once 'views/'.$view.'View.php';
    }
    
    public function redirect($controller=DEFAULT_CONTROLLER,$action=DEFAULT_ACTION){
        header("Location:index.php?controller=".$controller."&action=".$action);
    }
    
    

}
?>
