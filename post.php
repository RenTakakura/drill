<?php

session_start();

$_SESSION = array();

$post_list=['one_raw_num','shuffle','number',
            'number_sqe1','number_sqe2','number_sqe3',
            'number_sqf1','number_sqf2','number_sqf3',
            'number_prob1',
            'number_2eq',
            'number_num','bracket','decimal','fraction','minus','min_term','max_term',
            'number_sok1','begin_sok1','end_sok1'];

for ($i = 0; $i < count($post_list); $i++){

  $_SESSION[$post_list[$i]] = 0;

}

for ($i = 0; $i < count($post_list); $i++){

  $_SESSION[$post_list[$i]] += $_POST[$post_list[$i]];

}



header('location: sqe_1.php');

exit();

?>
