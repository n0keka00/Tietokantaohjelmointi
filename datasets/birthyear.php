<?php
    // Muodostetaan tietokantayhteys
    require_once('../db.php');
    // Luetaan get-parametri, birth_year
    $region = $_GET['birth_year'];
    $conn = createDbConnection();
    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.

    // Stored Procedure GetBirthYear
    // BEGIN
    //SELECT 
    //name_id
    //name_, 
    //birth_year 

    //FROM
    //names_
    //ORDER BY name_;
    //END

    $sql = "CALL GetBirthYear('" . $birth_year . "');";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>Birth Year' . $birth_year . '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['names_'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;