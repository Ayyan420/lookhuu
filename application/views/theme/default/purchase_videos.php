<!-- Breadcrumb -->
<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase">
                        Profile Information
                    </h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>"><i class="fi ion-ios-home"></i>Home</a>
                    </li>
                    <li class="active">Purchase Videos</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->


<!-- Profile Section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="profiles-wrap">
                    <div class="sidebar col-md-3 col-sm-9">
                        <div class="sidebar-menu">
                            <div class="sb-title"><i class="fa fa-navicon mr5"></i> <?php echo trans("menu");?></div>
                            <ul>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/profile'); ?>">
                                        <i class="fi ion-ios-person-outline m-r-10"></i> <?php echo trans("profile");?>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/subscription'); ?>">
                                        <i class="fi ion-ios-briefcase-outline m-r-10"></i> <?php echo trans("my_subscription");?>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo base_url('my-account/purchase-videos'); ?>">
                                        <i class="fi ion-ios-briefcase-outline m-r-10"></i> <?php echo trans("my_purchase_videos");?>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/favorite'); ?>">
                                        <i class="fi ion-ios-heart-outline m-r-10"></i><?php echo trans("favorite");?>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/watch-later'); ?>">
                                        <i class="fi ion-ios-clock-outline m-r-10"></i> <?php echo trans("watch_later");?>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/update'); ?>">
                                        <i class="fi ion-edit m-r-10"></i> <?php echo trans("update_profile");?>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('my-account/change-password'); ?>">
                                        <i class="fi ion-key m-r-10"></i> <?php echo trans("change_password");?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pp-main col-md-9 col-sm-9">
                        <div class="ppm-head">
                            <div class="ppmh-title"><i class="fi ion-ios-briefcase-outline m-r-10"></i> <?php echo trans("my_purchase_videos");?></div>
                        </div>
                        <div class="ppm-content user-content row">
                            <style type="text/css">
                                .table>thead>tr>th{
                                    border-bottom:none;
                                }
                                .profiles-wrap .pp-main .ppm-content {
                                    color: #736e6e;
                                }
                            </style>
                            <?php 
                                $query = $this->subscription_model->get_videos_purchased();
                                if($query->num_rows() > 0):                           
                             ?>
                            <h3 class="text-center">Purchased Video</h3>
                            <table class="table table-striped" style="margin: 20px;width: 95%">
                                <thead>
                                    <tr>
                                        <th>#</th>                            
                                        <th><?php echo trans("video_title");?></th>
                                        <th><?php echo trans("purchase_date");?></th>
                                        <th><?php echo trans("start_date");?></th>
                                        <th><?php echo trans("end_date");?></th>
                                        <th><?php echo trans("status");?></th>
                                        <th><?php echo trans("action");?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sl = 1;

                                        foreach ($query->result_array() as $subscription):
                                    ?>
                                    <tr id='row_<?php echo $subscription['id'];?>'>
                                        <td><?php echo $sl++;?></td>
                                        <td><a href="<?php echo base_url('watch/'.$subscription['slug']).'.html';?>"><strong><?=$subscription['title']?></strong></a>
                                        </td>
                                        <td><?php echo date('d-m-Y', strtotime($subscription['created_date']));?></td>
                                        <td><?php echo date('d-m-Y H:i', strtotime($subscription['current_period_start']));?></td>
                                        <td><?php echo date('d-m-Y H:i', strtotime($subscription['current_period_end']));?></td>
                                        <td><?php echo $subscription['status'];?></td>
                                        <?php if($subscription['current_period_end']>date('Y-m-d H:i:s') && $subscription['status']=='active'){?>
                                        <td><a id="cancel-btn" class="btn btn-link btn-sm" href="#" onclick="vide_subscription_remove('<?php echo $subscription['id'];?>')">Cancel</td>
                                        <?php } ?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="text-center">
                                <h3><?php echo trans("no_record_found");?></h3>
                            </div>
                                    
                        <?php endif; ?>
                      
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Section -->


<!--sweet alert2 JS -->
<!-- ajax add to wish-list -->
<script type="text/javascript">
    function vide_subscription_remove(subscription_id='') {
        var table_row = '#row_' + subscription_id;
        var base_url = '<?php echo base_url();?>'
        url = base_url + 'subscription/cancel_video_subscription'
        swal({
            title: "Are you confirm to cancel?",
            text: "It will disable from your active subacription!!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3CB371',
            cancelButtonText: "Cancel",
            confirmButtonText: "Delete",
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: url,
                            type: 'POST',
                            data: 'id=' + subscription_id,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            console.log(response);
                            if(response.status =='success'){
                                swal("Success", "Cancel successfully!", "success");
                                //$("#cancel-btn").fadeOut(2000);
                                $(table_row).fadeOut(2000);
                            }else if(response.status =='login_error') {
                                swal('Login Error', "Please login to cancel", "error");
                            }else {
                                swal('Fail!!', "Unable to cancel!", "error");
//                                $(table_row).fadeOut(2000);
                            }
                            
                        })
                        .fail(function() {
                            swal('Oops...', response.message, response.status);
                        });
                });
            },
            allowOutsideClick: false
        });
    }
</script>
<!-- End ajax add to wish-list -->
