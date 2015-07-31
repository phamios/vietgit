
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
    <?php echo form_open_multipart('admincp/requestapp'); ?>

    <br>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="home">
            <div class="form-group">
                <label>Loại ứng dụng</label>
                <select name="apptype"  class="form-control">
                    <option value="1">Youtube đơn lẻ</option>
                    <option value="2">Youtube Channel </option>
                    <option value="3">Youtube Playlist tổng hợp </option>
                    <option value="4">Ứng dụng Wallpaper </option>
                    <option value="5">Ứng dụng tin tức</option>
                </select>
            </div>
            <div class="form-group">
                <label>pakage name</label>
                <input name="pakageapp" type="text" disabled value="<?php echo "com.vietadmob.".trim(create_slug($this->session->userdata('admin_name'))) ?>"   class="form-control">
            </div>
            <div class="form-group">
                <label>Icon ứng dụng</label>
                <input name="appicon" type="file">
            </div>
            <div class="form-group">
                <label>Tên ứng dụng </label>
                <input name="appname" type="text"  class="form-control"">
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea name="appdesc"></textarea>
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


