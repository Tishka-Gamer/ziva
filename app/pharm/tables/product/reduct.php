<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
use App\models\Contraindications;
use App\models\ProductPh;

if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    unset($_SESSION["error"]);

    $extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
    $types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];

    if (isset($_POST["id"])) {
        $name = $_POST["oldImage"];

        if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {


            $size = $_FILES["image"]["size"];
            $newName = $_FILES["image"]["name"];
            $tmpName = $_FILES["image"]["tmp_name"];
            echo ($newName);
            $error = $_FILES["image"]["error"];

            $path_parts = pathinfo("name");

            $newName = time() . "_" . $newName;
            // echo ("<br>");
            // var_dump($_FILES);
            // echo ("<br>");

            if (in_array(mime_content_type($tmpName), $types)) {

                if ($size > 4097152) {
                    $_SESSION["error"] = "Файл слишком большой";
                }
                if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/$newName",)) {
                    $_SESSION["error"] = "Не удалось переместить файл";
                } else {
                    unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/$name");
                    $name = $newName;
                }
            } else {
                $_SESSION["error"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
            }
        }

        if (!isset($_SESSION["error"])) {
            $conts = $_POST['cont'];
            foreach ($conts as $item)
                Contraindications::red($conts, $_POST['id']);
                ProductPh::Reduct($_POST['id'], $_POST['name'], $_POST['experation_age'], $_POST['price'], $name, $_POST['count'], $_POST['description'],  $_POST['type_id'],  $_POST['relese']);
            header("Location: /app/pharm/tables/product/product.php");
            // $rasn = array_diff($array, $_POST['cont']);
            // var_dump($rasn);
            // if(array_count_values( $rasn) == 0)
            // {
            //     // $a = 0;
            //     // 
            // }
            // else
            // {
            //     foreach ($rasn as $item) 
            //     {
            //         Contraindications::red($item, $_POST["id"]);
            //     }
            //     // $rasnun = array_diff($_POST['cont'], $array);
            //     // foreach ($rasnun as $item) 
            //     // {
            //     //     Contraindications::red($item, $_POST["id"]);
            //     // }
            // }

        } else {
            $id = $_POST['id'];
            header("location: /app/admin/tables/product/red.php?id=$id");
        }
    }
}
