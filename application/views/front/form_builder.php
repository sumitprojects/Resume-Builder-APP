<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Resume :: ResumeBuilder</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/ui/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/ui/assets/css/live-resume.css">
    <script>
        const base_url = '<?=base_url()?>';
    </script>
    <style>
    main .contact-form .form-control {
        padding: 0 10px;
    }

    main .contact-card {
        width: 100%;
        border:1px solid #d6d6d6;
    }
    </style>
</head>

<body>
    <header>
        <nav class="collapsible-nav" id="collapsible-nav">
            <a href="<?=site_url('resume')?>" class="nav-link">HOME</a>
            <a href="<?=site_url('resume/add')?>" class="nav-link active">RESUME</a>
            <a href="<?=site_url('logout')?>" class="nav-link">LOGOUT</a>
        </nav>
        <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="<?=base_url()?>assets/ui/assets/images/hamburger.svg"
                alt="hamburger"></button>
    </header>
    <div class="content-wrapper">
        <main>
            <section class="contact-section">
                <h2 class="section-title">Add Your Data</h2>
                <p class="mb-4">Add your Details of Languages, Experience, Education etc.</p>
                <form action="#!" class="contact-form">
                    <input type="hidden" name="<?=$token?>" value="<?=$hash?>" />
                    <input type="hidden" name="userhash" value="<?=$user_id?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-card">
                                <h2>Personal Information</h2>
                                <div class="form-row">
                                    <div class="form-group form-group-email col-md-3 mx-2" data-bind="using: $root.user">
                                        <label for="user_email" class="sr-only">Email</label>
                                        <input type="email" readonly name="email" data-bind="value :user_email"
                                            class="form-control" placeholder="EMAIL">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: $root.person">
                                        <label for="name" class="sr-only">Full Name</label>
                                        <input type="text" name="name" data-bind="value :per_fullname"
                                            class="form-control" placeholder="NAME">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: $root.user">
                                        <label for="mobile" class="sr-only">Mobile</label>
                                        <input type="text" data-bind="value :user_mobile" class="form-control"
                                            placeholder="Mobile">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2" data-bind="using: person">
                                        <label for="dob" class="sr-only">DOB</label>
                                        <input type="date" data-bind="value :per_dob" class="form-control"
                                            placeholder="DOB">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: person">
                                        <label for="website" class="sr-only">Website</label>
                                        <input type="text" data-bind="value :per_website" class="form-control"
                                            placeholder="Website">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: person">
                                        <label for="per_location" class="sr-only">Address</label>
                                        <input type="text" data-bind="value :per_location" class="form-control"
                                            placeholder="Address">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2" data-bind="using: person">
                                        <label for="per_github" class="sr-only">Github</label>
                                        <input type="text" data-bind="value :per_github" class="form-control"
                                            placeholder="Github">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: person">
                                        <label for="per_fb" class="sr-only">Facebook</label>
                                        <input type="text" data-bind="value :per_fb" class="form-control"
                                            placeholder="Facebook">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2" data-bind="using: person">
                                        <label for="per_tw" class="sr-only">Twitter</label>
                                        <input type="text" data-bind="value :per_tw" class="form-control"
                                            placeholder="Twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="contact-card">
                                <h2>Education <small><button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: $root.addEdu"><i class="fas fa-plus"></i></button></small></h2>
                                <div class="form-row" data-bind="foreach: education">
                                    <div class="form-group form-group-name col-md-3">
                                        <label for="eduex_name" class="sr-only">Degree/Certificate</label>
                                        <input type="text" data-bind="value :eduex_name" class="form-control"
                                            placeholder="Degree/Certificate">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <label for="eduex_desc" class="sr-only">Start Date</label>
                                        <input type="date" data-bind="value :eduex_start_date" class="form-control"
                                            placeholder="Start Date">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <label for="eduex_desc" class="sr-only">End Date</label>
                                        <input type="date" data-bind="value :eduex_end_date" class="form-control"
                                            placeholder="End Date">
                                    </div>
                                    <div class="form-group form-group-name col-md-5 mr-2">
                                        <label for="eduex_title" class="sr-only">School/Univ</label>
                                        <input type="text" data-bind="value :eduex_title" class="form-control"
                                            placeholder="School/Univ">
                                    </div>
                                    <div class="form-group form-group-name col-md-5 mx-2">
                                        <label for="eduex_desc" class="sr-only">Description</label>
                                        <input type="text" data-bind="value :eduex_desc" class="form-control"
                                            placeholder="Description">
                                    </div>
                                    <div class="form-group form-group-name col-md-1">
                                        <button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: $root.removeEdu"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-card">
                                <h2>Experience <small><button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: $root.addExp"><i class="fas fa-plus"></i></button></small></h2>
                                <div class="form-row my-2" data-bind="foreach: $root.experience">
                                    <div class="form-group form-group-name col-md-3">
                                        <label for="eduex_name" class="sr-only">JobTitle</label>
                                        <input type="text" data-bind="value :eduex_name" class="form-control"
                                            placeholder="JobTitle">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <label for="eduex_desc" class="sr-only">Start Date</label>
                                        <input type="date" data-bind="value :eduex_start_date" class="form-control"
                                            placeholder="Start Date">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <label for="eduex_desc" class="sr-only">End Date</label>
                                        <input type="date" data-bind="value :eduex_end_date" class="form-control"
                                            placeholder="End Date">
                                    </div>
                                    <div class="form-group form-group-name col-md-5 mr-2">
                                        <label for="eduex_title" class="sr-only">Company</label>
                                        <input type="text" data-bind="value :eduex_title" class="form-control"
                                            placeholder="Company">
                                    </div>
                                    <div class="form-group form-group-name col-md-5 mx-2">
                                        <label for="eduex_desc" class="sr-only">Description</label>
                                        <input type="text" data-bind="value :eduex_desc" class="form-control"
                                            placeholder="Description">
                                    </div>
                                    <div class="form-group form-group-name col-md-1">
                                        <button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: $root.removeExp"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-card">
                                <h2>Language Skills <small><button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: addLang"><i class="fas fa-plus"></i></button></small></h2>
                                <div class="form-row" data-bind="foreach: langSkill">
                                    <input type="hidden" data-bind="value: lang_id">
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <label for="Language" class="sr-only">Language</label>
                                        <input class="form-control" type="text" data-bind="value: lang_name">
                                    </div>
                                    <div class="form-group form-group-name col-md-4 mx-2">
                                        <label for="level" class="sr-only">Level</label>
                                        <input class="form-control" type="text" data-bind="value: lang_level">
                                    </div>
                                    <div class="form-group form-group-name col-md-3 mx-2">
                                        <button class="btn btn-sm btn-primary rounded-pill"
                                            data-bind="click: $root.removeLang"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="button" data-bind="click: submitResume"
                                        class="btn btn-primary form-submit-btn">Save Resume</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <pre data-bind="text: ko.toJSON($root, null, 2)"></pre>

            </section>
            <footer>Live Resume @ <a href="https://www.bootstrapdash.com" target="_blank"
                    rel="noopener noreferrer">BootstrapDash</a>. All Rights Reserved 2020</footer>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/js/knockout.mapping-latest.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/@popperjs/core/dist/umd/popper-base.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/vendors/entry/jq.entry.min.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/js/live-resume.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/js/api.service.js"></script>
    <script src="<?=base_url()?>assets/ui/assets/js/model.js"></script>
</body>

</html>