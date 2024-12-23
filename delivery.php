<?php
session_start();
?>
<!DOCTYPE html>
<html data-wf-page="5bb5e4ff0c738f120348b8bf" data-wf-site="5badda2935e11303a89a461e">

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
          <div>Delivery</div>
        </div>
      </div>
    </div>
    <div class="section no-padding-top">
  <div class="wrapper side-paddings">
    <div class="delivery">
      <div class="delivery-info w-richtext">
        <h2>Delivery Info</h2>
        <p>Kami menyediakan layanan pengiriman untuk berbagai produk lokal khas Yogyakarta, mulai dari makanan tradisional, pakaian, hingga kerajinan tangan unik. Nikmati keindahan budaya Jogja dalam bentuk produk-produk pilihan yang dapat dipesan dengan mudah.</p>
        <h3>Produk yang Tersedia:</h3>
        <ul>
          <li><strong>Makanan Khas Jogja:</strong> Gudeg, bakpia, geplak, dan lainnya. <em>Catatan: Pengiriman makanan khas hanya tersedia untuk wilayah Yogyakarta dan sekitarnya guna menjaga kualitas dan kesegarannya.</em></li>
          <li><strong>Pakaian:</strong> Batik, lurik, dan pakaian tradisional lainnya yang merepresentasikan warisan budaya Jogja.</li>
          <li><strong>Kerajinan Tangan:</strong> Cinderamata khas seperti kerajinan kayu, anyaman bambu, dan aksesori unik buatan pengrajin lokal.</li>
        </ul>
        <h3>Area Pengiriman:</h3>
        <ul>
          <li>Makanan khas hanya dikirimkan di wilayah sekitar Jogja.</li>
          <li>Untuk pakaian dan kerajinan tangan, pengiriman tersedia ke seluruh Indonesia.</li>
        </ul>
        <h3>Cara Pemesanan:</h3>
        <ul>
          <li>Pilih produk favorit Anda melalui aplikasi atau website kami.</li>
          <li>Tentukan alamat pengiriman, dan kami akan memastikan produk sampai dengan aman dan cepat.</li>
        </ul>
        <p>Rasakan kelezatan dan keunikan budaya Jogja kapan saja, hanya dengan beberapa klik!</p>
      </div>
      <div class="question">
        <h5 class="question-heading">Tidak menemukan jawaban atas pertanyaan Anda?</h5>
        <a href="contacts.php" class="button small w-button">Hubungi Kami</a>
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
              class="footer-link">Catalog</a><a href="delivery.php" aria-current="page"
              class="footer-link w--current">Delivery</a><a href="about.php" class="footer-link">About</a><a
              href="contacts.php" class="footer-link">Contacts</a></div>
        
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