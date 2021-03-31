<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/share-modal.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<?php $share_url=base_url('user/login').'?ref='.$referral_code?>
<div class="card">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary mx-auto mb-2" data-toggle="modal" data-target="#exampleModal"> Share on social media </button>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('User Name'); ?></th>
                        <th><?php echo trans('Total_videos_created'); ?></th>
                        <th><?php echo trans('Signup Date'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($referrals as $value):
                        $title = '-';
                        $videos = 0;
                            $videos = $this->db->get_where('videos', array('created_by' => $value['user_id']))->num_rows();
                        ?>
                        <tr id='row_<?php echo $value['user_id']; ?>'>
                            <td><?php echo $sl++; ?></td>
                            <td><strong><?php echo $value['name']; ?></strong></td>
                            <td><strong><?php echo $videos; ?></strong></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($value['join_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form').parsley();

    });
    function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        $(".message").text("link copied");
    }
    function myFunction1() {
            var copyText = document.getElementById("myInput1");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        $(".message1").text("Code copied");
    }
</script>

<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-12">
            <div class="modal-header">
                <h5 class="modal-title">Invite to Earn</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div class="icon-container1 d-flex">
                    <div class="smd">
                        <a href="https://twitter.com/intent/tweet?text=Join Lookhu an earn on video creation&url=<?=$share_url?>" title="share on twtitter" target="_blank">

                            <i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i>
                            <p>Twitter</p>

                        </a>
                    </div>
                    <div class="smd">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$share_url?>" title="'+shareFacebookLabel+'" target="_blank">
                            <i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                            <p>Facebook</p>
                        </a>
                    </div>
                    <div class="smd">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$share_url?>&title=Join Lookhu an earn on video creation&summary=Join Lookhu an earn on video creation&source=<?=$share_url?>" title="share on twitter" target="_blank">

                            <i class="img-thumbnail fab fa-linkedin fa-2x" style="color: #010d9d;background-color: #f3f3f3;"></i>
                            <p>Linked In</p>

                        </a>
                    </div>
                    <div class="smd">
                        <a href="https://api.whatsapp.com/send?phone=&text=Join Lookhu an earn on video creation using the following url <?=$share_url?>" target="_blank">

                            <i class="img-thumbnail fab fa-whatsapp fa-2x " style="color: #73db93;background-color: #f3f3f3;"></i>
                            <p>Whatsapp</p>

                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> <label style="font-weight: 600">My Referral Code: <span class="message1"></span></label><br />
                <div class="row"> <input class="col-10 ur" type="url" readonly="" placeholder="" id="myInput1" value="<?=$referral_code?>" aria-describedby="inputGroup-sizing-default" style="height: 40px;"><button class="cpy" onclick="myFunction1()"><i class="fa fa-copy"></i></button>  </div>
            </div>
            <div class="modal-footer"> <label style="font-weight: 600">Referral Link <span class="message"></span></label><br />
                <div class="row"> <input class="col-10 ur" type="url" readonly="" placeholder="https://www.arcardio.app/acodyseyy" id="myInput" value="<?=$share_url?>" aria-describedby="inputGroup-sizing-default" style="height: 40px;"><button class="cpy" onclick="myFunction()"><i class="fa fa-copy"></i></button>  </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>