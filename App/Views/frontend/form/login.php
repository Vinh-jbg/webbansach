<div class="modal" id="login-form">
            <div class="overlay"></div>
            <div class="form">
                <form action="./index.php" method="POST" id="login">
                        <div id="close">x</div>
                        <div class="login-form-header">
                            <h3 class="form-header">
                            Đăng nhập
                        </h3>
                        </div>
                        <div class="form-body">
                            <div class="group-input">
                                <label for="">Email</label>
                                <input type="text" name="email" rules="required|email" class="group-input-item">
                                <span class="errMassage"></span>
                            </div>
                            <div class="group-input">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" rules="required|min:6"class="group-input-item">
                                <span class="errMassage"></span>
                            </div>
                        </div>    
                        <div class="group-input-pw">
                            <label for="checkbox-1">
                                <input type="checkbox" id="checkbox-1" class="group-input-item">
                                Ghi nhớ thông tin</label>
                            <a href="" class="forget-password">Quên mật khẩu?</a>
                        </div>        
                        <input type="text" hidden name="action" value="checkLogin">
                        <input type="text" hidden name="controller" value="User">
                        <button type = "submit">Đăng nhập</button>
                        <div class="register-form">
                            <span>Chưa có tài khoản vui lòng</span>
                            <a href="?controller=user&action=register" class="register-link">
                                ĐĂNG KÝ
                            </a>
                        </div>    
                        <div  class="social">
                            <span class="social-header">
                                Hoặc đăng nhập bằng:
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
                </form>
            </div>
        </div>
