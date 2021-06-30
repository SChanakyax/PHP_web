<?php
require_once("../root/php/component.php");
require_once("../root/php/operations.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Style sheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>

            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-50">
                    <div class="py-2">
                        <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "book_id", ""); ?>
                        <div class="pt-2">
                            <?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name", ""); ?>
                        </div>
                        <div class="row pt-2">
                            <div class="col">
                                <?php inputElement("<i class='fas fa-people-carry'></i>", "Publisher", "book_publisher", ""); ?>
                            </div>
                            <div class="col">
                                <?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "book_price", ""); ?>

                            </div>
                        </div>
                        
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create" , "btn btn-success", "Create", "create" ,"dat-toggle='tooltip' data-placement='bottom' title='Create new book entry' "); ?>
                        <?php buttonElement("btn-read" , "btn btn-primary", "Read", "read" ,"dat-toggle='tooltip' data-placement='bottom' title='Read new book entry' "); ?>
                        <?php buttonElement("btn-update" , "btn btn-light borders", "Update", "update" ,"dat-toggle='tooltip' data-placement='bottom' title='Update new book entry' "); ?>
                        <?php buttonElement("btn-delete" , "btn btn-danger", "Delete", "delete" ,"dat-toggle='tooltip' data-placement='bottom' title='Delete new book entry' "); ?>
                    </div>

                </form>
            </div>
        </div>
           <!-- Table bootstrap-->
           <div class="d-flex table-data">
                    <table class="table table-striped table-dart">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Book Name</th>
                                <th>Publisher</th>
                                <th>Book Price</th>
                                <th>Edit</th>

                            </tr>
                        </thead>

                        <tbody id="tbody">
                           <?php 
                                if(isset($_POST['read'])){
                                   $result = getData();

                                   if($result){
                                       while ($row = mysqli_fetch_assoc($result)){  ?>

                                       <tr>
                                            <td data-id="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </td>
                                            <td data-id="<?php echo $row['id']; ?>"> <?php echo $row['book_name']; ?> </td>
                                            <td data-id="<?php echo $row['id']; ?>"> <?php echo $row['book_publisher']; ?> </td>
                                            <td data-id="<?php echo $row['id']; ?>"> <?php echo '$' .$row['book_price']; ?> </td>
                                            <td> <i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i> </td>
                                       </tr>

                                <?php           
                                       }
                                   }
                                }                                        
                           ?>
                        </tbody>
                    </table>
                </div>
    </main>

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="../root/php/main.js"></script>
</body>

</html>