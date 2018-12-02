<?php

session_start();

require "function.php";

if($_SESSION['number_sok1']>0):

    //$_SESSION['theme']='2次方程式③';

    //$filepath="./sokutan.csv";

    // 読み込み用にtest.csvを開きます。
    $f = fopen("./sokutan1.csv", "r");
    // test.csvの行を1行ずつ読み込みます。
    while($line = fgetcsv($f)){
      // 読み込んだ結果を表示します。
      $records[] = $line;
    }
// test.csvを閉じます。
    fclose($f);

    $cand=array_slice($records,$_SESSION['begin_sok1'],$_SESSION['end_sok1']-$_SESSION['begin_sok1']+1);

    shuffle($cand);


    for ($i=$_SESSION['number']+1 ;$i<=$_SESSION['number']+ $_SESSION['number_sok1'];$i++):


      $_SESSION["prob_".$i]=$cand[$i-$_SESSION['number']-1][0];
      //$_SESSION["prob_".$i]='a';

      $_SESSION["ans_".$i]="";

      $l=1;

      while($cand[$i-$_SESSION['number']-1][$l]!=NULL):

        $_SESSION["ans_".$i].=$cand[$i-$_SESSION['number']-1][$l].",";

        $l++;

      endwhile;

    endfor;

    $_SESSION['number']+=$_SESSION['number_sok1'];

endif;


header('location:num.php');
exit();

?>
