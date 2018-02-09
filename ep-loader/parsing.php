<?php
//set_time_limit(5);
require_once('../php/db_manage.php');
require_once('../library/simple_html_dom.php');

$Connection = new db_manage();

$shortname = $_POST['shortname'];
$url = $_POST['url'];

$n_ordinali = [
    1 => 'prima',
    2 => 'seconda',
    3 => 'terza',
    4 => 'quarta',
    5 => 'quinta',
    6 => 'sesta',
    7 => 'settima',
    8 => 'ottava',
    9 => 'nona',
    10 => 'decima',
    11 => 'undicesima',
    12 => 'dodicesima',
    13 => 'tredicesima',
    14 => 'quattordicesima',
    15 => 'quindicesima',
    16 => 'sedicesima',
    17 => 'diciassettesima',
    18 => 'diciottesima',
    19 => 'diciannovesima',
    20 => 'ventesima',
    21 => 'ventunesima',
    22 => 'ventiduesima',
    23 => 'ventitreesima',
];
$more_stagioni = FALSE;
$titoli = [];
$html = new simple_html_dom();

if (strpos($url, 'stagione')):
    foreach ($n_ordinali as $i => $no):
        if ((strpos($url, $no)) !== FALSE):
            $more_stagioni = TRUE;
            $n_stag = $i;
        endif;
    endforeach;
    if ($more_stagioni === TRUE):
        foreach (array_slice($n_ordinali, $n_stag) as $stag):
            $source = file_get_contents("$url");
            $html->load($source);
            $wikitable = $html->find('table[class=wikitable]', 0);
            foreach ($wikitable->find('tr[id]') as $tr):
                $n_ep = $tr->find('td', 1)->plaintext; /*0 primo td,1 secondo td*/
                $secondariga = $tr->find('td', 2);
                if ($secondariga->find('i > b > a', 0)):
                    $titolo=$secondariga->find('i > b > a', 0)->plaintext;
                else:
                    $titolo=$secondariga->find('i > b', 0)->plaintext;
                endif;
                $titoli[$n_ep] = $titolo;
            endforeach;
            $url = str_replace($n_ordinali, $stag, $url);
        endforeach;
    endif;
else:
    $source = file_get_contents("$url");
    $html->load($source);
    $wikitable = $html->find('table[class=wikitable]', 0);
    foreach ($wikitable->find('tr[id]') as $tr) {
        $n_ep = $tr->find('td', 0)->plaintext;
        $secondariga = $tr->find('td', 1);
        $titolo = $secondariga->find('i > b', 0)->plaintext;

        $titoli[$n_ep] = $titolo;
    }
endif;
foreach ($titoli as $n => $eps):
    $eps = str_replace(chr(34), chr(39), $eps);
endforeach;

$html->__destruct();
unset($html);
$html = null;

print_r($titoli);

foreach ($titoli as $n => $ep) {
    if (!$Connection->conn->query("INSERT INTO ep_list (ep_number, ep_name, ep_link, anime) VALUES ($n, \"$ep\", 'http://www.romania.org','$shortname')")) {
        echo ('Errore' . mysqli_error($Connection->conn)) . '<br>';
    }
}