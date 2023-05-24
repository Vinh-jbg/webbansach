<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Mã sách </th>
      <th>Tên sách</th>
      <th>Hình ảnh</th>
      <th>Đơn giá</th>
      <th>Số lượng</th>
      <th>Tình trạng KM</th>
      <th>Tình trạng hiển thị</th>
      <th>Mô tả</th>

      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($data['product'] as $key => $value) {
      ?>
    <tr>
      <td id="ID">  <?php echo $value['MaSP']?> </td>
      <td>  <?php echo $value['TenSp']?></td>
      <td><img style="width:100px; height: 100px" src="./public/img/product/<?php echo $value['MaTl']."/".$value['img']?>" alt=""></td>
      <td><?php echo $value['Dongia']?></td>
      <td><?php echo $value['SoLuong']?></td>
      <td><?php echo $value['TTKM']?></td>
      <td><?php echo $value['TTSach']?></td>
      <td><?php echo $value['MoTa']?></td>

      <td>
          <form action="./index.php" method="POST">
              <input type="hidden" name="controller" value="product">
              <input type="hidden" name="action" value="show">
              <input type="hidden" name="id" value="<?php echo $value['MaSP']?>">
              <input type="hidden" name="page" value="<?php echo $data['pageCurrent']?>">
              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
          </form>
      </td>
      <td>
            <input type="hidden" name="page" id="page" value="<?php echo $data['pageCurrent']?>"> 
            <input type="hidden" name="delete_id" value="">
            <button  name="delete_btn" class="btn btn-danger deleteBtn"> DELETE</button>
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
  load("?controller=product&action=pagination");
</script>