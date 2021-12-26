<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .btn-danger {
            border-radius: 100px;
            padding: 2px 12px 4px 12px;
        }
    </style>    
  </head>
  <body>
    <div class='container mt-5'>

<?php

$user = 'root'; $password = '';
$pdo = new Pdo('mysql:dbname=fullstack;host=127.0.0.1', $user, $password);

$userId = $_GET['id'];

$query = 'SELECT * FROM users WHERE id = :id';
$res = $pdo->prepare($query);
$res->execute([
    ':id' => $userId
]);

$user = ($res->fetch());

if ($user) {

$query = "SELECT * FROM cities";
$res = $pdo->query($query);
$cities = $res->fetchAll();

if (isset($_SESSION['error'])) {
    echo
    "
    <div class='alert alert-danger text-center' role='alert'>
        {$_SESSION['error']}
    </div>
    ";
    unset($_SESSION['error']);
}
?>

        <form method="post" action="../actions/update_user.php">
            <label>Имя</label>
            <input name='id' hidden value='<?=$user['id']?>'>
            <input class="form-control mb-2" name='name' value='<?=$user['name']?>'>
            <label>Логин</label>
            <input class="form-control mb-2" name='login' value='<?=$user['login']?>'>
            <select class="form-control mb-2" name="city_id">
                    <?php
                        if (!$user['city_id']) {
                            echo '<option selected disabled>-- Выберете город --</option>';
                        }
                        foreach ($cities as $city) {
                            $selected = $city['id'] == $user['city_id'] ? 'selected' : '';
                            echo "<option $selected value='{$city['id']}'>{$city['name']}</option>";
                        }
                    ?>
            </select>
            <button type='submit' class="btn btn-success w-100">СОХРАНИТЬ</button>
        </form>   
        
        <?php
        } else {
             echo
             '
             <div class="alert alert-warning" role="alert">
                Пользователь не найден
            </div>
             ';   
        }        
        ?>                
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  </body>
</html>
