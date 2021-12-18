<?php
// Funktio joka luo start_year-pudotusvalikon
function createStartDropDown()
{
    // Tietokantayhteys
    require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-functiota, joka avaa tietokantayhteyden

    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT DISTINCT `start_year` FROM titles;";
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    $html = '<select name="start_year">';
    // Looppaa tietokannasta saadut rivit läpi
    foreach ($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<option>' . $row['start_year'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}



// Funktio joka luo Birth Year-pudotusvalikon
function createBirthDropDown()
{
    // Tietokantayhteys
    require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-functiota, joka avaa tietokantayhteyden

    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT DISTINCT `birth_year` FROM names_;";
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    $html = '<select name="birth_year">';
    // Looppaa tietokannasta saadut rivit läpi
    foreach ($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<option>' . $row['birth_year'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}