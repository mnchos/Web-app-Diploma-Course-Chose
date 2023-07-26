<?php include("header.php");?>
<div class="text-center">
    <main class="form-signin" >
        <form method="post" action="register.php">

            <h1 class="h3 mb-3 fw-normal"> Зарегистрируйтесь  </h1>
            <div class="form-floating">
                <input type="login" name="login" class="form-control" >
                <label for="floatingInput">Введите логин</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                </label>
            </div>
            <input name="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Регистрация">

        </form>
    </main>
</div>
<?php include("footer.php");?>
</body>
</html>