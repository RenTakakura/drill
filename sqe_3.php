<?php

session_start();

require "function.php";

if($_SESSION['number_sqe3']>0):

    //$_SESSION['theme']='2次方程式③';

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+ $_SESSION['number_sqe3'];$i++):

      do{

        $error = 0;

        $candi = array();

        $candi = array(mt_rand(-10,10),mt_rand(-10,10),mt_rand(-10,10),mt_rand(-10,10));

        //($candi[0] x + $candi[1])($candi[2] x + $candi[3])=0
        //x = -$candi[1]/$candi[0], -$candi[3]/$candi[2]
        //$candi[0]*$candi[2]x^{2}+($candi[0]*$candi[3]+$candi[1]*$candi[2])x+$candi[1]*$candi[3]=0

        if (abs($candi[0]*$candi[2])<2 ):

          $error++;

        endif;

      }while($error>0);

      $x_n = -$candi[1];

      $x_d = $candi[0];

      $y_n = -$candi[3];

      $y_d = $candi[2];

      $x = reduction($x_n,$x_d);

      $y = reduction($y_n,$y_d);

      $_SESSION["prob_".$i]="$".sq_form_a($candi[0]*$candi[2],"x^{2}").sq_form_b($candi[0]*$candi[3]+$candi[1]*$candi[2],"x").sq_form_c($candi[1]*$candi[3])."=0$";

      $_SESSION["ans_".$i]="$(".$x.",".$y.")$";


    endfor;

    $_SESSION['number']+=$_SESSION['number_sqe3'];

endif;


header('location: sqf_1.php');
exit();

?>
