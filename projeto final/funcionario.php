<?php
    require_once('./modelo/funcionario.php');
    $objFuncionario = new Funcionario();
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
    <title>Funcionario</title>
</head>
<body>
<?php 
  include('navegacao.php');
?>
<div class="container">
  <h2>Lista dos Funcionarios</h2>  
  <p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Cpf</th>
        <th>Editar</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $query = "select * from funcionario";
        $stmt = $objFuncionario->runQuery($query);
        $stmt->execute();
        while($objFuncionario = $stmt->fetch(PDO::FETCH_ASSOC)){        
      ?>
            <tr>
            <td><?php echo($objFuncionario['ID']); ?></td>  
              <td><?php echo($objFuncionario['NOME']); ?></td>
              <td><?php echo($objFuncionario['IDADE']); ?></td>
              <td><?php echo($objFuncionario['CPF']); ?></td>
              <td>
                  <button type="button" class="btn btn-warning" 
                  data-toggle="modal" data-target="#myModalEditar"
                  data-id="<?php echo($objFuncionario['ID']); ?>"
                  data-nome="<?php echo($objFuncionario['NOME']); ?>"
                  data-idade="<?php echo($objFuncionario['IDADE']); ?>"
                  data-cpf="<?php echo($objFuncionario['CPF']); ?>">
                  Editar
                </button>
              </td>
              <td>
                  <button type="button" class="btn btn-danger" 
                  data-toggle="modal" data-target="#myModalDeletar"
                  data-id="<?php echo($objFuncionario['ID']);?>"
                  data-nome="<?php echo($objFuncionario['NOME']);?>">
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
          <h4 class="modal-title">Novo Funcionario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="./controle/ctr_funcionario.php" method="post"> 
            <input type="hidden" name="insert">
            <div class="form-group">
              <label for="nome">Nome</label>
               <input type="text" class="form-control" id="nome" placeholder="Coloque o seu Nome" name="txtnome">
            </div>
            <div class="form-group">
              <label for="idade">Idade</label>
              <input type="number" class="form-control" id="idade" placeholder="Coloque sua Idade" name="txtidade">
            </div>
            <div class="form-group">
              <label for="CPF">Cpf</label>
               <input type="number" class="form-control" id="CPF" placeholder="Coloque o seu CPF" name="txtcpf">
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
          <h4 class="modal-title">Deletar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">          
          <form action="./controle/ctr_funcionario.php" method="post"> 
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
          <h4 class="modal-title">Editar Funcionario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">          
          <form action="./controle/ctr_funcionario.php" method="post"> 
            <input type="hidden" name="editar">
            <input type="hidden" name="txtid" id="recipient-id">
            <div class="form-group">
              <label for="nome">Nome</label>
               <input type="text" class="form-control" 
               placeholder="Coloque o seu Nome" 
               id="recipient-nome" name="txtnome">
            </div>
            <div class="form-group">
              <label for="nome">Idade</label>
               <input type="text" class="form-control" 
               placeholder="Coloque a sua idade" 
               id="recipient-idade" name="txtidade">
            </div>
            <div class="form-group">
              <label for="nome">Cpf</label>
               <input type="text" class="form-control" 
               placeholder="Coloque o seu CPF" 
               id="recipient-cpf" name="txtcpf">
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
      var recipientIdade = button.data('idade');
      var recipientCpf = button.data('cpf');
      var recipientId = button.data('id');
      var modal = $(this);
     
      modal.find('#recipient-nome').val(recipientNome);
      modal.find('#recipient-idade').val(recipientIdade);
      modal.find('#recipient-cpf').val(recipientCpf);
      modal.find('#recipient-id').val(recipientId);
    });
  </script>

</body>
</html>