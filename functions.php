<?php include "dbconnect.php" ?>
<?php

//gets the posts
$currentSort = 'egg';
function getAllData()
{
    global $db;

    if(!isset($_GET['sort']))
    {
        $query = "SELECT * FROM gear ORDER BY datetime DESC";
        $tables = $db->prepare($query);
        $tables -> execute();
        $column = $tables->fetchAll();
    }
    else
    {
        if(($_GET['sort'] === 'titledown'))
        {
            $query = "SELECT * FROM gear ORDER BY title DESC";
            $tables = $db->prepare($query);
            $tables -> execute();
            $column = $tables->fetchAll();
        }
        else if (($_GET['sort'] === 'titleup'))
        {
            $query = "SELECT * FROM gear ORDER BY title ASC";
            $tables = $db->prepare($query);
            $tables -> execute();
            $column = $tables->fetchAll();
        }
        else if (($_GET['sort'] === 'datedown'))
        {
            $query = "SELECT * FROM gear ORDER BY datetime DESC";
            $tables = $db->prepare($query);
            $tables -> execute();
            $column = $tables->fetchAll();
        }
        else if (($_GET['sort'] === 'dateup'))
        {
            $query = "SELECT * FROM gear ORDER BY datetime ASC";
            $tables = $db->prepare($query);
            $tables -> execute();
            $column = $tables->fetchAll();
        }
    }

    if($tables -> rowCount() != null)
    {
        foreach($column as $columns)
        {
            ?>
            <div class="gear_post">

                <h2><a href="fullpost.php?fullpage=<?= $columns['gearId'] ?>"><?= $columns['title'] ?></a></h2>

                <p>Manufacturer: <?= $columns['manufacture'] ?></p>
                <p>Platform: <?= $columns['platform'] ?></p>
                <p>Price: <?= $columns['price'] ?></p>
                <p>Condition: <?= $columns['gearCondition'] ?>/10</p>

                <div class='gear_comment'>
                    <?= substr($columns['comment'], 0, 200) ?>
                    <?php
                    if(strlen($columns['comment']) > 200)
                    {
                        ?>
                        <a href="fullpost.php?fullpage=<?= $columns['gearId'] ?>">Read more...</a>
                        <?php
                    }
                    ?>
                </div>

                <p>
                    <small>
                        <?= $columns['datetime'] ?>
                        <a href="edit.php?edit=<?= $columns['gearId'] ?>">edit</a>
                    </small>
                </p>

            </div>
            <?php
        }
    }
}
?>



<?php
//Retrieve current post edited by the Admin.
//Sanitizes user input.
function getDataEdit($superGlobalParam)
{
  global $db;

  if(isset($superGlobalParam))
  {
    $post_id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);

    if(!$post_id)
    {
      header('Location: index.php');
      exit;
    }

    $query = "SELECT * FROM gear WHERE gearId = {$post_id}";
    $tables = $db->prepare($query);
    $tables -> execute();
    $column = $tables->fetchAll();
  }

  if($tables -> rowCount() != null)
  {
    foreach($column as $columns)
    {
?>
        <p>
            <label for="title">Title</label>
            <input name="title" id="title" value= "<?= $columns['title']?>"/>
        </p>

<!--        <p>-->
<!--            <label for="manufacture">Manufacturer</label>-->
<!--            <input name="manufacture" id="manufacture" value= "--><?//= $columns['manufacture']?><!--"/>-->
<!--        </p>-->

        <input list="manufacture" name="manufacture">
        <datalist id="manufacture">
            <option value="Internet Explorer">
            <option value="Firefox">
            <option value="Chrome">
            <option value="Opera">
            <option value="Safari">
        </datalist>

        <p>
            <label for="platform">Platform</label>
            <input name="platform" id="platform" value= "<?= $columns['platform']?>"/>
        </p>

        <p>
            <label for="gearCondition">Condition</label>
            <input name="gearCondition" id="gearCondition" value= "<?= $columns['gearCondition']?>"/>
        </p>

        <p>
            <label for="price">Pricing</label>
            <input name="price" id="price" value= "<?= $columns['price']?>"/>
        </p>

        <p>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment"><?= $columns['comment']?></textarea>
        </p>

      <p>
        <input type="hidden" name="gearId" value="<?= $columns['gearId']?>" />
        <input type="submit" name="update" value="Update" />
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Do you want to delete this post?')" />
      </p>
<?php
    }
  }
}
?>

<?php
//Retrieve current post and displays its contents.
//Sanitizes user input.
function getDataFullPost($superGlobalParam)
{
    global $db;

    if(isset($superGlobalParam))
    {
        $post_id = filter_input(INPUT_GET, 'fullpage', FILTER_SANITIZE_NUMBER_INT);

        if(!$post_id)
        {
            header('Location: error.php');
            exit;
        }
        $query = "SELECT * FROM gear WHERE gearId = {$post_id}";
        $tables = $db->prepare($query);
        $tables -> execute();
        $column = $tables->fetchAll();
    }

    if($tables -> rowCount() != null)
    {
        foreach($column as $columns)
        {
            ?>
            <div class="blog_post">
                <h2><?= $columns['title'] ?></a></h2>

                <p>Manufacturer: <?= $columns['manufacture'] ?></p>
                <p>Platform: <?= $columns['platform'] ?></p>
                <p>Price: <?= $columns['price'] ?></p>
                <p>Condition: <?= $columns['gearCondition'] ?>/10</p>

                <div class='blog_content'>
                    <?= $columns['comment'] ?>
                </div>

                <p>
                    <small>
                        <?= $columns['datetime'] ?>
                        <a href="edit.php?edit=<?= $columns['gearId'] ?>">edit</a>
                    </small>
                </p>

            </div>
            <?php
        }
    }
    else
    {
        print "--- Boss hasn't posted yet ---";
    }
}
?>
