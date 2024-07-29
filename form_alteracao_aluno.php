<!DOCTYPE html>
<!-- form_alteracao.html -->
<?php
include "conectabd.inc.php";
include "funcoes.inc.php";

$id = $_GET["id"];
$al = recupera_aluno($id);
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<head>
  <title>Cadastro de curso</title>
  <meta charset="utf-8">
  <style>
    body {
      margin: 0%;
    }

    .main {
      width: 100vw;
      height: 100vh;
      background-color: #201b2c;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      width: 120%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 35px 35px;
      background: #2f2841;
      border-radius: 20px;
      box-shadow: 0px 10px 40px #00000056;
    }

    h1 {
      color: #00ff88;
      font-weight: 800;
      margin: 0%;
    }

    .text {
      width: 150%;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
      margin: 10px 0px;
    }

    .text>input {
      width: 70%;
      border: none;
      border-radius: 10px;
      padding: 15px;
      background: #514869;
      color: #f0ffffde;
      font-size: 12pt;
      box-shadow: 0px 10px 40px #00000056;
      box-sizing: border-box;
    }

    .text>label {
      color: #f0ffffde;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>


  <div class="main">

    <div class="right-login">

      <div class="card">

        <form action="alteracao_aluno.php" method="GET">
          <h1>Atualizar</h1>
          <div class="text">
            <input type="hidden" name="id_aluno" value="<?php echo $al["id_aluno"]; ?>">
            <label for="id_aluno">
              Nome:
            </label>
          </div>
          <div class="text">
            <input type="text" name="ds_aluno" id="id_aluno" value="<?php echo $al["ds_aluno"]; ?>">
            <br><br>
            <label for="id_curso">
              Curso:
            </label>

            <?php
            // var_dump($al)  ;                    
            monta_select_curso2($al["id_curso"]);
            ?>
          </div>

          <input type="submit" class="btn btn-success btn-sm  " value="Aterar">
        </form>

      </div>

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>