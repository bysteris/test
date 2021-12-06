<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Задание с пользователями</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<html>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <table class="table table-hover">
                    <thead>
                        <h1 class="text-center">Просмотр пользователей Базы данных</h1>
                    </thead>
                    <tbody>
                        <tr colspan="3">
                            <td class="fw-bold">ID</td>
                            <td class="fw-bold">Фамилия</td>
                            <td class="fw-bold">Имя</td>
                            <td class="fw-bold">email</td>
                            <td type="hidden"></td>
                        </tr>
                        <tr colspan="3">
                            <?php
                            $conn = new mysqli("localhost", "sbster10_test", "m1D*wyvR", "sbster10_test");
                            if($conn->connect_error){
                                die("Ошибка: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM users";
                            if($result = $conn->query($sql)){
                                foreach($result as $row){
                                    echo '<tr colspan="3">';
                                    echo '<td>' . $row["id"] . '</td>';
                                    echo '<td>' . $row["surname"] . '</td>';
                                    echo '<td>' . $row["name"] . '</td>';
                                    echo '<td>' . $row["email"] . '</td>';

                                    echo "<td>
                                              <form action='/delete.php' method='POST'>
                                                <input type='hidden' name='id' value='" . $row["id"] . "' />
                                                <button type='submit' class='btn btn-danger btn-sm'>Удалить</button>
                                              </form>
                                           </td>";

                                    echo '</tr>';
                                }
                                $result->free();
                            } else{
                                echo "Ошибка: " . $conn->error;
                            }
                            $conn->close();
                            ?>
                        </tr>

                    </tbody>
                </table>


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdd">
                    Добавить
                </button>
                <div class="modal fade" id="ModalAdd" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Добавьте пользователя</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/add.php" method="POST">
                                <div class="modal-body text-center">
                                    <p><input type="text" name="surname" placeholder="Фамилия" required /></p>
                                    <p><input type="text" name="name" placeholder="Имя" required /></p>
                                    <p><input type="email" name="email" placeholder="email" required /></p>
                                    <button type="submit" class="btn btn-primary">Добавить пользователя</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>