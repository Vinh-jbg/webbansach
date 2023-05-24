<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Mã Phiếu nhập </th>
      <th>Ngày Nhập</th>
      <th>Tình trạng</th>
      <th>Tổng tiền</th>
      <th>Xem chi tiết phiếu nhập</th>
      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($data['import'] as $key => $value) {
      ?>
    <tr>
      <td id="ID">  <?php echo $value['MaPN']?> </td>
      <td>  <?php echo $value['NgayNhap']?></td>
      <td>  <?php if($value['TinhTrang']==1) {echo 'Đã nhập';} else { echo "Chưa nhập";}?></td>
      <td>  <?php echo $value['TongTien']?></td>
      <td> <div name="importDetail" id="importDetail" class="btn btn-link"> Xem chi tiết</div></td>
      <td>
      <?php if($value['TinhTrang']!=1) {?>
          <form action="./index.php" method="POST">
              <input type="hidden" name="controller" value="import">
              <input type="hidden" name="action" value="show">
              <input type="hidden" name="id" value="<?php echo $value['MaPN']?>">
              <input type="hidden" name="page"  value="<?php echo $data['pageCurrent']?>">
              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
          </form>
        <?php }?>
      </td>
      <td>
      <!-- <?php if($value['TinhTrang']!=1) {?>
            <input type="hidden" name="page" id="page" value="<?php echo $data['pageCurrent']?>">
            <input type="hidden" name="delete_id" value="">
            <button  name="delete_btn" class="btn btn-danger deleteBtn"> DELETE</button>
      <?php }?> -->
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item <?php if(isset($data['pageCurrent']) && (1 == $data['pageCurrent'])) { echo 'disabled';}?>">
      <a class="page-link " href="" page="<?php echo ($data['pageCurrent'] - 1)?> ">Previous</a>
    </li>
    <?php 
        for($i = 1; $i <= $data['totalPage']; $i++) {
    ?>
    <li class="page-item <?php if(isset($data['pageCurrent']) && ($i==$data['pageCurrent'])) { echo 'active';}?>">
      <a class="page-link " href="" page=<?php echo $i?> ><?php echo $i?></a>
    </li>
    <?php
    }
    ?>
    <li class="page-item <?php if(isset($data['pageCurrent']) && ($data['totalPage'] <= $data['pageCurrent'])) { echo 'disabled';}?>">
      <a class="page-link" page="<?php echo ($data['pageCurrent'] + 1)?> " href="">Next</a>
    </li>
  </ul>
</nav>
<?php include_once('./Views/admin/includes/scripts.php');?>
<script>
  load("?controller=import&action=pagination");
</script>
<?php