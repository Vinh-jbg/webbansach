  <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã danh mục </th>
            <th>Tên danh mục</th>
            <th>Ảnh bìa</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          foreach ($data['menu'] as $key => $value) {
            ?>
          <tr>
            <td id="ID">  <?php echo $value['MaDM']?> </td>
            <td>  <?php echo $value['TenDM']?></td>
            <td><?php echo $value['img']?></td>
            <td>
                <form action="./index.php" method="POST">
                    <input type="hidden" name="controller" value="menu">
                    <input type="hidden" name="action" value="show">
                    <input type="hidden" name="id" value="<?php echo $value['MaDM']?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button  name="delete_btn" class="btn btn-danger deleteBtn"> DELETE</button>
                  type="submit"
                </form>
            </td>
          </tr>
          <?php
          }
         ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <?php 
              for($i = 1; $i <= $data['totalPage']; $i++) {
          ?>
           href="?controller=menu&action=index&page=<?php echo $i?>" 
          <li class="page-item"><a class="page-link" page=<?php echo $i?> ><?php echo $i?></a></li>
          <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav> -->
      <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách thể loại</label>
            <select name="MaTL"  class="form-control" id="exampleFormControlSelect1">
            <?php foreach($data['category'] as $key => $value) {?>
                <option value="<?php echo $value['MaTL'] ?>" > 
                
                <?php echo $value['TenTheLoai'] ?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách tác giả</label>
            <select name="MaTG"  class="form-control" id="exampleFormControlSelect1">
                <?php foreach($data['author'] as $key => $value) {?>
                <option value="<?php echo $value['MaTG'] ?>"> 
                
                <?php echo $value['TenTG'] ?></option>
                <?php }?>
            </select>
        </div> 
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh sách nhà xuất bản</label>
            <select name="MaNXB"  class="form-control" id="exampleFormControlSelect1">
                <?php foreach($data['publisher'] as $key => $value) {?>
                <option value="<?php echo $value['MaNXB'] ?>"> 
                
                <?php echo $value['TenNXB'] ?></option>
                <?php }?>
            </select>
        </div> -->