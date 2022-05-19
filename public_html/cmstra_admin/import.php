  <h2>Import CSV file into Mysql using PHP</h2>

  <div id="response" class="<?php if (!empty($type)) {
                                echo $type . " display-block";
                            } ?>">
      <?php if (!empty($message)) {
            echo $message;
        } ?>
  </div>
  <div class="outer-scontainer">
      <div class="row">

          <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
              <div class="input-row">
                  <label class="col-md-4 control-label">Choose CSV
                      File</label> <input type="file" name="file" id="file" accept=".csv">
                  <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                  <br>

              </div>

          </form>

      </div>
      <?php
        $db = new PDO("sqlite:base0/CMStra_SQLite.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlSelect = "SELECT * FROM contents";
        $result = $db->select($sqlSelect);
        if (!empty($result)) {
        ?>
          <table id='userTable'>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>content_status</th>
                      <th>Código SKU</th>
                      <th>Quantidade</th>
                      <th>Preco de Custo</th>
                      <th>Preço de Venda</th>
                      <th>Foto</th>
                      <th>Título</th>
                      <th>content_author</th>
                      <th>Categoria</th>
                      <th>Tradutor</th>
                      <th>Ilustrador</th>
                      <th>Altura</th>
                      <th>Largura</th>
                      <th>Profundidade</th>
                      <th>Peso</th>
                      <th>Tipo</th>
                      <th>Condição</th>
                      <th>Descrição da_Condição</th>
                      <th>Ano</th>
                      <th>content_tags</th>
                      <th>Número de Páginas</th>
                      <th>ISBN</th>
                      <th>Editora</th>
                      <th>Edição</th>
                      <th>Impressão/Tiragem</th>
                      <th>Outros Detalhes</th>
                      <th>Acabamento</th>
                      <th>Sinopse</th>

                  </tr>
              </thead>
              <?php

                foreach ($result as $row) {
                ?>

                  <tbody>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['content_status']; ?></td>
                          <td><?php echo $row['content_img']; ?></td>
                          <td><?php echo $row['quantidade']; ?></td>
                          <td><?php echo $row['preco_de_custo']; ?></td>
                          <td><?php echo $row['preco_de_venda']; ?></td>
                          <td><?php echo $row['content_title']; ?></td>
                          <td><?php echo $row['content_author']; ?></td>
                          <td><?php echo $row['categoria']; ?></td>
                          <td><?php echo $row['tradutor']; ?></td>
                          <td><?php echo $row['ilustrador']; ?></td>
                          <td><?php echo $row['altura']; ?></td>
                          <td><?php echo $row['largura']; ?></td>
                          <td><?php echo $row['profundidade']; ?></td>
                          <td><?php echo $row['peso']; ?></td>
                          <td><?php echo $row['tipo']; ?></td>
                          <td><?php echo $row['condicao']; ?></td>
                          <td><?php echo $row['content_content_da_condicao']; ?></td>
                          <td><?php echo $row['ano']; ?></td>
                          <td><?php echo $row['content_tags']; ?></td>
                          <td><?php echo $row['numero_de_paginas']; ?></td>
                          <td><?php echo $row['isbn']; ?></td>
                          <td><?php echo $row['editora']; ?></td>
                          <td><?php echo $row['edicao']; ?></td>
                          <td><?php echo $row['impressao_tiragem']; ?></td>
                          <td><?php echo $row['outros_detalhes']; ?></td>
                          <td><?php echo $row['acabamento']; ?></td>
                          <td><?php echo $row['sinopse']; ?></td>
                      </tr>
                  <?php
                }
                    ?>
                  </tbody>
          </table>
      <?php } ?>
  </div>





  <script type="text/javascript">
      $(document).ready(function() {
          $("#frmCSVImport").on("submit", function() {

              $("#response").attr("class", "");
              $("#response").html("");
              var fileType = ".csv";
              var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
              if (!regex.test($("#file").val().toLowerCase())) {
                  $("#response").addClass("error");
                  $("#response").addClass("display-block");
                  $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                  return false;
              }
              return true;
          });
      });
  </script>