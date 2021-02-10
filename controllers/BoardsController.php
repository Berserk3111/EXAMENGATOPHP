<?php

class BoardsController extends ControllerBase{
    public $connect;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->connect=new Connect();
        $this->adapter=$this->connect->connection();
    }
    
 
    public function index(){
        
      
        $board=new Board($this->adapter);
        
    
        $allPositions=$board->getAll();

   
        $getLastPosition=$board->getLast();
        
   
        $this->view("index",array("allPositions"=>$allPositions, "getLastPosition"=>$getLastPosition));
    }
    
    public function play(){

            $board=new Board($this->adapter);
            $allPositions=$board->getAll();

            if(empty($allPositions))
                $turn="X";
            else if(((count($allPositions))%2==0))
                $turn="X";
            else
                $turn="O";
            
            $player=$_POST["position"].$turn;
            
            $board->setPosition($player);
            $save=$board->saveBoard();
        
        $this->redirect("Boards", "index");
    }


    public function newBoard(){
    
            $board=new Board($this->adapter);
            $board->newBoard(); 
       
        $this->redirect();
    }
    


}
?>
