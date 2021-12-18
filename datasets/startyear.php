<?php
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ota dp.php-tiedosto käyttöön tässä tiedostossa
    $title = $_GET['start_year'];
    $conn = createDbConnection();

    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT `original_title`
    FROM `titles` INNER JOIN title_ratings
    ON titles.title_id = title_ratings.title_id
    WHERE start_year LIKE '%1894%'
    LIMIT 10;";

    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn-> prepare($sql);
    // Parametrien arvojen bindaus
    //$prepare->bindParam(':1894', $start_year, PDO::PARAM_STR);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    var_dump($rows);

    //Otsikko otsikko 
    $html = '<h1>' . $original_title . '<h1>';
    //ul-elementti
    $html .= '<ul>'; 
    // Looppaa tietokannasta saadut rivit läpi 
    foreach($rows as $row) {
        //Tulostaa jokaiselle riville li-elementin
        $html .= '<li>' . $row['original_title'] . '</li>';
    }

    $html .= '</ul>';

    echo $html;
    
