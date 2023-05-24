<div class="register">
            <div class="wrap">
                <div class="register-containt">
                    <div class="register-header">
                        <div class="register-link-sub">
                            <a href="./index.html">Trang chủ</a>
                            <i class="fas fa-chevron-right"></i>
                            <span>Thay đổi thông tin </span>
                        </div>
                        <div class="header-title">
                            <span>Thông tin cá nhân</span>
                        </div>
                    </div>
                    <div class="register-body">
                        <div class="register-left">
                            <div class="register-form-header">
                                Đăng ký tài khoản
                            </div>
                            <?php $info = $_SESSION['data']['userInfo'];?>
                           <form action="">
                                <div class="form-register">
                                        <div class="input-grroup">
                                            <label for=""> <span>Họ và tên</span> </label>
                                            <input type="text" value="<?php echo $info['TenKH']?>"placeholder="Họ và tên">
                                        </div>
                                        <div class="input-grroup">
                                            <label for=""> <span>Email</span></label>
                                            <input type="text" value="<?php echo $info['Email']?>"placeholder="">
                                        </div>
                                        <div class="input-grroup">
                                            <label for=""> <span>Mật khẩu</span> </label>
                                            <input type="password" value="<?php echo $info['MatKhau']?>"placeholder="">
                                        </div>
                                        <div class="input-grroup">
                                            <label for=""> <span>Xác nhận mật khẩu</span> </label>
                                            <input type="password" value="<?php echo $info['MatKhau']?>"placeholder="">
                                        </div>
                                        <div class="input-grroup">
                                            <label for=""> <span>Ngày sinh</span> </label>
                                            <input type="date" value="<?php echo $info['NgaySinh']?>"placeholder="">
                                        </div>
                                        <div >
                                            <button class="btn btn-register" type="submit">Lưu</button>
                                        </div>
                                    </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>