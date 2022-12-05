<!DOCTYPE html>
<html>

<body>
  Look into your src folder !!!
  <pre>
  <?php
    function simpleMerge(array $left, array $right) {
        $ret = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                array_push($ret, array_shift($left));
            } else {
                array_push($ret, array_shift($right));
            }
        }
     
        array_splice($ret, count($ret), 0, $left);
        array_splice($ret, count($ret), 0, $right);
     
        return $ret;
    }

    function simpleMergeSort(array $arr, $iteration) {
        $count = count($arr);
        if ($count <= 1) {
          return $arr;
        }
 
        $left  = array_slice($arr, 0, (int)($count/2));
        $right = array_slice($arr, (int)($count/2));
        file_put_contents("simple-left[$iteration].txt", join(" ", $left));
        file_put_contents("simple-right[$iteration].txt", join(" ", $right));
 
        $left = simpleMergeSort($left, $iteration + 1.0);
        $right = simpleMergeSort($right, $iteration + 1.1);
 
        return simpleMerge($left, $right);
    }   

    $file = file_get_contents('./example.txt', FILE_USE_INCLUDE_PATH);
    $arr = explode(" ", $file);

    $sortedArray = simpleMergeSort($arr, 0);
    file_put_contents("result.txt", join(" ", $sortedArray));
  ?>   
  </pre>
</body>

</html>