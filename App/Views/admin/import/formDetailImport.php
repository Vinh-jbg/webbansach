
  <?php
    if(isset($data['productTemp'])) {
    foreach ($data['productTemp'] as $key => $value) {
      ?>
    <tr>
      <td id="ID">  <?php echo $value['MaSP']?> </td>
      <td>  <?php echo $value['TenSp']?></td>
      <td><?php echo $value['DonGia']?></td>
      <td><?php echo $value['SoLuong']?></td>
      <td>
          <form action="./index.php" method="POST">
              <input type="hidden" name="controller" value="import">
              <input type="hidden" name="action" value="show">
              <input type="hidden" name="id" id="IDPN" value="<?php echo $value['MaPN']?>">
              <input type="hidden" name="page"  value="<?php echo $data['pageCurrent']?>">
              <div  name="edit_btn" id="edit_btn" class="btn btn-success"> EDIT</div>
          </form>
      </td>
      <!-- <td>
            <input type="hidden" name="page" id="page" value="<?php echo $data['pageCurrent']?>">
            <input type="hidden" name="delete_id" value="">
            <button  name="delete_btn" class="btn btn-danger deleteBtn"> DELETE</button>
      </td> -->
    </tr>
    <?php
    }
}
    ?>
<div id="formEditDetailImport">

</div>