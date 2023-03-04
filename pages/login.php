<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head-pages.php' ?>
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Oh No Heberge | Accueil</title>
</head>

<body>
    <?php include_once '../includes/header.php' ?>
    <?php include_once '../includes/nav.php' ?>
    <div class="container">
        <div class="login">
            <h3>Connexion</h3>
            <form action="../script/auth-login.php" method="POST">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="submit">
            </form>
        </div>
        <div class="register">
            <h3>Inscription</h3>
            <form action="../script/auth-register.php" method="POST">
                <input type="text" name="name" placeholder="Prénom">
                <input type="text" name="lastName" placeholder="Nom">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="password" name="passwordConfirm" placeholder="Mot de passe de confirmation">
                <input type="submit">
            </form>
        </div>
    </div>
    <?php include_once '../includes/footer.php' ?>
</body>

</html>