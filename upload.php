<?php
$target_dir = "images/"; // Директория, в которую будут загружены изображения
$uploadOk = 1; // Флаг, указывающий на успешность загрузки файлов

// Проверяем, были ли выбраны файлы для загрузки
if (isset($_POST["submit"])) {
    // Обрабатываем каждый выбранный файл
    foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $tmp_name) {
        $target_file =
            $target_dir . basename($_FILES["fileToUpload"]["name"][$key]); // Путь к загружаемому файлу
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Расширение загружаемого файла

        // Проверяем, является ли файл изображением
        $check = getimagesize($tmp_name);
        if ($check !== false) {
            echo "Файл является изображением - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "Файл не является изображением.<br>";
            $uploadOk = 0;
        }

        // Проверяем, существует ли файл
        if (file_exists($target_file)) {
            echo "Файл уже существует.<br>";
            $uploadOk = 0;
        }

        // Разрешаем только определенные форматы файлов
        if (
            $imageFileType != "jpg" &&
            $imageFileType != "png" &&
            $imageFileType != "jpeg" &&
            $imageFileType != "gif"
        ) {
            echo "Разрешены только файлы JPG, JPEG, PNG и GIF.<br>";
            $uploadOk = 0;
        }

        // Попытка загрузить файл, если все в порядке
        if ($uploadOk == 1) {
            if (move_uploaded_file($tmp_name, $target_file)) {
                echo "Файл " .
                    basename($_FILES["fileToUpload"]["name"][$key]) .
                    " был загружен.<br>";
            } else {
                echo "Произошла ошибка при загрузке файла.<br>";
            }
        }
    }
}
?>
