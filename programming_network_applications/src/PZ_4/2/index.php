<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["accurate" => $accurate] = $_POST;
  $accurate = floatval($accurate);

  $s = 0;
  $i = 1;

  $next = 0;
  $current = 0;

  do {
    $current =  1 / pow($i + 1, $i);
    $next = 1 / pow($i + 1 + 1, $i + 1);
    $delta = abs($next - $current);

    $s += $current;
    $i++;
  } while ($delta > $accurate);

  if ($i == 2) {
    echo "Reduce the accuracy as this is a very rough estimate";
  } else {
    echo $s;
  }
  ?>
</body>

</html>