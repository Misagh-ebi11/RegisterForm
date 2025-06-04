<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html{
            height: 100%;
            background: linear-gradient(16deg , #2a7b9b33 , #57c78656 , #eddd5354);
        }
        #Hspan{
            color: red;
            font-size: 35px;
            font-family: Arial, Helvetica, sans-serif;
        }
        #Header{
            text-align: center;
            width: max-content;
            margin: 20px auto 0 auto;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            animation: ChangeHeader 5s ease-in-out infinite;
        }
        h3{
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        #preview{
            border-radius: 15px;
            background:rgba(223, 222, 222, 0.44);
            box-shadow: 3px 3px 10px rgba(119, 97, 0, 0.445), -3px -3px 10px rgba(119, 97, 0, 0.445);
            width: 30%;
            height: max-content;
            padding: 30px;
            margin: 25px auto 0 auto;
            transition: all 0.7s ease-in-out;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bold;
            font-size: 16px;
            animation: MoveBox 5s ease-in-out infinite;
        }
        @keyframes MoveBox {
            0%{
                transform: translateY(-5px);
            }
            50%{
                transform: translateY(5px);
            }
            100%{
                transform: translateY(-5px);
            }
        }
        @keyframes ChangeHeader{
            0%{
                transform: scale(1.05);
            }
            50%{
                transform: scale(1);
            }
            100%{
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body>
    <H1 id="Header">Your <span id="Hspan">sign in</span> inforamtion</H1>
    <div id="preview">
        <?php
        if(isset($_POST["FName"]) && !empty($_POST["FName"]) &&
          isset($_POST["LName"]) && !empty($_POST["LName"]) &&
          isset($_POST["Email"]) && !empty($_POST["Email"]) &&
          isset($_POST["Phone"]) &&
          isset($_POST["Pass"]) && !empty($_POST["Pass"]) &&
          isset($_POST["RepeatPass"]) && !empty($_POST["RepeatPass"])
        )
        {
            $FName = $_POST["FName"];
            $LName = $_POST["LName"];
            $Email = $_POST["Email"];
            $Phone = $_POST["Phone"];
            $Pass = $_POST["Pass"];
            $RepeatPass = $_POST["RepeatPass"];
            if($Pass === $RepeatPass)
            {
                echo('<table>');
                    echo('<tr>');
                        echo('<td>First name: </td>');
                        echo('<td>' . $FName . '</td>');
                    echo('</tr>');

                    echo('<tr>');
                        echo('<td>Last name: </td>');
                        echo('<td>' . $FName . '</td>');
                    echo('</tr>');

                    echo('<tr>');
                        echo('<td>Email address: </td>');
                        echo('<td>' . $Email . '</td>');
                    echo('</tr>');

                    echo('<tr>');
                        echo('<td>Mobile phone:</td>');
                        echo('<td>' . $Phone . '</td>');
                    echo('</tr>');

                    echo('<tr>');
                        echo('<td>Password:</td>');
                        echo('<td>' . $Pass . '</td>');
                    echo('</tr>');
                echo('</table>');
            }
            else
            {
                echo('<h3>Please enter matching passwords!</h3>');
            }
        }
        else
        {
            echo('<h3>Please submit all required details!</h3>');
        }

    ?>
    </div>
</body>
</html>