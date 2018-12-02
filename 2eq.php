<?php

session_start();

require "function.php";

if($_SESSION['number_2eq']>0):

    //$_SESSION['theme']='2次方程式③';

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+ $_SESSION['number_2eq'];$i++):

        $error = 0;

        $candi = array();

        $candi = array(mt_rand(-10,10),mt_rand(-10,10));

        $ce = array(mt_rand(-10,10),mt_rand(-10,10),mt_rand(-10,10),mt_rand(-10,10));

        //($candi[0] x + $candi[1])($candi[2] x + $candi[3])=0
        //x = -$candi[1]/$candi[0], -$candi[3]/$candi[2]
        //$candi[0]*$candi[2]x^{2}+($candi[0]*$candi[3]+$candi[1]*$candi[2])x+$candi[1]*$candi[3]=0

        $a=$ce[0]*$candi[0]+$ce[1]*$candi[1];
        $b=$ce[2]*$candi[0]+$ce[3]*$candi[1];

      $_SESSION["prob_".$i]="$ \\left\\{\\begin{array}{l}".sq_form_a($ce[0],"x").sq_form_b($ce[1],"y")."=".$a." \\\\ "
                            .sq_form_a($ce[2],"x").sq_form_b($ce[3],"y")."=".$b
                            ."\\end{array}\\right.$";

      $_SESSION["ans_".$i]="$(".$candi[0].",".$candi[1].")$";


    endfor;

    $_SESSION['number']+=$_SESSION['number_2eq'];

endif;


header('location:sok1.php');
exit();

?>
