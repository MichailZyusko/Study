<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["a" => $a, "b" => $b] = $_POST;

  $max = $a;
  $max_divedes_count = 0;
  

  for($a; $a < $b; $a++) {
    $divider_count = 0;

    for ($i = 2; $i * 2 <= $a; $i++){
      if ($a % $i == 0){
        $divider_count +=1;
      }
    }

    if ($divider_count > $max_divedes_count) {
      $max = $a;
      $max_divedes_count = $divider_count;
    }
  }

  echo $max;
  echo "\r\n";
  echo $max_divedes_count + 2; # 1 and number themselve
  ?>
</body>

</html>