<div class="main"> 
    <div class="main-inner"> 
        <div class="container"> 
            <div class="row"> 
                <div class="span12">       
                    <div class="widget "> 
                        <div class="widget-content"> 
                            <div class="tab-pane" id="formcontrols"> 
                                <?php foreach($mail_details as $value):?>
                                <?php echo form_open_multipart('admin/mail/edit_mail/'.$value->id, array("class" => "form-horizontal", "id" => "edit-profile")); ?>
                                <fieldset> 
                                    <div class="control-group">											
                                        <label class="control-label" for="firstname">Địa chỉ mail </label>
                                        <div class="controls">
                                            <input type="text" class="span6" name='mail_add' value="<?php echo $value->email;?>" id="firstname" value="">
                                        </div>  				
                                    </div>  
                                     <div class="control-group">											
                                        <label class="control-label" for="firstname">Mật khẩu</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name='mailpass' value="<?php echo $value->mailpass?>"  id="firstname" value="">
                                        </div>  				
                                    </div>  
                                    <div class="control-group">											
                                        <label class="control-label" for="firstname">Loại email</label>
                                        <div class="controls">
                                            <select name="email_type">
                                                <option value="0" <?php if($value->mailtype == 0):?>selected="selected"<?php endif;?> >Lựa chọn loại email</option>
                                                <option value="1"<?php if($value->mailtype == 1):?>selected="selected"<?php endif;?>>Mail gửi tin</option>
                                                <option value="2"<?php if($value->mailtype == 2):?>selected="selected"<?php endif;?>>Mail hỗ trợ</option>
                                                <option value="3"<?php if($value->mailtype == 3):?>selected="selected"<?php endif;?>>Mail verify tài khoản</option>
                                            </select>
                                        </div>  				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label" for="firstname">Nội dung email</label>
                                        <div class="controls">
                                            <i>Phần này chỉ giành cho verify tài khoản.</i><br/>
                                           <textarea wrap="soft" style="width: 550px;" cols="100" rows="3" placeholder="Cám ơn bạn đã đăng ký vào hệ thống, vui lòng click link bên dưới để kích hoạt..." name="emailcontent"><?php echo $value->emailcontent; ?></textarea>
                                        </div>  				
                                    </div>  
                                    <div class="form-actions">
                                        <button type="submit" name="btt_edit" class="btn btn-primary">Save</button>  
                                    </div>  
                                </fieldset>
                                <?php echo form_close(); ?>
                                <?php endforeach;?>
                            </div> 
                        </div> 
                    </div>  
                </div>  
            </div>   
        </div>  
    </div>  
</div>  