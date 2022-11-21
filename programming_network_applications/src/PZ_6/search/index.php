<!DOCTYPE html>
<html>

<body>
  Answer:
  <pre>
  <?php
    $input = [1,2,3,4,5,6,7,8,9,10];

    function linearSearch($key, Array $arr): int {
      if (count($arr) === 0) return -1;

      for ($i = 0; $i < count($arr);  $i++) {
        if ($arr[$i] == $key){
          return $i;
        }
      }

      return -1;
    };
    
    echo "\tlinearSearch: ".linearSearch(7, $input)."\n";
    echo "\tlinearSearch: ".linearSearch(107, $input)."\n";


    function binarySearch($key, Array $arr): int {
        // check for empty array
        if (count($arr) === 0) return -1;
        $low = 0;
        $high = count($arr) - 1;
          
        while ($low <= $high) {
              
            // compute middle index
            $mid = floor(($low + $high) / 2);
      
            // element found at mid
            if($arr[$mid] == $key) {
                return $mid;
            }
      
            if ($key < $arr[$mid]) {
                // search the left side of the array
                $high = $mid -1;
            }
            else {
                // search the right side of the array
                $low = $mid + 1;
            }
        }
          
        // If we reach here element key doesnt exist
        return -1;
    };

    echo "\tbinarySearch: ".binarySearch(6, $input)."\n";
    echo "\tbinarySearch: ".binarySearch(106, $input)."\n";


    $string = "PHP is bad!";
    $target_string = "is";

    function directSearch(string $string, string $target): int {
      for ($i = 0; $i < strlen($string); $i++) {
        $temp = [];
        for ($j = 0; $j < strlen($target); $j++) {
          if($string[$i + $j] == $target[$j]) {
            array_push($temp, $i + $j);
          } 
        }

        if (count($temp) == strlen($target)){
          return $temp[0];
        }
      }
    
      return -1;
    }

    echo "\tdirectSearch: ".directSearch($string, $target_string)."\n";
    echo "\tdirectSearch: ".directSearch($string, "I love artsiom samuilik")."\n";


    function knutMorrisPrat(string $str = '', string $substr = ''): int {
      $n = strlen($str);
      $m = strlen($substr);

      // prefix
      $d[0] = 0;
      for ($i = 1, $j = 0; $i < $m; $i++) {
        while($j > 0 && $substr[$j] != $substr[$i]) {
          $j = $d[$j - 1];
        }

        if($substr[$j] == $substr[$i]) {
          $j++;
        }

        $d[$i] = $j;
      }

      // search
      for($i = 0, $j = 0; $i < $n; $i++) {
        while($j > 0 && $substr[$j] != $str[$i]) {
          $j = $d[$j - 1];
        }

        if($substr[$j] == $str[$i]) {
          $j++;
        }

        if($j == $m) {
          return $i - $j + 1;
        }
      }

      return -1;
    }

    echo "\tknutMorrisPrat: ".knutMorrisPrat($string, $target_string)."\n";
    echo "\tknutMorrisPrat: ".knutMorrisPrat($string, "I love artsiom samuilik")."\n";

    
    function boerMur(string $str = '', string $substr = ''): int {
      $n = strlen($str);
      $m = strlen($substr);

      // prefix
      $d[0] = 0;
      for ($i = 1, $j = 0; $i < $m; $i++) {
        while($j > 0 && $substr[$j] != $substr[$i]) {
          $j = $d[$j - 1];
        }

        if($substr[$j] == $substr[$i]) {
          $j++;
        }

        $d[$i] = $j;
      }

      // search
      for($i = 0, $j = 0; $i < $n; $i++) {
        while($j > 0 && $substr[$j] != $str[$i]) {
          $j = $d[$j - 1];
        }

        if($substr[$j] == $str[$i]) {
          $j++;
        }

        if($j == $m) {
          return $i - $j + 1;
        }
      }

      return -1;
    }

    echo "\tboerMur: ".boerMur($string, $target_string)."\n";
    echo "\tboerMur: ".boerMur($string, "I love artsiom samuilik")."\n";

  ?>   
  </pre>
</body>

</html>