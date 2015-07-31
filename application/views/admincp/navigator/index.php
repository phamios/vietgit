<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">

                <?php if ($list_navigator <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order</th>
                            <th>Name</th> 
                            <th>Link</th>
                            <th>Active</th>
                            <th>Autoload</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_navigator as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td>
                                    
                                    <input type="hidden" name="menu_id_<?php echo $value->id ?>" value="<?php echo $value->id ?>" id="menu_id_<?php echo $value->id ?>" />
                                    <input type="text"   class="span4" name="menu_order_<?php echo $value->id ?>" value="<?php echo $value->mod_order ?>" id="menu_order_<?php echo $value->id ?>"/>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#menu_order_<?php echo $value->id ?>").on("change", function () {
                                                var id = $("#menu_id_<?php echo $value->id ?>").val();
                                                var order = $("#menu_order_<?php echo $value->id ?>").val();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo site_url('admincp/menu_update_order'); ?>/" + id + "/" + order,
                                                    success: function () {
                                                        $(".resultajax_<?php echo $value->id ?>").html("Thành công !");
                                                    },
                                                    error: function () {
                                                        $(".resultajax_<?php echo $value->id ?>").html("chưa thành công !");
                                                    }
                                                });
                                                return false;
                                            });

                                        });
                                    </script> 
                                    <div class="resultajax_<?php echo $value->id ?>"></div>   
                                </td>
                                <td><?php echo $value->mod_name ?></td> 
                                <td><?php echo $value->mod_link ?></td>
                                <td><?php echo $value->mod_active ?></td>
                                <td><?php echo $value->mod_autoload ?></td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admin/moduledmos/delete/' . trim($value->mod_name)); ?>">
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