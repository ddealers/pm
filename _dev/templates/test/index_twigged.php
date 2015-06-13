<?php

require_once '../vendor/autoload.php';


//$loader = new Twig_Loader_Filesystem('../templates/boxes/pm');
//$twig = new Twig_Environment($loader);

/*echo $twig -> render('box.html',array(

    'header' => 'HEADER H1',
    'footer' => 'FOOTER H1'

));*/
?>
<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <link rel="stylesheet" href="style.css" />
    <title>{% block title %}{% endblock %} - My Webpage</title>
    {% endblock %}
</head>
<body>
<div id="content">{% block content %}{% endblock %}</div>
<div id="footer">
    {% block footer %}
    &copy; Copyright 2011 by <a href="http://domain.invalid/">you</a>.
    {% endblock %}
</div>
</body>
</html>