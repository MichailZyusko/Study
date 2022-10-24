<!DOCTYPE html>
<html>

<body>
  Answer:
  <?php
  ["x" => $x] = $_POST;

  function fact ($n)  
  {  
    if($n <= 1)   
    {  
      return 1;  
    }  
    else   
    {  
      return $n * fact($n - 1);  
    }  
  }  

  if ($x > 0 && $x < 5) {
    $s = 0;

    for ($i = 1; $i <= 5; $i++) {
      $s += ((2 * fact($i))/pow($i, $i)) * $x;
    }
  } else {
    $s = pow($x, 5);
  }

  echo $s;
  ?>
</body>

</html>