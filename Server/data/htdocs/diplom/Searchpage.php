
<script>
    function ajaxRequestupload(url)
    {
        var text = document.getElementById("search_text").value;
        var httpRequest =new XMLHttpRequest();
        httpRequest.onreadystatechange = function()
        {
            alertResponse(this);
        }
        httpRequest.open('Get', "upload.php?a=" + text, true);
        httpRequest.send(null);
    }
    function alertResponse(httpRequest)
    {
        if(httpRequest.readyState ==4)
        {
            if(httpRequest.status == 200)
            {
                var responseDiv = document.getElementById('ajaxDiv');
                responseDiv.innerHTML = httpRequest.responseText;
            }
            else
            {
                alert('проблема с получением ответа от сервера');
            }
        }
    }
    function ajaxrequestshow(url)
    {
        var text = document.getElementById("search_text").value
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            alertResponse(this);
        };
        xmlhttp.open("GET", "show.php?a=" + text, true);
        xmlhttp.send(null);
    }
</script>
<?php include("header.php");?>
<div class="container">
<P>Введите интересующую информацию</P>
    <input id="search_text" type="text" onkeyup="ajaxrequestshow('show.php')">
    <div id="ajaxDiv"></div>

</div>
<?php include("footer.php");?>
</body>
</html>