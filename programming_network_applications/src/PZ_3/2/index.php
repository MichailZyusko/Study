<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["a" => $a, "b" => $b, "c" => $c, "d" => $d, "f" => $f, "g" => $g] = $_POST;

  $c -= $f;
  $d -= $g;

  $x1 = -9999.0;
  $y1 = -9999.0;
  $x2 = -9999.0;
  $y2 = -9999.0;
  $x3 = -9999.0;
  $y3 = -9999.0;

  class Point
  {
    function __construct(float $x = 0, float $y = 0)
    {
      $this->x = $x;
      $this->y = $y;
    }
  }

  function cuberoot(float $x)
  {
    $y = pow(abs($x), 1 / 3);
    return $y;
  }


  if ($a == 0) { // Quadratic case, ax^2+bx+c=0
    $a = $b;
    $b = $c;
    $c = $d;

    if ($a == 0) { // Linear case, ax+b=0
      $a = $b;
      $b = $c;

      if ($a == 0) { // Degenerate case

        echo "Has no common points of intersection";
        return;
      }

      $x1 = -$b / $a;
      $y1 = $f * $x1 + $g;

      echo json_encode([new Point($x1, $y1)]);
      return;
    }

    $D = pow($b, 2) - 4 * $a * $c;
    if ($D == 0) {

      $x1 = -$b / (2 * $a);
      $y1 = $f * $x1 + $g;

      echo json_encode([new Point($x1, $y1)]);
      return;
    } elseif ($D > 0) {

      $x1 = (-$b + sqrt($D)) / (2 * $a);
      $y1 = $f * $x1 + $g;
      $x2 = (-$b - sqrt($D)) / (2 * $a);
      $y2 = $f * $x2 + $g;

      echo json_encode([
        new Point($x1, $y1),
        new Point($x2, $y2),
      ]);
      return;
    }

    echo "Has no common points of intersection";
    return;
  }

  // Convert to depressed cubic t^3+pt+q = 0 (subst x = t - b/3a)
  $p = (3 * $a * $c - pow($b, 2)) / (3 * pow($a, 2));
  $q = (2 * pow($b, 3) - 9 * $a * $b * $c + 27 * pow($a, 2) * $d) / (27 * pow($a, 3));

  if (abs($p) == 0) { // p = 0 -> t^3 = -q -> t = -q^1/3
    $x1 = cuberoot(-$q) - ($b / (3 * $a));
    $y1 = $f * $x1 + $g;
  } elseif (abs($q) == 0) { // q = 0 -> t^3 + pt = 0 -> t(t^2+p)=0
    $x1 = 0;
    $y1 = $f * $x1 + $g;

    if ($p < 0) {
      $x2 = sqrt(-$p) - ($b / (3 * $a));
      $y2 = $f * $x1 + $g;
      $x3 = -sqrt(-$p) - ($b / (3 * $a));
      $y3 = $f * $x1 + $g;
    }
  } else {
    $D = pow($q, 2) + pow($p, 3) / 27;

    if (abs($D) == 0) { // D = 0 -> two roots

      $x2 = -1.5 * $q / $p - ($b / (3 * $a));
      $y2 = $f * $x1 + $g;
      $x3 = 3 * $q / $p - ($b / (3 * $a));
      $y3 = $f * $x1 + $g;
    } elseif ($D > 0) {
      $u = cuberoot(-$q / 2 - sqrt($D));
      $x1 = $u - $p / (3 * $u)  - ($b / (3 * $a));
      $y1 = $f * $x1 + $g;
    } else { // D < 0, three roots, but needs to use complex numbers/trigonometric solution
      $u = 2 * sqrt(-$p / 3);
      $t = acos(3 * $q / $p / $u) / 3;  // D < 0 implies p < 0 and acos argument in [-1..1]
      $k = 2 * pi() / 3;

      $x1 = $u * cos($t)  - ($b / (3 * $a));
      $y1 = $f * $x1 + $g;

      $x2 = $u * cos($t - $k) - ($b / (3 * $a));
      $y2 = $f * $x2 + $g;

      $x3 = $u * cos($t - 2 * $k)  - ($b / (3 * $a));
      $y3 = $f * $x3 + $g;
    }
  }

  echo json_encode([
    new Point($x1, $y1),
    new Point($x2, $y2),
    new Point($x3, $y3)
  ]);
  return;

  ?>
</body>

</html>