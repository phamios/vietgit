<div id="dangnhap" class="section secondary-section">
<div class="container">
    <div class="row-fluid">
        <div class="span5 register-form centered">
            <h3>Đăng ký thành viên</h3>
             
             <?php echo form_open_multipart('dang-ky'); ?> 
                <div class="control-group">
                    <div class="controls"> 
                        <select name="usertype" class="span12">
                            <option value="1">Gói miễn phí</option>
                            <option value="2">Gói PRO</option>
                            <option value="3">Gói Premium</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="span12" type="text" id="name" name="username" placeholder="Tên đăng nhập" />
                        <div class="error left-align" id="err-name">Nhập tên đăng nhập</div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="span12" type="email" name="useremail" id="email" placeholder="Địa chỉ email" />
                        <div class="error left-align" id="err-email">Phải là địa chỉ email thực</div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="span12" type="password" id="name" name="userpass" placeholder="Mật khẩu" />
                        <div class="error left-align" id="err-comment">Nhập mật khẩu</div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button id="send-mail" type="submit" name="btt_regnow" class="message-btn">Gửi yêu cầu</button>
                    </div>
                </div>
             <?php echo form_close(); ?>
        </div>
    </div>

</div>
</div>