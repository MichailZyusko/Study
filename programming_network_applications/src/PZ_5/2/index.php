<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
    $input = [
      [-1, 2, 3],
      [3, -4, 6],
      [5, 7, -9]
    ];
    $result = [];


    for ($i = 0; $i < count($input);  $i++) {
      for ($j = 0; $j < count($input[$i]); $j++) {
        if ($input[$i][$j] < 0 && $i == $j) {
          $sum = 0;

          for ($k = 0; $k < count($input[$i]); $k++) {
            $sum += $input[$i][$k];
          }

          array_push($result, $sum);
        }
      }
    }

    echo json_encode($result);
  ?>
</body>

</html>