<div class="main"> 
    <div class="main-inner"> 
        <div class="container"> 
            <div class="row">	 
                <div class="span12"> 
                    <div id="target-1" class="widget"> 
                        <div class="widget widget-table action-table">
                            <div class="widget-header"> <i class="icon-th-list"></i>
                                <h3><a href="<?php echo site_url('admin/mail/add_mail'); ?>" class="btn btn-small btn-success"> Thêm mới </a></h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
                                    <thead> 
                                        <tr>
                                            <th> ID</th>
                                            <th> Địa chỉ Mail</th>
                                            <th>Mật khẩu</th>
                                            <th> Loại mail</th>
                                            <th class="td-actions"> </th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <?php if ($list_all_mail <> null): ?>
                                            <?php foreach ($list_all_mail as $value): ?>
                                                <tr>
                                                    <td> <?php echo $value->id ?> </td>
                                                    <td> <?php echo $value->email; ?> </td>
                                                    <td> <?php echo $value->mailpass; ?> </td>
                                                    <td> 
                                                        <?php if($value->mailtype == 1):?>
                                                            Mail gửi tin
                                                        <?php endif;?>
                                                        <?php if($value->mailtype == 2):?>
                                                            Mail hỗ trợ
                                                        <?php endif;?>
                                                        <?php if($value->mailtype == 3):?>
                                                            Mail verify tài khoản
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="td-actions">
                                                        <a href="<?php echo site_url('admin/mail/edit_mail/' . $value->id); ?>" class="btn btn-small btn-success">Sửa</a>
                                                        <a href="<?php echo site_url('admin/mail/del_mail/' . $value->id); ?>" class="btn btn-danger btn-small">Xoá</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /widget-content --> 
                        </div> 

                    </div>  

                </div>  


            </div>  

        </div> 
    </div>
</div>