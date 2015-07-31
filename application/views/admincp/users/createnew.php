
<script type="text/javascript">
    $('#upload').on('click', function () {
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data)
        $.ajax({
            url: '<?php echo site_url("product/uploadimage"); ?>', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                //ghi ra log trình duyệt để kiểm tra giá trị trả về
                console.log(php_script_response);
                $("#viewimage").append(php_script_response);
            }
        });
    });
</script>

<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Thêm mới Thành viên</h4>
                </div>
                <?php echo form_open_multipart('admincp/createuser'); ?> 
                <div class="modal-body">

                    <div class="tab-pane active in" id="home"> 
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input name="username" type="text"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input name="userpass" type="text"   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Loaị thành viên</label>
                            <select name="usertype" id="cateactive" class="form-control">
                                <option selected="selected"></option>
                                <option value="0" > admin</option>
                                <option value="9">editor</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><?php echo $this->lang->line('cateactive'); ?></label>
                            <select name="active" id="cateactive" class="form-control">
                                <option value="0" > Unactive</option>
                                <option value="1" selected="selected">Active</option>
                            </select>
                        </div>

                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button   class="btn btn-primary" name="btt_submit" type="submit">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>  
</div>