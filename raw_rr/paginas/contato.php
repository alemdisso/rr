<?php 
require "../includes/doctype.html.php";
?>
<head>
<?php
require "../includes/meta.html.php";
require "../includes/css.html.php";
?>

<title>Contato | Ruth Rocha</title>

</head>

<body>

<!-- topo -->
<?php include ("../includes/topo.php") ?>
<!-- /topo -->

<!-- container -->
<div id="container" class="clearfix contato">

<!-- breadcrumb -->
<div id="breadcrumb_contato">
<a href="/home" title="Home">Home</a> &rsaquo; Contato
</div>
<!-- /breadcrumb -->

<!-- conteudo -->
<div id="conteudo">

<h1>Contato</h1>

<p>Preencha o formul&aacute;rio abaixo para entrar em contato</p>

<p><small>* campos obrigat&oacute;rios</small></p>

<label>Nome Completo*</label>
<input type="text" />

<label>E-mail*</label>
<input type="text" />

<label>Estado</label>
<select>
<option selected="selected">Selecione</option>
</select>

<label>Cidade</label>
<select>
<option selected="selected">Selecione</option>
</select>

<label>Assunto</label>
<select>
<option selected="selected">Selecione</option>
</select>

<label>Mensagem*</label>
<textarea rows="8"></textarea>

<label>Verfica&ccedil;&atilde;o*</label>
<p>Digite os caracteres que aparecem na imagem abaixo:</p>
<div class="clearfix" style="width:200px;margin-bottom:20px;">
<img src="/img/marcacao_captcha.png" class="float_left" alt="captcha" width="100" height="40" />
<input type="text" class="float_right pequeno" maxlength="6" />
</div>

<input type="submit" value="Enviar" />

</form>
</div>
<!-- /conteudo -->

<!-- lateral -->
<div id="lateral">
<div class="box clearfix"><?php include ("../includes/box_filtro.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_busca.php") ?></div>
</div>
<!-- /lateral -->

</div>
<!-- /container -->

<!-- rodape -->
<br /><br /><br />
<div title="" id="rodape_container" class="clearfix" style="background:url(../img/personagens/contato.png) bottom center no-repeat">
<?php include ("../includes/rodape.php") ?>
</div>
<!-- /rodape -->

</body>
</html>