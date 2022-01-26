<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Basic Login</title>
    </head>
    <body>
        <section>
            <div>
                <h4>SIGN UP</h4>
                <p>Don't have an account? Sign up here!</p>
                    <form action="includes/signup.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="confirmpwd" placeholder="Confirm Password">
                        <input type="text" name="email" placeholder="E-mail">
                        <br>
                        <button type="submit" name="submit">SIGN UP</button>
                    </form>
            </div>
            <div>
                <h4>LOGIN TO YOUR ACCOUNT</h4>
                <form action="includes/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <br>
                        <button type="submit" name="submit">LOGIN</button>
                </form>
            </div>
        </section>
    </body>
</html>