<!DOCTYPE html>
<!-- alteracao.php -->
<html>

<head>
  <title>Cadastro de curso - Alteração</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #201b2c;
    }
  </style>
</head>

<body>
  <?php
  // efetua alteração do curso informado em form_alteracao_curso.php
  $id_curso = $_GET["id_curso"];
  $ds_curso = $_GET["ds_curso"];
  $nr_carga_horaria = $_GET["nr_carga_horaria"];
  $dt_inicio = $_GET["dt_inicio"];

  include_once "conectabd.inc.php";


  $query = "UPDATE tb_curso
            SET ds_curso = '$ds_curso'
              , id_curso = $id_curso
    WHERE id_curso = $id_curso;";
  // echo $query.'<br>';
  if ($result = mysqli_query($link, $query)) {
    echo "<div style='color: white'>" . "Alteração efetuada com sucesso" . "<div/>";
  } else {
    echo mysqli_error($link);
  }

  // fecha a conexão
  mysqli_close($link);
  ?>
  <br><br><br><br><br><br><br><br>

  <a class="btn btn-outline-primary d-grid gap-2 col-6 mx-auto" href="consulta_curso.php  ">Ver cursos cadastrados</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>