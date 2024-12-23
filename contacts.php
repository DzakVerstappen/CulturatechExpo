<?php
session_start();
?>
<!DOCTYPE html>
<html data-wf-page="5bb4b09dbfd9281bfcd8d51e" data-wf-site="5badda2935e11303a89a461e">

<head>
  <meta charset="utf-8" />
  <title>Shopify</title>
  <meta content="ToyStore — Webflow Ecommerce HTML website template" property="og:title" />
  <meta content="ToyStore — Webflow Ecommerce HTML website template" property="twitter:title" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Webflow" name="generator" />
  <link href="css/webflow-style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic",
          "Varela Round:400"
        ]
      }
    });
  </script>
  <script type="text/javascript">
    ! function (o, c) {
      var n = c.documentElement,
        t = " w-mod-";
      n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className +=
        t + "touch")
    }(window, document);
  </script>
  <link href="images/logo.png" rel="shortcut icon" type="image/x-icon" />
  <link href="images/app-icon.png" rel="apple-touch-icon" />
  <script type="text/javascript">
    window.__WEBFLOW_CURRENCY_SETTINGS = {
      "currencyCode": "USD",
      "$init": true,
      "symbol": "$",
      "decimal": ".",
      "fractionDigits": 2,
      "group": ",",
      "template": "{{wf {\"path\":\"symbol\",\"type\":\"PlainText\"} }} {{wf {\"path\":\"amount\",\"type\":\"CommercePrice\"} }} {{wf {\"path\":\"currencyCode\",\"type\":\"PlainText\"} }}",
      "hideDecimalForWholeNumbers": false
    };
  </script>
</head>

<body>
  <div class="preloader">
    <div class="loading-icon"><img src="images/preloader.gif" alt="" class="preloader-icon" /></div>
  </div>
  <div class="page-wrapper">
  <?php
        include 'components/navbar.php'
    ?>
    <div class="section no-padding-vertical">
      <div class="wrapper side-paddings">
        <div class="breadcrumbs"><a href="index.php" class="link-grey">Home</a><img src="images/arrow-right-mini-icon-1.svg"
            alt="" class="breadcrumbs-arrow" />
          <div>Contacts</div>
        </div>
      </div>
    </div>
    <div class="section no-padding-top">
      <div class="wrapper side-paddings">
        <div class="contacts">
          <div class="map w-widget w-widget-map" data-widget-style="roadmap" data-widget-latlng=""
            data-enable-scroll="true" role="" title="" data-enable-touch="true" data-widget-zoom="12"
            data-widget-tooltip=""></div>
          <div class="contact-form-wrapper">
            <h4 class="contact-heading">Leave a Message</h4>
            <div class="w-form">
              <form id="email-form" name="email-form" data-name="Email Form" method="get"
                data-wf-page-id="5bb4b09dbfd9281bfcd8d51e" data-wf-element-id="d96b2bf2-3a5d-0de0-24cd-680b60234d76">
                <label for="Contact-Name" class="label">Full Name</label><input class="input w-input" maxlength="256"
                  name="Contact-Name" data-name="Contact Name" placeholder="Enter your name" type="text"
                  id="Contact-Name" /><label for="Contact-Email" class="label">Email Address</label><input
                  class="input w-input" maxlength="256" name="Contact-Email" data-name="Contact Email"
                  placeholder="Your contact email" type="email" id="Contact-Email" required="" /><label
                  for="Contact-Message" class="label">Email Address</label><textarea id="Contact-Message"
                  name="Contact-Message" placeholder="Message text..." maxlength="5000" data-name="Contact Message"
                  required="" class="input text-area w-input"></textarea><input type="submit" data-wait="Please wait..."
                  class="button w-button" value="Send Message" /></form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
            </div>
          </div>
          <div class="contact-info">
            <h4 class="contact-heading">Contact Info</h4>
            <div>Jl. Kaliurang No.Km. 14,5, Krawitan, Umbulmartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584</div>
            <div>+62 123 456 789</div><a href="mailto:Your Email Here?subject=ToyStore"
              class="link">Shopify@gmail.com</a>
            <div class="contact-social">
              <h5 class="contact-social-heading">Follow Us</h5><a href="https://x.com" target="_blank"
                class="contact-social-link twitter w-inline-block"><img src="images/twitter-icon-white.svg"
                  alt="" /></a><a href="https://facebook.com" target="_blank"
                class="contact-social-link facebook w-inline-block"><img src="images/facebook-icon-white.svg"
                  alt="" /></a><a href="https://www.instagram.com/cyynvx/" target="_blank"
                class="contact-social-link insta w-inline-block"><img src="images/instagram-icon-white.svg"
                  alt="" /></a><a href="https://pinterest.com" target="_blank"
                class="contact-social-link pinterest w-inline-block"><img src="images/pinterest-icon-white.svg"
                  alt="" /></a><a href="https://youtube.com" target="_blank"
                class="contact-social-link youtube w-inline-block"><img src="images/youtube-icon.svg" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>


   
    <div class="section haze">
    <div class="wrapper">
      <div class="intro">
        <div class="title">@CulturaTech</div>
        <h2 class="no-margin-bottom">Ikuti Kami di Instagram!</h2>
      </div>
      <div data-w-id="6e1d3527-5090-7380-17f7-30bf0f5a58b4" class="instagram"><a href="https://instagram.com"
          target="_blank" class="instagram-link w-inline-block"><img src="images/ig1.jpg" alt=""
            class="full-width" /></a><a href="https://instagram.com" target="_blank"
          class="instagram-link w-inline-block"><img src="images/ig2.jpg" alt="" class="full-width" /></a><a
          href="https://instagram.com" target="_blank" class="instagram-link w-inline-block"><img
            src="images/ig3.jpg" alt="" class="full-width" /></a><a href="https://instagram.com"
          target="_blank" class="instagram-link w-inline-block"><img src="images/ig4.jpg" alt=""
            class="full-width" /></a><a href="https://instagram.com" target="_blank"
          class="instagram-link w-inline-block"><img src="images/ig5.png" alt="" class="full-width" /></a><a
          href="https://instagram.com" target="_blank" class="instagram-link w-inline-block"><img
            src="images/ig6.png" alt="" class="full-width" /></a></div><a href="https://instagram.com"
        target="_blank" class="button w-button">Lihat Lebih Banyak</a>
    </div>
  </div>


    
    <div class="section color no-padding-vertical">
      <div class="wrapper text-white">
        <div class="footer">
          <div class="footer-left"><a href="index.php" class="footer-brand w-nav-brand">
              <div>Shopify</div>
            </a></div>
          <div class="footer-nav"><a href="index.php" class="footer-link">Home</a><a href="catalog.php"
              class="footer-link">Catalog</a><a href="delivery.php" class="footer-link">Delivery</a><a href="about.php"
              class="footer-link">About</a><a href="contacts.php" aria-current="page"
              class="footer-link w--current">Contacts</a></div>
       
       
              <div class="footer-social">
            <a href="https://x.com/cwookiesc?t=etALo2Gie5QIWoReiYYTFw&s=09" target="_blank"
              class="footer-social-link w-inline-block"><img src="images/twitter-icon-white.svg" alt="" /></a>
              <a href="https://facebook.com" target="_blank" class="footer-social-link w-inline-block"><img
                src="images/facebook-icon-white.svg" alt="" /></a>
                <a href="https://www.instagram.com/cyynvx/" target="_blank"
              class="footer-social-link w-inline-block"><img src="images/instagram-icon-white.svg" alt="" /></a>
              <a href="https://pin.it/2DYCfdSmr" target="_blank" class="footer-social-link w-inline-block"><img
                src="images/pinterest-icon-white.svg" alt="" /></a>
                <a href="https://youtube.com" target="_blank"
              class="footer-social-link w-inline-block"><img src="images/youtube-icon.svg" alt="" /></a></div>
          <div class="footer-bottom">
            <div class="footer-bottom-left">
              <div>Created with love by <a href="https://www.instagram.com/cyynvx/" target="_blank" class="link-white">CulturaTech
                  </a></div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/webflow-script.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
</body>

</html>