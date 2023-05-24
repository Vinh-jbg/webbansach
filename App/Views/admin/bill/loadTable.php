<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Mã hóa đơn </th>
      <th>Ngày tạo</th>
      <th>Tổng tiền</th>
      <th>Tình trạng</th>
      <th>Xem chi tiết hóa đơn</th>
      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($data['bill'] as $key => $value) {
      ?>
    <tr>
      <td id="ID">  <?php echo $value['MaHD']?> </td>
      <td>  <?php echo $value['NgayTao']?></td>
      <td>  <?php echo $value['TongTien']?></td>
      <td>  
        <?php
        if($value['TinhTrang'] == 0 ) {
            echo "Đang chờ xử lý";
        } else if($value['TinhTrang'] == 1) {
            echo "Đã xử lý";
        } else if ($value['TinhTrang'] == 2) {
            echo "Đang giao";
        } else  {
            echo "Đã giao";
        }
         ?>
    </td>
      <td> <div name="billDetail" id="billDetail" class="btn btn-link"> Xem chi tiết</div></td>
      <td>
          <form action="./index.php" method="POST">
              <input type="hidden" name="controller" value="bill">
              <input type="hidden" name="action" value="show">
              <input type="hidden" name="id" value="<?php echo $value['MaHD']?>">
              <input type="hidden" name="page"  value="<?php echo $data['pageCurrent']?>">
              <?php 
                if($value['TinhTrang'] != 3) {
                ?>
              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                <?php
              }?>
          </form>
      </td>
      <!-- <td>
            <input type="hidden" name="page" id="page" value="<?php echo $data['pageCurrent']?>">
            <input type="hidden" name="delete_id" value="">
            <button  name="delete_btn" class="btn btn-danger deleteBtn"> DELETE</button>
      </td> -->
      <td>

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
  load("?controller=bill&action=pagination");
</script>