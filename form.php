<?php
    session_start();
    ob_start();
    require_once 'db.php'

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Assignments</title>
        <?php include 'links.php' ?>
    </head>
    <body>
        <div class="container mt-5">
            <div class="mt-5">
                <?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                <form action="apidata.php" method="get">
                    <div class="form-group">
                        <label >Enter what you want to Search: </label>
                        <input type="text" name="source" class="form-control" placeholder="Please type the text" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </body>
    </html>

<?php
    session_destroy();
?>