<?php

session_start();

require "function.php";

if($_SESSION['number_sqf2']>0):

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+$_SESSION['number_sqf2'] ;$i++):


      do{

        $error = 0;

        $candi = array();

        $minr= mt_rand(-10,10);

        $range= mt_rand(0,10);

        $maxr= $minr+$range;

        $candi = array(mt_rand(-2,2),mt_rand(-2,2),mt_rand(-10,10));

        //y=$candi[0]x^{2}+$candi[1]x+$candi[2]
        //y=$candi[0](x+$candi[1]/2$candi[0])^{2}+$candi[2]-$candi[1]*$candi[1]/4$candi[0]
        //(-$candi[1]/2$candi[0],$candi[2]-$candi[1]*$candi[1]/4$candi[0])



        if ($candi[0]*$candi[1]==0):

          $error++;

        endif;


      }while($error>0);

      $xval = -1.0*$candi[1]/(2.0*$candi[0]);

      $x_n = -$candi[1];

      $x_d = 2*$candi[0];

      $x = reduction($x_n,$x_d);

      $y_n = 4*$candi[0]*$candi[2]-$candi[1]*$candi[1];

      $y_d = 4*$candi[0];

      $y = reduction($y_n,$y_d);

      $mid = ($minr*1.0+$maxr*1.0)/2.0;

      if ($candi[0]>0):

        if ($xval<$minr):

          $minx = $minr;

          $miny = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

          $maxx = $maxr;

          $maxy = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

        else:

          if($minr<=$xval && $xval<$mid):

            $minx = $x;

            $miny = $y;

            $maxx = $maxr;

            $maxy = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

          else:

            if($mid<=$xval && $xval<$maxr):

              $minx = $x;

              $miny = $y;

              $maxx = $maxr;

              $maxy = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

            else:

              if($max<=$xval):

                $minx = $maxr;

                $miny = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

                $maxx = $minr;

                $maxy = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

              endif;

            endif;

          endif;

        endif;

      else:

        if($xval<$minr):

            $maxx = $minr;

            $maxy = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

            $minx = $maxr;

            $miny = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

          else:

            if($minr<=$xval && $xval<$mid):

              $maxx = $x;

              $maxy = $y;

              $minx = $maxr;

              $miny = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

            else:

              if($mid<=$xval && $xval<$maxr):

                $maxx = $x;

                $maxy = $y;

                $minx = $maxr;

                $miny = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

              else:

                if($maxr<$xval):

                  $maxx = $maxr;

                  $maxy = $candi[0]*$maxr*$maxr+$candi[1]*$maxr+$candi[2];

                  $minx = $minr;

                  $miny = $candi[0]*$minr*$minr+$candi[1]*$minr+$candi[2];

                endif;

              endif;

            endif;

          endif;

        endif;


      $_SESSION["prob_".$i]="$"."y=".sq_form_a($candi[0],"x^{2}").sq_form_b($candi[1],"x").sq_form_c($candi[2])."(".$minr."\\leq x \\leq".$maxr.")$"."の最大値と最小値を求めなさい。";

      $_SESSION["ans_".$i]="最小値$".$miny."(x=".$minx.")$  最大値$".$maxy."(x=".$maxx.")$";


    endfor;

    $_SESSION['number']+=$_SESSION['number_sqf2'];

endif;


header('location: sqf_3.php');
exit();

?>
