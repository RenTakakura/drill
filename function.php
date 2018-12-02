<?php

function reduction(int $n,int $d){

  $re=1;

  $n_abs=abs($n);

  $d_abs=abs($d);

  $a=$n_abs;

  $b=$d_abs;

  $re=$a-$b*intdiv($a,$b);

  while($re>0):

    $a=$b;

    $b=$re;

    $re=$a-$b*intdiv($a,$b);

  endwhile;

  $n_abs=intdiv($n_abs,$b);

  $d_abs=intdiv($d_abs,$b);


  if ($n*$d>0):

    $x = "+\\frac{".$n_abs."}{".$d_abs."}";

  elseif($n*$d==0):

    $x = "";

  else:

    $x = "-\\frac{".$n_abs."}{".$d_abs."}";

  endif;

  if ($d_abs==1):

    if ($n*$d>0):

      $x = "+".$n_abs;

    elseif($n*$d==0):

      $x = "";

    else:

      $x = "-".$n_abs;

    endif;

  endif;

  return $x;

}//ここで関数終了

function sq_form_a($x, $y){

  $a=$x.$y;

  if ($x==1):

    $a=$y;

  else:

    if ($x==-1):

      $a = "-".$y;

    else:

      if ($x==0):

        $a = " ";

      endif;

    endif;

  endif;

  return $a;

}

function sq_form_b($x,$y){

  if ($x>0):

    $b="+".$x.$y;

  else:

    $b=$x.$y;

  endif;

  if ($x==1):

      $b="+".$y;

  else:

    if($x==-1):

      $b="-".$y;

    else:

      if($x==0):

        $b=" ";

      endif;

    endif;

  endif;

  return $b;

}

function sq_form_c(int $x){

  if ($x>0):

    $c="+".$x;

  else:

    $c=$x;

  endif;

  if($x==0):

      $c=" ";

  endif;

  return $c;

}

function num_form(float $x){

  if ($x>0):

    $c="+".$x;

  else:

    $c=$x;

  endif;

  if($x==0):

      $c=" ";

  endif;

  return $c;

}

function cal_frac(float $a_n,float $a_d,float $b_n,float $b_d){

  $c = array();

  $c[0] =(float)($a_n*$b_d+$a_d*$b_n);

  $c[1] = (float)($a_d*$b_d);

  return $c;


}
