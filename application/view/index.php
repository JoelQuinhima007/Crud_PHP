<?php
  include_once("../model/DAO/ClienteDAO.php");
  include_once("../model/DTO/ClienteDTO.php");

    $clienteDTO= new ClienteDTO();
    $clienteDAO= new ClienteDAO();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Aplicação Cliente</h1>
        <div class="container">
            <form action="adddata.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Cliente</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label for="">Grade</label>
                        <select name="grade" id="grade" class="form-control" required>
                            <option value="">Select a Grade</option>
                            <option value="grade6">Grade 6</option>
                            <option value="grade7">Grade 7</option>
                            <option value="grade8">Grade 8</option>
                            <option value="grade9">Grade 9</option>
                            <option value="grade10">Grade 10</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Marks</label>
                        <input type="number" name="marks" id="marks" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach($clienteDAO->Read() as $cliente):
                    ?>
                    
                    <tr class="trow">
                        <td><?php echo $cliente->getId() ?></td>
                        <td><?php echo $cliente->getNome() ?></td>
                        <td><?php echo $cliente->getIdade(); ?></td>
                        <td><?php echo $cliente->getEndereco(); ?></td>
                        <td><?php echo $cliente->getContacto(); ?></td>
                        <td><a href="updatedata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href​="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                    <?php
                      endforeach 
                    ?>
                </tbody>
              </table>
        </div>
    </section>
</body>

</html>
