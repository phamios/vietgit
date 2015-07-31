
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('media_create_new'); ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#linkurl" data-toggle="tab">Nhập đường dẫn</a>
                    </li>
                    <li class=""><a href="#uploadlink" data-toggle="tab">Upload file</a>
                    </li> 
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade active in" id="linkurl">
                        <?php $this->load->view('admincp/media/add_link'); ?>
                    </div>


                    <div class="tab-pane fade" id="uploadlink">
                        <?php $this->load->view('admincp/media/upload_link'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
