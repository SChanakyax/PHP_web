<?php
require_once("db.php");
require_once("component.php");

$con = createDB();

//create record
if(isset($_POST['create'])) {
    //echo "create button click";
    createData();
}

//update
if(isset($_POST['update'])){
    updateData();
}

//delete 
if(isset($_POST['delete'])) {
    deleteRecord();
}

function createData(){
  //  $bookname = $_POST['book_name'];
    $bookname = textboxValue("book_name");
    $publisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $publisher && $bookprice){  

        $sql = "insert into books (book_name, book_publisher, book_price)
                values('$bookname','$publisher','$bookprice')
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("sucess","Record inserted successfully");
         //   echo "Record inserted successfully";
        }else {
            echo "Error inserting data";
        }

    }else {
        //echo "Provide data in the textboxes";
        TextNode("error","Provide Data in the textbox");
    }
}

function textboxValue($value) {
    //escapes special char in a string
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));

    if(empty($textbox)) {
        return false;
    }else {
        return $textbox;
    }
}

//messages
function TextNode($classname, $msg) {
    $element = "<h6 classname='$classname'> $msg </h6>";
    echo $element;
}

//get data from DB
function getData() {
    $sql = "select * from books";

   $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result)> 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $result;
        }
    }
}

function updateData() {
    $bookid = textboxValue("book_id");

    $bookname = textboxValue("book_name");
    $publisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $publisher && $bookprice){  

        $sql = "
            update books SET book_name = '$bookname',
                             book_publisher = '$publisher',
                             book_price = '$bookprice'

                             WHERE id = '$bookid'
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("sucess","Record updated successfully");
        }else {
            echo "Error updating data";
        }

    }else {
        //echo "Provide data in the textboxes";
        TextNode("error","Provide Data in the textbox");
    }
}

function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "
            DELETE FROM books WHERE id = $bookid
            ";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Record deleted suceessfully");
    }else{
        TextNode("error", "Record delete unsuccessful !");

    }
}


?>