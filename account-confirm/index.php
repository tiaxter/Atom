<html>
<head>
    <?php require('../static/head.php'); ?>
</head>
<body>
<?php /*require ('../static/navbar.php');*/ ?>
</body>
<?php
require_once('../php/db_manage.php');
$Connection = new db_manage();
$username = isset($_GET['username']) ? $_GET['username'] : null;
$activation_code = isset($_GET['activation_code']) ? $_GET['activation_code'] : null;
if ($activation_code == null || $username == null):
    ?>
    <script>
        $(document).ready(function () {
            alertify.alert('Atom', 'Dati non corretti',function () {
                location.replace('/');
            });
        });
    </script>
<?php
else:
    $acc_status = ($Connection->conn->query("SELECT active from user_list WHERE username='$username' AND activation_code='$activation_code'"))->fetch_assoc();
    $acc_status = $acc_status['active'];
    if ($acc_status == 1):
        ?>
        <script>
            $(document).ready(function () {
                alertify.alert('Atom', 'Account già attivato',function () {
                    location.replace('/');
                });
            });
        </script>
    <?php
    else:
    $Connection->conn->query("UPDATE user_list SET active=1 WHERE username='$username' AND activation_code='$activation_code'");
    $acc_status = ($Connection->conn->query("SELECT active from user_list WHERE username='$username' AND activation_code='$activation_code'"))->fetch_assoc();
    $acc_status = $acc_status['active'];
    if ($acc_status == 1):
    ?>
        <script>
            $(document).ready(function () {
                alertify.alert('Atom', 'Account attivato',function () {
                    location.replace('/');
                });
            })
        </script>
    <?php
    else:
    ?>
        <script>
            $(document).ready(function () {
                alertify.alert('Atom', 'Attivazione non riuscita',function () {
                    location.replace('/');
                });
            })
        </script>
    <?php
    endif;
    endif;
endif;
?>
</html>
