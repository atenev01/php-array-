<?php
function pre_r($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

function mmmr($array, $output = 'mean'){
    #Provides basic statistical functions - default is mean; other $output parammeters are; 'median', 'mode' and 'range'.
	#Ian Hollender 2016 - adapted from the following, as it was an inacurate solution
	#http://phpsnips.com/45/Mean,-Median,-Mode,-Range-Of-An-Array#tab=snippet
	#Good example of PHP overloading variables with different data types - see the Mode code
	if(!is_array($array)){
        echo '<p>Invalid parammeter to mmmr() function: ' . $array . ' is not an array</p>';
		return FALSE; #input parammeter is not an array
    }else{
        switch($output){ #determine staistical output required
            case 'mean': #calculate mean or average
                $count = count($array);
                $sum = array_sum($array);
                $total = $sum / $count;
            break;
            case 'median': #middle value in an ordered list; caters for odd and even lists
                $count = count($array);
				sort($array); #sort the list of numbers
				if ($count % 2 == 0) { #even list of numbers
					$med1 = $array[$count/2];
					$med2 = $array[($count/2)-1];
					$total = ($med1 + $med2)/2;
				}
				else { #odd list of numbers
					$total = $array[($count-1)/2];
				}
            break;
            case 'mode': #most frequent value in a list; N.B. will only find a unique mode or no mode;
                $v = array_count_values($array); #create associate array; keys are numbers in array, values are counts
                arsort($v); #sort the list of numbers in ascending order

				if (count(array_unique($v)) == 1) { #all frequency counts are the same, as array_unique returns array with all duplicates removed!
					return 'No mode';
				}
				$i = 0; #used to keep track of count of associative keys processes
                $modes = '';
				foreach($v as $k => $v){ #determine if a unique most frequent number, or return NULL by only looking at first two keys and frequency numbers in the sorted array
					if ($i == 0) { #first number and frequency in array
						$max1 = $v;	#highest frequency of first number in array
						$modes = $k . ' ';
						$total = $k; #first key is the most frequent number;
					}
					if ($i > 0) { #second number and frequency in array
						$max2 = $v;	#highest frequency of second number in array
						if ($max1 == $max2) { #two or more numbers with same max frequency; return NULL
							$modes = $modes . $k . ' ';
						}
						else {
							break;
						}
					}
					$i++; #next item in $v array to be counted
				}
				$total = $modes;
            break;
            case 'range': #highest value - lowest value
                sort($array); #find the smallest number
                $sml = $array[0];
                rsort($array); #find the largest number
                $lrg = $array[0];
                $total = $lrg - $sml; #calculate the range
            break;
			default :
				echo '<p>Invalid parammeter to mmmr() function: ' . $output . '</p>';
				$total= 0;
				return FALSE;
        }
        return $total;
    }
}
$CorrectStudentNumber[] = "";
$CorrectStudentGrade[] = "";
echo '<p>' . "P1 TMA data 'Solutions to hands on exercises-20210618.zip  : INVALID FILE EXTENSION- should be .txt" . '</p>';
$local_dir = '/home/atenev01/public_www/p1tma';
if (file_exists($local_dir) && is_dir($local_dir) ) {
$files = array_values(array_diff(scandir($local_dir), array('.', '..', 'index.php', 'functions.php', 'Solutions to hands on exercises-20210618.zip')));
$files_arr = array();
foreach ($files_arr as $file) {
       //Get the file path
       $file_path = '/home/atenev01/public_www/p1tma'.$file1;
       // Get the file extension
       $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
       if ($file_ext != "txt") {
         pre_r($file1);
       }

     }
$lenght = count($files);
$i = 0;
$firstLine = array();
$stream = array();
 while ($i < $lenght){
   echo '<p>' . "File name: ";
   echo  $files[$i];
  $stream = file($files[$i]);
  $firstLine = explode(',', $stream[0]);
  $firstLineLenght = count($firstLine);
  $arrayDefinitions = ['Module code: ', 'Module title: ', 'Tutor: ', 'Marked date: '];
  $new_array=array();
  foreach (range(0,count($arrayDefinitions)-1) as $j)
  {
  $resStr = str_replace("  ", ' ERROR', $firstLine);
  array_push($new_array,$arrayDefinitions[$j] . $resStr[$j]);}
  echo "<pre>" . implode(PHP_EOL, $new_array) . "</pre>";
 $i++;
 $nyumberAndGrade = array_values(array_slice($stream, 1, -1));
 $STRING = implode("", $nyumberAndGrade);
 foreach($nyumberAndGrade as $element){
   $separatedStrings = preg_split ("/,/", $element);
   $StudentNumber = $separatedStrings[0];
   $StudentGrade = $separatedStrings[1];
   $StudentGradeLenght = strlen($StudentGrade);
   $searchString = " ";
   $replaceString = "";
   $NoEmptySpaceString = preg_replace('/\s+/', '', $separatedStrings[1]);
   $StudentNumberLenght = strlen($StudentNumber);
   if (is_numeric($StudentNumber) == false or $StudentNumberLenght != 8 ){
   echo '<p>' . $StudentNumber, ' : ', $StudentGrade, '  - ERROR in the Student Number! Not included' . '</p>';
   }
   elseif (is_numeric($NoEmptySpaceString) == false or $StudentGradeLenght < 4) {
  echo '<p>' . $StudentNumber, ' : ', $StudentGrade, '  - ERROR in the Student Grade! Not included' . '</p>';
}
  else {
  echo '<p>' . $StudentNumber, ' : ', $StudentGrade . '</p>';
}
}
echo '<p>' . "ID's and module marks to be included..." . '</p>';
foreach($nyumberAndGrade as $element){
  $separatedStrings = preg_split ("/,/", $element);
  $StudentNumber = $separatedStrings[0];
  $StudentGrade = $separatedStrings[1];
  $StudentGradeLenght = strlen($StudentGrade);
  $searchString = " ";
  $replaceString = "";
  $NoEmptySpaceString = preg_replace('/\s+/', '', $separatedStrings[1]);
  $StudentNumberLenght = strlen($StudentNumber);
  if (is_numeric($StudentNumber) == false or $StudentNumberLenght != 8 ){
  }
  elseif (is_numeric($NoEmptySpaceString) == false or $StudentGradeLenght < 4) {
}
 else {
 echo '<p>' . $StudentNumber, ' : ', $StudentGrade . '</p>';

}
}
echo '<p>' . "Statistical analysis of module marks..." . '</p>';
foreach($nyumberAndGrade as $element){
  $separatedStrings = preg_split ("/,/", $element);
  pre_r(array($separatedStrings));
  $StudentNumber = $separatedStrings[0];
  $StudentGrade = $separatedStrings[1];
  $StudentGradeLenght = strlen($StudentGrade);
  $searchString = " ";
  $replaceString = "";
  $NoEmptySpaceString = preg_replace('/\s+/', '', $separatedStrings[1]);
  $StudentNumberLenght = strlen($StudentNumber);
  if (is_numeric($StudentNumber) == false or $StudentNumberLenght != 8 ){
  }
  elseif (is_numeric($NoEmptySpaceString) == false or $StudentGradeLenght < 4) {
}
 else {
 $CorrectStudentNumber = $StudentNumber;
 $CorrectStudentGrade = $StudentGrade;

}
}

echo "<p>Mean :" . number_format(mmmr($BBB), 1) . "</p>";
echo "<p>Mode :" . mmmr($BBB, "mode") . "</p>";
echo "<p>Range :" . mmmr($BBB, "range") . "</p>";

//echo "<p>Mode :" . mmmr($CorrectStudentGrade, "Mean") . "</p>";
//echo "<p>" . $CorrectStudentGrade . "</p>";
}
}
?>
