<?php
$name = $_POST['name'];
$author = $_POST['author'];
$shortdescription = $_POST['short-description'];
$description = $_POST['description'];
require("mysql.php");
if ( $_FILES['uploaddatei']['name']  <> "" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
 
    // Kontrolle, ob Dateityp zulässig ist
    $zugelassenedateitypen = array("image/png", "image/jpeg", "image/gif");
 
    if ( ! in_array( $_FILES['uploaddatei']['type'] , $zugelassenedateitypen ))
    {
        echo "<p>Dateitype ist NICHT zugelassen</p>";
    }
    else
    {
        // Test ob Dateiname in Ordnung
        $_FILES['uploaddatei']['name'] = dateiname_bereinigen($_FILES['uploaddatei']['name']);
 
        if ( $_FILES['uploaddatei']['name'] <> '' )
        {
            move_uploaded_file (
                 $_FILES['uploaddatei']['tmp_name'] ,
                 'files/'. $_FILES['uploaddatei']['name'] );
 
            echo "<p>Hochladen war erfolgreich! ";
            echo '<a href="browse.php">';
            echo 'Stöbern';
            echo '</a>';
        }
        else
        {
            echo "<p>Dateiname ist nicht zulässig</p>";
        }
    }
}
if ( $_FILES['uploaddatei2']['name']  <> "" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
 
    // Kontrolle, ob Dateityp zulässig ist
    $zugelassenedateitypen = array("application/zip", "application/octet-stream", "application/x-zip-compressed", "multipart/x-zip", "application/x-rar-compressed", "application/octet-stream");
 
    if ( ! in_array( $_FILES['uploaddatei2']['type'] , $zugelassenedateitypen ))
    {
        echo "<p>Dateitype ist NICHT zugelassen</p>";
    }
    else
    {
        // Test ob Dateiname in Ordnung
        $_FILES['uploaddatei2']['name'] = dateiname_bereinigen($_FILES['uploaddatei2']['name']);
 
        if ( $_FILES['uploaddatei2']['name'] <> '' )
        {
            move_uploaded_file (
                 $_FILES['uploaddatei2']['tmp_name'] ,
                 'files/'. $_FILES['uploaddatei2']['name'] );
 
            echo "<p>Hochladen war erfolgreich! ";
            echo '<a href="browse.php">';
            echo 'Stöbern';
            echo '</a>';
        }
        else
        {
            echo "<p>Dateiname ist nicht zulässig</p>";
        }
    }
}
 
function dateiname_bereinigen($dateiname)
{
    // erwünschte Zeichen erhalten bzw. umschreiben
    // aus allen ä wird ae, ü -> ue, ß -> ss (je nach Sprache mehr Aufwand)
    // und sonst noch ein paar Dinge (ist schätzungsweise mein persönlicher Geschmach ;)
    $dateiname = strtolower ( $dateiname );
    $dateiname = str_replace ('"', "-", $dateiname );
    $dateiname = str_replace ("'", "-", $dateiname );
    $dateiname = str_replace ("*", "-", $dateiname );
    $dateiname = str_replace ("ß", "ss", $dateiname );
    $dateiname = str_replace ("ß", "ss", $dateiname );
    $dateiname = str_replace ("ä", "ae", $dateiname );
    $dateiname = str_replace ("ä", "ae", $dateiname );
    $dateiname = str_replace ("ö", "oe", $dateiname );
    $dateiname = str_replace ("ö", "oe", $dateiname );
    $dateiname = str_replace ("ü", "ue", $dateiname );
    $dateiname = str_replace ("ü", "ue", $dateiname );
    $dateiname = str_replace ("Ä", "ae", $dateiname );
    $dateiname = str_replace ("Ö", "oe", $dateiname );
    $dateiname = str_replace ("Ü", "ue", $dateiname );
    $dateiname = htmlentities ( $dateiname );
    $dateiname = str_replace ("&", "und", $dateiname );
    $dateiname = str_replace ("+", "und", $dateiname );
    $dateiname = str_replace ("(", "-", $dateiname );
    $dateiname = str_replace (")", "-", $dateiname );
    $dateiname = str_replace (" ", "-", $dateiname );
    $dateiname = str_replace ("\'", "-", $dateiname );
    $dateiname = str_replace ("/", "-", $dateiname );
    $dateiname = str_replace ("?", "-", $dateiname );
    $dateiname = str_replace ("!", "-", $dateiname );
    $dateiname = str_replace (":", "-", $dateiname );
    $dateiname = str_replace (";", "-", $dateiname );
    $dateiname = str_replace (",", "-", $dateiname );
    $dateiname = str_replace ("--", "-", $dateiname );
 
    // und nun jagen wir noch die Heilfunktion darüber
    $dateiname = filter_var($dateiname, FILTER_SANITIZE_URL);
    return ($dateiname);
}
$timestamp = time();
$href = 'files/'. $_FILES['uploaddatei2']['name'];
$pic = 'files/'. $_FILES['uploaddatei']['name'];
$price = 0;
$statement = $pdo->prepare("INSERT INTO resources (username, author, shortdescription, rdescription, href, pic, price, uploaded) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$statement->execute(array($name, $author, $shortdescription, $description, $href, $pic, $price, $timestamp)); 
?>