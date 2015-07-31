<h4>Thêm mới Media với link có sẵn</h4>
<?php echo form_open_multipart('admincp/add_media'); ?> 

<div class="form-group">
    <label><?php echo $this->lang->line('media_type'); ?></label>
    <select name="mediatype" id="cateactive" class="form-control" onchange="changeitem(this);">
        <option value="99" selected="selected"></option>
        <option value="0" > Hình ảnh</option>
        <option value="1" >Video</option>
    </select> 
</div>

<script type="text/javascript">
    function changeitem(selectObj) {
        var id = selectObj.value;
        if (id == 1) {
            $("#video_mode").show();
            $("#cate_video_mode").show();
            $("#cate_picture_mode").hide();
        } else if (id == 0) {
            $("#cate_picture_mode").show();
            $("#video_mode").hide();
            $("#cate_video_mode").hide();
        } else if (id == 99) {
            $("#cate_picture_mode").hide();
            $("#video_mode").hide();
            $("#youtube_mode").hide();
            $("#cate_video_mode").hide();
        }
    }
    function change_video_mode(Objs) {
        var id = Objs.value;
        if (id == 0) {
            $("#youtube_mode").show();
        }
    }
</script>

<div class="form-group" id="cate_picture_mode" style="display: none;">
    <label><?php echo $this->lang->line('media_cate'); ?></label>
    <select name="media_cateid_pictures" id="media_cateid_pictures" class="form-control">
        <option > </option>
        <?php foreach ($list_cate_image as $cate): ?>
            <option value="<?php echo $cate->id; ?>"  ><?php echo $cate->catename ?></option>
        <?php endforeach; ?> 
    </select>
</div> 

<div class="form-group" id="cate_video_mode"  style="display: none;">
    <label><?php echo $this->lang->line('media_cate'); ?></label>
    <select name="media_cateid_video" id="media_cateid_video" class="form-control">
        <option > </option>
        <?php foreach ($list_cate_video as $cate): ?>
            <option value="<?php echo $cate->id; ?>"  ><?php echo $cate->catename ?></option>
        <?php endforeach; ?> 
    </select>
</div>


<div class="form-group" id="video_mode" style="display: none;">
    <label>Loại video</label>
    <select name="video_mode" id="cateactive" class="form-control"  onchange="change_video_mode(this);" >
        <option  ></option>
        <option value="0" >Youtube</option>
        <option value="1"  >VIMEO</option>
    </select> 
</div> 


<div class="form-group" id="youtube_mode" style="display: none;">
    <label>Lấy theo: </label>
    <select name="youtube_mode" id="cateactive" class="form-control"  >
        <option value="0" >Single</option>
        <option value="1"  >Multiple file</option>
    </select> 
</div>




<div class="form-group">
    <label><?php echo $this->lang->line('media_link'); ?></label>
    <input name="media_link" type="text"   class="form-control">
</div>



 
<div class="form-group">
    <button   class="btn btn-primary" name="btt_submit_insertlink" type="submit">Save changes</button>
</div>
<?php echo form_close(); ?>