<?php
include("connect.php");
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sql = "INSERT INTO books(title,author,type,description) VALUES ('$title', '$author', '$type', '$description')";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["create"] = "Book Add Successfully";
        header("Location:index.php");
    }else{
        die("somthing went wrong");
    }
}

// if (isset($_POST["edit"])) {
//     $title = mysqli_real_escape_string($conn, $_POST["title"]);
//     $author = mysqli_real_escape_string($conn, $_POST["author"]);
//     $type = mysqli_real_escape_string($conn, $_POST["type"]);
//     $description = mysqli_real_escape_string($conn, $_POST["description"]);
//     $id = mysqli_real_escape_string($conn, $_POST["id"] ?? '');
//     $sql = "UPDATE books SET title = '$title', author = '$author', type = '$type', description = '$description' WHERE id=$id";
//     if(mysqli_query($conn, $sql)){
//         session_start();
//         $_SESSION["update"] = "Book Add Successfully";
//         header("Location: index.php");
//     }else{
//         die("somthing went wrong");
//     }
    
// }


if (isset($_POST["edit"])) {
    echo "<pre>";
    print_r($_POST); // To see all POST data
    echo "</pre>";

    $title = mysqli_real_escape_string($conn, $_POST["title"] ?? '');
    $author = mysqli_real_escape_string($conn, $_POST["author"] ?? '');
    $type = mysqli_real_escape_string($conn, $_POST["type"] ?? '');
    $description = mysqli_real_escape_string($conn, $_POST["description"] ?? '');
    $id = mysqli_real_escape_string($conn, $_POST["id"] ?? '');

    if ($id !== '') {  // Only proceed if `id` has a valid value
        $sql = "UPDATE books SET title = '$title', author = '$author', type = '$type',  description = '$description' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["update"] = "Book Updated Successfully";
            header("Location: index.php");
        } else {
            die("Something went wrong");
        }
    } else {
        die("ID is missing.");
    }
}



?>