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
        #Status{
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
            text-align: center;
        }
        #BackBtn{
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
        #BackBtn:hover{
            background-color: #57c7a571;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
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
    </style>
</head>
<body>
    <div id="Status">
    <?php
        session_start();
        $Connect = mysqli_connect("127.0.0.1", "root", "", "db_Register");
        if (!$Connect) {
            die("<h3>Error connecting to database!</h3>");
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["save"])) {                
                $FName = $_SESSION["FName"];
                $LName = $_SESSION["LName"];
                $Email = $_SESSION["Email"];
                $Phone = $_SESSION["Phone"];
                $Pass = $_SESSION["Pass"];

                $Insert_Query = "INSERT INTO tbl_users (FirstName, LastName, Email, Phone, User_Pass) VALUES (?, ?, ?, ?, ?)";
                $Statement = mysqli_prepare($Connect, $Insert_Query);
                
                if($Statement) {
                    mysqli_stmt_bind_param($Statement, "sssss", $FName, $LName, $Email, $Phone, $Pass);
                    
                    if(mysqli_stmt_execute($Statement)) {
                        echo ('<h3>Your sign-in was successful!</h3>');
                        session_destroy();
                    } else {
                        echo ('<h3>Error in saving data</h3>');
                    }  
                    mysqli_stmt_close($Statement);
                } 
            }
        mysqli_close($Connect);
    ?>
        <div id="btn_Box">
            <form action="Form.html">
                <button type="submit" id="BackBtn">Back to sign-in</button>
            </form>
        </div>
    </div>
</body>
</html>