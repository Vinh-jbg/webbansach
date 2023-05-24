<h7 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h7>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th>Ngày tạo</th>
            <th>Tổng tiền bán</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total1 = 0;
            foreach ($data['bill'] as $key => $value) { 
                $total1 += $value['TongTien'];
                
                ?>
                <tr>
                    <td>  <?php echo $value['NgayTao'] ?></td>
                    <td> <?php echo $value['TongTien'] ?></td>
                </tr>
      <?php
    } ?>
        </tbody>
</table>
<h7 class="m-0 font-weight-bold text-primary">Danh sách phiếu nhập </h7>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th>Ngày nhập</th>
            <th>Tổng tiền nhập</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total2 = 0;
            foreach ($data['import'] as $key => $val) { 
                $total2 += $val['TongTien'];;
                
                ?>
                <tr>
                    <td>  <?php echo $val['NgayNhap'] ?></td>
                    <td><?php echo $val['TongTien'] ?></td>
                  </tr>
      <?php
    } ?>
        </tbody>
</table>