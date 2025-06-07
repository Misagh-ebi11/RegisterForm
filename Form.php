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
        .btn{
            border: none;
            width: 150px;
            height: max-content;
            margin-top: 20px;
            padding: 7px;
            border-radius: 10px;
            border: none;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            background: linear-gradient(16deg , #2095c433 , #579ec756);
            font-size: 16px;
        }
        .btn:hover{
            background-color: #57c7a571;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
        .btn_Back{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #btn_Box{
            display: flex;
            justify-content: center;
            gap: 20px;
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
                echo('<div id="btn_Box">');
                    echo('<form action="Form.html" method="post">');
                        echo('<button type="submit" class="btn">Edit</button>');
                    echo('</form>');
                    echo('<form action="Save.php" method="post">');
                        echo('<button type="submit" class="btn">Save</button>');
                    echo('</form>');
                echo('</div>');
            }
            else
            {
                echo('<h3>Please enter matching passwords!</h3>');
                echo('<form action="Form.html" method="post">');
                    echo('<div class="btn_Back">');
                        echo('<button type="submit" class="btn">Back to sign in</button>');
                    echo('</div>');
                echo('</form>');
            }
        }
        else
        {
            echo('<h3>Please submit all required details!</h3>');
            echo('<form action="Form.html" method="post">');
                echo('<div class="btn_Back">');
                    echo('<button type="submit" class="btn">Back to sign in</button>');
                echo('</div>');
            echo('</form>');
        }
    ?>
    </div>
</body>
</html>