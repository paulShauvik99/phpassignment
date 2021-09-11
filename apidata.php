<?php
    session_start();
    ob_start();
    require_once 'db.php';

    $keyword = $_GET['source'];



    

        $sql = "SELECT * From keyword_table WHERE keyword = '$keyword'";
    
        $res = mysqli_query($con,$sql);
    
        
    
    
        if(mysqli_num_rows($res)){
    
            while ($row = mysqli_fetch_assoc($res)){
                $table = $row['table_name'];
                $column_names = explode(",",$row['column_names']);
             }
        }else{
        $_SESSION['msg'] = "
            <div class='container mt-5'>
                <h1 class='mt-5 display-4 font-weight-bold'> No Results Found! </h1>
            </div>
        ";
        header("Location: form.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Assignment Result</title>
        <?php include 'links.php' ?>
    </head>
    <body>  
    
    <div class="container ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="mt-5 display-4">
                    The Output is:
                </h1>
                <table class="table table-bordered table-striped table-hover mt-5">
                    <thead class="thead-dark">
                        <tr class="text-center text-capitalize">
                            <th><?php echo $column_names[0]; ?></th>
                            <th><?php echo $column_names[1]; ?></th>                    
                        </tr>
                    </thead>
                     <tbody>
                            <?php
                                $sql2 = "SELECT $table.$column_names[0] as columnFirst, $table.$column_names[1] as columnLast  FROM $table";
                                
                                $res2 = $con->query($sql2);
            
                                while ($row = $res2->fetch_assoc()) {
                                    ?>
                                        <tr class="text-center">
                                            <td> <?php echo $row['columnFirst'];?> </td>
                                            <td> <?php echo $row['columnLast']; ?> </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    </body>
    </html>


<?php







?>