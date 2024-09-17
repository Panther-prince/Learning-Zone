<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("../Admin-Includes/css_links.php");
    ?>
</head>

<body>
    <?php
    include("../Admin-Includes/navbar_admin.php");
    ?>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>

            <div class="col-sm-9 mt-5 mx-3">
                <h2 class="rowjustify-content-center">Payment Status</h2>
                <form action="" class="mt-3  form-inline d-print-none">
                    <div class="form-group mr-3">
                        <label>Payment Course ID : </label>
                        <input type="text" name="checkedid" id="checkedid" class="form-control ml-3">
                    </div>
                    <Button type="submit" class="btn btn-danger">View</Button>
                </form>
                
            <h2 class="row justify-content-center" style="margin-top: 100px;">Payment Recepit</h2>
           <center>
            <table>
                <tr>
                <th>name :</th>
                <td>prince</td>
                <th>Payment :</th>
                <td>paid</td>
                </tr>
            </table>
            </center>
            </div>
               
        </div>
        
    </div>


    <?php
    include("../Admin-Includes/js_admin.php");
    ?>
</body>

</html>