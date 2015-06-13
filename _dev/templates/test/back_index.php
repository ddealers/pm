

<html>
    <head>
        <!--link rel="stylesheet" type="text/css"-->
        <link rel="stylesheet" type="text/css" href="css/generals.css" />
        <script type="text/javascript" src="js/lib/jquery-2.1.4.min.js" ></script>
        <meta charset="UTF-8">
    </head>
    <body id="PMCanal5">
        <header id="principalHeader">
            <section>user nav</section>
            <nav>
                nav menu
                <section> search </section>
            </nav>
        </header>
        <section id="pmDesplegable">
            <div>banner</div>
        </section>
        <section>
            <div>blogueros</div>
        </section>
        <section id="master">
            <div id="container">
                <section id="content">
                    <!-- articulo principal -->
                    <?php include('../templates/boxes/pm/box.php'); ?>
                    <?php include('../templates/boxes/pm/box.php'); ?>
                    <?php include('../templates/boxes/pm/box.php'); ?>

                    <section id="playlist">
                        <article>articulo1</article>
                        <article>articulo1</article>
                        <article>articulo1</article>
                        <article>articulo1</article>
                    </section>
                </section>
                <aside>
                    <article id="btn1">
                        Bloguero Box big
                    </article>
                    <article id="btn2">
                        pieza del sidebar
                    </article>
                    <article id="btn3">
                        pieza del sidebar
                    </article>
                </aside>
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
    </body>

    </html>
<script>
    /*
    if (typeof $== 'function'){
        alert('weeee');
    }else{
        alert('on tas jquery!');
    }
    */
    $( document ).ready(function() {
        $('.box').addClass('generica-small');




        $('#btn1').css('background','red');
        $('#btn1').css('cursor','pointer');
        $('#btn2').css('background','peru');
        $('#btn2').css('cursor','pointer');
        $('#btn3').css('background','powderblue');
        $('#btn3').css('cursor','pointer');


       $('#btn1').click(function(){
           var classes = $(".box").attr("class").split(" ");
           var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('Bloguero');

       });
        $('#btn2').click(function(){
            var classes = $(".box").attr("class").split(" ");
            var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('generica-small');

        });
        $('#btn3').click(function(){
            var classes = $(".box").attr("class").split(" ");
            var className = classes[1];
            $('.box').removeClass(className);
            $('.box').addClass('beat-small');

        });

    });



</script>