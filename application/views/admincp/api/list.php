<div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well"> 
            <p>YOUTUBE API: </p>
            <ul>
                <li>Category: <a target="_blank" href="<?php echo site_url('api/cate_by_user/' . $this->session->userdata('admin_id')) ?>"><?php echo site_url('api/cate_by_user/' . $this->session->userdata('admin_id')) ?></a></li>
                <li>Products: <?php echo site_url('api/pro_by_cate/' . $this->session->userdata('admin_id')) ?>/{category_id}</li>
            </ul>
        </div>
    </div>
</div> 
<div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well"> 
            <p>Tạo XML nội dung: </p>
            <ul>
                <li>Category: <a target="_blank" href="<?php echo site_url('news/export_category') ?>">Tạo</a></li>
                <li>Products: <a target="_blank" href="<?php echo site_url('news/export_content') ?>">Tạo</a></li>
            </ul>
        </div>
    </div>
</div>