<?php $active_menu = $this->session->userdata('active_menu'); ?>
<!-- Side-Nav-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if ($active_menu == 1) { echo " active "; } ?>" href="<?php echo base_url() . "admin/dashboard "; ?>"  style="<?=validate_user_menu(array(1))?>" >
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label"><?php echo trans('dashboard') ?></span>
            </a>
        </li>
        <li class="treeview <?php if ($active_menu == 6 || $active_menu == 8 || $active_menu == 9) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(6,8,9))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-video-camera" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('movie') ?> :: <?php echo trans('video') ?> </span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 6) {  echo " active "; } ?>" href="<?php echo base_url() . 'admin/videos_add/' ?>"  style="<?=validate_user_menu(array(6))?>" >
                        <i class="app-menu__icon fa fa-plus"></i>
                        <?php echo trans('new_movie_or_video') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 8) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/videos/' ?>"  style="<?=validate_user_menu(array(8))?>" >
                        <i class="app-menu__icon fa fa-list"></i>
                        <?php echo trans('all_movie_or_video') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 9) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/video_type/' ?>"  style="<?=validate_user_menu(array(9))?>" >
                        <i class="app-menu__icon fa fa-tags"></i>
                        <?php echo trans('movie_or_video_type') ?> </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 28 || $active_menu == 29 || $active_menu == 30) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(28,29,30))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-film" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('tv_series') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 29) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tvseries_add/' ?>"  style="<?=validate_user_menu(array(29))?>" >
                        <i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>
                        <?php echo trans('new_tv_series') ?></span>
                    </a>
                </li>
                <li><a class="treeview-item <?php if ($active_menu == 30) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tvseries/' ?>"  style="<?=validate_user_menu(array(30))?>" >
                        <i class="app-menu__icon fa fa-list" aria-hidden="true"></i>
                        <?php echo trans('all_tv_series') ?> </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 28) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tv_series_setting/' ?>"  style="<?=validate_user_menu(array(28))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('setting') ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 26 || $active_menu == 27 || $active_menu == 35 || $active_menu == 39) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(26,27,35,39))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-tv" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('tv') ?>&nbsp;
                    <span class="label label-danger"><?php echo trans('live') ?></span>
                </span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 35) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/manage_live_tv/new' ?>"  style="<?=validate_user_menu(array(35))?>" >
                        <i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>
                        <?php echo trans('new_tv_channel') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 26) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/manage_live_tv/' ?>"  style="<?=validate_user_menu(array(26))?>" >
                        <i class="app-menu__icon fa fa-list" aria-hidden="true"></i>
                        <?php echo trans('all_tv_channel') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 39) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/live_tv_category/' ?>"  style="<?=validate_user_menu(array(39))?>" >
                        <i class="app-menu__icon fa fa-tags" aria-hidden="true"></i>
                        <?php echo trans('category') ?> </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 27) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/live_tv_setting/' ?>"  style="<?=validate_user_menu(array(271))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('setting') ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 7) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/movie_importer/' ?>"  style="<?=validate_user_menu(array(7))?>" >
                <i class="app-menu__icon fa fa-search" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('search_and_import') ?></span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 2) { echo " active "; } ?>" href="<?php echo base_url(); ?>admin/country"  style="<?=validate_user_menu(array(2))?>">
                <i class="app-menu__icon fa fa-globe"></i>
                <span class="app-menu__label"><?php echo trans('country') ?></span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 3) { echo " active "; } ?>" href="<?php echo base_url(); ?>admin/genre"  style="<?=validate_user_menu(array(3))?>">
                <i class="app-menu__icon fa fa-archive"></i>
                <span class="app-menu__label"><?php echo trans('genre') ?></span>
            </a>
        </li>
        <li class="treeview <?php if ($active_menu == 4 || $active_menu == 5) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(4,5))?>" >
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-stack-overflow"></i>
                <span class="app-menu__label"><?php echo trans('slider') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 4) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/slider/' ?>"  style="<?=validate_user_menu(array(4))?>" >
                        <i class="app-menu__icon fa fa-stack-overflow"></i>
                        <?php echo trans('image_slider') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 401) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/video_slider/' ?>"  style="<?=validate_user_menu(array(401))?>" >
                        <i class="app-menu__icon fa fa-video-camera"></i>
                        <?php echo trans('video_slider') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 5) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/slider_setting/' ?>"  style="<?=validate_user_menu(array(5))?>" >
                        <i class="app-menu__icon fa fa-gears" aria-hidden="true"></i>
                        <?php echo trans('slider_setting') ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 31 || $active_menu == 32 || $active_menu == 33) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(31,32,33))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-comment"></i>
                <span class="app-menu__label"><?php echo trans('comments') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if ($active_menu == 31) {
                        echo " active ";
                    } ?>" href="<?php echo base_url() . 'admin/comments/' ?>"  style="<?=validate_user_menu(array(31))?>" ><i
                                class="app-menu__icon fa fa-comments"></i><?php echo trans('movie_or_tv_comments') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 33) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/comments/post_comments' ?>"  style="<?=validate_user_menu(array(33))?>" >
                        <i class="app-menu__icon fa fa-comments"></i>
                        <?php echo trans('post_comments') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 32) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/comments_setting/' ?>"  style="<?=validate_user_menu(array(32))?>" >
                        <i class="app-menu__icon fa fa-gears"></i>
                        <?php echo trans('comments_setting') ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 10 || $active_menu == 11) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(10,11))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-file" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('pages') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 10) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/pages_add/' ?>"  style="<?=validate_user_menu(array(10))?>" >
                        <i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>
                        <?php echo trans('new_pages') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 11) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/pages/' ?>"  style="<?=validate_user_menu(array(11))?>" >
                        <i class="app-menu__icon fa fa-list" aria-hidden="true"></i>
                        <?php echo trans('all_pages') ?> </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($active_menu == 12 || $active_menu == 13 || $active_menu == 14) { echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(12,13,14))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon  fa fa-pencil-square-o" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('post') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 12) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/posts_add/' ?>"  style="<?=validate_user_menu(array(12))?>" >
                        <i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>
                        <?php echo trans('new_post') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 13) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/posts/' ?>"  style="<?=validate_user_menu(array(13))?>" >
                        <i class="app-menu__icon fa fa-list" aria-hidden="true"></i>
                        <?php echo trans('all_post') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 14) {
                        echo " active "; } ?>" href="<?php echo base_url() . 'admin/post_category/' ?>"  style="<?=validate_user_menu(array(14))?>" >
                        <i class="app-menu__icon fa fa-tags" aria-hidden="true"></i>
                        <?php echo trans('category') ?> </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 25) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/manage_star' ?>"  style="<?=validate_user_menu(array(25))?>" >
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label"><?php echo trans('actor_or_director') ?></span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 15) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/manage_user' ?>"  style="<?=validate_user_menu(array(15))?>" >
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label"><?php echo trans('users') ?></span>
            </a>
        </li>
         <li>
             <a class="app-menu__item <?php if ($active_menu == 1501) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/user_role_manage' ?>" style="<?=validate_user_menu(array(1501))?>" >
                <i class="app-menu__icon fa fa-user-plus"></i>
                <span class="app-menu__label"><?php echo trans('users roles') ?></span>
            </a>
        </li>
         <li>
             <a class="app-menu__item <?php if ($active_menu == 1502) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/earnings' ?>" style="<?=validate_user_menu(array(1502))?>" >
                <i class="app-menu__icon fa fa-money"></i>
                <span class="app-menu__label"><?php echo trans('Earnings') ?></span>
            </a>
        </li>
         <li>
             <a class="app-menu__item <?php if ($active_menu == 1503) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/referrals' ?>" style="<?=validate_user_menu(array(1503))?>" >
                <i class="app-menu__icon fa fa-share"></i>
                <span class="app-menu__label"><?php echo trans('Referrals') ?></span>
            </a>
        </li>
        
        <li class="treeview <?php if ($active_menu == 16 || $active_menu == 17 || $active_menu == 18 || $active_menu == 19 || $active_menu == 20 || $active_menu == 21 || $active_menu == 22 || $active_menu == 24 || $active_menu == 34 || $active_menu == 350 || $active_menu == 78 || $active_menu == 79 || $active_menu == 80 || $active_menu == 160 || $active_menu == 161 || $active_menu == 162 || $active_menu == 40) {echo " is-expanded "; } ?>"  style="<?=validate_user_menu(array(16,17,18,19,20,21,22,24,34,350,78,79,80,160,161,162,40))?>" >
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-gears" aria-hidden="true"></i>
                <span class="app-menu__label"><?php echo trans('setting') ?></span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php if ($active_menu == 160) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/system_setting/' ?>"  style="<?=validate_user_menu(array(160))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('system_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 16) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/theme_options/' ?>"  style="<?=validate_user_menu(array(16))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('theme_options') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 40) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/android_setting/' ?>"  style="<?=validate_user_menu(array(40))?>" >
                        <i class="app-menu__icon fa fa-android" aria-hidden="true"></i>
                        <?php echo trans('android_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 17) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/email_setting/' ?>"  style="<?=validate_user_menu(array(17))?>" >
                        <i class="app-menu__icon fa fa-envelope" aria-hidden="true"></i>
                        <?php echo trans('email_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 18) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/logo_setting/' ?>"  style="<?=validate_user_menu(array(18))?>" >
                        <i class="app-menu__icon fa fa-picture-o"  aria-hidden="true"></i>
                        <?php echo trans('logo_and_favicon') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 19) {  echo " active "; } ?>" href="<?php echo base_url() . 'admin/footer_setting/' ?>"  style="<?=validate_user_menu(array(19))?>" >
                        <i class="app-menu__icon fa fa-list-alt" aria-hidden="true"></i>
                        <?php echo trans('footer_content') ?> </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 20) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/seo_setting/' ?>"  style="<?=validate_user_menu(array(20))?>" >
                        <i class="app-menu__icon fa fa-facebook" aria-hidden="true"></i>
                        <?php echo trans('seo_and_socials') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 21) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/ad_setting/' ?>"  style="<?=validate_user_menu(array(21))?>" >
                        <i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i>
                        <?php echo trans('ads_and_banner') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 79) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/mobile_ads_setting/' ?>"  style="<?=validate_user_menu(array(79))?>" >
                        <i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i>
                        <?php echo trans('mobile_ads_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 162) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/api_setting/' ?>"  style="<?=validate_user_menu(array(162))?>" >
                        <i class="app-menu__icon fa fa-exchange" aria-hidden="true"></i>
                        <?php echo trans('api_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 22) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/social_login_setting/' ?>"  style="<?=validate_user_menu(array(22))?>" >
                        <i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i>
                        <?php echo trans('social_login') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 24) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/video_quality/' ?>"  style="<?=validate_user_menu(array(24))?>" >
                        <i class="app-menu__icon fa fa-signal" aria-hidden="true"></i>
                        <?php echo trans('movie_or_video_quality') ?> </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 34) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/player_setting/' ?>"  style="<?=validate_user_menu(array(34))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('player_options') ?> </span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 350) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/copyright_privacy/' ?>"  style="<?=validate_user_menu(array(350))?>" >
                        <i class="app-menu__icon fa fa-copyright" aria-hidden="true"></i>
                        <?php echo trans('copyright_and_privacy') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 78) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/cron_setting/' ?>"  style="<?=validate_user_menu(array(78))?>" >
                        <i class="app-menu__icon fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo trans('cron_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 80) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/tmdb_setting/' ?>"  style="<?=validate_user_menu(array(80))?>" >
                        <i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>
                        <?php echo trans('tmdb_setting') ?></span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php if ($active_menu == 161) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/update/' ?>"  style="<?=validate_user_menu(array(161))?>" >
                        <i class="app-menu__icon fa fa-upload" aria-hidden="true"></i>
                        <?php echo trans('update') ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 179) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/language_setting' ?>"  style="<?=validate_user_menu(array(179))?>" >
                <i class="app-menu__icon fa fa-language"></i>
                <span class="app-menu__label"><?php echo trans('language') ?></span>
            </a>
        </li>
        <li class="treeview <?php if($active_menu==301 || $active_menu==302 || $active_menu==303|| $active_menu==3001 || $active_menu==3002 || $active_menu==3003) {echo "is-expanded"; } ?>"  style="<?=validate_user_menu(array(301,302,303,3001,3002,3003))?>" > 
            <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-coffee"></i><span class="app-menu__label">SUBSCRIPTION</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?php if($active_menu==301) {echo "active"; } ?>" href="<?php echo base_url().'subscription/package/'?>" style="<?=validate_user_menu(array(301))?>" ><i class="app-menu__icon fa  fa fa-check"></i><?php echo trans("package");?> </a></li>
            <li><a class="treeview-item <?php if($active_menu==3002) {echo "active"; } ?>" href="<?php echo base_url().'subscription/payment_setting'?>"  style="<?=validate_user_menu(array(3002))?>" ><i class="app-menu__icon fa fa fa-dollar" aria-hidden="true"></i><?php echo trans("payment_setting");?></a></li>
            <li><a class="treeview-item <?php if($active_menu==302) {echo "active"; } ?>" href="<?php echo base_url().'subscription/sub_setting'?>"  style="<?=validate_user_menu(array(302))?>" ><i class="app-menu__icon fa fa fa-wrench" aria-hidden="true"></i><?php echo trans("setting");?></a></li>
            <li><a class="treeview-item <?php if($active_menu==3001) {echo "active"; } ?>" href="<?php echo base_url().'subscription/transaction_history'?>"  style="<?=validate_user_menu(array(3001))?>" ><i class="app-menu__icon fa fa fa-clock-o" aria-hidden="true"></i><?php echo trans("transaction_log");?></a></li>
            <li><a class="treeview-item <?php if($active_menu==3003) {echo "active"; } ?>" href="<?php echo base_url().'subscription/video_transaction_history'?>"  style="<?=validate_user_menu(array(3003))?>" ><i class="app-menu__icon fa fa fa-clock-o" aria-hidden="true"></i><?php echo trans("Video_transaction_log");?></a></li>
          </ul>
        </li>
        <li class="treeview <?php if($active_menu == 36 || $active_menu == 37 || $active_menu == 370 || $active_menu == 371) {echo "is-expanded"; } ?>"  style="<?=validate_user_menu(array(37,370,371,36))?>" > <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-bell" aria-hidden="true"></i><span class="app-menu__label"><?php echo trans("notification");?></span> <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a class="treeview-item <?php if($active_menu==37) {echo "active"; } ?>" href="<?php echo base_url().'admin/send_live_tv_notification/'?>"  style="<?=validate_user_menu(array(37))?>" ><i class="app-menu__icon fa fa-paper-plane-o" aria-hidden="true"></i><?php echo trans("live_tv");?></span> </a></li>
              <li><a class="treeview-item <?php if($active_menu==370) {echo "active"; } ?>" href="<?php echo base_url().'admin/send_movie_tvseries_notification/'?>"  style="<?=validate_user_menu(array(370))?>" ><i class="app-menu__icon fa fa-paper-plane-o" aria-hidden="true"></i><?php echo trans("movie_and_tvseries");?></span> </a></li>
              <li><a class="treeview-item <?php if($active_menu==371) {echo "active"; } ?>" href="<?php echo base_url().'admin/send_web_notification/'?>"  style="<?=validate_user_menu(array(371))?>" ><i class="app-menu__icon fa fa-paper-plane-o" aria-hidden="true"></i><?php echo trans("webview");?></span> </a></li>
              <li><a class="treeview-item <?php if($active_menu==36) {echo "active"; } ?>" href="<?php echo base_url().'admin/push_notification_setting/'?>"  style="<?=validate_user_menu(array(36))?>" ><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i><?php echo trans("setting");?></span> </a></li>
            </ul>
          </li>
        <li>
            <a class="app-menu__item <?php if ($active_menu == 23) { echo " active "; } ?>" href="<?php echo base_url() . 'admin/backup_restore' ?>"  style="<?=validate_user_menu(array(23))?>" >
                <i class="app-menu__icon fa fa-database"></i>
                <span class="app-menu__label"><?php echo trans('backup') ?></span>
            </a>
        </li>
        
    </ul>
</aside>