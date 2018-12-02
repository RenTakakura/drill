<?php


session_start();

require "function.php";

if ($_SESSION['number_num']>0):

  for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+$_SESSION['number_num'] ;$i++):

    $fraction_n = array();

    $fraction_d = array();

    $cnt =1;

    $term[]=array();

    $term_form[]=array();



    $terms = mt_rand($_SESSION['min_term'],$_SESSION['max_term']);

    if($_SESSION['decimal'] >= 1):

      //echo $_SESSION['number_num'];

      if($_SESSION['fraction'] == 1):


        $int_term=(int)((mt_rand(0,$terms)+mt_rand(0,$terms))*2/3);

        $decimal_term=(int) (mt_rand(0,$terms-$int_term));

        $fraction_term=$terms-$int_term-$decimal_term;

      else:



        $int_term=mt_rand(0,$terms);

        $decimal_term=$terms-$int_term;

        $fraction_term=0;

      endif;

    else:

      if($_SESSION['fraction'] == 1):

        $int_term=mt_rand(0,$terms);

        $decimal_term=0;

        $fraction_term=$terms-$int_term;

      else:

        $int_term=$terms;

        $decimal_term=0;

        $fraction_term=0;

      endif;

    endif;

    //echo $_SESSION['number_num'];


    for($int=1;$int<=$int_term;$int++):

      $term[$cnt] = mt_rand(-100,100);

      $term_form[$cnt]=num_form($term[$cnt]);

      $fraction_n[$cnt]=$term[$cnt];

      $fraction_d[$cnt]=1;

      $cnt++;

    endfor;

    for($decimal=1;$decimal<=$decimal_term;$decimal++):

      if($_SESSION['decimal']==1):

        $term[$cnt]= mt_rand(-100,100)+mt_rand(-9,9)*0.1;

        $term_form[$cnt]=num_form($term[$cnt]);

        $fraction_n[$cnt]=$term[$cnt]*10;

        $fraction_d[$cnt]=10;

        $cnt++;

      else:

        $term[$cnt]= mt_rand(-100,100)+mt_rand(0,9)*0.1+mt_rand(0,9)*0.01;

        $term_form[$cnt]=num_form($term[$cnt]);

        $fraction_n[$cnt]=$term[$cnt]*100;

        $fraction_d[$cnt]=100;

        $cnt++;

      endif;

    endfor;

    for($fraction=1;$fraction<=$fraction_term;$fraction++):

      $fraction_n[$cnt]=mt_rand(-10,10);

      $fraction_d[$cnt]=mt_rand(2,15);

      $term_form[$cnt]=reduction($fraction_n[$cnt],$fraction_d[$cnt]);

      $cnt++;

    endfor;

    echo "a";

    $_SESSION["prob_".$i]='$';

    for($j=1;$j<$cnt;$j++):

      $_SESSION["prob_".$i].=$term_form[$j];

    endfor;

    $_SESSION["prob_".$i].='$';

    $_SESSION["ans_".$i]='$';

    $n=0;

    $d=1;


    for($k=1;$k<$cnt;$k++):

      $frac_cal = cal_frac($n,$d,$fraction_n[$k],$fraction_d[$k]);

      $n=($frac_cal[0]);

      $d=($frac_cal[1]);

    endfor;

    $_SESSION["ans_".$i].=reduction($n,$d);

    $_SESSION["ans_".$i].='$';

  endfor;

  $_SESSION['number']+=$_SESSION['number_num'];




endif;

header('location:paper.php');
exit();

?>
