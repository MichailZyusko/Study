<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["a1" => $a1, "b1" => $b1, "a2" => $a2, "b2" => $b2] = $_POST;

  $numerator = abs($a1 * $b1 + $a2 * $b2);
  $denominator = sqrt(pow($a1, 2) + pow($b1, 2)) * sqrt(pow($a2, 2) + pow($b2, 2));

  $angle = rad2deg(acos($numerator / $denominator));

  if ($a1 == $a2) {
    echo "Parallel";
  } elseif (abs($a1) == abs($a2)) {
    echo "Perpendicular";
  } else {
    echo $angle;
  }
  ?>
</body>

</html>