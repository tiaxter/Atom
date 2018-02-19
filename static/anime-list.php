<?php
require_once('../php/db_manage.php');
require_once('../php/islogged.php');
if (isset($_SESSION['r_hash'])):
    $Connection = new db_manage();
    //Paginazione
    $limit = 3;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $first = ($page - 1) * $limit;
    //Fine Paginazione
    if (isset($_GET['search'])):
        $search = $_GET['search'];
        //Inizio Paginazione
        $pagine = ceil(($Connection->conn->query("SELECT count(anime) FROM anime_list WHERE anime LIKE '%$search%'")->fetch_array())[0] / $limit);
        $anime = ($Connection->conn->query("SELECT * FROM anime_list WHERE anime LIKE '%$search%' LIMIT $first, $limit"))->fetch_all(MYSQLI_ASSOC);
    else:
        //Inizio Paginazione
        $pagine = ceil(($Connection->conn->query("SELECT count(anime) FROM anime_list")->fetch_array())[0] / $limit);
        ///Fine Paginazione
        $anime = ($Connection->conn->query("SELECT * FROM anime_list LIMIT $first, $limit"))->fetch_all(MYSQLI_ASSOC);
    endif;
    if (count($anime) > 0):?>
        <div class="w3-container" style="display: inline-flex;" id="content">
            <?php foreach ($anime as $an): ?>
                <div class="w3-card-4"><!--style="width: 30%;"-->
                    <a href="/anime/<?= $an['shortname']; ?>"><img src="<?= $an['url_image']; ?>" style="width: 100%;">
                        <div class="w3-container w3-center">
                            <p><?= $an['anime']; ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <ul class="pagination" style="display: flex; justify-content: center; align-items: center;">
            <?php for ($i = 1; $i <= $pagine; $i++): ?>
                <li class="pag-btn"><a><?= $i ?></a></li>
            <?php endfor; ?>
        </ul>
    <?php else: ?>
        <div class="jumbotron">
            <h1>L'Anime cercato non è presente sulla piattaforma</h1>
        </div>
    <?php endif; ?>
    <script>
        $(document).ready(function () {
            $('.pag-btn').each(function () {
                if ($(this).children('a').text() == <?=$page;?>) {
                    $(this).attr('class', 'pag-btn active');
                }
            });
            var search = "<?=isset($_GET['search']) ? $_GET['search'] : null?>";
            $('.pag-btn').on('click', function () {
                var page = $(this).children('a').text();
                $.ajax({
                    url: '../static/anime-list.php',
                    type: 'GET',
                    data: {search: search, page: page},
                    success: function (data) {
                        $('#content').html(data);
                        $('body').animate({scrollTop: 0}, 'fast');
                    }
                });
            });
        });
    </script>
<?php else:
    header('location: unauthorized');
endif;
?>