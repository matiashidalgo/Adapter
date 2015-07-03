<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:36
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

require '../autoload.php';
session_start();
$testSocial = new TestSocial();
$urlLogin = '';
$urlLogout = '';
$userInfo = array();
if (isset($_GET['login']) && $_GET['login'] == 1) {
    $_SESSION['loggedFlag'] = true;
    $urlLogin = $testSocial->login($_GET['social']);
}
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $urlLogout = $testSocial->logout($_GET['social']);
    $_SESSION['loggedFlag'] = false;
    session_destroy();
}
if (isset($_GET['userInfo']) && $_GET['userInfo'] == 1 && isset($_SESSION['loggedFlag']) && $_SESSION['loggedFlag'] == true) {
    $userInfo = $testSocial->userInfo($_GET['social']);
}
?>
<html>
    <head>
        <title>Esto es un ejercicio practico</title>
    </head>
    <body>
    <header>
        <h1>Esto es un ejercicio practico</h1>
        <article>
            En este ejercicio demostraremos como utilizar un adapter para relacionar el uso de multiples aplicaciones sociales.
        </article>
    </header>
        <div class="menu">
            <ul>
                <?php if(!isset($_SESSION['loggedFlag']) || $_SESSION['loggedFlag'] == false): ?>
                    <li>
                        <a href="index.php?login=1&social=facebook">Login with FB</a>
                    </li>
                    <li>
                        <a href="index.php?login=1&social=twitter">Login with Tw</a>
                    </li>
                    <li>
                        <a href="index.php?login=1&social=googleplus">Login with Gl+</a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['loggedFlag']) && $_SESSION['loggedFlag'] == true && isset($_SESSION['social']) && $_SESSION['social'] == 'facebook'): ?>
                    <li>
                        <a href="index.php?logout=1&social=facebook">Logout with FB</a>
                    </li>
                    <li>
                        <a href="index.php?userInfo=1&social=facebook">Get user Info from FB</a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['loggedFlag']) && $_SESSION['loggedFlag'] == true && isset($_SESSION['social']) && $_SESSION['social'] == 'twitter'): ?>
                    <li>
                        <a href="index.php?logout=1&social=twitter">Logout with Tw</a>
                    </li>
                    <li>
                        <a href="index.php?userInfo=1&social=twitter">Get user Info from Tw</a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['loggedFlag']) && $_SESSION['loggedFlag'] == true && isset($_SESSION['social']) && $_SESSION['social'] == 'googleplus'): ?>
                    <li>
                        <a href="index.php?logout=1&social=googleplus">Logout with Gl+</a>
                    </li>
                    <li>
                        <a href="index.php?userInfo=1&social=googleplus">Get user Info from Gl+</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    <div class="content">
        <div class="info">
            <?php if(!isset($_SESSION['loggedFlag']) || $_SESSION['loggedFlag'] == false): ?>
                <h2>Seleccione el servicio que va a utilizar para iniciar sesion</h2>
                <?php if($urlLogout !== ''): ?><p>Se cerro la sesion desde la url <?php echo $urlLogout ?></p><?php endif; ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['loggedFlag']) && $_SESSION['loggedFlag'] == true): ?>
                <h2>Usted inicio sesion con <?php echo $testSocial->socialTitle($_GET['social']) ?></h2>
                <?php if($urlLogin !== ''): ?><p>Se inicio sesion a traves de la url <?php echo $urlLogin ?></p><?php endif; ?>

                <?php if(isset($_GET['userInfo']) && $_GET['userInfo'] == 1): ?>
                    <ul>
                        <li>Username: <?php echo $userInfo['username'] ?></li>
                        <li>Email: <?php echo $userInfo['email'] ?></li>
                        <li>Nombre: <?php echo $userInfo['first_name'] ?></li>
                        <li>Apellido: <?php echo $userInfo['last_name'] ?></li>
                        <li>Telefono: <?php echo $userInfo['phone'] ?></li>
                        <li>Direcciones:
                            <hr/>
                            <?php foreach($userInfo['address'] as $address): ?>
                            <ul>
                                <?php $address = explode(',',$address) ?>
                                <li>Calle: <?php echo $address[0] ?></li>
                                <li>Altura: <?php echo $address[1] ?></li>
                                <li>Ciudad: <?php echo $address[2] ?></li>
                                <li>Pais: <?php echo $address[3] ?></li>
                                <li>Codigo postal: <?php echo $address[4] ?></li>
                            </ul>
                            <hr/>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    </body>
</html>