<html ng-app="PM5">
<head>
    <link rel="stylesheet" type="text/css" href="css/generals.css"/>
    <meta charset="UTF-8">
</head>
<body id="PMCanal5" ng-controller="mainController">
    <code>{{templates.namel}}</code>
    <hr/>
    <div class="slide-animate-container">
        <div class="slide-animate" ng-include="templates.url"></div>
    </div>
</div>
<header id="principalHeader">

    <section id="user-nav">
        <?php include_once('../templates/test/navPMuser.php'); ?>
    </section>
    <nav>
        <section>
            <?php include_once('../templates/test/navPM.html'); ?>
        </section>
    </nav>
</header>
<section id="pmDesplegable">
    <div>banner</div>
</section>
<section>
    <div></div>
</section>
<section id="master">
    <div id="container">
        <section id="content">
            <!-- articulo principal -->
            <div class="header-container-content"></div>
            <div class="body-container-content">
                <div class="date-container-content">
                    <span class="date">29</span><br>
                    <span class="month">May</span><br>
                    <span class="year">2015</span>
                </div>
                <div class="row2">
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                </div>
                <div class="row3">
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                </div>
                <?php include_once('../templates/test/aside.html'); ?>
            </div>

            <div class="body-container-content">
                <div class="date-container-content"><span class="date">27</span><br><span
                        class="month">May</span><br><span class="year">2015</span></div>
                <div class="row3">
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                </div>
                <div class="row2">
                    <?php include('../templates/boxes/box.php'); ?>
                    <?php include('../templates/boxes/box.php'); ?>
                </div>
            </div>
            <!--<section id="playlist">
                <article>articulo1</article>
                <article>articulo1</article>
                <article>articulo1</article>
                <article>articulo1</article>
            </section>-->
        </section>
    </div>
</section>
<section class="el-break">elbreak</section>
<footer id="footer">
    <section class="horarios">horarios</section>
    <section>
        <nav>aqui nav....</nav>
    </section>
    <section class="last-footer">footer x</section>
</footer>
<script>
    /*
     if (typeof $== 'function'){
     alert('weeee');
     }else{
     alert('on tas jquery!');
     }
     */
    $(document).ready(function () {

        $('.row2 .box').addClass('GMS-Big');
        $('.row3 .box').addClass('GMS-Small');
        $('.row2 .box .box-icon').addClass('n-icon-22-box-video');
        $('.row3 .box .box-icon').addClass('n-icon-22-box-video');
        $('.box .h1-box-footer').text('Neque porro quisquam est qui dolorem ipsum quia dolor');
        $('.box .h2-1-box-footer').text('Neque porro quisquam est qui dolorem ipsum quia dolor');
        $('.box .h2-2-box-footer').text('Neque porro quisquam est qui dolorem ipsum quia dolor');

        $('.box .h1-box-header').text('Neque porro quisquam est qui dolorem ipsum quia dolor');
        $('.box .h2-1-box-header').text('Neque porro quisquam est qui dolorem ipsum quia dolor');
        $('.box .h2-2-box-header').text('Neque porro quisquam est qui dolorem ipsum quia dolor');
        $('.box .views-box P').text('100');
        $('.box .comments-box P').text('100');
        $('.box .likes-box P').text('100');


        $('#btn1').css('background', 'red');
        $('#btn1').css('cursor', 'pointer');
        $('#btn2').css('background', 'peru');
        $('#btn2').css('cursor', 'pointer');
        $('#btn3').css('background', 'powderblue');
        $('#btn3').css('cursor', 'pointer');


        $('#btn1').click(function () {
            var classes = $(".box").attr("class").split(" ");
            var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('Bloguero');
            $('.box .h1-box-header').text('violencia y videogames: conbinación ganadora');
            $('.box .h1-box-footer').text('violencia y videogames: conbinación ganadora');
            $('.box .h2-1-box-header').text('elfuckinguero | bloguero');
            $('.box .h2-1-box-footer').text('elfuckinguero | bloguero');
            $('.box .h2-2-box-header').text('Abril 08, 2015');
            $('.box .h2-2-box-footer').text('Abril 08, 2015');
        });
        $('#btn2').click(function () {
            var classes = $(".box").attr("class").split(" ");
            var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('generica-small');
            $('.box .h1-box-header').text('--');
            $('.box .h1-box-footer').text('--');
            $('.box .h2-1-box-header').text('--');
            $('.box .h2-1-box-footer').text('--');
            $('.box .h2-2-box-header').text('--');
            $('.box .h2-2-box-footer').text('--');
        });
        $('#btn3').click(function () {
            var classes = $(".box").attr("class").split(" ");
            var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('GMS-small');
            $('.box .h1-box-header').text('violencia y videogames: conbinación ganadora');
            $('.box .h1-box-footer').text('violencia y videogames: conbinación ganadora');
            $('.box .h2-1-box-header').text('elfuckinguero | bloguero');
            $('.box .h2-1-box-footer').text('elfuckinguero | bloguero');
            $('.box .h2-2-box-header').text('Abril 08, 2015');
            $('.box .h2-2-box-footer').text('Abril 08, 2015');
        });
    });
</script>
<?php include_once('../templates/test/modalesGeneral.html');?>
</body>
</html>
