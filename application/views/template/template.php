<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />
    <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
    <style>
	/* General CSS Setup */

    /* CSS talk bubble */
    .talk-bubble-user {
        margin: 5px;
        display: inline-block;
        position: relative;
        width: 500px;
        height: auto;
        background-color: #262d31;
        margin-left:20px;
    }

    .talk-bubble-admin {
        margin: 5px;
        display: inline-block;
        position: relative;
        width: 500px;
        height: auto;
        background-color: #128C7E;
        margin-right:25px;
    }
    .border{
        border: 8px solid #128C7E;
    }

    /* Right triangle placed top left flush. */
    .tri-right.border.left-top:before {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -40px;
        right: auto;
        top: -8px;
        bottom: auto;
        border: 32px solid;
        border-color: #262d31 transparent transparent transparent;
    }

    .tri-right.left-top:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -20px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 22px solid;
        border-color: #262d31 transparent transparent transparent;
    }

    /* Right triangle, right side slightly down*/
    .tri-right.border.right-in:before {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -40px;
        top: -8px;
        bottom: auto;
        border: 20px solid;
        border-color: #128C7E transparent transparent #666;
    }
    .tri-right.right-in:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -20px;
        top: 0px;
        bottom: auto;
        border: 12px solid;
        border-color: #128C7E transparent transparent #128C7E;
    }

    /* Right triangle placed top right flush. */
    .tri-right.border.right-top:before {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -40px;
        top: -8px;
        bottom: auto;
        border: 32px solid;
        border-color: #128C7E transparent transparent transparent;
    }

    .tri-right.right-top:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -20px;
        top: 0px;
        bottom: auto;
        border: 20px solid;
        border-color: #128C7E transparent transparent transparent;
    }

    /* talk bubble contents */
    .talktext{
        padding: 1em;
        text-align: left;
        line-height: 1.5em;
        color: #ffffff;
    }
    .talktext p{
    /* remove webkit p margins */
        -webkit-margin-before: 0em;
        -webkit-margin-after: 0em;
    }
    .talktext span{
        text-align: left;
        color: #ffffff;
        font-size: 12px;
    }

    .scrollbar
    {
        /* margin-left: 30px; */
        float: left;
        height: 500px;
        width: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
        margin-bottom: 25px;
    }

    .force-overflow
    {
        min-height: auto;
    }

    #wrapper
    {
        text-align: center;
        width: 100%;
        margin: auto;
    }

    #style-3::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    #style-3::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    #style-3::-webkit-scrollbar-thumb
    {
        background-color: #000000;
    }

    .fas .fa-check{
        color: #ffffff;
    }

	</style>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <?php echo include "header.php" ?>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php echo include "menu.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php echo $contents; ?>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view("template/footer.php") ?>
            </footer>
        </div>
    </div>

    <?php $this->load->view("template/script.php") ?>
</body>

</html>