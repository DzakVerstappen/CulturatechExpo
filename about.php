<?php
session_start();
?>
<!DOCTYPE html>
<html data-wf-page="5bb5cfc0d628cb37586a6c43" data-wf-site="5badda2935e11303a89a461e">

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
  <link href="images/logo.png" rel="apple-touch-icon" />
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
          <div>About</div>
        </div>
      </div>
    </div>
    <div class="section no-padding-bottom">
      <div class="title">Semua Kebutuhan Belanja Anda Ada di Sini!</div>
      <div class="wrapper side-paddings">
        <div class="intro no-margin">
          <h1>Introducing Shopify</h1>
          <p class="text-grey">Platform ini dirancang untuk mempertemukan produk-produk UMKM berkualitas dengan pelanggan secara mudah dan cepat. Temukan produk terbaik, dukung bisnis lokal, dan rasakan pengalaman belanja yang lebih berarti.</p><a href="#More-About" class="link">More About Us</a>
        </div><img src="images/about-image.jpg"
          srcset="images/about-image-p-500.jpeg 500w, images/about-image-p-1080.jpeg 1080w, images/about-image-p-1600.jpeg 1600w, images/about-image-p-2000.jpeg 2000w, images/about-image-1.jpg 2340w"
          sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 97vw, 93vw" alt=""
          class="about-image" />
      </div>
    </div>
    <div id="More-About" class="section">
      <div class="wrapper">
        <div class="intro">
          <div class="title">Dibuat Khusus untuk UMKM Lokal</div>
          <h3>Mendorong pertumbuhan ekonomi lokal dengan memberdayakan UMKM Yogyakarta melalui teknologi digital.</h3>
        </div>
        <div class="side-blocks mobile-reverse">
          <div class="side-block no-padding-left">
            <div class="side-info">
              <h2>Cerita Kami</h2>
              <div class="divider"></div>
              <p class="text-grey">Berawal dari kepedulian terhadap perkembangan UMKM di Yogyakarta, kami melihat banyak pelaku usaha lokal yang memiliki produk unggulan namun kesulitan untuk menjangkau pasar yang lebih luas. Dengan semangat “Dari Jogja untuk Indonesia”, kami hadir untuk menjembatani para pelaku UMKM dengan masyarakat yang ingin mendukung produk lokal.

Melalui teknologi, kami ingin menciptakan solusi yang tidak hanya memudahkan pelanggan dalam berbelanja, tetapi juga membantu UMKM tumbuh dan berkembang di era digital.</p><a href="/"
                class="button w-button">Nikmati Layanan Ini Gratis</a>
            </div>
          </div>
          <div class="side-block small-padding-side"><img class="side-image" src="images/umkm2.jpg " alt=""
              style="opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, (max-width: 991px) 81vw, 45vw"
              data-w-id="1d40fd6b-f79c-854a-e1e8-4d7756194794"
              srcset="images/umkm2.jpg 1080w, images/umkm2.jpg  1140w" /></div>
        </div>
      </div>
    </div>
    <div id="More-About" class="section no-padding-top">
      <div class="wrapper">
        <div class="side-blocks">
          <div class="side-block small-padding-side"><img class="side-image" src="images/side-image-02.jpg" alt=""
              style="opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, (max-width: 991px) 81vw, 45vw"
              data-w-id="a5115579-547a-d2ce-e9f0-b0424df35b66"
              srcset="images/umkm3.jpg 500w, images/umkm3.jpg 1080w, images/umkm3.jpg 1140w" />
          </div>
          <div class="side-block no-padding-right">
            <div class="side-info">
              <h2>Mengapa Shopify</h2>
              <div class="divider"></div>
              <p class="text-grey">Aplikasi ini hadir sebagai solusi lengkap untuk mendukung dan mempromosikan produk-produk UMKM Yogyakarta. Kami memastikan bahwa setiap produk yang tersedia di platform berasal langsung dari pelaku usaha lokal, sehingga Anda bisa mendapatkan produk asli dengan kualitas terbaik. Selain itu, kami menawarkan pengalaman belanja yang mudah, cepat, dan aman, dengan sistem transaksi yang terpercaya dan ramah pengguna. Dengan setiap pembelian yang Anda</p><a href="catalog.php"
                class="link arrow-link">Lihat Produk Kami</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section video-section">
      <div class="wrapper">
        <div data-w-id="e90e70b8-09bc-8915-623f-6f05c93c2612" style="opacity:0" class="intro wide no-margin">
          <div class="title white">Tentang Toko Kami</div>
          <h2 class="heading">Watch Our Story</h2>
          <p>Tidak ada formula ajaib untuk menciptakan platform e-commerce yang sempurna. 
            Kesuksesan kami didasarkan pada berbagai faktor, termasuk pilihan produk UMKM, 
            kemudahan akses, hingga dukungan Anda sebagai pengguna. Melalui aplikasi ini, 
            kami berkomitmen untuk memberikan pengalaman terbaik dalam mendukung dan mempromosikan produk lokal Kota Jogja.</p><a href="#"
            class="play-button w-inline-block w-lightbox"><img src="images/play-icon-white.svg" alt="" />
            <script type="application/json" class="w-json">
            {
              "items": [{
              "url": "https://youtu.be/hdkOxdzMfCg",
              "originalUrl": "https://youtu.be/hdkOxdzMfCg",
              "width": 940,
              "height": 528,
              "thumbnailUrl": "https://i.ytimg.com/vi/hdkOxdzMfCg/hqdefault.jpg",
              "html": "<iframe class=\"embedly-embed\" src=\"//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FhdkOxdzMfCg%3Ffeature%3Doembed&url=https%3A%2F%2Fyoutu.be%2FhdkOxdzMfCg&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FhdkOxdzMfCg%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube\" width=\"940\" height=\"528\" scrolling=\"no\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen=\"true\"></iframe>",
              "type": "video"
                }],
              "group": ""
            }

            </script>
          </a>
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
          <div class="footer-left"><a href="/" aria-current="page" class="footer-brand w-nav-brand w--current">
              <div>Shopify</div>
            </a></div>


          <div class="footer-nav"><a href="index.php" class="footer-link">Home</a><a href="catalog.php"
              class="footer-link">Catalog</a><a href="delivery.php" class="footer-link">Delivery</a><a href="about.php"
              aria-current="page" class="footer-link w--current">About</a><a href="contacts.php"
              class="footer-link">Contacts</a></div>


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