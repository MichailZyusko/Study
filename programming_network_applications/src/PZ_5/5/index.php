<!DOCTYPE html>
<html>

<body>
  Answer:
  <pre>
    <?php
      ["src" => $src] = $_POST;
      $strings = explode("\r\n", $src);
      $vowels = ['a','e','i','o','u'];
      $swap_count = 0;

      function swap($word, $pos1, $pos2) {
        $letter1 = $word[$pos1];
        $letter2 = $word[$pos2];

        for ($i = 0; $i < strlen($word); $i++) {
          if ($i == $pos1){
            $word[$i] = $letter2;
          }

          if ($i == $pos2){
            $word[$i] = $letter1;
          }
        }

        return $word;
      }

      foreach ($strings as $line) {
        $words = explode(" ", $line);

        foreach ($words as $word) {
          for ($i = 0; $i < strlen($word); $i++) {
            if ((!in_array(strtolower($word[$i]), $vowels)) 
              && (in_array(strtolower($word[$i + 1]), $vowels))
              && $i+1 < strlen($word)
              ) {
              $swap_count++;
              $word = swap($word, $i, $i + 1);
            }
          }

          echo $word." ";
        }

        echo "\t\n";
      }

      echo $swap_count;
    ?>
  </pre>
</body>

</html>