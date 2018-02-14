<?php
/**
 * Created by PhpStorm.
 * User: Наталья
 * Date: 10.02.2018
 * Time: 19:40
 * Удаление директории, отображение содержимого
 * директории ввиде иерархии файлов и папок
 */
header("Content-type: text/html; charset=utf-8");

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

include_once "../templates/head.html";

echo "I'm index.php<br>";

//var_dump($_FILES);
//var_dump($_REQUEST);
//
////mkdir(ROOT_DIR . "/loadedFiles");
//
//if (($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_FILES['file']))) {
//    if (!$_FILES['file']['tmp_name'] == "") {
//        rename(
//            $_FILES['file']['tmp_name'],
//            ROOT_DIR . "/loadedFiles/" . $_FILES['file']['name']
//        );
//    }
//}



//$path = "C:/Develop/iTry/MDclub/app";

echo '<p class="dir"><span>' . $path . '</span></p>';

function displayDir($dir) {
    $list = scandir($dir);
    array_splice($list, 0, 2);
    echo "<ul>";
    for ($i = 0; $i < count($list); $i++) {
        $path = $dir . "/" . $list[$i];
        $isDir = is_dir($path);
        $name = $list[$i];
        echo '<li class="', $isDir ? 'dir' : 'file', '"><span>' . htmlspecialchars($name) . '</span>';
        if ($isDir) displayDir($path);
        echo '</li>';
    }
    echo '</ul>';
}

function removeDir($dir) {
    $list = scandir($dir);
    array_splice($list, 0, 2);
    if (count($list) > 0) {
        for ($i = 0; $i < count($list); $i++) {
            $path = $dir . "/" . $list[$i];
            $isDir = is_dir($path);
            if ($isDir) {removeDir($path);}
            else {
                unlink($path);
            }
        }
    }
        echo "Директория: <<" . $dir . ">> --[УДАЛЕНА]--";
        rmdir($dir);
}

removeDir("C:/Develop/iTry/Deleted");

//displayDir($path);

?>


<?php
include_once "../templates/foot.html";
?>



<!--<form action="" enctype="multipart/form-data" method="post">-->
<!--    <input type="file" multiple name="file[]">-->
<!--    <label for="comment">Your comment:</label>-->
<!--    <textarea cols="20" rows="1" name="comment" id="comment"></textarea>-->
<!--    <input type="submit">-->
<!--</form>-->
