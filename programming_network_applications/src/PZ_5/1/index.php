<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
    $vector = [1, 2, 5, 4, 3];
    $result = [];
    $mult = 1;
    ["a" => $a, "b" => $b] = $_POST;

    for ($i = 0; $i < count($vector); $i++) {
      if ($vector[$i] >= $a && $vector[$i] <= $b) {
        $mult *= $vector[$i];
        array_push($result, $i);
      }
    }

    echo $mult;
    echo "\r\n";
    echo json_encode($result);
  ?>
</body>

</html>