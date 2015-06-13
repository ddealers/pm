<?php
	header("HTTP/1.0 404 Not Found");
?>
<html>
<head>
   <meta charset="utf-8"/>
   <title>Error 404</title>
</head>
<body>
   <section id="error-1" style="display:none;">
      <div class="img-bkg-1"></div>
      <article class="random01">
      <div class="txt-1">
         No encontramos lo que
         estás buscando.
      </div>
      <div class="btn-1"><a href="http://www.pmcanal5.com/">¡Regresa a PMCanal5!</a></div>
      <div class="logo-pm"></div>
      </article>
   </section>

   <section id="error-2" style="display:none;">
      <div class="img-bkg-2"></div>
      <article class="random02">
      <div class="txt-1">
         ¡Pásele, pásele, pásele
         pero a otra página!
      </div>
      <div class="msj-1">
         <div class="logo-pm-left"></div>
         No encontramos lo que
         estás buscando.
      </div>
      <div class="btn-1"><a href="http://www.pmcanal5.com/">¡Regresa a PMCanal5!</a></div>
      </article>
   </section>

   <section id="error-3" style="display:none;">
      <div class="img-bkg-3"></div>
      <article class="random03">
      <div class="txt-1" style="font-size: 65px;">
         ¿QUÉ HACE? YA SE PERDIÓ...
         ¿O QUÉ HACE?
      </div>
      <div class="msj-1">
         <div class="logo-pm-left"></div>
         No encontramos lo que
         estás buscando.
      </div>
      <center><div class="btn-1"><a href="http://www.pmcanal5.com/">¡Regresa a PMCanal5!</a></div></center>
      </article>
   </section>

   <section id="error-4" style="display:none;">
      <div class="img-bkg-4"></div>
      <article class="random04">
      <div class="txt-2"><span>¡UPS!</span></div>
      <div class="txt-1">
         Te equivocaste, no encontramos <br />lo
         que <br />buscabas.
      </div>
      <div class="msj-1">
         <div class="logo-pm-left"></div>
      </div>
      <div class="btn-1" style="padding-top:13px;"><a href="http://www.pmcanal5.com/">¡Regresa a PMCanal5!</a></div>
      </article>
   </section>
</body>
<style type="text/css">
@font-face{font-family:'SimpleBold';src:url('http://www.pmcanal5.com/fonts/simplebold/simple-bold.eot') format('embedded-opentype'),url('http://www.pmcanal5.com/fonts/simplebold/simple-bold.woff') format('woff'),url('http://www.pmcanal5.com/fonts/simplebold/simple-bold.ttf') format('truetype'),url('http://www.pmcanal5.com/fonts/simplebold/simple-bold.svg#SimpleBoldRegular') format('svg');font-weight:normal;font-style:normal}

body{margin: 0; padding: 0;}
a{text-decoration: none;}

   section{
      font-family: 'SimpleBold', Arial;
      width: 100%;
      height: 100%;
      text-align: center;
      color: #000;
      overflow: hidden;
      position: relative;
   }
   .txt-2{
      font-size: 120px;
      padding: 15px;
   }
   .txt-2 span{
      background-color: #0f0;
   }
   .txt-1{
      font-size: 50px;
      padding: 15px;
   }
   .msj-1{
      width: 350px;
      height: auto;
      font-size: 26px;
      padding: 5px 10px;
      margin: 15px auto;
      text-align: left;
   }
   .logo-pm{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/main/pm-blk.png') no-repeat;
      width: 65px;
      height: 65px;
      margin: 20px auto;
   }
   .logo-pm-left{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/main/pm-blk.png') no-repeat;
      width: 65px;
      height: 65px;
      float: left;
      margin-right: 10px;
   }
   .btn-1 a{
      background-color: #0f0;
      color: #000;
      width: 250px;
      padding: 5px 10px;
      margin: 20px auto;
      font-size: 22px;
      cursor: pointer;
   }
   .btn-1 a:hover{
      background-color: #000;
      color: #fff;
   }
/*SINGLES*/
   /*.img-bkg-1{
      background-color: blue;
      width: 30%;
      height: 55%;
      left: 35%;
      position: absolute;
      top: 0;
   }*/
   .img-bkg-1{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/40x/4001.png') no-repeat;
      width: 25%;
      height: 55%;
      background-size: 100%;
      position: absolute;
      top: 0;
      left: 35%;
      overflow: hidden;
   }
   .random01{
      width: 60%;
      left: 20%;
      position: absolute;
      bottom: 15%;
   }

   .img-bkg-2{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/40x/4002.png') no-repeat bottom;
      width: 50%;
      height: 55%;
      background-size: 100%;
      position: absolute;
      bottom: 0;
      left: 25%;
      overflow: hidden;
   }
   .random02{
      width: 50%;
      left: 25%;
      position: absolute;
      top: 10%;
   }

   .img-bkg-3{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/40x/4003.png') no-repeat bottom;
      width: 30%;
      height: 100%;
      background-size: 100%;
      position: absolute;
      bottom: 0;
      left: 5%;
      overflow: hidden;
   }
   .random03{
      text-align: left;
      width: 40%;
      position: absolute;
      left: 35%;
      bottom: 15%;
   }

   .img-bkg-4{
      background: url('http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/images/40x/4004.png') no-repeat bottom;
      width: 50%;
      height: 100%;
      background-size: 100%;
      position: absolute;
      bottom: 0;
      right: 5%;
      overflow: hidden;
   }
   .random04{
      text-align: left;
      width: 45%;
      position: absolute;
      left: 5%;
      top: 10%;
   }
</style>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var number = Math.floor((Math.random() * 4) + 1);
   var divShow = '#error-'+number;
   $(divShow).show();
});
</script>
</html>