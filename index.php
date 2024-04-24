<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polaroid Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Шапка сайта -->
    <div class="header">
        Polaroid Gallery
    </div>

    <div class="gallery">
        <?php
        $images = glob("images/*.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);

        foreach ($images as $image) {
            echo '<div class="polaroid">';
            echo '<img src="' .
                $image .
                '" alt="Polaroid Photo" onclick="openModal(\'' .
                $image .
                '\')">';
            echo "<div>File size: " .
                formatSizeUnits(filesize($image)) .
                "</div>";
            echo '<a href="' .
                $image .
                '" class="download-btn" download>Download</a>';
            echo "</div>";
        }
        ?>
    </div>

    <!-- Модальное окно для увеличенных изображений -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script src="script.js"></script>
</body>
</html>

<?php // Функция для преобразования размера файла в человекочитаемый формат

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . " GB";
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . " MB";
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . " KB";
    } elseif ($bytes > 1) {
        $bytes = $bytes . " bytes";
    } elseif ($bytes == 1) {
        $bytes = $bytes . " byte";
    } else {
        $bytes = "0 bytes";
    }
    return $bytes;
}
?>
