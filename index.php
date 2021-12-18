<?php

    // Käytin tässä tehtävässä IMDB-datasettiä. En valitettavasti saanut täysin
    // toimimaan sovellusta. Yritin kuitenkin parhaani saada sen toimimaan.
    // Minun oli jotenkin tosi vaikea hahmottaa mihin tulee mitäkin.


    require_once('utilities.php');
    // Hakukriteerit
    $html = "<h1>Random IMDB querys</h1>";
    $html .= '<form action="GET">';
    // Aloitusvuosi/ Start Year pudotusvalikko
    $html .= createStartDropDown();
    // Syntymävuosi/Birth Year pudotusvalikko
    $html .= createBirthDropDown();
    // Looppaa läpi tiedostot datasets-hakemistosta
    $path = 'datasets';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $html .= '<div><input type="submit" value="' . 
            basename($file, ".php") . '" formaction"' . $path . "/" 
            . $file . '"></div';
        }
        closedir($handle);
    }
    $html .= '</form>';


    echo $html;
    
