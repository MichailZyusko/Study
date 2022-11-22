<!DOCTYPE html>
<html>

<body>
  Answer:
  <pre>
  <?php
    $ARRAY_SIZE = 60;
    function getRandomArray(int $length): Array {
      $array = range(0, $length);
      shuffle($array);
      echo "\n\tUnsorted array: ";
      printArray($array);

      return $array;
    }

    function printArray(Array $arr) {
      echo json_encode($arr)."\n\t";
    }

    function heapify(&$arr, $n, $i) {
      $largest = $i; // Инициализируем наибольший элемент как корень
      $l = 2*$i + 1; // левый = 2*i + 1
      $r = 2*$i + 2; // правый = 2*i + 2

      // Если левый дочерний элемент больше корня
      if ($l < $n && $arr[$l] > $arr[$largest]) {
        $largest = $l;
      }
      //Если правый дочерний элемент больше, чем самый большой элемент на данный момент
      if ($r < $n && $arr[$r] > $arr[$largest]) {
        $largest = $r;
      }

      // Если самый большой элемент не корень
      if ($largest != $i) {
        $swap = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $swap;

        // Рекурсивно преобразуем в двоичную кучу затронутое поддерево
        heapify($arr, $n, $largest);
      }
    }

    //Основная функция, выполняющая пирамидальную сортировку
    function heapSort(&$arr) {
      $n = count($arr);
      // Построение кучи (перегруппируем массив)
      for ($i = $n / 2; $i >= 0; $i--) {
        heapify($arr, $n, $i - 1);
      }
      //Один за другим извлекаем элементы из кучи
      for ($i = $n - 1; $i >= 0; $i--)
      {
        // Перемещаем текущий корень в конец
        $temp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $temp;

        // вызываем процедуру heapify на уменьшенной куче
        heapify($arr, $i, 0);
      }
    }

    $arr1 = getRandomArray($ARRAY_SIZE);
    heapSort($arr1);
    echo "Pyramidal sort: ";
    printArray($arr1);

    function shellSort(&$a) {
      $sort_length = count($a) - 1;
      $step = ceil(($sort_length + 1)/2);
      // переделать на массив чисел!

      do
      {
        $i = ceil($step);
        do
        {
          $j=$i-$step;
          $c=1;
          do
          {
            if($a[$j]<=$a[$j+$step])
            {
            $c=0;
            }
            else
          {
              $tmp=$a[$j];
              $a[$j]=$a[$j+$step];
              $a[$j+$step]=$tmp;
          }
        $j=$j-1;
          }
          while($j>=0 && ($c==1));
            $i = $i+1;
          }
          while($i<=$sort_length);
          $step = $step/2;
      }
      while($step>0);
    }

    $arr2 = getRandomArray($ARRAY_SIZE);
    shellSort($arr2);
    echo "Shell sort: ";
    printArray($arr2);

    function quickSort(&$arr, $low, $high) {
      $i = $low;                
      $j = $high;
      $middle = $arr[($low + $high)/2];  // middle — опорный элемент; в нашей реализации он находится посередине между low и high
      do {
        while($arr[$i] < $middle) ++$i;  // ищем элементы для правой части
        while($arr[$j] > $middle) --$j;  // ищем элементы для левой части
      
        if($i <= $j){           
          // перебрасываем элементы
          $temp = $arr[$i];
          $arr[$i] = $arr[$j];
          $arr[$j] = $temp;
          // следующая итерация
          $i++; $j--;
        }
      } while($i < $j);
        
      if($low < $j){
        // рекурсивно вызываем сортировку для левой части
        quickSort($arr, $low, $j);
      } 

      if($i < $high){
        // рекурсивно вызываем сортировку для правой части
        quickSort($arr, $i, $high);
      } 
    }

    $arr3 = getRandomArray($ARRAY_SIZE);
    quickSort($arr3, 0, $ARRAY_SIZE);
    echo "Quick sort: ";
    printArray($arr3);

        
    function merge(array $left, array $right) {
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

    //Сортировка слиянием
    function mergeSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }
 
        $left  = array_slice($arr, 0, (int)($count/2));
        $right = array_slice($arr, (int)($count/2));
 
        $left = mergeSort($left);
        $right = mergeSort($right);
 
        return merge($left, $right);
    }   
    
    $arr4 = getRandomArray($ARRAY_SIZE);
    $arr4 = mergeSort($arr4);
    echo "Merge sort: ";
    printArray($arr4);

    // //Сортировка простым слиянием
    // function mergeSimpleSort(&$arr, $n) {
    //     $mid = $n / 2; // находим середину сортируемой последовательности
    //     if ($n % 2 == 1) {
    //         $mid++;
    //     }
    //     $h = 1; // шаг
    //     // выделяем память под формируемую последовательность
    //     $c = array();
    //     $step = $h;
        
    //     while ($h < $n) 
    //     {
    //         $step = $h;
    //         $i = 0;   // индекс первого пути
    //         $j = $mid; // индекс второго пути
    //         $k = 0;   // индекс элемента в результирующей последовательности

    //         while ($step <= $mid) {
    //             while (($i < $step) && ($j < $n) && ($j < ($mid + $step))) { // пока не дошли до конца пути
    //             // заполняем следующий элемент формируемой последовательности
    //             // меньшим из двух просматриваемых
    //             if ($a[$i] < $a[$j]) {
    //                 $c[$k] = $a[$i];
    //                 $i++;
    //                 $k++;
    //             }
    //             else {
    //                 $c[$k] = $a[$j];
    //                 $j++;
    //                 $k++;
    //             }
    //             }
                
    //             while ($i < $step) { // переписываем оставшиеся элементы первого пути (если второй кончился раньше)
    //                 $c[$k] = $a[$i];
    //                 $i++;
    //                 $k++;
    //             }
      
    //             while (($j < ($mid + $step)) && ($j<$n)) {  // переписываем оставшиеся элементы второго пути (если первый кончился раньше)
    //                 $c[$k] = $a[$j];
    //                 $j++;
    //                 $k++;
    //             }
                
    //             $step = $step + $h; // переходим к следующему этапу
    //         }
            
    //         $h = $h * 2;
    //         // Переносим упорядоченную последовательность (промежуточный вариант) в исходный массив
    //         for ($i = 0; $i<$n; $i++) {
    //             $a[$i] = $c[$i];
    //         }
    //     }
    // } 
    
    // $arr5 = getRandomArray($ARRAY_SIZE);
    // mergeSimpleSort($arr5, $ARRAY_SIZE);
    // echo "Merge sort: ";
    // printArray($arr5);

  ?>   
  </pre>
</body>

</html>