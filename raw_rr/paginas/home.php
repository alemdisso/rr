<?php 
require "../includes/doctype.html.php";
?>
<head>
<?php
require "../includes/meta.html.php";
require "../includes/css.html.php";
?>

<title>Ruth Rocha</title>

<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>	
<script src="../js/bjqs-1.3.min.js"></script>

</head>

<body onLoad="redimensiona()">

<!-- topo -->
<?php include ("../includes/topo.php") ?>
<!-- /topo -->

<!-- container -->
<div id="container" class="clearfix">

<!-- destaque -->
<div id="destaque">

<div id="banner-fade">

<ul class="bjqs">
  <li><a href="/livros"><img src="img/banner01.jpg" title="Automatically generated caption"></a></li>	
  <li><a href="/biografia"><img src="img/banner02.jpg" title="Automatically generated caption"></a></li>
  <li><a href="/novidades"><img src="img/banner03.jpg" title="Automatically generated caption"></a></li>
</ul>

</div>

<script class="secret-source">
jQuery(document).ready(function($) {

  $('#banner-fade').bjqs({
    height      : 430,
    width       : 990,
    responsive  : true
  });

});
</script>

</div>
<!-- /destaque -->

<!-- conteudo -->
<div id="conteudo" class="clearfix" style="width:585px;">
<div class="box2 clearfix float_left box_home"><?php include ("../includes/box_destaque_livro.php") ?></div>
<div class="box clearfix float_right box_home"><?php include ("../includes/box_filtro.php") ?></div>
</div>
<!-- /conteudo -->

<!-- lateral -->
<div id="lateral">
<div class="box2 clearfix box_home"><?php include ("../includes/box_destaque_personagem.php") ?></div>
</div>
<!-- /lateral -->

</div>
<!-- /container -->

<!-- rodape -->
<br /><br /><br />
<div title="" id="rodape_container" class="clearfix" style="background:url(../img/personagens/home.png) bottom center no-repeat">
<?php include ("../includes/rodape.php") ?>
</div>
<!-- /rodape -->

</body>
</html>