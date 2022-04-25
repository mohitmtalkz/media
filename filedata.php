<?php
if(isset($_GET['data'])) $media_file_name = json_decode(urldecode($_GET['data']), true);
if(isset($_GET['fn'])) $media_identity = $_GET['fn'];

$data= explode(",", $media_file_name);
$extention=array();
foreach ($data as $key => $value) {
    $ext =   pathinfo($value, PATHINFO_EXTENSION);
    if($ext=='jpg' || $ext=='png' || $ext=='jpeg' || $ext=='gif' || $ext=='tiff'){
        $extention['image'][]=$value;
    }else if($ext=='mp4'){
        $extention['videos'][]=$value;
    }else if($ext=='mp3' || $ext=='mpeg'){
        $extention['audio'][]=$value;
    }else if($ext=='pdf'){
        $extention['pdf'][]=$value;
    }else{
        $extention['other'][] = $value;
    }
}

?>

<link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--<link href="assets/css/core.css" rel="stylesheet" type="text/css" />-->
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />

<!-- ============================================================== 
Start right Content here 
============================================================== -->
<div class="content-page">
    <!--Start content--> 
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        <a href="#" data-filter="*" class="current">All</a>
                        <a href="#" data-filter=".videos">Videos</a>
                        <a href="#" data-filter=".audio">Audio</a>
                        <a href="#" data-filter=".image">Image</a>
                        <a href="#myCarousel" data-filter=".*">Other</a>
                    </div>
                </div>
            </div>

            
            
            
            <div class="row port">
                <div class="portfolioContainer m-b-15">
                    
                    
                    
               <?php
               if(isset($extention['videos'])){
               foreach ($extention['videos'] as $key => $videos) { ?>
                    <div class="col-sm-12 col-lg-12 col-md-12 videos">
                        <div class="product-list-box thumb">
                            <video width="100%" height="400" id="videoPlayer" controls="controls">
                                <source src="http://media.1mt.in/media/<?php echo $media_identity.'/'.$videos;?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    
               <?php }} ?>
                    
                <?php
                if(isset($extention['audio'])){
                foreach ($extention['audio'] as $key => $audio) { ?>
                    <div class="col-sm-6 col-lg-3 col-md-4 audio">
                        <div class="product-list-box thumb">
                            <audio id="videoPlayer" controls="controls" style="width: 240px; height: 209px;">
                                <source src="http://media.1mt.in/media/<?php echo $media_identity.'/'.$audio;?>" type="audio/ogg">
                                <source src="http://media.1mt.in/media/<?php echo $media_identity.'/'.$audio;?>" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                <?php } } ?>
              <?php 
              if(isset($extention['image'])){
              foreach ($extention['image'] as $key => $image) { ?>
                    <div class="col-sm-6 col-lg-3 col-md-4 image">
                        <div class="product-list-box thumb">
                            <a href="http://media.1mt.in/media/<?php echo $media_identity.'/'.$image;?>" class="image-popup" title="Screenshot-1">
                                <img src="http://media.1mt.in/media/<?php echo $media_identity.'/'.$image;?>" class="thumb-img" alt="work-thumbnail">
                                </a>
                        </div>
                    </div>
              <?php } } ?> 
              <?php
                if (isset($extention['pdf'])) {
                    foreach ($extention['pdf'] as $key => $pdf) {
                        ?>
                        <div class="col-sm-6 col-lg-3 col-md-4 pdf">
                            <div class="product-list-box thumb">
                                <object type="application/pdf">
                                    <a href="http://media.1mt.in/media/<?php echo $media_identity.'/'. $pdf; ?>">
                                        <img src="./assets/images/images.jpg" class="thumb-img" alt="work-thumbnail" style="height: 165px; width: 240px;">
                                    </a>
                                </object>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
				
				<?php
                if (isset($extention['other'])) {
                    foreach ($extention['other'] as $key => $other) {
                        ?>
                        <div class="col-sm-6 col-lg-3 col-md-4">
                            <div class="product-list-box thumb">
                               
                                    <a href="http://media.1mt.in/media/<?php echo $media_identity.'/'. $other; ?>">
                                        <img src="./assets/images/images.jpg" class="thumb-img" alt="work-thumbnail" style="height: 165px; width: 240px;">
                                    </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
				
                </div>
            </div>  
        </div>  

    </div> 

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        var $container = $('.portfolioContainer');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        $('.portfolioFilter a').click(function () {
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
</script>

<script>
    var videoPlayer = document.getElementById('videoPlayer');

    // Auto play, half volume.
//    videoPlayer.play()
//    videoPlayer.volume = 0.5;

    // Play / pause.
    videoPlayer.addEventListener('click', function () {
        if (videoPlayer.paused == false) {
            videoPlayer.pause();
            videoPlayer.firstChild.nodeValue = 'Play';
        } else {
            videoPlayer.play();
            videoPlayer.firstChild.nodeValue = 'Pause';
        }
    });
</script> 