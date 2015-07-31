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
        function change_uplink(Objs) {
            var id = Objs.value;
            if (id == 0) {
                $("#upload_image").show();
                $("#network_link").hide();

            }
            else if (id == 1) {
                $('#network_link').show();
                $('#upload_image').hide();
            }
            else if (id == 99) {
                $('#network_link').hide();
                $('#upload_image').hide();
            }
        }
</script>

<div class="form-group" id="cate_picture_mode" style="display: none;">
    <label><?php echo $this->lang->line('media_cate'); ?></label>
    <select name="media_cateid_pictures" id="media_cateid_pictures" class="form-control">
        <option > </option>
        <?php if ($list_catemedia <> null): ?>
            <?php foreach ($list_catemedia as $cate): ?>
                <option value="<?php echo $cate->id; ?>" ><?php echo $cate->media_name; ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
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


<div class="form-group" id="">
    <label>Link image</label>
    <select name="" id="media_cateid_pictures" class="form-control" onchange="change_uplink(this);">
        <option value="99" selected="selected"></option>
        <option value="0">Upload </option>
        <option value="1">URL</option>
    </select>
</div>

<div class="form-group" id="network_link" style="display:none;">
    <label><?php echo $this->lang->line('media_link'); ?></label>

    <input name="media_link" type="text"   class="form-control">
</div>
<div class="form-group" style="display:none;" id="upload_image">
    <label>upload</label>

    <div class="form-group">
        <label>Ảnh ( có thể chọn nhiều ảnh )</label>

        <div id="viewimage"></div>
        <input id="sortpicture" type="file" name="media_link" />

        <a href="#" id="upload">Upload</a>

        <script type="text/javascript">
        $('#upload').on('click', function() {
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
                success: function(php_script_response) {
                    $("#viewimage").append(php_script_response);
                }
            });
        });
        </script>
    </div>
</div>
<div class="form-group" id="">
    <label>Status</label>
    <select name="status" id="" class="form-control">
        <option value="99" selected="selected"></option>
        <option value="1">đang hoạt động </option>
        <option value="0">Đã dừng</option>
    </select>
</div>
<div class="form-group">
    <button   class="btn btn-primary" name="btt_submit_insertlink" type="submit">Save changes</button>
</div>
<?php echo form_close(); ?>