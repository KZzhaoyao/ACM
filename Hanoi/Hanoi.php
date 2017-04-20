<?php
include '../head.php';
?>
<header>
    <h1><center>河内之塔</center></h1>
</header>
    <center>
        <div class="lead">
            河内之塔(Towers of Hanoi)是法国人M.Claus(Lucas)于1883年从泰国带至法国的，河内为越战时北越的首都，即现在的胡志明市；1883年法国数学家Edouard Lucas曾提及这个故事，据说创世
            纪时Benares有一座波罗教塔，是由三支钻石棒（Pag）所支撑，开始时神在第一根棒上放置64个由上至下依由小至大排列的金盘（Disc），并命令僧侣将所有的金盘从第一根石棒移至第三根
            石棒，且搬运过程中遵守大盘子在小盘子之下的原则，若每日仅搬一个盘子，则当盘子全数搬运完毕之时，此塔将毁损，而也就是世界末日来临之时。
            我们来把这个故事变成一个算法：把三个柱子标为ABC 如果只有一个盘子时，将它直接搬到c，当有两个盘子，就将B做为辅助。如果盘数超过2个，将第三个以下的盘子遮起来，就很简单了，每次处理两个盘子，也就是
            A->B  A->C B->C这三个步骤，而被遮住的部分是一个递归处理。如果有n个盘子，则移动完毕所需的次数为2^n-1。
        </div>
    </center>
    <form class="form-inline">
      <div class="form-group">
        <label for="number">请输入盘数:</label>
        <input type="number" class="form-control" name="number" value="<?php echo $_GET['number']?>">
      </div>
      <button type="submit" class="btn btn-default">提交</button>
    </form>
 <?php
    $number = $_GET['number'];
    if (!empty($number)) {
        hanoi($number, 'A', 'B', 'C');
    }
    function hanoi($n, $A, $B, $C) {
        if($n == 1) {
            echo "移动 第 {$n}个石头 from {$A} to {$C} <br>";
        } else {
            hanoi($n-1, $A, $C, $B);
            echo "移动 第 {$n}个石头 from {$A} to {$C} <br>";
            hanoi($n-1, $B, $A, $C);
        }
    }
 ?>