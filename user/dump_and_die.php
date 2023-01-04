<?php
     
        /**
         * @param mixed ...$param
         */
        function dd(...$param)
        {
            echo '<pre><br>';
            foreach ($param as $p) {
                var_dump($p);
                echo '<br>';
            }
            echo '</pre><br>';
            die();
        }
        
        function d(...$param)
        {
            echo '<pre><br>';
            foreach ($param as $p) {
                var_dump($p);
                echo '<br>';
            }
            echo '</pre><br>';
 
        }