<div class="row">
    <?php echo form_open_multipart('admincp/configslide'); ?>
    <div class="col-md-8">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"> 
                <div class="form-group"> 
                    <div id="viewimage"></div>
                    <input id="sortpicture" type="file" name="sortpic" /> 
                    <a href="#" id="upload">Upload</a> 
                    <script type="text/javascript">
                        $('#upload').on('click', function () {
                            var file_data = $('#sortpicture').prop('files')[0];
                            var form_data = new FormData();
                            form_data.append('file', file_data)
                            if (file_data == null) {
                                alert('Bạn cần chọn ảnh trước !');
                            } else {
                                $.ajax({
                                    url: '<?php echo site_url("admincp/uploadimage"); ?>', // point to server-side PHP script 
                                    dataType: 'text', // what to expect back from the PHP script, if anything
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (php_script_response) {
                                        $("#viewimage").append(php_script_response);
                                    }
                                });
                            }
                        });
                    </script>
                </div> 
            </div>


        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                <?php echo $this->lang->line('save'); ?>
            </button>

        </div>
    </div> 
</div>

<?php echo form_close(); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_slide <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
    <!--                            <th>Link</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_slide as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><img width="20%" src="<?php echo base_url('uploads/' . $value->imagelink); ?>" alt=""/></td>
        <!--                                <td><input type="text"  value="<?php echo $value->slidelink ?>"/></td> -->
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admincp/deleteslide/' . $value->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div>