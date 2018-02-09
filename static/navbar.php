<!-- TEST COMMENTO -->

<?php
$host = $_SERVER['REQUEST_URI'];

if ($host == "/"):
    require_once('php/db_manage.php');
    require_once ('php/islogged.php');
    $logout = "php/logout";
else:
    require_once('../php/db_manage.php');
    require_once('../php/islogged.php');
    $logout = "../php/logout";
endif;
$Connection = new db_manage();

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Atom</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['r_hash'])): ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?= $utente_info['nome'] ?><span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/account-setting">Modifica impostazioni</a></li>
                        <li><a href="<?= $logout ?>">Disconnettiti</a></li>
                    </ul>
                <?php if ($host == "/lista-anime/"):?>
                <li class="mobile-search"><a>Cerca Anime</a></li>
                <?php endif;?>
                <li><a href="/lista-anime">Lista Anime</a></li>
                <?php if ($utente_info['tipo'] == "admin"): ?>
                    <li><a href="/lista-utenti">Lista Utenti</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li class="loginbtn"><a>Accedi</a></li>
                <li class="signupbtn"><a>Registrati</a></li>
            <?php endif; ?>
        </ul>
        </div>
    </div>
</nav>
