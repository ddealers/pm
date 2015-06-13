<?php include("header.php"); ?>
<p class="text-center tlt-ad"> publicidad </p>
<section class="advertising-body center-block"></section>
<?php include("html/tubers.html");?>
<div class="main-container center-block">
    <section class="center-block home-cont">
        <!-- Container content-->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <!-- Top videos-->
            <?php include("html/topvideo.html"); ?>
            <!-- Principal player-->
            <?php include ("html/video.html"); ?>
            <!-- Promos-->
            <?php include("html/promos.html"); ?>
            <!-- Newest-->
            <!-- Advertising body-->
            <p class="text-center tlt-ad"> publicidad </p>
            <div class="advertising-body center-block"></div>
            <?php include("html/newest.html"); ?>
        </div>
        <!---ASIDE -->
        <?php include("html/aside.html"); ?>
        <div class="clearfix"></div>
    </section><!-- Home ends-->
</div>
<?php include("html/break.html"); ?>
<?php include("html/maspm.html"); ?>
<?php include_once("footer.php"); ?>
