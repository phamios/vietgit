<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
<?php echo form_open_multipart('admincp/create_app'); ?> 
<div class="container">
    <div class="col-md-11">
        <?php echo $success; ?>
    </div>
    <div class="stepwizard"> 
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Thông tin ứng dụng</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Hình ảnh / Loại ứng dụng</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Chọn / Upload file</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>Hoàn thiện</p>
            </div>
        </div>
    </div>

    <div class="row setup-content" id="step-1">
        <div class="col-xs-11">
            <div class="col-md-11"> 
                <div class="form-group">
                    <label class="control-label">Tên ứng dụng (*)</label>
                    <input name="app_name"  maxlength="100" type="text" required="required" class="form-control" placeholder="Nhập tên ứng dụng"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Giới thiệu ứng dụng</label>
                    <textarea name="app_des" class="form-control" placeholder="Giới thiệu về ứng dụng" required="required"  rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Đổi tên Pakage <i>(tùy chọn)</i></label>
                    <input maxlength="100" type="text" name="pakage_app"  class="form-control" placeholder="com.ayolo.app.user<?php echo $this->session->userdata('admin_id'); ?>" />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Bước tiếp</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Danh mục & Loại
                </div>
                <div class="panel-body">
                    <p> 
                    <div class="form-group">
                        <label class="control-label">Loại ứng dụng</label>
                        <select required id="apptype" name="apptype" aria-required="true" class="form-control" onchange="changeitem(this);">
                            <option>Choose</option>
                            <?php foreach ($list_apptype as $apptype): ?>
                                <option value="<?php echo $apptype->id ?>"><?php echo $apptype->typename; ?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                    <script type="text/javascript">
                        function changeitem(selectObj) {
                            var id = selectObj.value;
                            var dataString = id;
                            $.ajax({
                                url: "<?php echo base_url() . 'index.php/admin/app/list_cate_app/'; ?>" + dataString,
                                type: 'POST',
                                data: dataString,
                                success: function (output_string) {
                                    $("#cateapp_list").html(output_string);
                                },
                                error: function () {
                                    alert('null');
                                }
                            });
                        }
                    </script>
                    <div class="form-group" id="cateapp"   >
                        <div id="cateapp_list">

                        </div> 
                    </div>
                    </p>
                </div>
                <div class="panel-footer">
                    *  Nhập đủ thông tin
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Ảnh đại diện
                </div>
                <div class="panel-body">
                    <p>
                    <div class="form-group">  
                        <div id="viewimage"></div>
                        <input id="sortpicture" type="file" name="sortpic" required="required" /> 
                        <br/>
                        <a href="#" id="upload_image" class="btn btn-primary btn-ng" data-toggle="modal" data-target="#processing-modal">Upload</a> 
                        <script type="text/javascript">
                            $('#upload_image').on('click', function () {
                                var file_data = $('#sortpicture').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data)
                                $.ajax({
                                    url: '<?php echo site_url("admin/app/uploadimage"); ?>', // point to server-side PHP script 
                                    dataType: 'text', // what to expect back from the PHP script, if anything
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (php_script_response) {
                                        $("#viewimage").append(php_script_response);
                                        $("#processing-modal").attr("style", "visibility: hidden")
                                    }
                                });
                            });
                        </script> 
                        <!-- --------- processing ----------------> 
                        <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="http://www.travislayne.com/images/loading.gif" class="icon" />
                                            <h4>Đang upload.... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- --------- processing ----------------> 
                    </div>
                    </p>
                </div>
                <div class="panel-footer">
                    * Nhập đủ thông tin
                </div>
            </div>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Bước tiếp</button>
        </div>

    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-10">
            <div class="col-md-10"> 
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Upload File / Gắn link file
                        </div>
                        <div class="panel-body">
                            <p> 
                            <div class="form-group">  
                                <div id="app_view"></div>
                                <input id="apkfile_" type="file" name="myfile_apk" required="required" /> 
                                <br/>
                                <a href="#" id="upload_apkfile" class="btn btn-primary btn-ng" data-toggle="modal" data-target="#processing-modal_apk">Upload</a> 
                                <script type="text/javascript">
                                    $('#upload_apkfile').on('click', function () {
                                        var file_data = $('#apkfile_').prop('files')[0];
                                        var form_data = new FormData();
                                        form_data.append('file', file_data)
                                        $.ajax({
                                            url: '<?php echo site_url("admin/app/upload_apk_file"); ?>', // point to server-side PHP script 
                                            dataType: 'text', // what to expect back from the PHP script, if anything
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            data: form_data,
                                            type: 'post',
                                            success: function (response) {
                                                $('#processing-modal_apk').empty();
                                                $("#result_apk").append(response);
                                            },
                                        });
                                    });
                                </script> 
                                <div id="result_apk"></div>
                                <!-- --------- processing ----------------> 
                                <div class="modal modal-static fade" id="processing-modal_apk" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <img src="http://www.travislayne.com/images/loading.gif" class="icon" />
                                                    <h4>Đang upload.... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- --------- processing ---------------->
                            </div>  
                        </div>


                        </p>
                    </div>
                    <div class="panel-footer">
                        *  Nhập đủ thông tin
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Bước tiếp</button>
            </div>



        </div>
    </div>
</div> 
<div class="row setup-content" id="step-4">
    <div class="col-xs-9">
        <div class="col-md-9">
            <h3> Ấn nút Build bên dưới để hoàn thành</h3> 
            <button name="btt_submit_addapp"   class="btn btn-success btn-lg pull-right" type="submit">Build!</button>
        </div>
    </div>
</div> 
<?php echo form_close(); ?>
 