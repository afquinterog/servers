<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Server Helper</title>
        <link rel="icon" type="image/png" href="assets/images/favicon.png" />

        <!--Core CSS -->
        <link rel="stylesheet" href="assets/css/bulma.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/css/core_deep-blue.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
        

    </head>
    <body>
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>        
        
        <!-- Hero and nav -->
        <div class="hero hero-wavy is-relative is-theme-primary huge-pb">
            
            <nav class="navbar navbar-wrapper navbar-fade navbar-light is-transparent">
                <div class="container">
                    <!-- Brand -->
                    <div class="navbar-brand">
                        <a class="navbar-item" href="/">
                            {{-- <img class="light-logo" src="assets/images/logos/bulkit-white.svg" alt="">
                            <img class="dark-logo" src="assets/images/logos/bulkit-purple.svg" alt=""> --}}
                            <b>Server Monitor</b>
                        </a>
            
                        <!-- Sidebar Trigger -->
                        {{-- <a id="navigation-trigger" class="navbar-item hamburger-btn" href="javascript:void(0);">
                            <span class="menu-toggle">	
                                <span class="icon-box-toggle"> 	
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i> 
                                    </span>
                                </span>
                            </span>
                        </a> --}}
            
                        <!-- Responsive toggle -->
                        {{-- <div class="custom-burger" data-target="">
                            <a id="" class="responsive-btn" href="javascript:void(0);">
                                <span class="menu-toggle">	
                                    <span class="icon-box-toggle"> 	
                                        <span class="rotate">
                                            <i class="icon-line-top"></i>
                                            <i class="icon-line-center"></i>
                                            <i class="icon-line-bottom"></i> 
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div> --}}
                        <!-- /Responsive toggle -->
                    </div>
            
                    <!-- Navbar menu -->
                    <div class="navbar-menu">
                        <!-- Navbar Start -->
                        <div class="navbar-start">
                            <!-- Navbar item -->
                            {{-- <a class="navbar-item is-slide" href="landing-v2-features.html">
                                Features 2
                            </a> --}}
                            <!-- Navbar item -->
                            {{-- <a class="navbar-item is-slide" href="landing-v2-pricing.html">
                                Pricing
                            </a> --}}
                            <!-- Navbar item -->
                            <a class="navbar-item is-slide" href="app/">
                                Login
                            </a>
                        </div>
            
                        <!-- Navbar end -->
                        <div class="navbar-end">
                            <!-- Signup button -->
                            <div class="navbar-item">
                                <a href="#contact-us" class="button button-signup btn-outlined is-bold btn-align light-btn rounded raised">
                                    Sign up
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Hero image -->
            <div id="main-hero" class="hero-body">
                <div class="container has-text-centered">
                    <div class="columns is-vcentered">
                        <div class="column is-4 hero-caption">
                            <h1 class="title big-landing-title text-bold is-2">
                               Keep and eye on your servers
                            </h1>
                            <h2 class="subtitle is-5 light-text pt-10 pb-10">
                                Monitor different metrics, execute remote task, group your servers by categories
                            </h2>
                            <p class="pt-10 pb-10">
                                <a href="#contact-us" class="button button-cta light-btn btn-outlined is-bold rounded z-index-2">
                                    Get Started
                                </a>
                            </p>
                        </div>
                        <div class="column is-9 is-offset-1">
                            <!-- Hero mockup -->
                            <figure class="image">
                                <img class="levitate" src="assets/images/server-app-marketing2.png" alt="">
                            </figure>
                            <!-- /Hero mockup -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Hero image -->
        </div>
        <!-- /Hero and nav -->
        
        <!-- Feature Matrix -->
        <section class="section is-medium">
            <div class="container has-text-centered">
                <!-- Title -->
                <div class="section-title-wrapper has-text-centered">
                    <div class="bg-number">1</div>
                    <h2 class="section-title-landing">
                        An all in one platform
                    </h2>
                    <h4>New features added on a regular basis</h4>
                </div>
                <!-- /Title -->
        
                <div class="content-wrapper">
                    <div class="columns is-vcentered is-multiline has-text-centered">
                        <div class="column is-hidden-mobile"></div>
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded secondary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">dashboard</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    Central dashboard
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                    Simple and powerfull dashboard
                                </div>
                            </div>
                        </div>
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded secondary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">graphic_eq</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    Multi channel
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                   Keep track of different server metrics
                                </div>
                            </div>
                        </div>
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded secondary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">assessment</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    Analytics ready
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                    Realtime resource usage graphs
                                </div>
                            </div>
                        </div>
                        <!-- /Icon box -->
                        <div class="column is-hidden-mobile"></div>
                    </div>
        
                    <div class="columns is-vcentered has-text-centered">
                        <div class="column is-hidden-mobile"></div>
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded primary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">cloud</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    Cloud based
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                    Don't need to install any sofware
                                </div>
                            </div>
                        </div>
                        <!-- /Icon box -->
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded primary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">lock</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    Improved security
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                    Configure tokens to keep communication secure
                                </div>
                            </div>
                        </div>
                        <!-- /Icon box -->
                        <!-- Icon box -->
                        <div class="column is-3">
                            <div class="square-icon-box rounded primary">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="material-icons">account_circle</i>
                                    </div>
                                </div>
                                <div class="box-title">
                                    We can help you
                                </div>
                                <div class="box-text is-tablet-padded-lg">
                                    We can handle all the burden related to servers
                                </div>
                            </div>
                        </div>
                        <!-- /Icon box -->
                        <div class="column is-hidden-mobile"></div>
                    </div>
                    <div class="is-title-reveal pt-40 pb-40">
                        <a href="#contact-us" class="button button-cta btn-align primary-btn rounded raised">Get in touch</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Feature Matrix -->
        
        <!-- Feature -->
        <section class="section is-medium section-feature-grey">
            <div class="container">
                <div class="columns is-vcentered">
                    <!-- With the help of responsive modifiers, the text column is duplicated to ensure better readability both on desktop and mobile viewports -->
                    <div class="column is-4 is-offset-1 is-hidden-desktop is-hidden-tablet">
                        <div class="icon-subtitle"><i class="im im-icon-Speach-Bubble2"></i></div>
                        <h2 class="quick-feature">
                            Detailed monitoring
                        </h2>
                        <div class="title-divider"></div>
                        <span class="section-feature-description">Our server monitor collect important information from you server's 
                            and generate usefull reports that can support important decisions made.</span>
                    </div>
        
                    <div class="column is-6 has-text-centered">
                        <!-- Featured illustration -->
                        <img class="featured-svg levitate" src="assets/images/illustrations/mockups/landing2/cards-data.png" alt="">
                        <!-- /Featured illustration -->
                    </div>
        
                    <div class="column is-4 is-offset-1 is-hidden-mobile">
                        <div class="icon-subtitle"><i class="im im-icon-Bar-Chart4"></i></div>
                        <h2 class="quick-feature">
                            Detailed monitoring
                        </h2>
                        <div class="title-divider is-small"></div>
                        <span class="section-feature-description">Our server monitor collect important information from you server's 
                            and generate usefull reports that can support important decisions made.</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Feature -->
        
        <!-- Feature -->
        <section class="section is-medium">
            <div class="container">
                <div class="columns is-vcentered">
        
                    <div class="column is-4 is-offset-2">
                        <div class="icon-subtitle"><i class="im im-icon-Address-Book2"></i></div>
                        <h2 class="quick-feature">
                            Operations services
                        </h2>
                        <div class="title-divider is-small"></div>
                        <span class="section-feature-description">We can manage all your DevOps operations so you can focus on your business and not the server's supporting it.</span>
        
                    </div>
        
                    <div class="column is-6 has-text-centered">
                        <!-- Featured illustration -->
                        <img class="featured-svg levitate" src="assets/images/illustrations/mockups/landing2/customers.png" alt="">
                        <!-- /Featured illustration -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Feature -->
        
        <!-- Feature -->
        <section class="section is-medium section-feature-grey">
            <div class="container">
                <div class="columns is-vcentered">
        
                    <!-- With the help of responsive modifiers, the text column is duplicated to ensure better readability both on desktop and mobile viewports -->
                    <div class="column is-4 is-offset-1 is-hidden-desktop is-hidden-tablet">
                        <div class="icon-subtitle"><i class="im im-icon-Receipt-2"></i></div>
                        <h2 class="quick-feature">
                            Custom Tasks
                        </h2>
                        <div class="title-divider is-small"></div>
                        <span class="section-feature-description">Create shell tasks to run maintenance operations on your servers and also schedule it to run from time to time.</span>
                    </div>
        
                    <div class="column is-6 has-text-centered">
                        <!-- Featured illustration -->
                        <img class="featured-svg levitate" src="assets/images/server-app-tasks.png" alt="">
                        <!-- /Featured illustration -->
                    </div>
        
                    <div class="column is-4 is-offset-1 is-hidden-mobile">
                        <div class="icon-subtitle"><i class="im im-icon-Receipt-2"></i></div>
                        <h2 class="quick-feature">
                            Custom Tasks
                        </h2>
                        <div class="title-divider is-small"></div>
                        <span class="section-feature-description">Create shell tasks to run maintenance operations on your servers and also schedule it to run from time to time.</span>
                    </div>
                </div>
                <div class="has-text-centered is-title-reveal pt-40 pb-40">
                    <a href="#contact-us" class="button button-cta btn-align primary-btn rounded">Get Started</a>
                </div>
            </div>
        </section>
        <!-- /Feature -->
        
        <!-- Slanted feature Section -->
        <section id="business-types" class="section section-primary is-medium is-skewed-sm is-relative">
            <div class="container slanted-container is-reverse-skewed-sm">
                <div class="columns is-vcentered">
                    <!-- Content -->
                    <div class="column is-5 ">
                        <div>
                            <h2 class="quick-feature light-text">Alerts on Metrics Thresholds</h2>
                            <p class="light-text pt-10 pb-10">Define thresholds for server metrics and receive email and push notifications when the treshold has been passed.</p>
                            <div class="pb-10 pt-10">
                                <a href="#contact-us" class="button button-cta light-btn btn-outlined rounded is-bold">
                                    Try it free
                                </a>
                            </div> 
                        </div>
                    </div>
                    <!-- Featured image -->
                    <div class="column is-6 is-offset-1">
                        <img class="featured-svg levitate" src="assets/images/illustrations/mockups/landing2/stats.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- /Slanted feature Section -->
        
        <!-- Learning -->
        {{-- <section id="learning" class="section is-medium">
            <div class="container">
                <!-- Title -->
                <div class="section-title-wrapper has-text-centered">
                    <div class="bg-number">2</div>
                    <h2 class="section-title-landing">
                        Want to learn more ?
                    </h2>
                    <h4>We have a dedicated user training section</h4>
                </div>
                <!-- /Title -->
        
                <div class="content-wrapper">
                    <div class="columns is-vcentered">
                        <!-- Card -->
                        <div class="column is-4">
                            <div class="card ressource-card">
                                <div class="card-image">
                                    <div class="card-image-overlay secondary"></div>
                                    <figure class="image is-4by3 zoomOut">
                                        <img src="https://via.placeholder.com/1280x960" alt="">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <a href="#" class="color-secondary is-handwritten">Interacting with customers</a>
                                            <p class="subtitle is-6">Marketing ressources</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Card -->
        
                        <!-- Card -->
                        <div class="column is-4">
                            <div class="card ressource-card">
                                <div class="card-image">
                                    <div class="card-image-overlay"></div>
                                    <figure class="image is-4by3 zoomOut">
                                        <img src="https://via.placeholder.com/1280x960" alt="">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <a href="#" class="color-primary is-handwritten">Chat as a conversion tool</a>
                                            <p class="subtitle is-6">Marketing ressources</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Card -->
        
                        <!-- Card -->
                        <div class="column is-4">
                            <div class="card ressource-card">
                                <div class="card-image">
                                    <div class="card-image-overlay"></div>
                                    <figure class="image is-4by3 zoomOut">
                                        <img src="https://via.placeholder.com/1280x960" alt="">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <a href="#" class="color-primary is-handwritten">Recently added</a>
                                            <p class="subtitle is-6">New Ressources</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Card -->
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- /Learning -->
        
        <!-- Video CTA -->
        {{-- <section class="section is-cover section-primary is-large is-relative">
            <div class="columns is-vcentered">
                <div class="column is-4 is-offset-2">
                    <!-- Video -->
                    <div class="side-block">
                        <div class="background-wrapper">
                            <div id="video-embed" class="video-wrapper" data-url="https://www.youtube.com/watch?v=iaj8ktgL3BY">
                                <div class="video-overlay"></div>
                                <div class="playbutton">
                                    <div class="icon-play">
                                        <i class="im im-icon-Play-Music"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CTA -->
                </div>
        
                <div class="column is-4">
                    <div class="content padding-20">
                        <h2 class="title is-2 is-landing light-text no-margin-bottom">Watch some awesomeness.</h2>
                        <p class="light-text no-margin-bottom pt-10 pb-10">Lorem ipsum dolor sit amet, vim quidam blandit voluptaria no, has eu lorem convenire incorrupte. Vis mutat altera percipit ad, ipsum prompta ius eu. Sanctus appellantur.</p>
                        <div class="pt-10 pb-10">
                            <a href="#" class="button button-cta light-btn btn-outlined rounded is-bold">
                                Ask us a question
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- /Video CTA -->
        
        <!-- Clients grid -->
        {{-- <section id="trust" class="section section-feature-grey is-medium">
            <div class="container">
                <!-- Title -->
                <div class="section-title-wrapper has-text-centered">
                    <div class="bg-number"><i class="material-icons">domain</i></div>
                    <h2 class="section-title-landing"> We build Trust.</h2>
                    <div class="subtitle">More than <b>900 Teams</b> use our product.</div>
                </div>
        
                <div class="content-wrapper">
                    <!-- Grid -->
                    <div class="grid-clients five-grid">
                        <div class="columns is-vcentered">
                            <div class="column"></div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/gutwork.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/phasekit.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/grubspot.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/taskbot.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/systek.svg" alt=""></a>
                            </div>
                            <div class="column"></div>
                        </div>
                        <div class="columns is-vcentered is-separator">
                            <div class="column"></div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/infinite.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/tribe.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/powerball.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/kromo.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/covenant.svg" alt=""></a>
                            </div>
                            <div class="column"></div>
                        </div>
                        <div class="columns is-vcentered is-separator">
                            <div class="column"></div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/bitbreaker.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/evently.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/proactive.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/transfuseio.svg" alt=""></a>
                            </div>
                            <!-- Client -->
                            <div class="column">
                                <a><img class="client" src="assets/images/logos/custom/livetalk.svg" alt=""></a>
                            </div>
                            <div class="column"></div>
                        </div>
                    </div>
                    <!-- CTA -->
                    <div class="has-text-centered is-title-reveal pt-40 pb-40">
                        <a href="#" class="button button-cta btn-align raised rounded secondary-btn">Learn more about pricing</a>
                    </div>
                    <!-- /CTA -->
                </div>
            </div>
        </section> --}}
        <!-- Clients -->
        
        <!-- Contact form section -->
        <section class="section is-medium is-relative section-feature-grey footer-wavy">
            <div class="container">
                <!-- Title -->
                <div class="section-title-wrapper has-text-centered">
                    <div class="bg-number">3</div>
                    <h2 class="section-title-landing" id="contact-us">
                        Start using our application
                    </h2>
                    <h4>Dont struggle anymore to manage servers. Let us do the heavy work for you</h4>
                </div>
                <!-- /Title -->
        
                <div class="content-wrapper">
                    <!-- Form -->
                    <form action="/contact" method="POST">
                        @method('POST')
                        @csrf

                        <div class="columns">
                            <div class="column is-8 is-offset-2">
                                <div class="columns is-vcentered">
                                    <div class="column is-3">
                                        <!-- Form field -->
                                        <div class="control-material is-primary">      
                                            <input class="material-input" type="text" name='name' required>
                                            <span class="material-highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name *</label>
                                        </div>
                                        <!-- /Form field -->
                                    </div>
                                    <div class="column is-3">
                                        <!-- /Form field -->
                                        <div class="control-material is-primary">      
                                            <input class="material-input" type="text" name='email' required>
                                            <span class="material-highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email *</label>
                                        </div>
                                        <!-- /Form field -->
                                    </div>
                                    <div class="column is-3">
                                        <!-- Form field -->
                                        <div class="control-material is-primary">      
                                            <input class="material-input" type="text" name='company' required>
                                            <span class="material-highlight"></span>
                                            <span class="bar"></span>
                                            <label>Company *</label>
                                        </div>
                                        <!-- /Form field -->
                                    </div>
                                    <div class="column is-3">
                                        <button type="submit" class="button button-cta btn-align primary-btn btn-outlined is-bold rounded raised no-lh">I want it</button>
                                    </div>
                                </div>
                                <div class="bottom-spacer is-hidden-mobile"></div>
                            </div>
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>
        </section>
        <!-- /Contact form section -->
        
        <!-- Footer light -->
        <footer class="footer footer-light">
            <div class="container">
                <div class="columns footer-columns is-flex-mobile">
                    <!-- Column -->
                    {{-- <div class="column is-half-mobile">
                        <div class="footer-column">
                            <div class="footer-header">
                                <h3>Product</h3>
                            </div>
                            <ul class="link-list">
                                <li><a href="features.html">Discover features</a></li>
                                <li><a href="features.html">CMS integration</a></li>
                                <li><a href="#">Customers</a></li>
                                <li><a href="#">Weekly sessions</a></li>
                                <li><a href="#">Free trials and demo</a></li>
                                <li><a href="#">What's next ?</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- Column -->
                    {{-- <div class="column is-half-mobile">
                        <div class="footer-column">
                            <div class="footer-header">
                                <h3>Company</h3>
                            </div>
                            <ul class="link-list">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">About security</a></li>
                                <li><a href="#">User guide</a></li>
                                <li><a href="#">Terms of service</a></li>
                                <li><a href="#">Terms of website use</a></li>
                                <li><a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- Column -->
                    {{-- <div class="column is-half-mobile">
                        <div class="footer-column">
                            <div class="footer-header">
                                <h3>Learning</h3>
                            </div>
                            <ul class="link-list">
                                <li><a href="contact.html">Resources</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">API documentation</a></li>
                                <li><a href="#">Admin guide</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- Column -->
                    <div class="column is-half-mobile">
                        <div class="footer-column">
                            <div class="footer-logo">
                                {{-- <img src="assets/images/logos/bulkit-purple.svg" alt=""> --}}
                            </div>
                            <div class="footer-header">
                                <nav class="level is-mobile">
                                    <div class="level-left level-social">
                                        <a class="level-item">
                                            <span class="icon"><i class="fa fa-facebook"></i></span>
                                        </a>
                                        <a class="level-item">
                                            <span class="icon"><i class="fa fa-twitter"></i></span>
                                        </a>
                                        <a class="level-item">
                                            <span class="icon"><i class="fa fa-linkedin"></i></span>
                                        </a>
                                        <a class="level-item">
                                            <span class="icon"><i class="fa fa-dribbble"></i></span>
                                        </a>
                                        <a class="level-item">
                                            <span class="icon"><i class="fa fa-github"></i></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <div class="copyright">
                                <span class="moto dark-text">ServerMonitor <i class="fa fa-heart color-red"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer light -->        
        <!-- Side navigation -->
        <div class="side-navigation-menu">
            <!-- Categories menu -->
            <div class="category-menu-wrapper">
                <!-- Menu -->
                <ul class="categories">
                    <li class="square-logo"><img src="assets/images/logos/square-white.svg" alt=""></li>
                    <li class="category-link is-active" data-navigation-menu="demo-pages"><i class="sl sl-icon-layers"></i></li>
                    <li class="category-link" data-navigation-menu="components"><i class="sl sl-icon-grid"></i></li>
                    <li class="category-link" data-navigation-menu="extras"><i class="sl sl-icon-present"></i></li>
                </ul>
                <!-- Menu -->
        
                <ul class="author">
                    <li>
                        <!-- Theme author -->
                        <a href="https://cssninja.io" target="_blank">
                            <img class="main-menu-author" src="assets/images/logos/cssninja.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /Categories menu -->
        
            <!-- Navigation menu -->
            <div id="demo-pages" class="navigation-menu-wrapper animated preFadeInRight fadeInRight">
                <!-- Navigation Header -->
                <div class="navigation-menu-header">
                    <span>Demo pages</span>
                    <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                        <span class="menu-toggle">  
                            <span class="icon-box-toggle">  
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i> 
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
                <!-- Navigation Body -->
                <ul class="navigation-menu">
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">weekend</span>Agency kit</a>
                        <ul>
                            <li><a class="is-submenu" href="/agency/index.html">Homepage</a></li>
                            <li><a class="is-submenu" href="/agency/agency-about.html">About</a></li>
                            <li><a class="is-submenu" href="/agency/agency-portfolio.html">Portfolio</a></li>
                            <li><a class="is-submenu" href="/agency/agency-contact.html">Contact</a></li>
                            <li><a class="is-submenu" href="/agency/agency-blog.html">Blog</a></li>
                            <li><a class="is-submenu" href="/agency/agency-post-sidebar.html">Post sidebar</a></li>
                            <li><a class="is-submenu" href="/agency/agency-post-nosidebar.html">Post no sidebar</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">wb_incandescent</span>Startup kit</a>
                        <ul>
                            <li><a class="is-submenu" href="/startup/index.html">Homepage</a></li>
                            <li><a class="is-submenu" href="/startup/startup-about.html">About</a></li>
                            <li><a class="is-submenu" href="/startup/startup-product.html">Product</a></li>
                            <li><a class="is-submenu" href="/startup/startup-contact.html">Contact</a></li>
                            <li><a class="is-submenu" href="/startup/startup-login.html">Login</a></li>
                            <li><a class="is-submenu" href="/startup/startup-signup.html">Sign up</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">looks</span>Landing kit v1</a>
                        <ul>
                            <li><a class="is-submenu" href="/landing-kits/kit-1/index.html">Landing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-1/landing-features.html">Feature page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-1/landing-pricing.html">Pricing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-1/landing-login.html">Login page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-1/landing-signup.html">Signup page</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">invert_colors</span>Landing kit v2</a>
                        <ul>
                            <li><a class="is-submenu" href="/landing-kits/kit-2/index.html">Landing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-2/landing-v1-features.html">Feature page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-2/landing-v1-pricing.html">Pricing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-2/landing-v1-login.html">Login page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-2/landing-v1-signup.html">Signup page</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">chat_bubble</span>Landing kit v3</a>
                        <ul>
                            <li><a class="is-submenu" href="/landing-kits/kit-3/index.html">Landing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-3/landing-v2-features.html">Feature page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-3/landing-v2-pricing.html">Pricing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-3/landing-v2-login.html">Login page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-3/landing-v2-signup.html">Signup page</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">business</span>Landing kit v4</a>
                        <ul>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/index.html">Landing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-pricing.html">Pricing page</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-help.html">Help center</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-help-category.html">Help category</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-help-article.html">Help article</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-signup.html">Login</a></li>
                            <li><a class="is-submenu" href="/landing-kits/kit-4/landing-v3-login.html">Sign up</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">face</span>Landing kit v5</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/landing-kits/kit-5/index.html">Landing page</a></li>
                            <li><a class="is-submenu has-new-feature" href="/landing-kits/kit-5/landing-v4-features.html">Feature page</a></li>
                            <li><a class="is-submenu has-new-feature" href="/landing-kits/kit-5/landing-v4-pricing.html">Pricing Page</a></li>
                            <li><a class="is-submenu has-new-feature" href="/landing-kits/kit-5/landing-v4-login.html">Login / Signup</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /Navigation menu -->
            <!-- Navigation menu -->
            <div id="components" class="navigation-menu-wrapper animated preFadeInRight fadeInRight is-hidden">
                <!-- Navigation Header -->
                <div class="navigation-menu-header">
                    <span>Components</span>
                    <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                        <span class="menu-toggle">  
                            <span class="icon-box-toggle">  
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i> 
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
                <!-- Navigation body -->
                <ul class="navigation-menu">
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">view_quilt</span>Layout</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-grid.html">Grid system</a></li>
                            <li><a class="is-submenu" href="/_components-layout-video.html">Video background</a></li>
                            <li><a class="is-submenu" href="/_components-layout-parallax.html">Parallax</a></li>
                            <li><a class="is-submenu" href="/_components-layout-headers.html">Headers</a></li>
                            <li><a class="is-submenu" href="/_components-layout-footers.html">Footers</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-typography.html">Typography</a></li>
                            <li><a class="is-submenu" href="/_components-layout-colors.html">Colors</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">subject</span>Navbars</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-fade-light.html">Fade light</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-fade-dark.html">Fade dark</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-static-light.html">Static light</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-static-dark.html">Static dark</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-static-solid.html">Static solid</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-double-dark.html">Double dark</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-layout-navbar-double-light.html">Double light</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">view_stream</span>Sections</a>
                        <ul>
                            <li><a class="is-submenu" href="/_components-sections-features.html">Features</a></li>
                            <li><a class="is-submenu" href="/_components-sections-pricing.html">Pricing</a></li>
                            <li><a class="is-submenu" href="/_components-sections-team.html">Team</a></li>
                            <li><a class="is-submenu" href="/_components-sections-testimonials.html">Testimonials</a></li>
                            <li><a class="is-submenu" href="/_components-sections-clients.html">Clients</a></li>
                            <li><a class="is-submenu" href="/_components-sections-counters.html">Counters</a></li>
                            <li><a class="is-submenu" href="/_components-sections-carousel.html">Carousel</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">playlist_add_check</span>Basic UI</a>
                        <ul>
                            <li><a class="is-submenu" href="/_components-basicui-cards.html">Cards</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-buttons.html">Buttons</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-dropdowns.html">Dropdowns</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-lists.html">Lists</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-modals.html">Modals</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-tabs.html">Tabs & pills</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-accordion.html">Accordions</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-badges.html">Badges & labels</a></li>
                            <li><a class="is-submenu" href="/_components-basicui-popups.html">Popups</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">playlist_add</span>Advanced UI</a>
                        <ul>
                            <li><a class="is-submenu" href="/_components-advancedui-tables.html">Tables</a></li>
                            <li><a class="is-submenu" href="/_components-advancedui-timeline.html">Timeline</a></li>
                            <li><a class="is-submenu" href="/_components-advancedui-boxes.html">Boxes</a></li>
                            <li><a class="is-submenu" href="/_components-advancedui-messages.html">Messages</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-advancedui-megamenu.html">Megamenu</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-advancedui-calendar.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">check_box</span>Forms</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/_components-forms-inputs.html">Inputs</a></li>
                            <li><a class="is-submenu" href="/_components-forms-controls.html">Controls</a></li>
                            <li><a class="is-submenu" href="/_components-forms-layouts.html">Form layouts</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-forms-steps.html">Step forms</a></li>
                            <li><a class="is-submenu" href="/_components-forms-uploader.html">Uploader</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">adjust</span>Icons</a>
                        <ul>
                            <li><a class="is-submenu" href="/_components-icons-im.html">Icons Mind</a></li>
                            <li><a class="is-submenu" href="/_components-icons-sl.html">Simple Line Icons</a></li>
                            <li><a class="is-submenu" href="/_components-icons-fa.html">Font Awesome</a></li>
                            <li><a class="is-submenu" href="https://material.io/icons/" target="_blank">Material Icons</a></li>
                            <li><a class="is-submenu has-new-feature" href="/_components-extensions-iconpicker.html">Icon Picker</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /Navigation menu -->
            <!-- Navigation menu -->
            <div id="extras" class="navigation-menu-wrapper animated preFadeInRight fadeInRight is-hidden">
                <!-- Navigation Header -->
                <div class="navigation-menu-header">
                    <span>Extras</span>
                    <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                        <span class="menu-toggle">  
                            <span class="icon-box-toggle">  
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i> 
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
                <!-- Navigation body -->
                <ul class="navigation-menu">
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">dashboard</span>Dashboard kit</a>
                        <ul>
                            <li><a class="is-submenu" href="/dashboard/index.html">Main Layout</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-dark-nav.html">Dark Sidebar</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-blank.html">Blank page</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-widgets-data.html">Data widgets</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-widgets-social.html">Social widgets</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-feed.html">Dashboard feed</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-feed-post.html">Feed post</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-login.html">Login</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link" href="#"><span class="material-icons">insert_chart</span>Charts</a>
                        <ul>
                            <li><a class="is-submenu" href="/dashboard/dashboard-chartjs.html">Chartjs charts</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-billboardjs.html">Billboardjs charts</a></li>
                            <li><a class="is-submenu" href="/dashboard/dashboard-peityjs.html">Peity charts</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">assignment</span>Projects</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-project-list.html">Projects</a></li>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-project-details.html">Project details</a></li>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-project-task.html">Project Task</a></li>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-project-mytasks.html">My Tasks</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><a class="parent-link has-new" href="#"><span class="material-icons">grid_on</span>Datatable</a>
                        <ul>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-datatable-basic.html">Basic</a></li>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-datatable-variations.html">Variations</a></li>
                            <li><a class="is-submenu has-new-feature" href="/dashboard/dashboard-datatable-advanced.html">Advanced</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /Navigation menu --></div>
        <!-- /Side navigation -->        
        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>        
        <!-- Bulchat Button -->
        {{-- <div id="bulchat" class="open"><div class="chat-button open g-item"></div></div>         --}}
        <!-- Chat widget -->
        <div id="chat-widget">
            <div class="chat-widget-body is-closed">
                <div class="chat-header">
                    <div class="close-chat is-hidden-desktop is-hidden-tablet"><img src="assets/images/illustrations/icons/landing-v2/close-small.svg" alt=""></div>
                    <div class="chat-team">
                        <div class="team-member has-text-centered">
                            <img src="https://via.placeholder.com/250x250" alt="">
                            <div class="is-handwritten">Alan maynard</div>
                        </div>
                    </div>
                    <div class="response-delay has-text-centered">
                        Answers in less than 18 hours
                    </div>
                </div>
                <div class="message-container">
                    <div class="divider">
                        <span class="before-divider"></span>
                        <div class="children">Today</div>
                        <span class="after-divider"></span>
                    </div>
                    <div class="chat-message from">
                        <img src="https://via.placeholder.com/250x250" alt="">
                        <div class="bubble-wrapper">
                            <div class="timestamp">02:49 pm</div>
                            <div class="chat-bubble">
                                Hey iam Alan ! Iam here to help. What can i do for you ?
                            </div>
                        </div>
                    </div>
                    <div class="chat-message to">
                        <div class="bubble-wrapper">
                            <div class="timestamp">02:48 pm</div>
                            <div class="chat-bubble">
                                Hello, someone out there ? I could use some help
                            </div>
                        </div>
                        <img src="https://via.placeholder.com/250x250" alt="">
                    </div>
                </div>
                <div class="message-input">
                    <textarea class="" rows="1" placeholder="Send a message ..."></textarea>
                    <div class="message-options">
                        <div class="emoji-button"></div>
                        <div class="attach-button"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Chat widget -->        
        <!-- Concatenated jQuery and plugins -->
        <script src="assets/js/app.js"></script>
        
        <!-- Bulkit js -->
        <script src="assets/js/landingv2.js"></script>
        <script src="assets/js/auth.js"></script>
        <script src="assets/js/main.js"></script> 
        <script src="assets/js/components-toasts.js"></script>    
        

        @if (session('status'))
            <script type='text/javascript'>
                //$('#top-left-toast').click(function(){
                $(document).ready(function($){
                    console.log('sample');
                    iziToast.show({
                        title: 'Message sent,',
                        message: 'We will contact you soon !',
                        position: 'bottomRight',
                        zindex: 99999
                    });
                });
            </script>
        @endif
        
    </body>  
</html>
