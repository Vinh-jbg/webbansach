<?php 
    class uploadFile extends BaseController{
        public function savefile($dir, $tmpName, $fileName, $folderName = '')
        {
            if(!empty($tmpName) && !empty($fileName)) {
                if(!file_exists($dir)){ 
                    mkdir($dir);
                }
                if(!empty($folderName)) {
                    if(!file_exists($dir."/".$folderName)){ 
                        mkdir($dir."/".$folderName);
                    }
                    $dir = $dir."/".$folderName;
                }
                if(move_uploaded_file($tmpName, $dir."/".$fileName)) {
                    return 1;
                } else return 0;
            } else return 0;
        }
}
?>