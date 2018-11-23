<?php include "dbconnect.php" ?>

<?php
//Gets the date
date_default_timezone_set("America/Winnipeg");
$date = date("M d, Y, h:i A");
$datetime = (string)$date;

if(isset($_POST['createnewuser']))
{
    if($_POST['newusername'] != null && isset($_POST['newusername']))
    {
        $newusername = filter_input(INPUT_POST, 'newusername', FILTER_SANITIZE_STRING);
    }

    if($_POST['newpassword'] != null && isset($_POST['newusername']))
    {
        $newusername = filter_input(INPUT_POST, 'newusername', FILTER_SANITIZE_STRING);
    }
}

//When making a post
if(isset($_POST['create']))
{
    if($_POST['title'] != null && isset($_POST['title']))
    {
        $title = filter_input(INPUT_POST, 'title',  FILTER_SANITIZE_STRING);
    }

    if($_POST['manufacture'] != null && isset($_POST['manufacture']))
    {
        $manufacture = filter_input(INPUT_POST, 'manufacture',  FILTER_SANITIZE_STRING);
    }

    if($_POST['platform'] != null && isset($_POST['platform']))
    {
        $platform = filter_input(INPUT_POST, 'platform',  FILTER_SANITIZE_STRING);
    }

    if($_POST['gearCondition'] != null && isset($_POST['gearCondition']))
    {
        $gearCondition = filter_input(INPUT_POST, 'gearCondition',  FILTER_SANITIZE_STRING);
    }

    if($_POST['price'] != null && isset($_POST['price']))
    {
        $price = filter_input(INPUT_POST, 'price',  FILTER_SANITIZE_STRING);
    }

    if($_POST['comment'] != null && isset($_POST['comment']))
    {
        $comment = filter_input(INPUT_POST, 'comment',  FILTER_SANITIZE_STRING);
    }

    if($title && $manufacture && $platform && $gearCondition && $price && $comment)
    {
        $query = "INSERT INTO gear (title, manufacture, platform, gearCondition, price, comment, datetime) values (:title, :manufacture, :platform, :gearCondition, :price, :comment, :datetime)";
        $tables = $db->prepare($query);
        $tables ->bindValue(':title', $title);
        $tables ->bindValue(':manufacture', $manufacture);
        $tables ->bindValue(':platform', $platform);
        $tables ->bindValue(':gearCondition', $gearCondition);
        $tables ->bindValue(':price', $price);
        $tables ->bindValue(':comment', $comment);
        $tables ->bindValue(':datetime', $datetime);
        $tables->execute();
    }
    else
    {
        header("Location: error.php");
        exit;
    }

    header("Location: index.php");
    exit;
}

//If a post is deleted.
if(isset($_POST['delete']))
{
    $gearId = filter_input(INPUT_POST, 'gearId', FILTER_SANITIZE_NUMBER_INT);

    if ($gearId)
    {
        $post_id = $_POST['gearId'];
        $query = "DELETE FROM gear WHERE gearId = :gearId";
        $delete_statement = $db->prepare($query);
        $delete_statement->bindValue(':gearId', $gearId, PDO::PARAM_INT);
        $delete_statement->execute();
        header("Location: index.php");
        exit;
    }
    else
    {
        header("Location: error.php");
        exit;
    }
}

//If post is updated.
if(isset($_POST['update']))
{
    $title  = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $manufacture = filter_input(INPUT_POST, 'manufacture', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $platform = filter_input(INPUT_POST, 'platform', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gearCondition = filter_input(INPUT_POST, 'gearCondition', FILTER_SANITIZE_NUMBER_INT);
    $gearId = filter_input(INPUT_POST, 'gearId', FILTER_SANITIZE_NUMBER_INT);

    if (!$title || !$manufacture || !$platform || !$price || !$comment || !$gearCondition)
    {
        header("Location: error.php");
        exit;
    }
    else
    {
        $query = "UPDATE gear SET title = :title, manufacture = :manufacture, platform = :platform, gearCondition = :gearCondition, price = :price, comment = :comment, datetime = :datetime WHERE gearId = :gearId";
        $tables = $db->prepare($query);
        $tables ->bindValue(':title', $title);
        $tables ->bindValue(':manufacture', $manufacture);
        $tables ->bindValue(':platform', $platform);
        $tables ->bindValue(':gearCondition', $gearCondition);
        $tables ->bindValue(':price', $price);
        $tables ->bindValue(':comment', $comment);
        $tables ->bindValue(':datetime', $datetime);
        $tables ->bindValue(':gearId', $gearId);
        $tables->execute();

        //var_dump($gearId);
        header("Location: index.php");
        exit;
    }
}
?>



