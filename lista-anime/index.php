<?php
ob_start("ob_gzhandler");
require_once('../php/islogged.php');
?>
<?php if (isset($_SESSION['r_hash'])):?>
    <html>
    <head>
        <?php require('../static/head.php'); ?>
    </head>
    <body>
    <?php require('../static/navbar.php'); ?>
    <div class="jumbotron">
        <h1 id="a_l">Lista Anime</h1>
        <input id="anime-search" name="search" placeholder="Cerca Anime" autocomplete="off">
    </div>
    <div id="content">
        <?php require ('../static/anime-list.php');?>
    </div>
    <script>
        $(document).ready(function () {
            <?php if ($utente_info['active'] == 0):?>
            alertify.alert('Atom',"Ricordati di attivare la mail, sennò alla fine della giornata il tuo account sarà rimosso")
            <?php endif;?>
            /*$(document).on('click','.w3-card-4',function () {
                window.location = "/anime/" + $(this).data('location');
            });
*/
            $(document).on('keydown', function () {
                $('#a_l').hide();
                $('#anime-search').css({'display': 'block'});
                $('#anime-search').focus();
            });
            $(document).on('click', '.mobile-search', function () {
                $('#a_l').hide();
                $('#anime-search').css({'display': 'block'});
                $('#anime-search').focus();
                $('.in,.open').removeClass('in open');
                $('')
            });
            $(document).on('keyup', function () {
                var search = $('#anime-search').val();
                $.ajax({
                    url:'../static/anime-list.php',
                    type: 'GET',
                    data: {search : search},
                    success: function(data){
                        $('#content').html(data);
                    }
                });
            });
        });
    </script>
    </body>
    </html>
<?php else:
    header('location: ../static/unauthorized');
endif;
?>
