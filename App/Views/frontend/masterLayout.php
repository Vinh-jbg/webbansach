<?php
    $_SESSION['data'] = $data;
    require_once("./Views/frontend/blocks/header.php"); 
    if(isset($data['pageNew'])) {
    require_once("./Views/frontend/${data['pageNew']}");
    }
    require_once("./Views/frontend/${data['page']}");
    require_once("./Views/frontend/blocks/footer.php");
?>