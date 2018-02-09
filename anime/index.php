<?php
ob_start("ob_gzhandler");
require_once('../php/islogged.php');
if (isset($_SESSION['r_hash'])):
    $host = $_SERVER['REQUEST_URI'];
    if (isset($_GET['anime'])):
        $anime = $_GET['anime'];
        $anime_info = ($Connection->conn->query("SELECT * FROM anime_list WHERE shortname='$anime'"))->fetch_assoc();
        $anime_episode = ($Connection->conn->query("SELECT * FROM ep_list e_l LEFT JOIN anime_list a_l on e_l.anime = a_l.shortname WHERE shortname='$anime'"))->fetch_all(MYSQLI_ASSOC);
        ?>
        <html>
        <head>
            <?php require('../static/head.php'); ?>
            <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        </head>
        <body id="anime-body" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.2) 100%), url('<?= $anime_info['url_image'] ?>');">
        <?php require('../static/navbar.php'); ?>
        <div class="jumbotron" id="anime-name">
            <h1><?= $anime_info['anime'] ?></h1>
        </div>
        <?php if (count($anime_episode) > 0): ?>
            <div id="ep-list">
                <?php foreach ($anime_episode as $ap): ?>
                    <div class="w3-card-4" id="ep-name">
                        <header class="w3-container w3-center">
                            <a class="ep"
                               data-location="<?= $ap['ep_link'] ?>"><?= $ap['ep_number'] . '.' . $ap['ep_name'] ?></a>
                        </header>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="jumbotron" id="no-ep">
                <h1>Nessun episodio è ancora stato caricato</h1>
            </div>
        <?php endif; ?>
        <?php if (count($anime_episode) > 0): ?>
            <div id="Video-Player">
                <div id="v-container">
                    <iframe class="video-player" src="" scrolling="no" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                    <i id="closeplayer" class="fas fa-times"></i>
                </div>
            </div>
            <script type="application/javascript">
                $(document).ready(function () {
                    $('.ep').click(function () {
                        $('.video-player').attr('src', $(this).data('location'));
                        $('.video-player').on('load', function () {
                            $('#Video-Player').slideDown(function () {
                                $('#Video-Player').css({'display':'flex'});
                            });
                        });
                    });
                    $('#closeplayer').click(function () {
                        $('#Video-Player').slideUp();
                    });
                });
            </script>
        <?php endif; ?>
        </body>
        </html>
    <?php
    else:
        header('location: /lista-anime');
    endif;
else:
    header('location: ../static/unauthorized');
endif;
?>
