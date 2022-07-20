<?php

use App\Core\View;
use App\Core\Cookie;

View::$activeItem = 'dashboard';
date_default_timezone_set('Asia/Ho_Chi_Minh')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <style>
        #content {
            margin-left: 5em;
            margin-right: 5em;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 2em;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div id="content">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="comment">Bản mã:</label>
                                <textarea class="form-control" rows="5" id="cipher"></textarea>
                            </div>
                            <button class="btn btn-success" id="decode"> Giải mã </button>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="comment">Bản rõ:</label>
                                <textarea class="form-control" rows="5" id="plain"></textarea>
                            </div>
                            <button class="btn btn-primary" id="encode"> Mã hóa </button>
                        </td>
                    </tr>
                    <tr></tr>
                </table>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
        </div>
    </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/xml2json.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#encode').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/decode/encryptRSA',
                    data: {
                        text: $('#plain').val(),
                    },
                    type: 'POST'
                }).done(function(response) {
                    $('#cipher').text(response);
                })
            })
            $('#decode').click(function() {
                $.ajax({
                    url: 'http://localhost/emss/decode/decryptRSA',
                    data: {
                        text: $('#cipher').val(),
                    },
                    type: 'POST'
                }).done(function(response) {
                    $('#plain').text(response);
                })
            })
        })
    </script>
</body>

</html>