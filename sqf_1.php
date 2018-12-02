<?php

session_start();

require "function.php";


if($_SESSION['number_sqf1']>0):

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+$_SESSION['number_sqf1'] ;$i++):


      do{

        $error = 0;

        $candi = array();

        $candi = array(mt_rand(-2,2),mt_rand(-10,10),mt_rand(-10,10));



        if ($candi[0]*$candi[1]==0):

          $error++;

        endif;


      }while($error>0);

      //y=$candi[0]x^{2}+$candi[1]x+$candi[2]
      //y=$candi[0](x+$candi[1]/2$candi[0])^{2}+$candi[2]-$candi[1]*$candi[1]/4$candi[0]
      //(-$candi[1]/2$candi[0],$candi[2]-$candi[1]*$candi[1]/4$candi[0])
      //(-$candi[1]/2$candi[0],$candi[2]-$candi[1]*$candi[1]/4$candi[0])

      $x_n = -$candi[1];

      $x_d = 2*$candi[0];

      $x = reduction($x_n,$x_d);

      $y_n = 4*$candi[0]*$candi[2]-$candi[1]*$candi[1];

      $y_d = 4*$candi[0];

      $y = reduction($y_n,$y_d);

      $_SESSION["prob_".$i]="$"."y=".sq_form_a($candi[0],"x^{2}").sq_form_b($candi[1],"x").sq_form_c($candi[2])."$"."の頂点と軸を求めなさい。";

      $_SESSION["ans_".$i]="頂点$(".$x.",".$y.")$  軸$"."x=".$x."$";


    endfor;

    $_SESSION['number']+=$_SESSION['number_sqf1'];

endif;


header('location: sqf_2.php');
exit();

?>
