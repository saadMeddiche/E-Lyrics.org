<?php

class HomeController
{

    static public function IncludeFile($page)
    {
        $array_paths = array(
            'views/',
            'views/includes/'
        );

        foreach ($array_paths as $path) {

            $file = sprintf($path . '%s.php', $page);

            //if the file exist then include it 
            if (is_file($file)) {
                require_once $file;
            }
        }
    }
}
