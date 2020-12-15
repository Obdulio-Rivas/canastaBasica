<?php
    //Iniciar var's of session's...
    session_start();
    //----------------------------
    if(isset($_SESSION["token"])){
        header('location: panel.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/static/css/index.css">
    <title>Canasta Basica Salvadoreña</title>
</head>
<body>
    <header class="header">
        <div class="wrapper">
            <div class="header__container">
                <div class="header__item">
                    <img class="header__item__logo" src="src/static/assets/svg/flag_sv.svg" alt="image of El Salvador">
                    <h1 class="header__item__logotipo">Canasta Basica Salvadoreña</h1>
                </div>
                <ul class="header__menu">
                    <li><a href="integrantes.html">Integrantes</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="login">
        <div class="wrapper">
            <div class="login__container">
                <h1 class="login__container__title">Inciar Sesión</h1>
                <form class="login__container__form" method="POST" action="src/modules/singIn.php" autocomplete="off">
                    <label class="form__label" for="userName">Usuario:</label>
                    <input class="form__input" type="text" name="userName" placeholder="Usuario"/>
                    <label class="form__label" for="userName">Contraseña:</label>
                    <input class="form__input" type="password" name="password" placeholder="Contraseña"/>
                    <span class="form__msg">
                        <?php
                            if(isset($_SESSION["msg"])){
                                echo($_SESSION["msg"]);
                            }else{
                                echo("-");
                            }
                        ?>
                    </span>
                    <button class="form__btn" type="submit" class="btn btn-primary btn-block btn-large">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>