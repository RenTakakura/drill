<?php

session_start();

require "function.php";

if($_SESSION['number_sqf3']>0):

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+$_SESSION['number_sqf3'] ;$i++):


      do{

        $error = 0;

        $candi = array();

        $minr= mt_rand(-5,5);

        $range= mt_rand(1,5);

        $maxr= $minr+$range;

        $candi = array(mt_rand(-2,2),mt_rand(-10,10),mt_rand(-10,10));

        //y=$candi[0]x^{2}+$candi[1]ax+$candi[2]
        //y=$candi[0](x+$candi[1]a/2$candi[0])^{2}+$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0]
        //(-$candi[1]a/2$candi[0],$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0])



        if ($candi[0]*$candi[1]==0):

          $error++;

        endif;


      }while($error>0);

      $xval = -1.0*$candi[1]/(2.0*$candi[0]);

      $x_n = -$candi[1];

      $x_d = 2*$candi[0];

      $x = reduction($x_n, $x_d)."a";

      $y_n = 4*$candi[0]*$candi[2]-$candi[1]*$candi[1];

      $y_d = 4*$candi[0];

      $y = reduction($y_n, $y_d)."a";

      $mid = ($minr*1.0+$maxr*1.0)/2.0;


        //y=$candi[0]x^{2}+$candi[1]ax+$candi[2]
        //y=$candi[0](x+$candi[1]a/2$candi[0])^{2}+$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0]
        //(-$candi[1]a/2$candi[0],$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0])

        //if($minr>=-$candi[1]a/2$candi[0])
        //->
          //if($candi[0]*$candi[1]<0):
            //a<=-2*$minr*$candi[0]/$candi[1];
          //else:
            //a>=-2*$minr*$candi[0]/$candi[1];

        //if($maxr<=-$candi[1]a/2$candi[0])
        //<=>if($candi[0]*$candi[1]<0):
          //a>=-2*$maxr*$candi[0]/$candi[1];
        //else:
          //a<=-2*$maxr*$candi[0]/$candi[1];

        $aamin = reduction(-2*$minr*$candi[0],$candi[1]);

        $aamax = reduction(-2*$maxr*$candi[0],$candi[1]);

        if ($candi[0]*$candi[1]<0):

          $a1range="a \\leq".$aamin;

          $a2range=$aamin."< a <".$aamax;

          $a3range="a \\geq".$aamax;

        else:

          $a1range="a \\geq".$aamin;

          $a2range=$aamax."< a <".$aamin;

          $a3range="a \\leq".$aamax;


        endif;

        $ax1 = $minr;

        $ay1 = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

        $ax2 = $x;

        $ay2 = $y;

        $ax3 = $maxr;

        $ay3 = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

        //y=$candi[0]x^{2}+$candi[1]ax+$candi[2]
        //y=$candi[0](x+$candi[1]a/2$candi[0])^{2}+$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0]
        //(-$candi[1]a/2$candi[0],$candi[2]-a*a*$candi[1]*$candi[1]/4$candi[0])

        //if($mid<=-$candi[1]a/2$candi[0])
        //->
          //if($candi[0]*$candi[1]<0):
            //a>=-2*$mid*$candi[0]/$candi[1];
          //else:
            //a<=-2*$mid*$candi[0]/$candi[1];


        $xmid = reduction(-2*$mid*$candi[0],$candi[1]);

        if ($candi[0]*$candi[1]<0):

          $b1range="a \\geq".$xmid;

          $b2range="a <".$xmid;

        else:

          $b1range="a \\leq".$xmid;

          $b2range="a >".$xmid;

        endif;

        $bx1 = $minr;

        $by1 = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

        $bx2 = $maxr;

        $by2 = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

      if ($candi[0]>0):

        $_SESSION["prob_".$i]="$"."y=".sq_form_a($candi[0],"x^{2}").sq_form_b($candi[1],"ax").sq_form_c($candi[2])."(".$minr."\\leq x \\leq".$maxr.")$"."の最小値を求めなさい。";

        $_SESSION["ans_".$i]="最小値$\\left\\{\\begin{array}{l}".$ay1."(".$a1range."\\;\\;,\\;\\;x=".$ax1.") \\\\ ".$ay2."(".$a2range."\\;\\;,\\;\\;x=".$ax2.") \\\\".$ay3."(".$a3range
                              ."\\;\\;,\\;\\;x=".$ax3.")\\end{array}\\right.$<br><br><br>　最大値$\\left\\{\\begin{array}{l}".$by1."(".$b1range."\\;\\;,\\;\\;x=".$bx1.") \\\\ ".$by2."(".$b2range."\\;\\;,\\;\\;x=".$bx2.")\\end{array}\\right.$";;

      else:

        $_SESSION["prob_".$i]="$"."y=".sq_form_a($candi[0],"x^{2}").sq_form_b($candi[1],"ax").sq_form_c($candi[2])."(".$minr."\\leq x \\leq".$maxr.")$"."の最小値を求めなさい。";

        $_SESSION["ans_".$i]="最小値$ \\left\\{\\begin{array}{l}".$by1."(".$b1range."\\;\\;,\\;\\;x=".$bx1.") \\\\ ".$by2."(".$b2range."\\;\\;,\\;\\;x=".$bx2.")\\end{array}\\right.$<br><br><br>　最大値$\\left\\{\\begin{array}{l}".$ay1."(".$a1range
                              ."\\;\\;,\\;\\;x=".$ax1.") \\\\ ".$ay2."(".$a2range."\\;\\;,\\;\\;x=".$ax2.") \\\\".$ay3."(".$a3range
                              ."\\;\\;,\\;\\;x=".$ax3.")\\end{array}\\right.$";

      endif;
    endfor;

    $_SESSION['number']+=$_SESSION['number_sqf3'];

endif;


header('location: 2eq.php');
exit();

?>
