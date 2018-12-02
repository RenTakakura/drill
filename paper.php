
<html>
  <head>
    <title>テスト画面</title>
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
    <style type="text/css">
    /* ▼タブ */
    #tabcontrol a {
       display: inline-block;            /* インラインブロック化 */
       border-width: 1px 1px 0px 1px;    /* 下以外の枠線を引く */
       border-style: solid;              /* 枠線の種類：実線 */
       border-color: black;              /* 枠線の色：黒色 */
       border-radius: 0.75em 0.75em 0 0; /* 枠線の左上角と右上角だけを丸く */
       padding: 0.75em 1em;              /* 内側の余白 */
       text-decoration: none;            /* リンクの下線を消す */
       color: black;                     /* 文字色：黒色 */
       background-color: white;          /* 背景色：白色 */
       font-weight: bold;                /* 太字 */
       position: relative;               /* JavaScriptでz-indexを調整するために必要 */
    }
    /* ▼タブにマウスポインタが載った際(任意) */
    #tabcontrol a:hover {
       text-decoration: underline;       /* 文字に下線を引く */
    }

    /* ▼タブの中身 */
    #tabbody div {
       border: 1px solid black; /* 枠線：黒色の実線を1pxの太さで引く */
       margin-top: -1px;        /* 上側にあるタブと1pxだけ重ねるために「-1px」を指定 */
       padding: 1em;            /* 内側の余白量 */
       background-color: white; /* 背景色：白色 */
       position: relative;      /* z-indexを調整するために必要 */
       z-index: 0;              /* 重なり順序を「最も背面」にするため */
    }

    /* ▼タブの配色 */
    #tabcontrol a:nth-child(1), #tabbody div:nth-child(1) { background-color: #ffffdd; }/* 1つ目のタブとその中身用の配色 */
    #tabcontrol a:nth-child(2), #tabbody div:nth-child(2) { background-color: #ddffdd; }/* 2つ目のタブとその中身用の配色 */
    #tabcontrol a:nth-child(3), #tabbody div:nth-child(3) { background-color: #ddddff; }/* 3つ目のタブとその中身用の配色 */

  </style>

    <meta http-equiv="content-type" charset="utf-8">
  </head>

  <body>

    <div class="double">
	     <h2>テスト画面</h2>
    </div>

    <?php
    session_start();

      $order=range(1,$_SESSION['number']);

    if ($_SESSION['shuffle']==1):

    shuffle($order);

    endif;

    echo $_SESSION['theme']."<br>" ?>

    <input class="square_btn" type="button" onClick="location.href='index.php'" value="戻る">

    <br>
    <br>

    <p id="tabcontrol">
      <a href="#tabpage1">問題</a>
      <a href="#tabpage2">答え</a>
    </p>

    <div id="tabbody">
      <div id="tabpage1">

        <?php

        for ($i=1 ;$i<=$_SESSION['number'] ;$i++):

          $j=$order[$i-1];

          echo "<span class=\"col-1\">$(".$i.")$".$_SESSION["prob_".$j]."</span>";

          if ($i%$_SESSION['one_raw_num']==0):
            echo "<br><br><br>";
          endif;

        endfor;?>

      </div>
      <div id="tabpage2">
        <?php
        session_start();

        for ($i=1 ;$i<=$_SESSION['number'] ;$i++):

          $j=$order[$i-1];

          echo "<span class=\"col-1\">$(".$i.")$".$_SESSION["ans_".$j]."</span>";

          if ($i%$_SESSION['one_raw_num']==0):
            echo "<br>";
            echo "<br>";
            echo "<br>";
          endif;

        endfor;

        ?>
      </div>

    </div>

  </body>

</html>
<script type="text/javascript">
// ---------------------------
// ▼A：対象要素を得る
// ---------------------------
var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
var pages = document.getElementById('tabbody').getElementsByTagName('div');

// ---------------------------
// ▼B：タブの切り替え処理
// ---------------------------
function changeTab() {
  // ▼B-1. href属性値から対象のid名を抜き出す
  var targetid = this.href.substring(this.href.indexOf('#')+1,this.href.length);

  // ▼B-2. 指定のタブページだけを表示する
  for(var i=0; i<pages.length; i++) {
    if( pages[i].id != targetid ) {
      pages[i].style.display = "none";
    }
    else {
      pages[i].style.display = "block";
    }
  }

  // ▼B-3. クリックされたタブを前面に表示する
  for(var i=0; i<tabs.length; i++) {
    tabs[i].style.zIndex = "0";
  }
  this.style.zIndex = "10";

  // ▼B-4. ページ遷移しないようにfalseを返す
  return false;
}

// ---------------------------
// ▼C：すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
// ---------------------------
for(var i=0; i<tabs.length; i++) {
  tabs[i].onclick = changeTab;
}

// ---------------------------
// ▼D：最初は先頭のタブを選択しておく
// ---------------------------
tabs[0].onclick();

</script>
