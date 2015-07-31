  
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



<!--EDIT-->
<div class="col-md-12"> 
    <?php echo form_open_multipart('admincp/add_blog'); ?> 

        <br> 
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"> 
                <div class="form-group">
                    <label>Loại bài</label>
                    <select name="blog_type">
                        <option value="1">Blog</option>
                        <option value="2">Dịch vụ</option>
                        <option value="3">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tiêu đề blog </label>
                    <input name="blogname" type="text"   class="form-control">
                </div>
                <div class="form-group">
                    <label>Giới thiệu</label> 
                    <textarea name="blogshort"></textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="blogcontent"></textarea>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <select name="blogactive" id="cateactive" class="form-control">
                        <option value="0" > Unactive</option>
                        <option value="1" selected="selected">Active</option>
                    </select>
                </div>
            </div> 
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                Lưu
            </button> 
        </div>

        <?php echo form_close(); ?> 
</div>    


