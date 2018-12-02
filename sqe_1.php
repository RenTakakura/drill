<?php

session_start();

require "function.php";
/*
if($_SESSION['number_sqe1']>0):
    //$_SESSION['theme']='2次方程式①';

    for ($i=1 ;$i<=$_SESSION['number_sqe1'] ;$i++):

      $sqe_1 = array();

      $sqe_1 = array(mt_rand(-10,10),mt_rand(-10,10));

      $a = - (($sqe_1[0])+($sqe_1[1]));

      $b = (($sqe_1[0])*($sqe_1[1]));

      //$_SESSION["prob_".$i]="$".sq_form_a(1,"x^{2}").sq_form_b($a,"x").sq_form_c($b)."=0$";

      $_SESSION["prob_".$i]="$".sq_form_a(1,"x^{2}").sq_form_b($a,"x").sq_form_c($b)."=0$";

      $_SESSION["ans_".$i]="$(".$sqe_1[0].",".$sqe_1[1].")$";

    endfor;

    $_SESSION['number']+=$_SESSION['number_sqe1'];

endif;


*/
header('location: sqe_2.php');

exit();

?>
