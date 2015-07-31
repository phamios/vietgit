<div class="panel-heading" style="float:right;" > 
    <a  class="btn btn-danger" data-toggle="page-alert" data-delay="4000" data-toggle-id="5" 
        class="btn btn-info btn-danger" href="<?php echo site_url('admincp/addproduct'); ?>">
        <i class="fa fa-pencil"></i> Thêm mới</a>            
</div>
<?php echo form_open_multipart('admincp/product'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->lang->line('search_filter'); ?>
    </div>
    <div class="panel-body form-inline" >  
        <label>Danh mục:</label> 
        <select name="cate_keyword" class="form-control"> 
            <option value="0" selected="selected">   </option>
            <?php foreach ($list_category as $cate): ?>
                <option value="<?php echo $cate->id; ?>"><?php echo $cate->catename; ?> </option>
            <?php endforeach; ?>
        </select>
        &nbsp;
        <label>Loại:</label> <input type="text" name="type_pro" class="form-control"/> &nbsp;
        <label>Giá:</label> <input type="text" name="main_cost" class="form-control"/> &nbsp;
        <label>Tình trạng:</label>
         <select name="status_keyword" class="form-control"> 
             <option value="" selected="selected">   </option>
            <option value="1">Đang hoạt động</option>
            <option value="0">Dừng</option> 
        </select>
        &nbsp;
    </div>
    <div id="custom-search-input" style="width: 95%; margin-left: 10px; padding-bottom: 10px;">
        <div class="input-group col-md-12">
            <input type="text" name="keyword" class="search-query form-control" placeholder="<?php echo $this->lang->line('search_content_input');?>" />
            <span class="input-group-btn">
                <button class="btn btn-danger" type="submit" name="btt_submit_search">
                    <span class=" glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<div class="clearfix" style="clear:both; padding:10px;"></div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <?php if ($list_product <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th><?php echo $this->lang->line('proname'); ?></th>
                            <th><?php echo $this->lang->line('procateid'); ?></th>
                            <th><?php echo $this->lang->line('protypeid'); ?></th>
                            <th><?php echo $this->lang->line('mainprice'); ?></th>
                            <th><?php echo $this->lang->line('secondprice'); ?></th>
                            <th><?php echo $this->lang->line('proactive'); ?></th>
                            <th><?php echo $this->lang->line('proorder'); ?></th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_product as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->proname ?></td>
                                <td><?php foreach ($list_category as $cate): ?>
                                        <?php if ($value->procateid == $cate->id): ?>
                                            <?php echo $cate->catename; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php if ($value->protypeid == 1): ?>
                                        Hot
                                    <?php elseif ($value->protypeid == 2): ?>
                                        Khuyến mại
                                    <?php elseif ($value->protypeid == 3): ?>
                                        Giảm giá
                                    <?php elseif ($value->protypeid == 4): ?>
                                        Giờ vàng
                                    <?php elseif ($value->protypeid == 5): ?>
                                        none
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?php echo $value->mainprice; ?>
                                </td>
                                <td><?php echo $value->secondprice; ?></td>

                                <td><?php if ($value->proactive == 1): ?>
                                        Chạy
                                    <?php else: ?>
                                        Dừng 
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $value->proorder ?></td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('product/update/' . $value->id); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a data-toggle="modal" role="button" href="<?php echo site_url('product/delete/' . $value->id); ?>">
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