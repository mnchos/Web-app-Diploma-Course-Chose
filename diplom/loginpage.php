<?php include("header.php");?>
<div class="text-center">
    <main class="form-signin" >
        <form method="post" action="login.php">

            <h1 class="h3 mb-3 fw-normal"> Авторизация </h1>
            <div class="form-floating">
                <input type="login" name="login" class="form-control">
                <label for="floatingInput">Email login</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="checkbox mb-3">
            </div>
            <input name="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Войти">
        </form>
    </main>
</div>
<?php include("footer.php");?>
</body>
</html>