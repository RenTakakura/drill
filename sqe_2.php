<?php

session_start();

require "function.php";

if($_SESSION['number_sqe2']>0):

    //$_SESSION['theme']='2次方程式②';

    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+$_SESSION['number_sqe2'] ;$i++):



      do{

        $error = 0;

        $candi = array();

        $candi = array(mt_rand(-10,10),mt_rand(-20,20),mt_rand(-20,20));



        if ($candi[0]*$candi[1]*$candi[2]==0):

          $error++;

        else:

          if (abs($candi[1])%abs(2*$candi[0])==0):

            $error++;

          endif;

        endif;

        $D=$candi[1]*$candi[1]-4*$candi[0]*$candi[2];

        $k=1;

        if ($D<=0):

          $error++;

        else:

          for ($j=2 ;$j<=30 ;$j++):

            $cnt =0;

            do{
              if ($D%($j*$j)==0):

                $D /= ($j*$j);

                $k *= $j;

              else:
                $cnt++;
              endif;

            }while($cnt==0);

          endfor;

        endif;

        if ($D==1):

          $error++;

        endif;

      }while($error>0);

      $x = 2*$candi[0];

      $y = -1 * $candi[1];

      for ($j=2 ;$j<=30 ;$j++):

        $cnt =0;

        do{

          if ($x%$j==0 && $y%$j==0 && $k%$j==0):

            $x /=$j;

            $y /=$j;

            $k /=$j;

          else:
            $cnt++;
          endif;

        }while($cnt==0);

      endfor;



      if ($k == 1):

        $k = "";

      endif;

      //$y /= gmp_gcd(gmp_gcd($x, $y),$k);

      //$k /= gmp_gcd(gmp_gcd($x, $y),$k);

      $_SESSION["prob_".$i]="$".sq_form_a($candi[0],"x^{2}").sq_form_b($candi[1],"x").sq_form_c($candi[2])."=0$";

      $_SESSION["ans_".$i]="$\\frac{".$y."\pm".$k."\sqrt{".$D."}}{".$x."}$";


    endfor;

    $_SESSION['number']+=$_SESSION['number_sqe2'];

endif;


header('location: sqe_3.php');
exit();

?>
