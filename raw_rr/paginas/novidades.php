<?php 
require "../includes/doctype.html.php";
?>
<head>
<?php
require "../includes/meta.html.php";
require "../includes/css.html.php";
?>

<title>Novidades | Ruth Rocha</title>

</head>

<body>

<!-- topo -->
<?php include ("../includes/topo.php") ?>
<!-- /topo -->

<!-- container -->
<div id="container" class="clearfix novidades">

<!-- breadcrumb -->
<div id="breadrcumb_novidades">
<a href="/home" title="Home">Home</a> &rsaquo; Novidades
</div>
<!-- /breadcrumb -->

<!-- conteudo -->
<div id="conteudo">

<h1>Novidades</h1>

<!-- item de repeticao -->
<div class="item clearfix">
<div style="width:560px;" class="float_right"><!-- largura para quando não existir thumbnail -->
<h3><a href="">Silenciosa Algazarra sera tema de conversa com professores na PUC/RJ</a></h3>
<p>28.08.2012 | <a href="" title=""><strong>Agenda</strong></a> | <a href="" title=""><img src="/img/icone_comentario.png" align="absmiddle" /> <strong>2 coment&aacute;rios</strong></a></p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pellentesque quam ac eros gravida auctor. Nam a tristique enim. Ut tristique diam quis magna vehicula vitae consequat dui pretium. Pellentesque ligula nisl, tristique at pellentesque et, condimentum vel urna.</p>
<p><a href="" title="mais novidades" class="mais">leia mais</a></p>
</div>
</div>
<!-- /item de repeticao -->

<!-- item de repeticao -->
<div class="item clearfix">
<img src="/img/marcacao_thumbnail.png" class="float_left" />
<div style="width:360px;" class="float_right"><!-- largura para quando existir thumbnail + class na div -->
<h3><a href="" title="">Ana Maria Machado e Ruth Rocha no Salao do Livro Infantil em Belo Horizonte</a></h3>
<p>28.08.2012 | <a href="" title=""><strong>Leitura</strong></a> | <a href="" title=""><img src="/img/icone_comentario.png" align="absmiddle" /> <strong>Comente</strong></a></p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pellentesque quam ac eros gravida auctor. Nam a tristique enim. Ut tristique diam quis magna vehicula vitae consequat dui pretium. Pellentesque ligula nisl, tristique at pellentesque et, condimentum vel urna.</p>
<p><a href="" title="mais novidades" class="mais">leia mais</a></p>
</div>
</div>
<!-- /item de repeticao -->

<!-- paginacao -->
<div id="paginacao" class="clearfix">
<span class="float_left">Posts <strong>1 de 10</strong> de 33</span>
<span class="float_right">in&iacute;cio | &lsaquo; anterior | <a href="" title=""><strong>pr&oacute;ximo</strong> &rsaquo;</a> | <a href="" title=""><strong>fim</strong></a></span>
</div>
<!-- /paginacao -->

</div>
<!-- /conteudo -->

<!-- lateral -->
<div id="lateral">
<div class="box clearfix"><?php include ("../includes/box_novidades_categorias.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_novidades_mes.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_busca.php") ?></div>
</div>
<!-- /lateral -->

</div>
<!-- /container -->

<!-- rodape -->
<br /><br /><br />
<div title="" id="rodape_container" class="clearfix" style="background:url(../img/personagens/novidades.png) bottom center no-repeat">
<?php include ("../includes/rodape.php") ?>
</div>
<!-- /rodape -->

</body>
</html>