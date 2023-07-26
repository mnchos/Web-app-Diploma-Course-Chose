<?php
$mysqli= new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
$url=explode('/',$url);
$url=$url[3];
?>
<?php if(!isset($_COOKIE['user_login'])){ ?>
<?php }
else {?>
    <main >
        <form method="post" action="like.php">
            <div class="">
                <input type="hidden" name="articleid" value="<?php echo $url; ?>">
            </div>
            <input class="btn btn-outline-primary me-2" name="submit"type="submit" value="понравилось">
        </form>
    </main>
<?php } ?>
