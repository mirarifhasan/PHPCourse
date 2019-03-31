<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>View</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/viewCSS.css">
</head>

<body>
    <h4>Users List</h4>
    
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody> 

               <?php
                    if(file_exists("contact_data.csv")){
                        $file_handel = fopen("contact_data.csv", "r"); 
                        $cnt = 1;

                        while(! feof($file_handel)) {
                            $line_of_text[] = (fgetcsv($file_handel, 1024));

                            $name = $line_of_text[$cnt-1][1];
                            $email = $line_of_text[$cnt-1][2];
                            $password = $line_of_text[$cnt-1][3];

                            if($name != ''){
                                echo "<tr><td>$cnt</td>"; 
                                $cnt = $cnt + 1;

                                echo "<td>$name</td>";
                                echo "<td>$email</td>";
                                echo "<td>$password</td></tr>";
                            }
                        }
                        fclose($file_handel);
                    }
                ?>

            </tbody>
        </table>
    </div>

    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>