
<div class="col-md-12">
    <div class="table-responsive">
        <p></p>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>icon</th>
                <th width="10px;">Loại</th>
                <th>Tên ứng dụng</th>
                <th>Tên pakage</th>
                <th>Giới thiệu</th>
                <th>Link tải</th>
                <th>Ngày yêu cầu:</th>
                <th>Setting</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($list_request_app <> null): ?>
                <?php foreach ($list_request_app as $value): ?>
                    <tr>
                        <td>#<?php echo $value->appid ?></td>
                        <td>
                            <img src="<?php echo base_url('uploads/apps/'.$value->appicon);?>" alt="icon" width="10%"/>
                        </td>
                        <td>
                            <?php echo $value->apptype;?>
                        </td>
                        <td>
                            <?php echo $value->appname; ?>
                        </td>
                        <td><?php echo $value->pakagename;?></td>
                        <td>
                            <?php echo $value->appdescription; ?>

                        </td>
                        <td>
                            <?php echo $value->applink; ?>

                        </td>
                        <td>
                            <?php echo $value->requestdate; ?>
                        </td>
                        <td>
                            <a data-toggle="modal" class="btn btn-xs btn-primary" role="button" href="<?php echo site_url('admincp/editcateapp/' . trim($value->id)); ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="modal" role="button" class="btn btn-xs btn-danger" href="<?php echo site_url('admincp/delete_app/' . trim($value->id)); ?>">
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
    </div>
</div>