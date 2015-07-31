 
<div class="panel-heading" style="float:right;" > 
    <a href="<?php echo site_url('admincp/add_media'); ?>"   class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>
</div>

<div class="row">
    <div class="col-md-12">

        <!--  Modals-->
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <p>Liệt kê video theo danh mục</p>
                <p>
                    <select value="cate_video" class="form-control" onchange="changeitem(this);">
                        <option value="100"></option>
                        <option value="99">All</option>
                        <?php if ($list_cate_video <> null): ?>
                            <?php foreach ($list_cate_video as $cate): ?>
                                <option value="<?php echo $cate->id ?>"> <?php echo $cate->catename ?> </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </p>
                <script type="text/javascript">
                        function changeitem(selectObj) {
                            var id = selectObj.value;
                            if (id < > 99) {
                                window.location.replace("<?php echo site_url('admincp/videos/') ?>/" + id);
                            }
                        }
                </script>
            </div> 
        </div>
        <!-- End Modals-->

    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selecctall').click(function(event) {  //on click 
            if (this.checked) { // check select status
                $('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

    });
</script>
<?php echo form_open_multipart('admincp/media/delete_all'); ?> 
<div class="col-md-12">
    <div class="table-responsive">
        <p></p> 
        <?php echo $pages ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selecctall"/>All</li></th>
                    <th>Id</th> 
                    <th>Danh mục</th> 
                    <th>Video</th> 
                    <th>Links</th>
                    <th>Thumbs</th> 
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($list_video <> null): ?>
                    <?php foreach ($list_video as $value): ?>
                        <tr>
                            <td><input class="checkbox1" type="checkbox" name="check[]" value="<?php echo $value->id ?>"></td>
                            <td>#<?php echo $value->id ?></td> 
                            <td><?php foreach ($list_cate_video as $cate): ?>
                                    <?php if ($cate->id == $value->cateid): ?>
                                        <?php echo $cate->catename; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php echo $value->video_name; ?> 

                            </td>
                            <td>
                                <a href="<?php echo $value->video_link; ?>">
                                    <?php echo $value->video_link; ?> 
                                </a>

                            </td>
                            <td>
                                <img src="<?php echo $value->video_image; ?>" width="60%"  alt="image"/>

                            </td> 
                            <td>
        <!--                                <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/editcateapp/' . trim($value->id)); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>-->
                                <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/delete_media/' . $this->session->userdata('admin_id') . '/' . trim($value->id)); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a> 
                            </td>
                        </tr> 

                    <?php endforeach; ?>
                <?php else: ?>
                    Chưa có dữ liệu
                <?php endif; ?>

            </tbody>
        </table>
        <button type="submit" name="btt_submit_del_all" class="btn btn-info btn-danger"> Xóa tất </button>
    </div> 
</div>

<?php echo form_close(); ?>




