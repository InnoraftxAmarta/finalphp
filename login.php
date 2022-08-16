<!DOCTYPE html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="fullbody">
        

            <div class="lhalf">
                <div class="linnerhalf">
                    <h2>Welcome To <br> Login Page</h2>
                </div>

            </div>
            <div class="rhalf">
                <div class="rinnerhalf">
                    <form action="check.php" method="POST">
                        <label for="username">Enter Your Username</label>
                        <input class="inputbox"type="text" name="uname" placeholder="Username" class="textbox">
                        <label for="username">Enter Your Password</label>
                        <input class="inputbox"type="password" name="pwd" placeholder="Password" class="textbox">
                        <input class="submitbox" type="submit" value="Submit" class="button1" name="login">
                    </form>
                </div>

            </div>

            
        </div>
    </div>
</body>
</html>