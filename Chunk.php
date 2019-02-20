<?php

    class Chunk{

        private $query;

        public function __construct($query)
        {
            $this->query = $query;
        }

        public function byChunk($count, callable $calback)
        
            $page = 1;

            do{
                //busca
                $results = $this->forPage($this->query, $page, $count);

                $countResult = $results->count();

                if($countResult==0){
                    break;
                }

                if($calback($results, $page)=== false){
                    return false;
                }
                unset($results);
                $page++;

            }while($countResult == $count);

            return true;
        }

        public function forPage($query, $page, $count)
        {
            $offset = ($page - 1) * $count;  //3
            $sql = exec_sqlr($query . "offset {$offset} and limit {$count}");
            return $sql;
        }
        
    }