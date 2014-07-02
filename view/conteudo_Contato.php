<?php
if (array_key_exists('nome',$_POST))
{ ?>
	<p>Dados enviados com sucesso, abaixo seguem os dados que você enviou</p>
	<p>
	  <b>Nome:</b> <?php echo $_POST['nome']; ?><br>
	  <b>E-mail:</b> <?php echo $_POST['email']; ?><br>
	  <b>Assunto:</b> <?php echo $_POST['assunto']; ?><br>
	  <b>Mensagem:</b> <?php echo $_POST['mensagem']; ?><br>
	</p>

<?php }
else
{ ?>
<form class="form-horizontal" method="POST">
<fieldset>

<div class="control-group">
  <label class="control-label" for="nome">Nome</label>
  <div class="controls">
    <input id="nome" name="nome" type="text" placeholder="Preencha com o seu nome" class="input-xlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="email">E-mail</label>
  <div class="controls">
    <input id="email" name="email" type="email" placeholder="Preencha com o seu e-mail" class="input-xlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="nome">Assunto</label>
  <div class="controls">
    <input id="assunto" name="assunto" type="text" placeholder="Sobre o que se trata?" class="input-xxlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="mensagem">Mensagem</label>
  <div class="controls">                     
    <textarea id="mensagem" name="mensagem"></textarea>
  </div>
</div>
<button type="submit" class="btn btn-default">Enviar</button>

</fieldset>
</form>
<?php } ?>
