<!-- slider -->

<?php
$theme_dir = 'theme/default/';
$assets_dir = 'assets/theme/default/';
$header_templete = ovoo_config('header_templete');
$slider_type = ovoo_config('slider_type');
$slider_fullwide = ovoo_config('slider_fullwide');
$slider_height = ovoo_config('slider_height') . 'px';
$slider_border_radius = ovoo_config('slider_border_radius') . 'px';
$slider_arrow = ovoo_config('slider_arrow');
$slider_bullet = ovoo_config('slider_bullet');
$total_movie_in_slider = ovoo_config('total_movie_in_slider');
?>
<?php if ($slider_type == "movie" || $slider_type == "video" || $slider_type == "image" || $slider_type == "tv"): ?>
    <style>
        .slider-content{
            height: <?php echo $slider_height; ?>;
            <?php if ($slider_fullwide == '1'): ?>
                margin-top: -20px;
            <?php endif; ?>
        }
        #slider {
            border-radius: <?php echo $slider_border_radius; ?>;    
        }
            .video-parent-class {
    margin: 0 auto;
}
.pause-play-img {
            position: absolute;
            top: 0;
            z-index: 99;
            /*margin-top: -50px;*/
            left: 48% !important;
            display: none;
            opacity: 0.4;
            width: 64px;
        }
@media only screen and (max-width: 500px){
.pause-play-img {
            position: absolute;
            top: 0;
            z-index: 99;
            /*margin-top: -50px;*/
            left: 43% !important;
            display: none;
            opacity: 0.4;
            width: 64px;
        }
}
@media only screen and (max-width: 350px){
.pause-play-img {
            position: absolute;
            top: 0;
            z-index: 99;
            /*margin-top: -50px;*/
            left: 38% !important;
            display: none;
            opacity: 0.4;
            width: 64px;
        }
}
        .video-parent-class:hover img.pause-play-img {
            display: block;
        }

        .video-parent-class {
            position: relative;
            width: 100% !important;
            height: 100% !important;
            cursor: pointer;
        }


        /*Floating CSS Start*/

        @keyframes fade-in-up {
            0% {
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .stuck {
            position: fixed;
            bottom: 20px;
            right: 20px;
            transform: translateY(100%);
            width: 260px;
            height: 145px;
            animation: fade-in-up .25s ease forwards;
            z-index: 999;
        }

        /*Floating CSS End*/

        video {
            /*margin-left: calc((100vw - (100vh * 1.7))/2);*/
            /*margin-right: calc((100vw - (100vh * 1.7))/2);*/
            /*min-height: 100vh;*/
            /*min-width: 100vw;*/
            width: 100% !important;
            height: 100% !important;
        }

        @media (min-aspect-ratio: 16/9) {
            video {
                margin-left: 0;
            }
        }
        iframe {
            /*margin-left: calc((100vw - (100vh * 1.7))/2);*/
            /*margin-right: calc((100vw - (100vh * 1.7))/2);*/
            /*min-height: 100vh;*/
            /*min-width: 100vw;*/
            width: 100% !important;
            height: 100% !important;
        }

        @media (min-aspect-ratio: 16/9) {
            iframe {
                margin-left: 0;
            }
        }

    </style>

    <div class="slider-content <?php
    if ($slider_fullwide != '1'): echo 'container';
    endif;
    ?>">
        <div id="slider" class="swiper-container-horizontal">
            <div class="swiper-wrapper">
                <?php
                if ($slider_type == "movie"):
                    $this->db->limit($total_movie_in_slider);
                    $this->db->order_by("videos_id", "desc");
                    $slider_videos = $this->db->get_where('videos', array('publication' => '1'))->result();
                    foreach ($slider_videos as $videos):
                        ?>
                        <div class="swiper-slide" style="background-image: url('<?php echo $this->common_model->get_video_poster_url($videos->videos_id); ?>');">
                            <a href="<?php echo base_url('watch/' . $videos->slug) . '.html'; ?>" class="slide-link" title="<?php echo $videos->title; ?>"> </a>
                            <span class="slide-caption">
                                <h2><?php echo $videos->title; ?></h2>
                                <p class="sc-desc"><?php echo substr(strip_tags($videos->description), 0, 220); ?></p>
                                <div class="slide-caption-info">
                                    <div class="block">
                                        <strong><?php echo trans('genre'); ?>: </strong>
                                        <?php
                                        if ($videos->genre != '' && $videos->genre != NULL):
                                            $i = 0;
                                            $genres = explode(',', $videos->genre);
                                            foreach ($genres as $genre_id):
                                                if ($i > 0) {
                                                    echo ',';
                                                } $i++;
                                                ?><?php echo $this->genre_model->get_genre_name_by_id($genre_id); ?>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                    <div class="block"><strong><?php echo trans('duration'); ?>:</strong> <?php echo $videos->runtime; ?></div>
                                    <div class="block"><strong><?php echo trans('release'); ?>:</strong> 2019</div>
                                    <div class="block"><strong>IMDb:</strong> <?php echo $videos->imdb_rating; ?></div>
                                </div>
                                <a href="<?php echo base_url('watch/' . $videos->slug) . '.html'; ?>" >
                                    <div class="btn btn-sm btn-success mt20" style="margin-top: 10px;"><?php echo trans('watch_now') ?></div>
                                </a>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($slider_type == "image"):
                    $all_published_slider = $this->common_model->all_published_slider();
                    foreach ($all_published_slider as $slider):
                        $action_url = $slider->action_url;
                        if ($slider->action_type == 'movie' || $slider->action_type == 'tvseries' || $slider->action_type == 'tv'):
                            if ($slider->action_type == 'movie' || $slider->action_type == 'tvseries'):
                                $action_url = base_url("watch/" . $this->common_model->get_slug_by_videos_id($slider->action_id) . '.html');
                            elseif ($slider->action_type == 'tv'):
                                $action_url = base_url("live-tv/" . $this->live_tv_model->get_slug_by_live_tv_id($slider->action_id) . '.html');
                            endif;
                        endif;
                        ?>
                        <div class="swiper-slide" style="background-image: url('<?php echo $slider->image_link; ?>');">
                            <?php if ($slider->action_type != 'disabled') { ?>
                                <a href="<?php echo $action_url; ?>" class="slide-link" title="<?php echo $slider->title; ?>"> </a>
                                <span class="slide-caption">
                                    <h2><?php echo $slider->title; ?></h2>
                                    <p class="sc-desc"><?php echo $slider->description; ?></p>
                                    <a href="<?php echo $action_url; ?>" >
                                        <div class="btn btn-sm btn-success mt20" style="margin-top: 10px;"><?php echo $slider->action_btn_text; ?></div>
                                    </a>
                                </span>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($slider_type == "video"):
                    $all_published_slider = $this->common_model->all_published_video_slider();
                    foreach ($all_published_slider as $slider):
                        $action_url = $slider->action_url;
                        if ($slider->action_type == 'movie' || $slider->action_type == 'tvseries' || $slider->action_type == 'tv'):
                            if ($slider->action_type == 'movie' || $slider->action_type == 'tvseries'):
                                $action_url = base_url("watch/" . $this->common_model->get_slug_by_videos_id($slider->action_id) . '.html');
                            elseif ($slider->action_type == 'tv'):
                                $action_url = base_url("live-tv/" . $this->live_tv_model->get_slug_by_live_tv_id($slider->action_id) . '.html');
                            endif;
                        endif;
                        ?>
                        <div class="swiper-slide" >
                            <?php if (strpos($slider->image_link, 'youtube') == false) { ?>
                                <video preload="auto"  autoplay="" muted="" src="<?php echo $slider->image_link; ?>">

                                </video>
                            <?php } else { ?>
                                <iframe
                                    src="<?php echo $slider->image_link; ?>?autoplay=1&mute=1&loop=1" frameborder="0" allowfullscreen>
                                </iframe>
                            <?php } ?>
                            <?php if ($slider->action_type != 'disabled') { ?>
                                <a href="<?php echo $action_url; ?>" class="slide-link" title="<?php echo $slider->title; ?>"> </a>
                                <span class="slide-caption">
                                    <h2><?php echo $slider->title; ?></h2>
                                    <p class="sc-desc"><?php echo $slider->description; ?></p>
                                    <a href="<?php echo $action_url; ?>" >
                                        <div class="btn btn-sm btn-success mt20" style="margin-top: 10px;"><?php echo $slider->action_btn_text; ?></div>
                                    </a>
                                </span>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($slider_type == "tv"):
                    $this->db->limit($total_movie_in_slider);
                    $this->db->order_by("live_tv_id", "desc");
                    $latset_tvs = $this->db->get_where('live_tv', array('publish' => '1'))->result();
                    foreach ($latset_tvs as $slider):
                        $action_url = base_url('live-tv/' . $slider->slug . '.html');
                        ?>
                        <div class="swiper-slide" style="background-image: url('<?php echo $this->live_tv_model->get_tv_poster($slider->poster); ?>');">
                            <a href="<?php echo $action_url; ?>" class="slide-link" title="<?php echo $slider->tv_name; ?>"> </a>
                            <span class="slide-caption">
                                <h2><?php echo $slider->tv_name; ?></h2>
                                <p class="sc-desc"><?php echo $slider->description; ?></p>
                                <a href="<?php echo $action_url; ?>" >
                                    <div class="btn btn-sm btn-success mt20" style="margin-top: 10px;"><?php echo trans("watch_now"); ?></div>
                                </a>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($slider_bullet == '1'): ?>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                <?php endif; ?>
                <?php if ($slider_arrow == '1'): ?>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/theme/default/'); ?>swiper/js/swiper.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        $(function () {
            var swiper = new Swiper('.swiper-container-horizontal', {
                lazy: true,
                effect: 'fade',
                loop: true,
                // autoplay: {
                //     delay: 5000,
                //     disableOnInteraction: true,
                // },
                effect: 'fade',
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                    // type: 'fraction',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

        });

    </script>
    <?php if ($slider_type == "video") { ?>
        <script>
            var v = document.getElementsByTagName("video")[0];

            v.addEventListener("canplay", function () {
                swiper.autoplay.start();
            }, true);

            v.addEventListener("ended", function () {
                swiper.autoplay.stop();
            }, true);
            /**** PAUSE PLAY BUTTON VIDEO ****/
              var plugin_url = "https://plugins.svn.wordpress.org/play-pause-button-for-video/trunk";
        jQuery(document).ready(function() {
            if (jQuery("video").length > 0) {
                jQuery("video").wrap("<div class='video-parent-class'></div>");
                /*Add image just before to vedio  */
                jQuery("<img class='pause-play-img' src='" + plugin_url + "/img/img01.png' >").insertBefore("video");
                jQuery("video").each(function(index) {
                    /*vedio parent div height width code*/
                    var vedio_width = jQuery(this).width();
                    var vedio_height = jQuery(this).height();
                    jQuery(".video-parent-class").css({
                        "width": vedio_width + "px",
                        "height": vedio_height + "px"
                    });

                    /*Pause Play image, middle width in vedio code*/
                    var half_width_vedio = vedio_width / 2;
                    var middle_object_width = half_width_vedio - 32;
                    jQuery(".pause-play-img").css({
                        "left": middle_object_width + "px"
                    });

                    /*Pause Play image middle height in vedio code*/
                    var half_height_vedio = vedio_height / 2;
                    var middle_object_heigh = half_height_vedio - 32;
                    jQuery(".pause-play-img").css({
                        "top": middle_object_heigh + "px"
                    });

                    /*Pause play and image src change code*/
                    jQuery(this).on("click", function() {
                        if (this.paused) {
                            this.play();
                            jQuery(this).prev().attr("src", plugin_url + "/img/img02.png");
                        } else {
                            this.pause();
                            jQuery(this).prev().attr("src", plugin_url + "/img/img01.png");
                        }


                    });


                    /*pause play image click vedio on off functionlity code*/
                    jQuery(this).prev().on("click", function() {
                        var myVideo = jQuery(this).next()[0];
                        if (myVideo.paused) {

                            myVideo.play();
                            jQuery(this).attr("src", plugin_url + "/img/img02.png");
                        } else {

                            myVideo.pause();
                            jQuery(this).attr("src", plugin_url + "/img/img01.png");
                        }

                    });
                    /*Floating js for HTML Video Start*/
                    var windows = jQuery(window);
                    var videoWrap = jQuery(this).parent();
                    var video = jQuery(this);
                    var videoHeight = video.outerHeight();
                    var videoElement = video.get(0);
                    windows.on('scroll', function() {
                        var windowScrollTop = windows.scrollTop();
                        var videoBottom = videoHeight + videoWrap.offset().top;
                        //alert(videoBottom);

                        if ((windowScrollTop > videoBottom)) {
                            if (!videoElement.paused) {
                                videoWrap.height(videoHeight);
                                video.addClass('stuck');
                                if (video.hasClass('stuck')) {
                                    video.attr("controls", "1");
                                }
                                video.prev().attr("src", plugin_url + "/img/img02.png");
                                jQuery(".scrolldown").css({ "display": "none" });
                            } else {
                                videoWrap.height('auto');
                                video.removeClass('stuck');
                                video.removeAttr('controls');
                                if (videoElement.paused) {
                                    video.prev().attr("src", plugin_url + "/img/img01.png");
                                }
                            }

                        } else {
                            videoWrap.height('auto');
                            video.removeClass('stuck');
                            video.removeAttr('controls');
                        }

                    });
                    /*Floating js for HTML Video End*/
                });
                /*After end vedio change image*/
                //                     var video = document.getElementsByTagName('video')[0];

                //                     video.onended = function(e) {
                //                         jQuery(".pause-play-img").attr("src", plugin_url + "/img/img01.png");
                //                     };
            }
        });
        </script>
    <?php } ?>
    <!-- END slider -->
<?php endif; ?>





