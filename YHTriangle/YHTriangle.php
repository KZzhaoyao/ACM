<?php
include '../head.php';
?>
    <header>
        <h1><center>杨辉三角</center></h1>
    </header>
    <center>
        <img src="./YHTriangle.jpg" alt="">
    </center>
    <form class="form-inline">
      <div class="form-group">
        <label for="number">杨辉三角行数:</label>
        <input type="number" class="form-control" name="number" value="<?php echo $_GET['number']?>">
      </div>
      <button type="submit" class="btn btn-default">提交</button>
    </form>
 <?php
     $number = $_GET['number'];
     if (!empty($number)) {
        for ($i=0; $i < $number; $i++) { 
            for ($j=0; $j <= $i; $j++) { 
                if ($j == 0 || $i == $j) {
                    $arr[$i][$j] = 1;
                } else {
                    $arr[$i][$j] = $arr[$i - 1][$j] + $arr[$i - 1][$j - 1];
                }
                echo $arr[$i][$j]."\t";
            }
            echo "<br>";
        }
     }
 ?>