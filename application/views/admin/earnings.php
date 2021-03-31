<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-9">
                    <br>
                </div>
                <div class="col-md-3">
                    <?php
                    if ($stripe_account_id == '') {
                        ?>
                        <a href="<?= base_url('admin/stripeconnect') ?>" class="btn btn-info mb-2"> Connect with Stripe</a>
                        <?php
                    } else {
                        ?>
                        <a href="<?= base_url('admin/stripepayout') ?>" class="btn btn-info mb-2"> Pay out $<?= $balance ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('Video Title'); ?></th>
                        <th><?php echo trans('debit'); ?></th>
                        <th><?php echo trans('credit'); ?></th>
                        <th><?php echo trans('Description'); ?></th>
                        <th><?php echo trans('Purchase at'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($earnings as $earning):
                        $title = '-';
                        if ($earning['video_id']) {
                            $title = $this->db->get_where('videos', array('videos_id' => $earning['video_id']))->row()->title;
                        }
                        ?>
                        <tr id='row_<?php echo $earning['id']; ?>'>
                            <td><?php echo $sl++; ?></td>
                            <td><strong><?php echo $title; ?></strong></td>
                            <td><strong><?php echo $earning['debit']; ?></strong></td>
                            <td><strong><?php echo $earning['credit']; ?></strong></td>
                            <td><?php echo $earning['description']; ?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($earning['created_at'])); ?></td>
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
</script>

<!-- select2-->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<!-- select2-->