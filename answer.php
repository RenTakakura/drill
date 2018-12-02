<html>
  <head>
    <title>2次方程式答え</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <script type="text/javascript"
      src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
    </script>
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        TeX: { equationNumbers: { autoNumber: "AMS" }},
        tex2jax: {
          inlineMath: [ ['$','$'], ["\\(","\\)"] ],
          processEscapes: true
        },
        "HTML-CSS": { matchFontHeight: false },
        displayAlign: "left",
        displayIndent: "2em"
      });
    </script>
    <meta http-equiv="content-type" charset="utf-8">
  </head>
  <body>

    <title>2次方程式答え</title>

      
      <?php
      session_start();

      for ($i=1 ;$i<=$_SESSION['number'] ;$i++):
        echo "<span class=\"col-1\">$($i)(".$_SESSION["ans_".$i][0].",".$_SESSION["ans_".$i][1].")$</span>";
        if ($i%$_SESSION['one_raw_num']==0): ?>
        </div>
        <div>
        <?php endif; ?>
        </div>

      <?php endfor;?>
  </body>
</html>
