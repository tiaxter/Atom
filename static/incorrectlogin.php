<?php
    require_once ('../php/islogged.php');
    if (isset($_SESSION['r_hash'])):
        header('location: ../');
    else:
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Atom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- The Modal -->
<div>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Login non eseguito</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Username e/o Password non corretti
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Riprova</button>
            </div>

        </div>
    </div>
</div>

</div>

<script>
    $(document).ready(function () {
        $('button').click(function () {
            window.location.replace('../');
        });
    });
</script>

</body>
</html>
<?php  endif;?>