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
     * this function get searching entriers and transform them to an array 
     * @param $search is a string with posted numbers 
     * @return array 
     */
    public function possibilites(string $search) : array 
    {
        //get inputs numbers 
        $input = str_split($search);

        //get our T9 table 
        $array_t9 = $this->t9();

        //initizialisation of array 
        $possibilities = [];
        foreach($input as $char ) 
        {
            //store searching possibilities inside array 
            $possibilities[]= $array_t9[$char];
            
        }
        return $possibilities;
    }

    /**
     * make a combinations between arrays 
     * @param $possibilities is an array containing a searching letters 
     * @return array
     */
    public function Combinations($possibilities, $i = 0, $result = []) {
        if (!isset($possibilities[$i])) {
            return $result;
        }
        if (empty($result)) {
            foreach ($possibilities[$i] as $element) {
                $result[] = [$element];
            }
        } else {
            $tmp = [];
            foreach ($result as &$prev) {
                foreach ($possibilities[$i] as $element) {
                    $prev[] = $element;
                    $tmp[] = $prev;
                    array_pop($prev);
                }
            }
            $result = $tmp;
        }
        return $this->Combinations($possibilities, $i + 1, $result);
    }
    
    /**
     * get all combinations for searching data 
     * @param $post is searching entries 
     * @return string our query with all searching data combinations  
     */
    public function getCombinations($posts)
    {
        //get combinations 
        $combinations = $this->combinations($this->possibilites($posts));

        $result=[];
        $query ="SELECT * FROM contact WHERE first_name LIKE ";
        
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