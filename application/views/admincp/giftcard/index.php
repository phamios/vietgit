<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_gift <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ngày tạo</th>
                            <th>Tên người đặt</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Loại quà tặng</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_gift as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->gift_create ?></td>
                                <td><?php echo $value->gift_namefrom ?></td>
                                <td><?php echo $value->gift_name ?></td>
                                <td><?php echo $value->gift_address ?></td>
                                <td>
                                    <?php if ($value->gift_type == 1): ?>
                                        Quà tặng cao cấp
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 2): ?>
                                        Quà tặng khuyến mãi
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 3): ?>
                                        Quà tặng VIP
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 4): ?>
                                        Quà tặng sinh nhật
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 5): ?>
                                        Quà tặng tân gia
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 6): ?>
                                        Quà tặng khác
                                    <?php endif; ?>
                                    <?php if ($value->gift_type == 7): ?>
                                        Đăng ký tặng quà
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admincp/deletegift/' . trim($value->id)); ?>">
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