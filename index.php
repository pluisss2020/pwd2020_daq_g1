<?php
    include_once 'subpaginas/database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: subpaginas/index.php');
            break;

            case 2:
            header('location: index.php');
            break;

            default:
        }
    }

    if(isset($_POST['user']) && isset($_POST['password'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE user = :user AND password = :password');
        $query->execute(['user' => $user, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: subpaginas/index.php');
                break;

                case 2:
                header('location: index.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css\login_styles.css">
    <title>Login</title>
</head>
<body>
    <main>
            <div id="all-container">
               
                <div id="form">
                    <div class="container2">
                        <form action="#" method="POST">
                            <h2>Iniciar sesión</h2>
                            <h3>Usuario</h3><input type="text" name="user"><br/>
                            <h3>Contraseña</h3><input type="text" name="password"><br/>
                            <button type="submit" value="Iniciar sesión">Iniciar</button>
                        </form>

                    </div>
                </div>
        </main>
</body>
</html>