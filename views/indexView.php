<!DOCTYPE HTML>
<html lang="es">

<head>
<meta charset="utf-8"/>
<title>Juego del Gato</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="libs/estilos.css">
</head>

<body > 
    
<?php 

$arr_winner=array();
if(!empty($allPositions)){
    foreach($allPositions as $key => $value) {
        $arr=str_split($value->position); 
        $arr_posicion_jugador[$arr[0].$arr[1]]=$arr[2];

        
        array_push($arr_winner, $value->position);
    }
}
    
    

$turn="X";


if(!empty($getLastPosition[0]->position))
    {
        $arr_turn=str_split($getLastPosition[0]->position); 
        if($arr_turn[2]=="X")
            $turn="O";
    }
      

$winner="empate";

if((!empty($allPositions)) && (count($allPositions)==9))
    $endGame=true;
else
    $endGame=false;

    $mark_winner=array();

    $letras=array("X","O");
    foreach($letras as $k=>$v)
    {
       if((in_array('11'.$v, $arr_winner)) && (in_array('12'.$v, $arr_winner)) && (in_array('13'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '11', '12', '13');
       }
       else if((in_array('21'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('23'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '21', '22', '23');
       }
       else if((in_array('31'.$v, $arr_winner)) && (in_array('32'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '31', '32', '33');
       }
   
       
       if((in_array('11'.$v, $arr_winner)) && (in_array('21'.$v, $arr_winner)) && (in_array('31'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '11', '21', '31');

       }
     
       else if((in_array('12'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('32'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '12', '22', '32');
       }
    
       else if((in_array('13'.$v, $arr_winner)) && (in_array('23'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '13', '23', '33');
       }
   
     
       if((in_array('11'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('33'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '11', '22', '33');
       }
   
   
       if((in_array('31'.$v, $arr_winner)) && (in_array('22'.$v, $arr_winner)) && (in_array('13'.$v, $arr_winner)))
       {
           $endGame=true;
           $winner=$v;
           array_push($mark_winner, '31', '22', '13');
       }       
   
    }
   
    if($endGame)
     {
       if($winner=="empate")
           $message="<h3>¡EMPATE X y O!<h3><h6>Fin del juego</h6>";
       else
           $message="<h3>¡FELICIDADES HA GANADO: ".$winner."!<h3><h6>Fin del juego</h6>";
     }
     else
       $message="<h4>Es el turno del jugador ".$turn."</h4><h6>Selecciona la casilla deseada para jugar</h6>";
   
?> 


<div class="container">
    <div class="row">
        
        <div class="col-sm-7 col-sm-push-8">
            <div class="text-center">
            <div class="row text-center ">
                <div class="col-sm">  
                    
                    <form action="<?php echo $helper->url("boards","play"); ?>" method="post" class="col-lg-5" name="00"><br>
                </div>
            </div>
    
           
            <div class="row" >
                <div class="col-sm">
                <button type="submit" name="position" value="11" <?php if((!empty($arr_posicion_jugador[11]) || $endGame)) echo "disabled";?> <?php if(in_array("11", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[11]; ?></button>
                <button type="submit" name="position" value="12" <?php if((!empty($arr_posicion_jugador[12]) || $endGame)) echo "disabled";?> <?php if(in_array("12", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[12]; ?></button>
                <button type="submit" name="position" value="13" <?php if((!empty($arr_posicion_jugador[13]) || $endGame)) echo "disabled";?> <?php if(in_array("13", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[13]; ?></button>
                </div>
            </div>
    
        
            <div class="row">
                <div class="col-sm">
                <button type="submit" name="position" value="21" <?php if((!empty($arr_posicion_jugador[21]) || $endGame)) echo "disabled";?> <?php if(in_array("21", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[21]; ?></button>
                <button type="submit" name="position" value="22" <?php if((!empty($arr_posicion_jugador[22]) || $endGame)) echo "disabled";?> <?php if(in_array("22", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[22]; ?></button>
                <button type="submit" name="position" value="23" <?php if((!empty($arr_posicion_jugador[23]) || $endGame)) echo "disabled";?> <?php if(in_array("23", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[23]; ?></button>
                </div>
            </div>
    

            <div class="row">
                <div class="col-sm">
                <button type="submit" name="position" value="31" <?php if((!empty($arr_posicion_jugador[31]) || $endGame)) echo "disabled";?> <?php if(in_array("31", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[31]; ?></button>
                <button type="submit" name="position" value="32" <?php if((!empty($arr_posicion_jugador[32]) || $endGame)) echo "disabled";?> <?php if(in_array("32", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[32]; ?></button>
                <button type="submit" name="position" value="33" <?php if((!empty($arr_posicion_jugador[33]) || $endGame)) echo "disabled";?> <?php if(in_array("33", $mark_winner)) echo "style='background-color: red;'";?>><?php echo @$arr_posicion_jugador[33]; ?></button>
                </div>
            </div>
        
        </div>        
        </div>

        <br>
        <div class="col-sm-5 col-sm-pull-4">
            <center>
                <br>
            <img src="https://images.vexels.com/media/users/3/202526/isolated/preview/1c2ebd49adf69af3336b073db877bb3b-icono-de-dibujos-animados-de-avatar-de-gato-negro-by-vexels.png" alt="" width="50%">
            <h4>El gato</h4>
       
            <?PHP echo $message; ?>
  
            <a class="btn btn-primary" href="<?php echo $helper->url("boards","newBoard"); ?>" >Comenzar de Nuevo</a><br><br>
            </center>
        </div>
    </div>
</div>

</body>
</html>