<!DOCTYPE html>
<html>

<body>
  Look into your src folder !!!
  <pre>
  <?php
    // function simpleMerge(array $left, array $right) {
    //     $ret = array();
    //     while (count($left) > 0 && count($right) > 0) {
    //         if ($left[0] < $right[0]) {
    //             array_push($ret, array_shift($left));
    //         } else {
    //             array_push($ret, array_shift($right));
    //         }
    //     }
     
    //     array_splice($ret, count($ret), 0, $left);
    //     array_splice($ret, count($ret), 0, $right);
     
    //     return $ret;
    // }

    // function simpleMergeSort(array $arr, $iteration) {
    //     $count = count($arr);
    //     if ($count <= 1) {
    //       return $arr;
    //     }
 
    //     $left  = array_slice($arr, 0, (int)($count/2));
    //     $right = array_slice($arr, (int)($count/2));
    //     file_put_contents("simple-left[$iteration].txt", join(" ", $left));
    //     file_put_contents("simple-right[$iteration].txt", join(" ", $right));
 
    //     $left = simpleMergeSort($left, $iteration + 1.0);
    //     $right = simpleMergeSort($right, $iteration + 1.1);
 
    //     return simpleMerge($left, $right);
    // }   

    // $file = file_get_contents('./example.txt', FILE_USE_INCLUDE_PATH);
    // $arr = explode(" ", $file);

    // $sortedArray = simpleMergeSort($arr, 0);
    // file_put_contents("result.txt", join(" ", $sortedArray));


    function Simple_Merging_Sort ($name = 'example.txt'){
      $a1 = 0; 
      $a2 = 0;
      $k = 0;
      $i = 0;
      $j = 0; 
      $kol = 0;
      $tmp = 0;
     
      $f = fopen($name,"r");

      if ($f == NULL )
        echo "\nCan't read file";
      else {
        while (!feof($f)) {
          fscanf($f,"%d", $a1);
          $kol++;
        }
        fclose($f);
      }
  
      $k = 1;
      while ($k < $kol){
        $f = fopen($name,"r");
        $f1 = fopen("smsort_1","w");
        $f2 = fopen("smsort_2","w");

        // if (!feof($f)) fscanf($f,"%d", $a1);

        while (!feof($f)) {
          for ($i = 0; $i < $k && !feof($f); $i++) {
            fscanf($f,"%d", $a1);
            echo $a1;
            fprintf($f1,"%d ", $a1);
          }

          for ($j = 0; $j < $k && !feof($f); $j++) {
            fscanf($f,"%d", $a1);
            echo $a1;
            fprintf($f2,"%d ", $a1);
          }
        }

        if (!feof($f1)) fscanf($f1, "%d", $a1);
        if (!feof($f2)) fscanf($f2, "%d", $a2);

        fclose($f2);
        fclose($f1);
        fclose($f);

        $f = fopen($name,"w");
        $f1 = fopen("smsort_1","r");
        $f2 = fopen("smsort_2","r");

        while (!feof($f1) && !feof($f2)) {
          $i = 0;
          $j = 0;

          echo "\n".$a1."\t".$a2."\n";

          while ($i < $k && $j < $k && !feof($f1) && !feof($f2)) {
            if ($a1 < $a2) {
              fprintf($f,"%d ",$a1);
              fscanf($f1,"%d",$a1);
              $i++;
            }
            else {
              fprintf($f,"%d ",$a2);
              fscanf($f2,"%d",$a2);
              $j++;
            }
          }

          while ($i < $k && !feof($f1)) {
            fprintf($f,"%d ",$a1);
            fscanf($f1,"%d",$a1);
            $i++;
          }

          while ($j < $k && !feof($f2)) {
            fprintf($f,"%d ",$a2);
            fscanf($f2,"%d",$a2);
            $j++;
          }
        }

        while (!feof($f1)) {
          fprintf($f, "%d ", $a1);
          fscanf($f1, "%d", $a1);
        }

        while (!feof($f2)) {
          fprintf($f, "%d ", $a2);
          fscanf($f2, "%d", $a2);
        }

        fclose($f2);
        fclose($f1);
        fclose($f);

        $k *= 2;
      }
      unlink("smsort_1");
      unlink("smsort_2");
    }

    Simple_Merging_Sort();
  ?>   
  </pre>
</body>

</html>