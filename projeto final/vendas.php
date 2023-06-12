<?php
    require_once('./modelo/vendas.php');
    $objVendas = new vendas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Vendas</title>
</head>
<body>
<?php 
  include('navegacao.php');
?>
<div class="container">
  <h2>Venda</h2>  
  <p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Cliente.</th>
        <th>ID Funcionario</th>
        <th>ID Produto</th>
        <th>Nome Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $query = "select * from vendas";
        $stmt = $objVendas->runQuery($query);
        $stmt->execute();
        while($objVendas = $stmt->fetch(PDO::FETCH_ASSOC)){        
      ?>
            <tr>
              <td><?php echo($objVendas['ID']); ?></td>  
              <td><?php echo($objVendas['ID_CLIENTE']); ?></td>
              <td><?php echo($objVendas['ID_FUNCIONARIO']); ?></td>
              <td><?php echo($objVendas['ID_PRODUTO']); ?></td>
              <td><?php echo($objVendas['QUANTIDADE']); ?></td>
              <td><?php echo($objVendas['VALOR']); ?></td>
              <td>
                  <button type="button" class="btn btn-warning" 
                  data-toggle="modal" data-target="#myModalEditar"
                  data-id="<?php echo($objVendas['ID']); ?>"
                  data-id_cliente="<?php echo($objVendas['ID_CLIENTE']); ?>"
                  data-id_funcionario="<?php echo($objVendas['ID_FUNCIONARIO']); ?>"
                  data-id_produto="<?php echo($objVendas['ID_PRODUTO']); ?>"
                  data-quantidade="<?php echo($objVendas['QUANTIDADE']); ?>"
                  data-valor="<?php echo($objVendas['VALOR']); ?>">
                  Editar
                </button>
              </td>
              <td>
                  <button type="button" class="btn btn-danger" 
                  data-toggle="modal" data-target="#myModalDeletar"
                  data-id="<?php echo($objVendas['ID']);?>"
                  data-nome="<?php echo($objVendas['NOME']);?>">
                  Deletar
                </button>
              </td>
            </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>

<!-- The Modal -->
<div class="modal" id="myModalCadastrar">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nova Compra</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="./controle/ctr_vendas.php" method="post"> 
            <input type="hidden" name="insert">
            <div class="form-group">
              <label for="nome">Coloque o seu ID</label>
               <input type="number" class="form-control" id="nome" placeholder="Coloque o seu ID" name="txtid_cliente">
            </div>
            <div class="form-group">
              <label for="nome">Coloque o ID do Funcionario</label>
               <input type="number" class="form-control" id="nome" placeholder="Coloque o ID do Funcionario" name="txtid_funcionario">
            </div>
            <div class="form-group">
              <label for="quantidadeidade">Coloque o ID do Produto</label>
              <input type="number" class="form-control" id="produto" placeholder="Coloque a Quantidade" name="txtid_produto">
            </div>
            <div class="form-group">
              <label for="quantidadeidade">Coloque a Quantidade do Produto</label>
              <input type="number" class="form-control" id="produto" placeholder="Coloque a Quantidade" name="txtquantidade">
            </div>
            <div class="form-group">
              <label for="valor">Valor</label>
               <input type="number" class="form-control" id="valor" placeholder="Coloque o Valor" name="txtvalor">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- The Modal -->
<div class="modal" id="myModalDeletar">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cancelar Vendas</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">          
          <form action="./controle/ctr_vendas.php" method="post"> 
            <input type="hidden" name="delete">
            <input type="hidden" name="txtid" id="recipient-id">
            <div class="form-group">
              <label for="nome">Nome</label>
               <input type="text" class="form-control" 
               placeholder="Coloque o seu Nome" 
               id="recipient-nome" name="txtnome">
            </div>
            <button type="submit" class="btn btn-danger">Deletar</button>
         </form>
        
      </div>
    </div>
  </div>
</div>

    <!-- The Modal -->
<div class="modal" id="myModalEditar">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Produto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">          
          <form action="./controle/ctr_vendas.php" method="post"> 
            <input type="hidden" name="editar">
            <input type="hidden" name="txtid" id="recipient-id">
            <div class="form-group">
              <label for="nome">Nome</label>
               <input type="text" class="form-control" 
               placeholder="Coloque o Nome do seu Produto" 
               id="recipient-nome" name="txtnome">
            </div>
            <div class="form-group">
              <label for="nome">Quantidade</label>
               <input type="number" class="form-control" 
               placeholder="Coloque a Quantidade" 
               id="recipient-quantidade" name="txtquantidade">
            </div>
            <div class="form-group">
              <label for="nome">Valor</label>
               <input type="number" class="form-control" 
               placeholder="Coloque o Valor" 
               id="recipient-valor" name="txtvalor">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Editar</button>
            </div>
          </form>        
      </div>
    </div>
  </div>
</div>

  <script>
    $('#myModalDeletar').on('show.bs.modal', function(event){      
      var button = $(event.relatedTarget);
      var recipientId = button.data('id');
      var recipientNome = button.data('nome');

      var modal = $(this);
      modal.find('#recipient-id').val(recipientId);
      modal.find('#recipient-nome').val(recipientNome);
    });
  </script>

<script>
    $('#myModalEditar').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      
      var recipientNome = button.data('nome');
      var recipientQuantidade = button.data('quantidade');
      var recipientValor = button.data('valor');
      var recipientId = button.data('id');
      var modal = $(this);
     
      modal.find('#recipient-nome').val(recipientNome);
      modal.find('#recipient-quantidade').val(recipientQuantidade);
      modal.find('#recipient-valor').val(recipientValor);
      modal.find('#recipient-id').val(recipientId);
    });
  </script>

</body>
</html>