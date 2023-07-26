<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php session_start();
include("header.php");

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
$url = explode('/', $url);
$url = $url[3];
$_SESSION["link"]=$url;
?>
<script>
    function timer()
    {
        $.ajax({
            url: "timer.php",
            cache: false,

            success: function(html){
                $("#content").html(html);
            }
        });
    }
    $(document).ready(function(){
        setTimeout('timer()',5000);
    });
</script>