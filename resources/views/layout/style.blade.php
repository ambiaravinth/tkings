<style>
    <?php if (isset(auth()->user()->theme)) { ?>

    body {
        <?php
        $theme_background = auth()->user()->theme == 'dark' ? 'back0001.png' : (auth()->user()->theme == 'light' ? 'back0002.png' : 'back0003.png');
        $theme_background = public_url('images/background/' . $theme_background);
        ?>background: url("<?= $theme_background ?>") no-repeat center fixed;
        /* dark-back0001, light-back0002, green-back0003 */
        background-size: 100%;
        background-color: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'white' : '#efeade') ?>;
    }

    .login-container a {
        color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-gold, light-black, green-#214b3a */
        text-decoration: none;
        font-weight: 500;
    }

    button.btn-primary,
    button.btn-primary:hover,
    a.btn-primary,
    a.btn-primary:hover {
        background-color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-gold, light-black, green-#214b3a */
        color: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'gold' : 'white') ?>;
        /* dark-black, light-gold, green-white */
    }

    .dropdown-menu {
        right: 0;
        background: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'white' : '#efeade') ?>;
        /* dark-black, light-white, green-#efeade */
        border-radius: 10px;
        backdrop-filter: blur(5px);
        color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-gold, light-black, green-#214b3a */
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
        z-index: 100;
    }

    .dropdown-menu[data-bs-popper] {
        left: unset;
    }

    .dropdown-item {
        color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-gold, light-black, green-#214b3a */
        border: 1px solid black;
    }

    .dropdown-item:hover {
        background-color: <?= auth()->user()->theme == 'dark' ? 'goldenrod' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-goldenrod, light-black, green-#214b3a */
        color: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'white' : 'white') ?>;
        /* dark-black, light-black, green-white */
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    span,
    label,
    table {
        color: <?= auth()->user()->theme == 'dark' ? 'gold' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-gold, light-black, green-#214b3a */
    }

    .payop:hover,
    .payop.active {
        background-color: <?= auth()->user()->theme == 'dark' ? 'goldenrod' : (auth()->user()->theme == 'light' ? 'black' : '#214b3a') ?>;
        /* dark-goldenrod, light-black, green-#214b3a */
    }

    .payop:hover span,
    .payop:hover i,
    .payop.active span,
    .payop.active i {
        color: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'white' : 'white') ?>;
        /* dark-black, light-black, green-white */
    }

    .modal-header, .modal-body{
        background-color: <?= auth()->user()->theme == 'dark' ? 'black' : (auth()->user()->theme == 'light' ? 'white' : '#efeade') ?>;
    }

    <?php } else { ?>

    body {
        background: url("<?= public_url('images/background/back0001.png') ?>") no-repeat center fixed;
        background-size: 100%;
        background-color: black;
    }

    .login-container a {
        color: gold;
        text-decoration: none;
        font-weight: 500;
    }

    button.btn-primary,
    button.btn-primary:hover,
    a.btn-primary,
    a.btn-primary:hover {
        background-color: gold;
        color: black;
    }

    .dropdown-menu {
        right: 0;
        background: black;
        border-radius: 10px;
        backdrop-filter: blur(5px);
        color: gold;
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
        z-index: 100;
    }

    .dropdown-menu[data-bs-popper] {
        left: unset;
    }

    .dropdown-item {
        color: gold;
        border: 1px solid black;
    }

    .dropdown-item:hover {
        background-color: goldenrod;
        color: black;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    span,
    label,
    table {
        color: gold;
    }

    .payop:hover,
    .payop.active {
        background-color: goldenrod;
    }

    .payop:hover span,
    .payop:hover i,
    .payop.active span,
    .payop.active i {
        color: black;
    }

    <?php } ?>

    .video-controls {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 8px 12px;
        z-index: 10;
        cursor: pointer;
    }

    .login-container {
        margin-top: 25vh;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.1);
        padding: 30px;
        border-radius: 10px;
        backdrop-filter: blur(5px);
    }

    .input-group-text {
        background-color: white;
    }

    .form-control {
        border-left: none;
        border-right: none;
    }

    .bi {
        cursor: pointer;
    }

    header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1100;
    }

    main {
        padding-top: 70px;
        padding-bottom: 100px;
    }

    .navbar {
        background: rgba(255, 255, 255, 0.1);
        padding: 10px;
        border-radius: 10px;
        backdrop-filter: blur(20px);
        position: relative;
        z-index: 1100;
    }

    @media only screen and (max-width: 600px) {
        .bussiness-name {
            display: none;
        }
    }

    .infowindow {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(20px);
        margin-top: 10px;
    }

    .canvasjs-chart-credit {
        display: none;
    }

    footer {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(20px);
        margin-top: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 1100;
    }

    a {
        text-decoration: none;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
    }

    .prev-btn {
        left: 10px;
    }

    .next-btn {
        right: 10px;
    }

    .video-controls:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .toast {
        position: absolute;
        z-index: 9999999999;
    }

    tbody {
        font-size: small;
    }

    .QRcontainer {
        width: fit-content;
    }

    .text-warning{
        color: red;
    }
</style>
