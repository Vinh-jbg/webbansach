 <div class="body-container-top">
    <input type="text" hidden name="idUser" value="<?php echo $data['userInfo']["MaKH"]?>">
     <button id="showformedit">sửa</button>
 </div>
 <?php
    // var_dump($data['userInfo'])
 ?>
 <div class="address-infor">
     <span><?php echo $data['userInfo']['TenKH'] ?></span>
     <span><?php echo $data['address-infor'][0] . ",";
            echo $data['address-infor'][1] . ",";
            echo $data['address-infor'][2] ?></span>
     <span><?php echo $data['address-infor'][3] . ",";
            echo $data['address-infor'][4] . ","; ?></span>
     <span><?php echo $data['address-infor'][5] . ","; ?></span>
     <span>giao hàng tận nơi(<?php echo $data['address-infor'][3] ?>)</span>

 </div>