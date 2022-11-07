<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
    $input = [
      [-1, 2, 3],
      [3, -4, 6, 5],
      [5, 7, -9]
    ];
    $result = [];

    function printMatrix($arr) {
      echo "<br />";

      for ($i = 0; $i < count($arr);  $i++) {
        for ($j = 0; $j < count($arr[$i]); $j++) {
          echo $arr[$i][$j]. "\t";
        }

        echo "<br />";
      }
    }
    
    printMatrix($input);


    for ($i = 0; $i < count($input);  $i++) {
      sort($input[$i]);
    }

    printMatrix($input);

    for ($i = 0; $i < count($input);  $i++) {
      array_push($result, [count($input[$i])]);
    }

    printMatrix($result);
  ?>
</body>

</html>