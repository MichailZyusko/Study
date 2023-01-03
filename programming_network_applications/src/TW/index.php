<html>
<head>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <br />
  <div>
    <a href='index.php?category=category'>Sort by category</a>
    <a href='index.php?id=id'>Sort by ID</a>  
    <a href='index.php?level=level'>Sort by level</a>
  </div>
  <br />

  <br />
  <form action="index.php" method="GET">
    <div>
      <label>Search: </label>
      <input placeholder="Artem Samuilik" name="search">
    </div>
    <button type="submit">Find</button>
  </form>
  <br />

  <table>
  <?php
  function csvToArray($csv){
     // create file handle to read CSV file
    $csvToRead = fopen($csv, 'r');

    // read CSV file using comma as delimiter
    while (!feof($csvToRead)) {
      $csvArray[] = fgetcsv($csvToRead, 1000, ',');
    }

    fclose($csvToRead);
    return $csvArray;
  }

  function find($needle, $src) {
    $i = 0;

    while($i <= count($src)) {
      $j = 0;

      while ($j <= count($src[$i])){
        if (strpos(strval($src[$i][$j]), $needle) !== false) {
          return [$src[$i]];
        }

        $j++;
      }  

      $i++;
    }
  }

  $csvArray = csvToArray("data.csv");

  echo "<thead><tr>";
  foreach ($csvArray[1] as $th) {
    echo "<th>" .$th ."</th>";
  }
  echo "</tr></thead>";

  $csvArray = array_slice($csvArray, 2);

  if (isset($_GET['category'])) {
    sort($csvArray, fn($a, $b) => $b[5] <=> $a[5]);
  }

  if (isset($_GET['id'])) {
    usort($csvArray, fn($a, $b) => $b[0] <=> $a[0]);
  }

  if (isset($_GET['level'])) {
    usort($csvArray, fn($a, $b) => $b[1] <=> $a[1]);
  }

  if (isset($_GET['search'])) {
    ["search" => $needle] = $_GET;
    $csvArray = find($needle, $csvArray);
  }

  echo "<tbody>";
  foreach($csvArray as $tr) {
    echo "<tr>";
    foreach ($tr as $td) {
      echo "<td>" . $td . "</td>";
    }
    echo "</tr>";
  }
  echo "</tbody>";
  ?>
  </table>
</body>
</html>


