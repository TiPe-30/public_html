<?php
    class CreateDatalist{
        private string
    }
    parcour_dir("./data");
    $chaine_afficher = '';
    $chaine_presente = array();
    function parcour_dir(string $directory) : void{
        $handle = opendir($directory);
        while($file = readdir($handle)){
            if($file != '.' && $file != '..'){
                $chaine_afficher = str_replace("./data/","","$directory/$file");
                if(str_contains($chaine_afficher,"/"))
                    echo str_replace("/","|",$chaine_afficher)."\n";
                
                if(!is_file("$directory/$file"))
                    parcour_dir("$directory/$file");
            }
        }
    }
?>