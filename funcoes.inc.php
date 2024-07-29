<?php

 // var_dump($link);
 //   echo 'aqui funcoes.inc.php <br>';

function monta_select_curso(){

  global $link;
  
  // lista cursos já cadastrados
  $query = "SELECT id_curso, ds_curso FROM tb_curso;";
  if ($result = mysqli_query($link, $query)) {
	  echo "<select name=\"id_curso\">";
	  // busca os dados lidos do banco de dados
	  while ($row = mysqli_fetch_assoc($result)) {
		  $id = $row["id_curso"];
		  $curso = $row["ds_curso"];
                   // <option value="1">Anal. Des. Sist</option> 
		  echo "<option value=\"$id\">";
		  echo  $curso . '</option>';
          }
          echo "</select>";
          
	  // libera a área de memória onde está o resultado
	  mysqli_free_result($result);
  }

  }

  function monta_select_curso2($id_curso){
  global $link;

  // lista cursos já cadastrados
  $query = "SELECT id_curso, ds_curso FROM tb_curso;";
  if ($result = mysqli_query($link, $query)) {
	  echo "<select name=\"id_curso\">";
	  // busca os dados lidos do banco de dados
	  while ($row = mysqli_fetch_assoc($result)) {
		  $id = $row["id_curso"];
		  $curso = $row["ds_curso"];
                   // <option value="1">Anal. Des. Sist</option> 
                  echo $id_curso." == ".$id." <br>";
                  if ($id_curso == $id) {
                      $selected = 'selected';
                  } else {
                      $selected = '';
                  }
		  echo "<option value=\"$id\" $selected>";
		  echo  $curso . '</option>';
          }
          echo "</select>";
          
	  // libera a área de memória onde está o resultado
	  mysqli_free_result($result);
  }

  }

  function monta_select_curso3($ds_curso){
    global $link;
  
    // lista cursos já cadastrados
    $query = "SELECT id_curso, ds_curso FROM tb_curso;";
    if ($result = mysqli_query($link, $query)) {
        echo "<select name=\"id_curso\">";
        // busca os dados lidos do banco de dados
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id_curso"];
            $curso = $row["ds_curso"];
                     // <option value="1">Anal. Des. Sist</option> 
                    echo $id_curso." == ".$id." <br>";
                    if ($id_curso == $id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
            echo "<option value=\"$id\" $selected>";
            echo  $curso . '</option>';
            }
            echo "</select>";
            
        // libera a área de memória onde está o resultado
        mysqli_free_result($result);
    }
  
    }
  
  
  function recupera_aluno($id){


  global $link;
  // lista cursos já cadastrados
  $query = "SELECT id_aluno, ds_aluno, id_curso FROM tb_aluno WHERE id_aluno = $id;";
  if ($result = mysqli_query($link, $query)) {
	 	  // busca os dados lidos do banco de dados
	  while ($row = mysqli_fetch_assoc($result)) {
                return $row;
          }
         
        
	  // libera a área de memória onde está o resultado
	  mysqli_free_result($result);
  }

  }

  function recupera_curso($id){
    global $link;
    
    // Evite SQL injection usando prepared statements
    $query = "SELECT id_curso, ds_curso, nr_carga_horaria, dt_inicio FROM tb_curso WHERE id_curso = ?";
    
    // Prepara a consulta
    if ($stmt = mysqli_prepare($link, $query)) {
        // Vincula os parâmetros
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Executa a consulta
        mysqli_stmt_execute($stmt);
        
        // Liga as variáveis de resultado
        mysqli_stmt_bind_result($stmt, $id_curso, $ds_curso, $nr_carga_horaria, $dt_inicio);
        
        // Obtém o resultado
        mysqli_stmt_fetch($stmt);
        
        // Cria um array associativo com os dados do curso
        $curso = [
            "id_curso" => $id_curso,
            "ds_curso" => $ds_curso,
            "nr_carga_horaria" => $nr_carga_horaria,
            "dt_inicio" => $dt_inicio
        ];
        
        // Fecha o statement
        mysqli_stmt_close($stmt);
        
        return $curso;
    } else {
        // Em caso de erro na preparação da consulta
        echo "Erro na preparação da consulta: " . mysqli_error($link);
        return null;
    }
}

// monta_select_curso(); 














