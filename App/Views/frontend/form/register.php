<div class="register">
            <div class="wrap">
                <div class="register-containt">
                    <div class="register-header">
                        <div class="register-link-sub">
                            <a href="./index.php">Trang chủ</a>
                            <i class="fas fa-chevron-right"></i>
                            <span>Tạo tài khoản mới</span>
                        </div>
                        <div class="header-title">
                            <span>Chưa có tài khoản? Đăng ký ngay</span>
                        </div>
                    </div>
                    <div class="register-body">
                        <div class="register-left">
                           <form action="./index.php" method="POST" id="register-from">
                                <div class="register-form-header">
                                    Đăng ký tài khoản
                                </div>
                                <div class="form-register">
                                    <div class="group-input input-grroup">
                                        <label for=""> <span>Họ và tên</span> </label>
                                        <input type="text" name="name" rules="required" placeholder="Họ và tên">
                                        <span class="errMassage"></span>
                                    </div>
                                    <div class="group-input input-grroup">
                                        <label for=""> <span>Email</span></label>
                                        <input type="text"name="email" rules="required|email" placeholder="">
                                        <span class="errMassage"></span>
                                    </div>
                                    <div class="group-input input-grroup">
                                        <label for=""> <span>Mật khẩu</span> </label>
                                        <input type="password" name="password" rules="required|min:6" placeholder="">
                                        <span class="errMassage"></span>
                                    </div>
                                    <div class="group-input input-grroup">
                                        <label for=""> <span>Xác nhận mật khẩu</span> </label>
                                        <input type="password" name="password" rules="required|min:6" placeholder="">
                                        <span class="errMassage"></span>
                                    </div>
                                    <div class="group-input input-grroup">
                                        <label for=""> <span>Ngày sinh</span> </label>
                                        <input type="date" name="date"  rules="required" placeholder="">
                                        <span class="errMassage"></span>
                                    </div>
                                    <div class="group-input input-grroup radio">
                                        <label for=""> Giới tính</label>
                                        <input type="radio" name="gender" checked value="1" placeholder="">
                                        <span>Nữ</span>
                                        <input type="radio" name="gender" value="0" placeholder="">
                                        <span>Nam</span>
                                    </div>
                                    <div class=" input-grroup">
                                        <label for=""> <span>Mã xác nhận</span> </label>
                                        <input type="text" placeholder="">
                                        <img src="./img/index.jfif" alt="">
                                        <i class="fas fa-sync-alt"></i>
                                    </div>
                                    <p>Vui lòng nhập các chữ số ở hình bên cạnh.</p>
                                    <input type="text" hidden name="controller"  value="user" placeholder="">
                                    <input type="text" hidden name="action" value="checkRegister" placeholder="">
                                    <div >
                                        <button class="btn btn-register" type="submit">Đăng ký</button>
                                    </div>
                                </div>
                           </form>
                        </div>
                        <div class="register-right">
                            <div class="social register">
                                <span class="social-header">
                                    Đăng nhập bằng tài khoản khác
                                </span>
                                <div class="socail-group">
                                    <div class="social-item">
                                        <i class="fab fa-google"></i>
                                        <Span>Sign in with Google</Span>
                                    </div>
                                    <div class="social-item">
                                        <i class="fab fa-facebook-square"></i>
                                        <Span>Continue with Facebook</Span>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>