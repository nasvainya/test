<?php
//1.1
    $file = fopen("test.txt", "w"); 
    fwrite($file, "Привет, мир!");
    fclose($file); 
//1.2
$file = fopen("test.txt", "r");
    while (!feof($file))
    {
    $content = fgets($file);
    echo $content."<br>";
    }
fclose($file);

//1.3
    rename("test.txt", "mir.txt");
//1.4
    $dir = "folder";
       if(!file_exists($dir)){
  	    if(mkdir($dir)){
  	        echo "Directory created successfully. <br>";
  	    } else{
              echo "ERROR: Directory could not be created. <br>";
  	    }
       } else{
          echo "ERROR: Directory already exists. <br>";
       }

    if (rename("mir.txt", $dir . "/mir.txt")) {
    echo "Файл mir.txt перемещен в папку folder.<br>";
    } else {
        echo "Ошибка перемещения файла.<br>";
    }
//1.5
    $source = $dir . "/mir.txt";
    $destination = $dir . "/world.txt";
    if (file_exists($source)) {
        if (copy($source, $destination)) {
            echo "Создана копия файла: world.txt<br>";
        } else {
            echo "Ошибка копирования.<br>";
        }
    } else {
        echo "Файл mir.txt не найден для копирования.<br>";
    }
//1.6
    $file = $dir . "/world.txt";
    $bytes = filesize($file);
    $kilobytes = $bytes / 1024;
    $megabytes = $kilobytes / 1024;
    $gigabytes = $megabytes / 1024;
    echo $bytes . " - размер в байтах.<br>";
    echo $kilobytes . " - размер в килобайтах.<br>";
    echo $megabytes . " - размер в мегабайтах.<br>";
    echo $gigabytes . " - размер в гигабайтах.<br>";
//1.7
    unlink("world.txt");
//1.8
        if (file_exists($dir . "/world.txt")) {
        echo "   - world.txt есть.<br>";
    } else {
        echo "   - world.txt удален.<br>";
    }

    if (file_exists($dir . "/mir.txt")) {
        echo "   - mir.txt есть.<br>";
    } else {
        echo "   - mir.txt удален.<br>";
    }

//2.1
    mkdir("/var/www/otyrko.com/test", 0777);

//2.2
    $testFolder = "test";
    $wwwFolder = "www";
    if(rename($testFolder, $wwwFolder)){
        echo "Папка успешно переименована. <br>";
    }else {
        echo "Ошибка. папка не переименована. <br>";    
    }
//2.3
    if(rmdir($wwwFolder)){
        echo "Папка успешно удалена. <br>";
    } else{
        echo "Папка не удалена. <br>";    
    }
//2.4
    foreach ($foldersToCreate as $folderName) {
    $path = $testFolder . "/" . $folderName;
    if (!file_exists($path)) {
        if (mkdir($path)) {
            echo "   - Папка '$folderName' создана.<br>";
        } else {
            echo "   - Ошибка создания папки '$folderName'.<br>";
        }
    } else {
        echo "   - Папка '$folderName' уже существует.<br>";
    }
}
//2.5
$jpgFiles = glob("*.jpg");
if (count($jpgFiles) > 0) {
    foreach ($jpgFiles as $file) {
        echo "   - " . $file . " (размер: " . filesize($file) . " байт)<br>";
    }
} else {
    echo "   - Файлы .jpg не найдены в текущей папке.<br>";
}
    
?>
