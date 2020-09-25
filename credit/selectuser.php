<?php
$insert = false;
if(isset($_POST['transfercredit'])){  
    //set connection variable
    include 'connection.php';
    //echo "success connecting to the db";

    //Collect post values
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $credit = $_POST['credit'];
   

    $sql = "INSERT INTO transfercredit (sender, receiver, credit) VALUES ('$sender', '$receiver', '$credit');";

    //echo $sql;

    // excecute the query

    if($con->query($sql) == true){
        //echo "successfully inserted data ";

        //flag for successfull insertion
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";
        
    }

    // close the database connection
     $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="credit2.css">
    <title>Select user</title>
    <?php include 'links.php'?>
    <script type="text/javascript">
        function validate(){
            var varsender = document.creditform.sender;
            var varreceiver = document.creditform.receiver;
            var varcredit = document.creditform.credit;
            console.log(varsender.value);
            if(varsender.value == 'select sender'){
                alert('Enter Valid Sender Name');
                varsender.focus();
                return false;
            }

            if(varreceiver.value == 'select receiver'){
                alert('Enter Valid Receiver Name');
                varreceiver.focus();
                return false;
            }

            if(varsender.value == varreceiver.value){
                alert("Sender and Receiver name must be different!!!");
                varsender.focus();
                varreceiver.focus();
                return false;
            }

            if(varcredit.value.length <=0){
                alert("Enter credit");
                varcredit.focus();
                return false;
            }
            
            if(varcredit.value <= 0){
                alert("Enter valid credit");
                varcredit.focus();
                return false;
            }           
            return true;                          
        }
    </script>
</head>
<body>
    <img src="bg20.jpg" alt="transaction image" class="bgimg">  
    <div class="container">
    <form action="" method="post" name="creditform" onsubmit ="return validate()">
        <h1>Transfer Credit</h1>
            <div class="transaction">            
                <label for="sender">Sender's Name : </label>
                    <select name="sender" class="sel">
                    <option value="select sender">Select Sender</option>
                    <option value="Arav">Arav</option>
                    <option value="Aksh">Aksh</option>
                    <option value="Akash">Akash</option>
                    <option value="Anav">Anav</option>
                    <option value="Anupama">Anupama</option>
                    <option value="Anika">Anika</option>
                    <option value="Ayana">Ayana</option>
                    <option value="Arya">Arya</option>
                    <option value="Ansh">Ansh</option>
                    <option value="Aadi">Aadi</option>
                    </select><br><br>
            
                <label for="receiver">Receiver's Name : </label>
                    <select name="receiver" class="sel">
                        <option value="select receiver">Select Receiver</option>
                        <option value="Arav">Arav</option>
                        <option value="Aksh">Aksh</option>
                        <option value="Akash">Akash</option>
                        <option value="Anav">Anav</option>
                        <option value="Anupama">Anupama</option>
                        <option value="Anika">Anika</option>
                        <option value="Ayana">Ayana</option>
                        <option value="Arya">Arya</option>
                        <option value="Ansh">Ansh</option>
                        <option value="Aadi">Aadi</option>
                        </select>
                        <br><br>
            
                    <label for="credit">Credit : </label><input type="text" name="credit" class="credit"><br><br>
                               
            <div class="choose">
                <input type="submit" name="transfercredit" class="btn" value="Transfer Credit"></button>
                <a href="view_user.php"><input type="button"  name="back" class="btn" value="Back"></button></a>
            </div>

    </form>
    </div>
</body>
</html>
