<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["x" => $x, "y" => $y] = $_POST;

  if ($x > 0 && $y > 0) {
    echo "Quarter 1";
  } elseif ($x < 0 && $y > 0) {
    echo "Quarter 2";
  } elseif ($x < 0 && $y < 0) {
    echo "Quarter 3";
  } elseif ($x > 0 && $y < 0) {
    echo "Quarter 4";
  } elseif ($x == 0 && $y == 0) {
    echo "The beginning of the coordinate grid";
  } elseif ($x == 0 && $y != 0) {
    echo "Located on the x-axis";
  } elseif ($x != 0 && $y == 0) {
    echo "Located on the y-axis";
  }
  ?>
</body>

</html>