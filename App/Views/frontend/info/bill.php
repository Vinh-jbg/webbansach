<div class="product-detail-containt">
            <div class="wrap">
                <div class="product-detail">
                    <div class="product-detail-header">
                        <a href="" class="home">Trang chủ</a>
                        <i class="fas fa-chevron-right"></i>
                        <!-- <a href="" class="product-portfolio">Trang chủ</a>
                        <i class="fas fa-chevron-right"></i> -->
                        <a href="" class="product-category">Đơn hàng</a>
                    </div>
                </div>
                <div class="bill-container">
                    <div class="billheader">
                        <span>Đơn hàng của tôi</span>
                    </div>
                    <!-- <div class="form-search-bill">
                        <div class="group-input-bill">
                            <span>Thời gian</span>
                            <select name="" id="">
                                <option value="">Tuần này</option>
                                <option value="">Khác</option>

                            </select>
                        </div>
                        <div class="group-input-bill">
                            <span>Chọn ngày</span>
                            <input type="date" name="" id="">
                            <input type="date" name="" id="">
                        </div>
                        <div class="group-input-bill">
                            <span>Mã đơn hàng</span>
                            <input type="text" name="" id="">
                            
                        </div>

                        <div class="group-btn">
                            <button id="search-bill">Tìm kiếm</button>
                        </div>
                    </div> -->
                    <div class="bill-body">
                        <table>
                            <th style="width: 7%">ID</th>
                            <th style="width: 20%">Ngày</th>
                            <th style="width: 20%">Khách hàng</th>
                            <th style="width: 15%">Tổng cộng</th>
                            <th style="width: 15%">Đã thanh toán</th>
                            <th style="width: 15%">Trạng thái</th>
                            <th style="width: 30%"> Thao tác</th>
                            <?php foreach($data['bill'] as $key => $value) {?>
                            <tr>
                                <td id="ID"><?php echo $value['MaHD']?></td>
                                <td><?php echo $value['NgayTao']?></td>
                                <td><?php echo $data['userInfo']['TenKH']?></td>
                                <td><?php echo $value['TongTien']?></td>
                                <td><?php  if($value['TinhTrang'] == 3) {
                                    echo "Đã thanh toán";
                                } else { echo "Chưa thanh toán";}?></td>
                                <td> <?php
                                if($value['TinhTrang'] == 0 ) {
                                    echo "Đang chờ xử lý";
                                } else if($value['TinhTrang'] == 1) {
                                    echo "Đã xử lý";
                                } else if ($value['TinhTrang'] == 2) {
                                    echo "Đang giao";
                                } else  {
                                    echo "Đã giao";
                                }
                                ?></td>
                                <td class="btn-detail">Xem chi tiết</td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>

                    <div id="bill-detail">

                    </div>
                </div>
            </div>
        </div>