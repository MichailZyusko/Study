<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
    $input = [
      [-1, 2, 3, 3],
      [3, -4, 6],
      [5, 7, -9, 7, 7]
    ];
    $result = [];
    $result_1 = [];

    function printMatrix($arr) {
      echo "<br />";

      for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr[$i]); $j++) {
          echo $arr[$i][$j]. "\t";
        }

        echo "<br />";
      }
    }

    printMatrix($input);

    for ($i = 0; $i < count($input); $i++) {
      $max = $input[$i][0];
      $max_count = 0;

      # Находим максимальный элемент в строке
      for ($j = 1; $j < count($input[$i]); $j++) {
        # Если текущее значение больще то обновляем максимум
        if ($max < $input[$i][$j]) {
          $max = $input[$i][$j];
        }
      }

      $temp = [];

      # Считаем сколько максимальных элементов в строке
      for ($j = 0; $j < count($input[$i]); $j++) {
        if ($max == $input[$i][$j]) {
          $max_count++;

          # И записываем индекс максимального элемента
          array_push($temp, $j);
        }
      }

      # Создаем объект, в котором говорим о количестве максимальных элементов и их индексы
      $res = (object)[
        "counts" => count($input[$i]),
        "indexes" => $temp,
      ];

      # обновляем инфу о матрице 
      array_push($result_1, $res);
      array_push($result, [$max_count]);
    }

    echo "result";
    printMatrix($result);

    echo "result_1";
    echo json_encode($result_1, JSON_PRETTY_PRINT);
  ?>
</body>

</html>