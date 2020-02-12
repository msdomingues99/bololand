<?php
include_once('mensagens.php');
if (!empty($_POST)) {
    $nome = trim($_POST["nome"]);
    $desc = trim($_POST["desc"]);
    $quant = trim($_POST["quant"]);
    $valor = trim($_POST["valor"]);
    $ativo = trim($_POST["ativo"]);
    
    
    $sql = "insert into produtos (nome, descricao, quantidade, valor, ativo) values ('$nome' , '$desc', $quant, $valor, $ativo)";

    
    
    //Conecta o banco de dados
    $conn = mysqli_connect(LOCAL, USER, PASS, BASE);
    mysqli_set_charset($conn, "utf8");

   
    //Cadastro do Usuario
    $salvo = mysqli_query($conn, htmlspecialchars($sql)) or die(mysqli_error($conn));
    if ($salvo){
        //echo "<div class='alert alert-success'> Salvo </div>";
        aviso("Salvo");
    } else {
        //echo "<div class='alert alert-danger'> Erro ao salvar! </div>";
        erro("Erro ao Salvar");
    }

    mysqli_close($conn);
}

?>

<section class="container bg-branco">
    <h3 class="center">Dados do usuário</h3>
    <form method="post" action="admin.php?pag=prod">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" class="form-control" name="desc" required>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input type="number" class="form-control" name="quant">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input type="number" class="form-control" name="valor">
        </div>
        <div class="form-group">
            <label>Ativo</label>
            <input type="text" class="form-control" name="ativo">
        </div>

      
        <div class="form-group text-right">
            <button type="submit" class="btn bg-azul branco">Enviar</button>
            <button type="reset" class="btn btn-danger branco">Cancelar</button>
        </div>
    </form>
</section>