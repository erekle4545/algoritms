<?php

class algorithms
{


    /**
     * @param $string
     * @return string
     */
    public function taskOne($string):string
    {
        $stringArr = explode(' ',$string);
        $intArr = [];
        foreach ($stringArr as $row){
            $intArr[] = strlen($row);
        }

        return $string." => ".min($intArr);
    }


    /**
     * @param $arrayData
     * @return int
     */
    public function taskTwo($arrayData):int
    {
        return count($arrayData,COUNT_RECURSIVE);
    }


    /**
     * @param $string
     * @return string
     */
    public function taskThree($string):string
    {
        $pattern = '/[a-z@ ((]/';
        $arrData = [];
        preg_match_all($pattern, strtolower($string), $arrData);
        $outputString = '';
        $arr = array_count_values($arrData[0]);

        foreach ($arrData[0] as $row){
            if($arr[$row] === 1){
                $outputString .= str_replace($row,'(',$row);
            }else{
                $outputString .= str_replace($row,')',$row);
            }
        }

        return $string.': '.$outputString;
    }


    /**
     * @param $string
     * @return string
     */
    public function taskFour($string):string
    {
        $intPattern = intval($string);
        $textPattern = '/[a-z]+()/';
        $textArr = [];
        preg_match_all($textPattern, $string, $textArr);

        $output = '';
        for($x = 1;$x  <=$intPattern; $x++){
            foreach ($textArr[0] as $row){
                $output .= $row;
            }
        }

        return $output;
    }

    /**
     * @param $arrayNumbers
     * @return string
     */
    // Task five
    public function rangeExtraction($arrayNumbers):string
    {
        $sorted = $arrayNumbers;

        sort($sorted);
        $sorted[] = null;  // ნალი საბოლოო დიაპაზონისთვის
        $ranges = array();
        $end = null;
        $start = null;

        foreach ($sorted as $x) {
            if ($start === null) {
                // ახალი დაიპაზონი
                $start = $x;
            }
            elseif ($x !== $end + 1) {

                $ranges[] = ($start === $end) ? "$start" : "$start-$end";
                $start = $x;
            }
            $end = $x;
        }

        return implode(', ', $ranges);
    }

    /**
     * @param $array
     * @return array
     */

    public function taskSix($array):array
    {
        $finishArray = [];
        $arr_count = count($array);

        if ($arr_count == 1) {
            return $array[0];
        }

        while ($arr_count > 1) {
            $first_array = $array[0];

            for ($i = 0; $i < $arr_count; $i++) {
                $finishArray[] = $first_array[$i];
                unset($array[0][$i]);
            }

            unset($array[0]);
            $remaining_arrays = $arr_count - 1;

            for ($i = 1; $i <= $remaining_arrays; $i++) {
                $next_array = $array[$i];
                $outermost_element = end($next_array);
                $finishArray[] = $outermost_element;
                unset($array[$i][key($next_array)]);
            }

            $last_array = $array[$arr_count - 1];

            for ($i = $arr_count - 2; $i >= 0; $i--) {
                $finishArray[] = $last_array[$i];
                unset($array[$arr_count - 1][$i]);
            }

            unset($array[$arr_count - 1]);
            $count = $arr_count - 2;

            for ($i = $count; $i > 0; $i--) {
                $finishArray[] = $array[$i][0];
                unset($array[$i][0]);
            }

            $array = array_values($array);

            for ($i = 0; $i < count($array); $i++) {
                $array[$i] = array_values($array[$i]);
            }

            $arr_count = count($array);
        }

        if (count($array) > 0) {
            $finishArray[] = $array[0][0];
        }

        return $finishArray;


    }


}