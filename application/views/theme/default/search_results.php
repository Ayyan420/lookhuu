<!-- owlcarousel -->
<link rel="stylesheet" type="text/css" href="https://lookhu.tv/assets/theme/default/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://lookhu.tv/assets/theme/default/css/owl-custom.css">
<link rel="stylesheet" type="text/css" href="https://lookhu.tv/assets/theme/default/css/owl.theme.default.min.css">
<script src="https://lookhu.tv/assets/theme/default/js/owl.carousel.js"></script>
<!-- owlcarousel -->
<!-- Breadcrumb -->
<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase"><?php echo '"'.$search_keyword.'" search results'; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Secondary Section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
            <!-- All Movies -->
            <?php if($total_rows>0){
                if($total_rows > 24){
                echo $links;
            }
            ?>
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php 
                            foreach ($all_published_videos as $videos) :?>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <?php include('thumbnail.php'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End All Movies -->
            <?php } ?>
              <!-- Upcomming Movies -->
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie movie-opt">
                    <div class="movie-heading overflow-hidden"> <span><?php echo trans('Search_From_tv_channels'); ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="owl-carousel live_tv_owl">
                    <?php
                    // $featured_tvs =$this->live_tv_model->get_featured_live_tv();
                    foreach ($searched_tv_series as $tv):
                    ?>

                    <div class="item">
                        <figure class="figure">
                            <?php if($tv['is_paid'] == '1'):?>
                                <span class="tv-ribbon">VIP</span> 
                            <?php endif; ?>                                                  
                            <a href="<?php echo base_url('live-tv/').$tv['slug'].'.html'; ?>">
                                <div>                                    
                                    <img class="owl-lazy" src="<?php echo base_url('uploads/default_image/tv_poster.jpg'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" />
                                </div>
                                <figcaption class="figure-caption "><?php echo $tv['tv_name']; ?></figcaption>
                            </a>
                        </figure>
                    </div>
                    <?php endforeach; ?>
                </div>
                <script type = "text/javascript" >
                    $('.live_tv_owl').owlCarousel({
                        stagePadding: 0,
                        /*the little visible images at the end of the carousel*/
                        loop: true,
                        rtl: false,
                        lazyLoad: true,
                        margin: 15,
                        center: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                        dots: false,
                        responsive: {
                            0: {
                                items: 2
                            },
                            600: {
                                items: 3
                            },
                            800: {
                                items: 4
                            },
                            1000: {
                                items: 4
                            },
                            1200: {
                                items: 5
                            }
                        }
                    }); 
                </script>
            </div>
            <?php if(!$searched_tv_series && $total_rows<=0){
               
                echo '<h4>Nothing found by "'.$search_keyword.'"</h4>';
            } ?>
        </div>
        <?php if($total_rows > 24){
                        echo $links;
                    }
        ?>
        
    </div>
</div>
<!-- Secondary Section -->
