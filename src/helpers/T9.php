<?php 

namespace App\helpers;


trait T9 {

    public function t9() 
    {
        return array(
            2 => array('a', 'b', 'c'),
            3 => array('d', 'e', 'f'),
            4 => array('g', 'h', 'i'),
            5 => array('j', 'k', 'l'),
            6 => array('m', 'n', 'o'),
            7 => array('p', 'q', 'r', 's'),
            8 => array('t', 'u', 'v'),
            9 => array('w', 'x', 'y', 'z')
        );
    }


    /**
     * this function get searching entriers and transform them to an array of character
     * @param $search is a string with posted numbers 
     * @return array 
     */
    public function getInput(string $search) : array 
    {
        //get inputs numbers 
        $input = str_split($search);

        //get our T9 table 
        $array_t9 = $this->t9();

        //initizialisation of array 
        $inputs = [];
        foreach($input as $char ) 
        {
            //store searching inputs inside array 
            $inputs[]= $array_t9[$char];
            
        }
        return $inputs;
    }

    /**
     * make a combinations between arrays 
     * @param $array contain a searching letters character  
     * @return array
     */
    public function Combinations($array, $i = 0, $result = []) 
    {
        if (!isset($array[$i])) {
            return $result;
        }
        if (empty($result)) {
            foreach ($array[$i] as $element) {
                $result[] = [$element];
            }
        } else {
            $tmp = [];
            foreach ($result as $prev) {
                foreach ($array[$i] as $element) {
                    $prev[] = $element;
                    $tmp[] = $prev;
                    array_pop($prev);
                }
            }
            $result = $tmp;
        }
        return $this->Combinations($array, $i + 1, $result);
    }
    
    /**
     * get all combinations for searching data 
     * @param $post is searching entries 
     * @return array of combinations  
     */
    public function getCombinations($posts)
    {
        //get combinations 
        $combinations = $this->combinations($this->getInput($posts));
        
        return $combinations;

    }
    /**
     * get SQL statement 
     * @return string
     */
    public function getSqlStatement($posts) 
    {
        $result=[];
        $query ="SELECT * FROM contact WHERE first_name LIKE ";
        $combinations = $this->getCombinations($posts);
        //get all result words in an array
        foreach($combinations as $combination) {
            
            $word =  join('', $combination);
            $word = "'%".$word."%'";
            $result[] = $word;    
        }
       
        $query .= implode(' OR first_name LIKE ', $result);
        $query .= ' OR last_name LIKE ';
        $query .= implode(' OR last_name LIKE ', $result);
        return $query;
    }
}