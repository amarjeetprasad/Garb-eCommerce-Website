

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Goldman&family=Press+Start+2P&family=Roboto&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            padding: 0;
            margin: 0;
            background-color:rgb(255, 247, 247);
        }
        .Nav{
            position :fixed;
            top:0;
            z-index:1;
            width:100%;
            color:#fff;
        }
        .nav-icon{
            /* background-color:#fff; */
        }
        .space{
            height:100px;
            width:100%;
        }
        a,b{
            color:#fff;
            margin:0px 10px;
            font-family: 'Roboto', sans-serif;
        }
        a:hover{
            color:rgb(219, 219, 219);
        }
        .Brand{
            font-family: 'Press Start 2P', cursive;
            font-size:30px;
        }
        .Brand:hover{
            color:rgb(219, 219, 219);
        }
        li{
            margin:0px 35px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary  Nav" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon nav-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand Brand" href="../index.php">GARB</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a class="nav-link" href="../clientPage/signIn.php">Login</a>
            </li>
            <li>
                <a class="nav-link" href="../clientPage/signUp.php">Register</a>
            </li>
            <li>
                <a class="nav-link" href="../admin/AdminLogin.php">Admin Login</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="space"></div>