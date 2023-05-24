<div class="form-group">
    <label for="exampleFormControlSelect2">Danh sách sách</label>
    <select name="MaSP" id="MaSP"  class="form-control" id="exampleFormControlSelect2">
        <option value="-1" selected>All</option>
        <?php foreach($data['arrProductCustomer'] as $key => $value) {?>
        <option value="<?php echo $value['MaSP'] ?>"> 
        <?php echo $value['TenSp'] ?></option>
        <?php }?>
    </select>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th>Tên sách</th>
            <th>Tổng tiền bán</th>
            <th>Số lượng bán ra</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($data['arrProductCustomer'] as $key => $value) { 
                $total += $value['DonGia']*$value['SoLuong'];
                
                ?>
                <tr>
                    <td>  <?php echo $value['TenSp']?></td>
                    <td><?php echo $value['DonGia']*$value['SoLuong']?></td>
                    <td><?php echo $value['SoLuong']?></td>
                  </tr>
      <?php
    } ?>
                 <tr>
                <td class="font-weight-bold text-primary">Tổng tiền bảng</td>
                <td class="font-weight-bold text-danger" colspan="2"><?php echo number_format($total)?>đ</td>
                </tr>
        </tbody>
    </table>
    </div>    

