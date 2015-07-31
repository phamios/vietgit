  
<script type="text/javascript" src="<?php echo base_url('js'); ?>/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">

    tinymce.init({
        selector: "textarea",
        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false

    });

</script>


<div class="panel-heading" style="float:right;" > 
<!--    <a  class="btn btn-danger" href="<?php echo site_url('admincp/add_blog'); ?>" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>            -->
    <a  class="btn btn-danger" href="<?php echo site_url('admincp/add_blog'); ?>"   class="btn btn-info btn-danger" ><i class="fa fa-pencil"></i> Thêm mới</a>             
</div>



<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Loại</th>
                    <th>Tiêu đề</th> 
                    <th>Giới thiệu</th> 
                    <th>Tình trạng</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_blog as $blog): ?>
                    <tr>
                        <td>#<?php echo $blog->id ?></td>
                        <td><?php if ($blog->blog_type == 1): ?>
                                Blog
                            <?php //endif; ?>
                            <?php elseif ($blog->blog_type == 2): ?>
                                Gói Dịch vụ
                            <?php //endif; ?>
                            <?php else: //($blog->blog_type == 3): ?>
                                Khách 
                            <?php endif; ?>
                        </td>
                        <td><?php echo $blog->blog_title ?></td>
                        <td><?php echo $blog->blog_short ?></td>
                        <td><?php if ($blog->blog_active == 1): ?>
                                <label class="label label-success">Đang hoạt động</label>
                            <?php else: ?>
                                <label class="label label-warning">Đã Dừng</label> 
                            <?php endif; ?>
                        </td>
                        <td>
                            <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/edit_blog/' . trim($blog->id)); ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/del_blog/' . trim($blog->id)); ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        </td>
                    </tr> 

                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>



<!--EDIT-->
<div class="col-md-4">
    <?php if (isset($id)): ?>
        <?php foreach ($catedetails as $values): ?> 
            <?php echo form_open_multipart('admincp/catenews/' . $id); ?>

            <br> 
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home"> 
                    <div class="form-group">
                        <label><?php echo $this->lang->line('catename'); ?></label>
                        <input name="catename" type="text" value="<?php echo $values->catenewsname ?>"   class="form-control">
                    </div>

                    <div class="form-group">
                        <label><?php echo $this->lang->line('cateactive'); ?></label>
                        <select name="active" id="cateactive" class="form-control">
                            <option value="0" <?php if ($values->active == 0): ?> selected="selected"<?php endif; ?> > Unactive</option>
                            <option value="1" <?php if ($values->active == 1): ?> selected="selected"<?php endif; ?>  >Active</option>
                        </select>
                    </div>

                </div> 
            </div>

            <div class="btn-toolbar list-toolbar">
                <button class="btn btn-primary" name="btt_submitedit" type="submit"><i class="fa fa-save"></i> 
                    <?php echo $this->lang->line('save'); ?>
                </button> 
            </div>

            <?php echo form_close(); ?>
        <?php endforeach; ?>
    </div>   
<?php endif; ?>


