<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Resume :: Resume</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/ui/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/ui/assets/css/live-resume.css">
</head>

<body>
    <div class="d-none" id="previewImage"></div>
    <header>
        <nav class="collapsible-nav" id="collapsible-nav">
            <a href="<?=site_url('resume')?>" class="nav-link active">HOME</a>
            <a href="<?=site_url('resume/add')?>" class="nav-link">RESUME</a>
            <a href="<?=site_url('logout')?>" class="nav-link">LOGOUT</a>
        </nav>
        <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="<?=base_url()?>assets/ui/assets/images/hamburger.svg"
                alt="hamburger"></button>
    </header>
    <div class="content-wrapper">
        <aside>
            <?php if(!empty($user_data['user_profile_pic'])):?>
            <div class="profile-img-wrapper">
                <img src="<?=base_url()?>assets/ui/assets/images/Profile.png" alt="profile">
            </div>
            <?php endif;?>
            <h1 class="profile-name"><?=$per_data['per_fullname']??'No Name'?></h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation"><?=$current_title?></span>
            </div>
            <nav class="social-links">
                <a href="<?=$per_data['per_fb']?? '#!'?>" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="<?=$per_data['per_tw']?? '#!'?>" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="<?=$per_data['per_github']?? '#!'?>" class="social-link"><i class="fab fa-github"></i></a>
            </nav>
            <div class="widget">
                <h5 class="widget-title">personal information</h5>
                <div class="widget-content">
                    <p>BIRTHDAY : <?=$per_data['per_dob']??'NA'?></p>
                    <p>WEBSITE : <?=$per_data['per_website']??'NA'?></p>
                    <p>PHONE : <?=$user_data['user_mobile']??'NA'?></p>
                    <p>MAIL : <?=$user_data['user_email']??'NA'?></p>
                    <p>Location : <?=$per_data['per_location']??'NA'?></p>
                    <!-- <button class="btn btn-download-cv btn-primary rounded-pill" id="download"> <img
                            src="<?=base_url()?>assets/ui/assets/images/download.svg" alt="download"
                            class="btn-img">DOWNLOAD CV </button>
                    <a id="btn-Convert-Html2Image" href="#">
                        Download
                    </a> -->
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">LANGUAGES</h5>
                        <?php foreach($lang_data as $key => $lang):?>
                        <p><?=$lang['lang_name']?> : <?=$lang['lang_level']?></p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">INTERESTS</h5>
                        <p>Video games</p>
                        <p>Finance</p>
                        <p>Basketball</p>
                        <p>Theatre</p>
                    </div>
                </div>
            </div> -->
        </aside>
        <main id="#resume-section">
            <section class="resume-section">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">EDUCATION</h2>
                        <ul class="time-line">
                            <?php foreach($edu_data as $key => $edu):?>
                            <li class="time-line-item">
                                <span
                                    class="badge badge-<?=!empty($edu['eduex_end_date'] &&  $edu['eduex_end_date'] !== '0000-00-00' )?'primary':'success'?>">
                                    <?=date('Y',strtotime($edu['eduex_start_date']))?> - <?=!empty($edu['eduex_end_date']) && $edu['eduex_end_date'] !== '0000-00-00'?date('Y',strtotime($edu['eduex_end_date'])):'Current'?></span>
                                <h6 class="time-line-item-title"><?=$edu['eduex_name']??'NA'?></h6>
                                <p class="time-line-item-subtitle"><?=$edu['eduex_title']??'NA'?></p>
                                <p class="time-line-item-content"><?=$edu['eduex_desc']??'NA'?></p>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">Experience</h2>
                        <ul class="time-line">
                            <?php foreach($exp_data as $key => $exp):?>
                            <li class="time-line-item">
                                <span class="badge badge-<?=!empty($exp['eduex_end_date']) &&  $exp['eduex_end_date'] !== '0000-00-00'?'primary':'success'?>">
                                    <?=date('Y',strtotime($exp['eduex_start_date']))?> - <?=!empty($exp['eduex_end_date']) && $exp['eduex_end_date'] !== '0000-00-00'?date('Y',strtotime($exp['eduex_end_date'])):'Current'?>
                                </span>
                                <h6 class="time-line-item-title"><?=$exp['eduex_name']??'NA'?></h6>
                                <p class="time-line-item-subtitle"><?=$exp['eduex_title']??'NA'?></p>
                                <p class="time-line-item-content"><?=$exp['eduex_desc']??'NA'?></p>
                            </li>
                            <?php endforeach;?>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- <section class="clients-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">CLIENTS</h2>
                <div class="client-logos-wrapper">
                    <div class="client-logo"><img src="<?=base_url()?>assets/ui/assets/images/Clients_1.svg" alt="logo"
                            class="w-100"></div>
                    <div class="client-logo"><img src="<?=base_url()?>assets/ui/assets/images/Clients_2.svg" alt="logo"
                            class="w-100"></div>
                    <div class="client-logo"><img src="<?=base_url()?>assets/ui/assets/images/Clients_3.svg" alt="logo"
                            class="w-100"></div>
                    <div class="client-logo"><img src="<?=base_url()?>assets/ui/assets/images/Clients_4.svg" alt="logo"
                            class="w-100"></div>
                </div>
            </section>
            <section class="services-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">SERVICES</h2>
                <div class="row">
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="<?=base_url()?>assets/ui/assets/images/001-target.svg" alt="target">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">web designing</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.</p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="<?=base_url()?>assets/ui/assets/images/003-idea.svg" alt="bulb">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Graphic design</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="<?=base_url()?>assets/ui/assets/images/002-development.svg" alt="development">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Development</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="<?=base_url()?>assets/ui/assets/images/004-smartphone.svg" alt="smartphone">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Mobile design</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- <section class="achievements-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">ACHIEVEMENTS</h2>
                <div class="achievement-cards-wrapper">
                    <div class="media achievement-card">
                        <img src="<?=base_url()?>assets/ui/assets/images/puzzle.svg" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">550+</h4>
                            <p class="achievement-card-description">COMPLETED PROJECTS</p>
                        </div>
                    </div>
                    <div class="media achievement-card">
                        <img src="<?=base_url()?>assets/ui/assets/images/team.svg" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">23K</h4>
                            <p class="achievement-card-description">HAPPY CLIENTS</p>
                        </div>
                    </div>
                    <div class="media achievement-card">
                        <img src="<?=base_url()?>assets/ui/assets/images/trophy.svg" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">55</h4>
                            <p class="achievement-card-description">AWARDS RECIEVED</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="testimonial-section">
                <div id="testimonialCarousel" class="testimonial-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="<?=base_url()?>assets/ui/assets/images/Profile.png" alt="profile"
                                class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="<?=base_url()?>assets/ui/assets/images/Profile.png" alt="profile"
                                class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="<?=base_url()?>assets/ui/assets/images/Profile.png" alt="profile"
                                class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </section> -->

            <footer>Live Resume @ <a href="https://www.iihtsrt.com" target="_blank" rel="noopener noreferrer">Sumit More
                    From IIHT SURAT</a>. All Rights Reserved 2020</footer>
        </main>
    </div>
    <script src="<?=base_url()?>assets/ui/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/@popperjs/core/dist/umd/popper-base.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/js/live-resume.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js">
    </script>
    <script>
    $(document).ready(function() {
        var element = $("#resume-section");

        // Global variable 
        var getCanvas;

        $("#download").on('click', function() {
            html2canvas(element, {
                onrendered: function(canvas) {
                    console.log(canvas);
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });
            var imgageData = getCanvas.toDataURL("image/png");

            // Now browser starts downloading  
            // it instead of just showing it 
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");

            $("#btn-Convert-Html2Image").attr(
                "download", "GeeksForGeeks.png").attr(
                "href", newData);
        });
    });
    </script>
</body>

</html>