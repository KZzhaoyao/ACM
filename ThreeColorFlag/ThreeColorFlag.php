<?php
include '../head.php';
?>
<body style="height:1600px;">
    <header>
        <h1><center>三色旗</center></h1>
    </header>
    <div class="lead">
      问题：假设有一根绳子，上面有一些红、白、蓝色的旗子。起初旗子的顺序是任意的，现在要求用最少的次数移动这些旗子，使得它们按照蓝、白、红的顺序排列。注意只能在绳子上操作，并且一次只能调换两个旗子。
解法：从绳子的开头（最左边）开始，遇到蓝色的往前移，遇到白色的不动，遇到红色的往后移。
           <span class="text-danger">注：我们这里说的前移指往左，后移指往右。</span>
        再来看具体的代码实现，先看下图：
    </div>
    <center>
        <img src="./threeColor.jpg" alt="">
    </center>
    <div class="lead">
      我们可以定义三个指针 a、b、c 。从上图可以看出，a和b指向第一个元素，c指向最后一个元素。a的作用是确保蓝色的旗子移到左边，而c的作用是确保红色的旗子移到右边。b则用于顺序访问各个旗子。
        思路如下：
    </div>
    <p class="lead text-success">1.查看b所指向的旗子的颜色，如果是白色的，则不移动任何旗子（因为要求白色的旗子在中间，所以不去动它），将b往后移一位。</p>
    <p class="lead text-success">2.如果是红色的，此时将b所指向的旗子和c所指向的旗子交换位置，同时c往前移一位。（交换后c指向的已经是红色的旗子了，所以可以往前移一位了）。</p>
    <p class="lead text-success">3.如果是蓝色的，此时将b所指向的旗子和a所指向的旗子交换位置，同时a往后移一位。（交换后a指向的已经是蓝色的旗子了，所以可以往后移一位了）。这里要注意的是b也要后移一位。（这里我也没有弄得很清楚。大概是b不能在a的后面）</p>
    <p class="lead text-success">4.那么什么时候停止交换呢？显然是c都跑到b的后面去的时候，即b>c</p>
    <form class="form-inline">
      <div class="form-group">
        <label for="threeColor">请输入原三色旗位置:</label>
        <input type="text" class="form-control" name="threeColor" value="<?php echo $_GET['threeColor']?>">
      </div>
      <button type="submit" class="btn btn-default">提交</button>
      <span class="alert alert-danger">注：输入B代表蓝色，R代表红色，W代表白色</span>
    </form>
<?php
     $threeColor = $_GET['threeColor'];
     $threeColor = checkValidity($threeColor);
     moveFlag($threeColor);

      function checkValidity($threeColor)
      {
            if (empty($threeColor)) {
                exit();
            }
            if (!preg_match('/^[A-Z]+$/', $threeColor)) {
                echo "<br><span class='alert alert-danger'>".输入仅支持大写字母."</span>";
                exit();
            }
            $threeColor = str_split($threeColor, 1);
            foreach ($threeColor as  $value) {
                if (!in_array($value, array('B', 'R', 'W'))) {
                    echo "<br><span class='alert alert-danger'>".输入仅支持BRW三个大写字母."</span>";
                    exit();
                }
            }
            return $threeColor;
      }

      function getString($threeColor)
      {
          return implode("", $threeColor);
      }

      function getSign($threeColor, $length)
      {
          if ($threeColor[$length] == 'R') {
            return getSign($threeColor, $length-1);
          } else {
            return $length;
          }
      }

      function moveFlag($threeColor)
      {
            $length = count($threeColor);
            $a = 0;
            $step = 1;
            $c = getSign($threeColor, $length-1);
            for ($b = 1; $b <= $c ; $b++) {
                if ($threeColor[$b] == 'B') {
                    $result = $threeColor[$b];
                    $threeColor[$b] = $threeColor[$a];
                    $threeColor[$a] = $result;
                    $a++;
                    $string = getString($threeColor);
                    echo "<span class='text-success'>第{$step}步:".($b+1)."和".($a)."交换，结果为:{$string}</span><br>";
                    ++$step;
                }
                if ($threeColor[$b] == 'W') {
                    continue;
                }
                if ($threeColor[$b] == 'R') {
                    $result = $threeColor[$b];
                    $threeColor[$b] = $threeColor[$c];
                    $threeColor[$c] = $result;
                    $string = getString($threeColor);
                    echo "<span class='text-success'>第{$step}步:".($b+1)."和".($c+1)."交换，结果为:{$string}</span><br>";
                    ++$step;
                    --$c;
                    --$b;
                }
            }
      }
?>
</body>