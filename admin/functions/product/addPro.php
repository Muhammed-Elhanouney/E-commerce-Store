<?php
// header('Content-Type: application/json');


$uploadeImage = [];

foreach ($_FILES['img']['name'] as $key => $img_name) {
    $img_temp = $_FILES['img']['tmp_name'][$key];
    if ($_FILES['img']['error'][$key] == 0) {
        $ext = ["jpg", "png", "gif", "jpeg"];
        $path = pathinfo($img_name, PATHINFO_EXTENSION);

        if (in_array($path, $ext)) {
            if ($_FILES['img']['size'][$key] < 2000000) {
                $new_Name = md5(uniqid()) . "." . $path;

                // if (move_uploaded_file($img_temp, "../../images/$new_Name")) {
                if (move_uploaded_file($img_temp, "../../img/proimage/$new_Name")) {
                    $uploadeImage[] = $new_Name;
                    $productName = $_POST['productname'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $Categories = $_POST['Categories'];

                    include('../connections.php');

                    $insert = "INSERT INTO `products`(
    `name`,
    `description`,
    `price`,
    `cat_id`
)
VALUES(
    '$productName',
    '$description',
    '$price',
    '$Categories'
)";

                    $query = $connection->query($insert);

                    if ($query) {
                        $lastid = $connection->insert_id;

                        foreach ($uploadeImage as $img) {
                            $insertImg = "INSERT INTO `images`(`img_id`, `image_name`)
VALUES(
    '$lastid',
    '$img'
)";
                            $queryImg = $connection->query($insertImg);

                            if ($queryImg) {
                                $selectAll = "SELECT * FROM `products` WHERE id = $lastid";
                                $queryAll = $connection->query($selectAll);
                                $resPro = $queryAll->fetch_assoc();

                                $resProId =  $resPro['id'];
                                $resProName =  $resPro['name'];
                                $resProDes =  $resPro['description'];
                                $resProPrice =  $resPro['price'];
                                $resProCat =  $resPro['cat_id'];


                                $selectImg = "SELECT * FROM images WHERE img_id = $lastid";
                                $queyeImgPlus = $connection->query($selectImg);
                                $resImg = $queyeImgPlus->fetch_assoc();

                                $resProImg = $resImg['image_name'];


                                $selectCat = "SELECT * FROM `categories` WHERE id = $resProCat";
                                $queryCat = $connection->query($selectCat);
                                $resCat =$queryCat->fetch_assoc();
                                
                                $catName = $resCat['name'];


                                echo "<tr>
        <td>$resProId</td>
        <td>$resProName</td>
        <td>$resProDes</td>
        <td>$resProPrice</td>
        <td>
        <img width'50px' src='img/proimage/$resProImg' width='50px' alt=''>
        </td>
        <td>$catName</td>
        <td>
            <a href='' class='btn btn-success'>edit</a>
            <a href='' class='btn btn-danger'>delete</a>
        </td>
        </tr>";
                            }
                        }
                    }

                    // echo "تم رفع الملف $img_name بنجاح.<br>";
                } else {
                    echo "فشل في رفع الملف $img_name.<br>";
                    exit();
                }
            } else {
                echo 'حجم الملف كبير جدًا';
                exit();
            }
        } else {
            echo "الامتداد غير مسموح به";
            exit();
        }
    } else {
        echo "الرجاء رفع ملف صحيح";
        exit();
    }
}


// $productName = $_POST['productname'];
// $description = $_POST['description'];
// $price = $_POST['price'];
// $Categories = $_POST['Categories'];

// include('../connections.php');

// $insert = "INSERT INTO `products`(
//     `name`,
//     `description`,
//     `price`,
//     `cat_id`
// )
// VALUES(
//     '$productName',
//     '$description',
//     '$price',
//     '$Categories'
// )";

// $query = $connection->query($insert);

// if ($query) {
//     $lastid = $connection->insert_id;

//     foreach ($uploadeImage as $img) {
//         $insertImg = "INSERT INTO `images`(`img_id`, `image_name`)
// VALUES(
//     '$lastid',
//     '$img'
// )";
//         $queryImg = $connection->query($insertImg);

//         if($queryImg){
//             $selectAll = "SELECT * FROM `products` WHERE id = $lastid";
//             $queryAll = $connection->query($selectAll);
//             $resPro = $queryAll->fetch_assoc();

//            $resProId =  $resPro['id'];
//            $resProName =  $resPro['name'];
//            $resProDes =  $resPro['description'];
//            $resProPrice =  $resPro['price'];


//         $selectImg = "SELECT * FROM images WHERE img_id = $lastid";
//         $queyeImgPlus = $connection->query($selectImg);
//         $resImg = $queyeImgPlus->fetch_assoc();

//         $resProImg = $resImg['image_name'];


//         echo "<tr>
//         <td>$resProId</td>
//         <td>$resProName</td>
//         <td>$resProDes</td>
//         <td>$resProPrice</td>
//         <td>$$resProImg</td>
//         </tr>";


//         }
//     }
// }
