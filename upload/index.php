<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
<?php 
    if(isset($_POST['enviar'])){
       /* var_dump($_FILES['files']);*/
        
        $formPermitidos = array("png", "jpeg", "gif", "jpg", "zip");
        $i = 0;
        $TOTAL_FILES = count($_FILES['files']['name']);
            while ($i < $TOTAL_FILES) {  

                $extensao = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
                $name = pathinfo($_FILES['files']['name'][$i], PATHINFO_FILENAME);

                if(in_array($extensao, $formPermitidos)){
                    $folder = "files/";               
                    $tempName = $_FILES['files']['tmp_name'][$i];
                    $newName = uniqid().".$extensao";

                    if(move_uploaded_file($tempName, $folder.$newName)){
                        echo "Upload com sucesso do arquivo $name para pasta $folder.$newName <br>";
                    } else {
                        echo  "Erro no upload do arquivo $tempName";
                    }
                } else {
                    echo "O formato $extensao do arquvo $name é invalido.";
                }
                $i++;
            };
            
        };
    };
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST" enctype = "multipart/form-data">
        <input type="file" name="files[]" multiple>
        <button class="b-enviar" type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>