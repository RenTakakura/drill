<html>
  <head>
    <title>テスト作成画面</title>
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

    <br><br><br>

    <div class="double">
	     <h2>テスト作成画面</h2>
    </div>

    <br><br><br>

    <?php
    session_start(); ?>


    <form action="post.php" method="post">
    <div onclick="obj=document.getElementById('opensqe').style; obj.display=(obj.display=='none')?'block':'none';">
    <a style="cursor:pointer;">▼２次方程式</a>
    </div>
    <div id="opensqe" style="display:none;clear:both;">
    <table class="type06">
    <tbody>
      <tr>
        <td>
          ２次方程式(因数分解)
        </td>
        <td>
          例題：$x^{2}+4x+3=0$</p>
        </td>
        <td>
          <input class="box1" type="text" name="number_sqe1" value="" />問
        </td>
      </tr>

      <tr>
        <td>
          ２次方程式(解の公式)
        </td>
        <td>
          例題：$2x^{2}+5x-1=0$
        </td>
        <td>
        <input class="box1" type="text" name="number_sqe2" value="" />問
        </td>
      </tr>

      <tr>
        <td>
          ２次方程式(たすき掛け)
        </td>
        <td>
          例題：$8x^{2}+22x+5=0$
        </td>
        <td>
          <input class="box1" type="text" name="number_sqe3" value="" />問
        </td>
      </tr>
    </tbody>
    </table>
    </div>

    <div onclick="obj=document.getElementById('opensqf').style; obj.display=(obj.display=='none')?'block':'none';">
    <a style="cursor:pointer;">▼２次関数</a>
    </div>
    <div id="opensqf" style="display:none;clear:both;">
    <table class="type06">
    <tbody>
      <tr>
        <td>
          2次関数の軸・頂点(基本)
        </td>
        <td>
          例題：$y=2x^{2}+5x+8$ の頂点と軸を求めなさい。
        </td>
        <td>
          <input class="box1" type="text" name="number_sqf1" value="" />問
        </td>
      </tr>

      <tr>
        <td>
          2次関数の最大最小(基本)
        </td>
        <td>
          例題：$y=−x^{2}−x−2(−3\leq x\leq3)$ の最大値と最小値を求めなさい。
        </td>
        <td>
          <input class="box1" type="text" name="number_sqf2" value="" />問
        </td>
      </tr>

      <tr>
        <td>
          2次関数の最大最小(関数が$a$を含む)
        </td>
        <td>
          例題：$y=−x^{2}−3ax+8(5 \leq x \leq 10)$ の最小値を求めなさい。
        </td>
        <td>
          <input class="box1" type="text" name="number_sqf3" value="" />問
        </td>
      </tr>
    </tbody>
    </table>
    </div>
<!--
    <tr>
      <td>
        確率(基本：順列・組み合わせ)
      </td>
      <td>
        例題：
      </td>
      <td>
        <input class="box1" type="text" name="number_prob1" value="" />問
      </td>
    </tr>
-->
    <div onclick="obj=document.getElementById('open2eq').style; obj.display=(obj.display=='none')?'block':'none';">
      <a style="cursor:pointer;">▼連立方程式</a>
    </div>
    <div id="open2eq" style="display:none;clear:both;">
    <table class="type06">
    <tbody>
    <tr>
      <td>
        連立方程式
      </td>
      <td>
        例題：$\left\{\begin{array}{l} 2x+3y=8\\ 3x-2y=-1\end{array}\right.$
      </td>
      <td>
        <input class="box1" type="text" name="number_2eq" value="" />問
      </td>
    </tr>

  </tbody>
  </table>
  </div>

  <div onclick="obj=document.getElementById('opennum').style; obj.display=(obj.display=='none')?'block':'none';">
    <a style="cursor:pointer;">▼数の計算</a>
  </div>
  <div id="opennum" style="display:none;clear:both;">
  <table class="type06">
  <tbody>
  <tr>
    <td>
      数の計算
    </td>
    <td>
      例題：$-1+\frac{10}{3}+1.5=$
    </td>
    <td>
      <input class="box1" type="text" name="number_num" value="" />問
    </td>
    <td>
      項数:<input class="box1" type="text" name="min_term" value="2" />~<input class="box1" type="text" name="max_term" value="5" />
    </td>
    <td>
      カッコ<input name="bracket" type="checkbox" value="">
    </td>
    <td>
      小数<select name="decimal" value="0">
            <option value="0"> なし</option>
            <option value="1"> 小数第一位</option>
            <option value="2"> 小数第二位</option>
          </select>

    </td>
    <td>
      分数<input name="fraction" type="checkbox" value=1>
    </td>

  </tr>

</tbody>
</table>
</div>

  <div onclick="obj=document.getElementById('opensok1').style; obj.display=(obj.display=='none')?'block':'none';">
  <a style="cursor:pointer;">▼速読英単語</a>
  </div>
  <div id="opensok1" style="display:none;clear:both;">
  <table class="type06">
  <tbody>
    <tr>
      <td>
        必修
      </td>
      <td>
        範囲：No.<input class="box1" type="text" name="begin_sok1" value="1" />~<input class="box1" type="text" name="end_sok1" value="2000" />
      </td>
      <td>
        <input class="box1" type="text" name="number_sok1" value="" />問
      </td>
    </tr>
  </tbody>
  </table>
  </div>
    <br>
    シャッフル<input name="sf" type="checkbox" value="1">
    <br>
    (横<input class="box1" type="text" name="one_raw_num" value="1" />問)
    <br>
    <center><button class="square_btn" type="submit" name="make_sqe１" value="send" />問題作成</button></center>

    </form>

 </body>
</html>
