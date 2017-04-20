<?php
include '../head.php';
?>
<header>
    <h1><center>费氏数列    </center></h1>
</header>
        <div class="lead">
            Fibonacci为1200年代的欧洲数学家，在他的著作中曾经提到：若有一只免子每个月生一只小免子，一个月后小免子也开始生产。起初只有一只免子，一个月后就有两只免子，二个月后有三只免子，三个月后有五只免子（小免子投入生产）......。 如果不太理解这个例子的话，举个图就知道了，注意新生的小免子需一个月成长期才会投入生产，类似的道理也可以用于植物的生长，这就是Fibonacci数列，一般习惯称之为费氏数列，例如以下： 1、1 、2、3、5、8、13、21、34、55、89......<br><br>
            分析：<br>
            如果单从数学上找费氏数列的规律时，很容易发现当n>=2时，f(n）=f(n-1)+f(n-2)。但是如果从逻辑上分析，为什么会有这个规律呢？其实很简单，由于第n个月的兔子=上一个月的兔子数量+这个月新出生的兔子数量。上一个月的兔子的数量为f(n-1)，那这个月新生出的兔子数量是多少呢，那就是上上个月的兔子的数量，因为只有在上上个月就已经存在的兔子，这个月才能生兔子，因此新出生的兔子的数量就是f(n-2)。
        </div>
    <form class="form-inline">
      <div class="form-group">
        <label for="number">请输入天数:</label>
        <input type="number" class="form-control" name="number" value="<?php echo $_GET['number']?>">
      </div>
      <button type="submit" class="btn btn-default">提交</button>
    </form>
 <?php
    $number = $_GET['number'];
    if (!empty($number)) {
        for ($i=1; $i < $number +1; $i++) { 
            $result = fibonacci($i);
            echo $result."<br>";
        }
    }
    function fibonacci($day) {
        if ($day == 0 || $day == 1) {
            return 1;
        } else {
            $result = fibonacci($day - 1) + fibonacci($day - 2);
            return $result;
        }
    }
 ?>