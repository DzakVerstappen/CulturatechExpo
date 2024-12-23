<?php
session_start();
require 'config/database.php';

$query = $pdo->prepare("SELECT id, nama FROM categories");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html data-wf-page="5badda2935e11305319a461d" data-wf-site="5badda2935e11303a89a461e">

<head>
  <meta charset="utf-8" />
  <title>Shopify</title>
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
    <div class="section hero-section">
      <div class="wrapper text-white">
        <div
          style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
          class="hero-intro">
          <div class="title">Say Hello to Shopify!</div>
          <h1>Temukan Produk Terbaik dari UMKM Jogja!</h1><a href="catalog.php" class="button w-button">Open Catalog</a>
        </div>
      </div><a href="#Scroll-Section"
        style="opacity:0;-webkit-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.5, 0.5, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
        class="scroll-mouse-link w-inline-block">
        <div class="mouse-icon">
          <div class="mouse-wheel-icon"></div>
        </div>
      </a>
    </div>
    <div id="Scroll-Section" class="section haze">
      <div class="wrapper">
        <div class="home-categories">
          <div data-w-id="79f09a57-05ab-ed81-c059-4d50244b2341" style="opacity:0" class="home-category-card"><img
              src="images/pakaian.png"
              srcset="images/pakaian.png 500w, images/pakaian.png 1200w"
              sizes="(max-width: 479px) 64vw, (max-width: 991px) 176px, 220px" alt="" class="home-category-image-1" />
            <div class="home-category-info-1">
              <h3>Pakaian</h3><a href="catalog.php?category=1" class="button small white w-button">Shop Now</a>
            </div>
          </div>
          <div data-w-id="b498480a-a03d-afff-8227-912980ab2a0a" style="opacity:0" class="home-category-card red"><img
              src="images/kura.png"
              srcset="images/kura.png 500w, images/kura.png 1200w"
              sizes="(max-width: 479px) 60vw, (max-width: 991px) 176px, 220px" alt="" class="home-category-image-2" />
            <div class="home-category-info-2">
              <h3>Kerajinan Tangan</h3><a href="catalog.php?category=2" class="button small white w-button">Shop Now</a>
            </div>
          </div>

          <div data-w-id="b498480a-a03d-afff-8227-912980ab2a0a" style="opacity:0" class="home-category-card blue"><img
            src="images/Bakpia-logo.png"
            srcset="images/Bakpia-logo.png 500w, images/Bakpia-logo.png 1200w"
            sizes="(max-width: 479px) 60vw, (max-width: 991px) 176px, 220px" alt="" class="home-category-image-3" />
          <div class="home-category-info-3">
            <h3>Makanan Khas</h3><a href="catalog.php?category=3" class="button small white w-button">Shop Now</a>
          </div>
        </div>
        
        </div>
      </div>
    </div>




    <?php foreach ($categories as $category): ?>
      <div class="section haze no-padding-top">
      <div class="wrapper">
        <div class="shop-header">
          <h3 class="no-margin"><?= htmlspecialchars($category['nama']); ?></h3><a href="catalog.php?category=<?= $category['id']; ?>" class="link arrow-link">Lihat lebih banyak</a>
          <div class="shop-header-line">
            <div class="shop-header-color"></div>
          </div>
        </div>
        <div class="full-width w-dyn-list">
          <div role="list" class="products w-dyn-items">
          <?php
            $categoryId = $category['id'];

            try {
                $query = "SELECT products.id, products.name, products.description, products.price, products.image_url, categories.nama AS category_name 
                          FROM products
                          LEFT JOIN categories ON products.category_id = categories.id";

                if ($categoryId) {
                    $query .= " WHERE products.category_id = :category_id LIMIT 4";
                }

                $stmt = $pdo->prepare($query);

                if ($categoryId) {
                    $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
                }

                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error fetching products: " . $e->getMessage());
            }
            ?>
            <?php if (!empty($products)) : ?>
              <?php foreach ($products as $product) : ?>
                  <div role="listitem" class="product-card-wrapper w-dyn-item">
                      <a href="product.php?id=<?php echo $product['id']; ?>" class="product-card w-inline-block">
                          <div class="product-card-image-wrapper">
                              <img src="images/products/<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-card-image" />
                          </div>
                          <h6 class="product-card-heading"><?php echo htmlspecialchars($product['name']); ?></h6>
                          <div class="product-card-price">Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></div>
                      </a>
                  </div>
              <?php endforeach; ?>
          <?php else : ?>
              <p>No products found.</p>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>





    <div class="section video-section">
      <div class="wrapper">
        <div data-w-id="3c65db2d-dfc4-c6e7-82f4-ccf13df0f1d5" style="opacity:0" class="intro wide no-margin">
          <div class="title white">About The Shop</div>
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




    <div id="More-About" class="section">
      <div class="wrapper">
        <div class="intro">
          <div class="title">Empowering Local Businesses</div>
          <h2>Memajukan Bisnis Lokal dengan Teknologi</h2>
        </div>
        <div class="side-blocks mobile-reverse">
          <div class="side-block no-padding-left">
            <div class="side-info">
              <h2>Available for FREE!</h2>
              <div class="divider"></div>
              <p class="text-grey">Aplikasi e-commerce ini dirancang khusus untuk 
                mempromosikan dan mempermudah akses ke produk-produk UMKM di Kota Jogja. 
                Menemukan barang berkualitas dari pengrajin lokal kini lebih mudah! 
                Jelajahi berbagai kategori, mulai dari kerajinan tangan, kuliner khas, 
                hingga produk fashion tradisional. Dengan aplikasi ini, Anda tidak hanya berbelanja, 
                tetapi juga mendukung pertumbuhan ekonomi lokal. Tidak ada cara instan 
                untuk menciptakan marketplace yang sempurna, tetapi kami berkomitmen untuk memberikan pengalaman terbaik bagi Anda!</p><a href="/" aria-current="page"
                class="button w-button w--current">GET IT NOW!</a>
            </div>
          </div>
          <div class="side-block small-padding-side"><img class="side-image" src="images/side-image-01.jpg" alt=""
              style="opacity:0" sizes="(max-width: 479px) 93vw, (max-width: 767px) 80vw, (max-width: 991px) 81vw, 46vw"
              data-w-id="eaff9f8d-69e6-9e6f-5d07-e920521f8531"
              srcset="images/umkm1.jpg 1080w, images/umkm1.jpg 1140w" /></div>
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
          <div class="footer-left"><a href="index.php" aria-current="page" class="footer-brand w-nav-brand w--current">
              <div>Shopify</div>
            </a></div>


          <div class="footer-nav"><a href="index.php" aria-current="page" class="footer-link w--current">Home</a><a
              href="catalog.php" class="footer-link">Catalog</a><a href="delivery.php" class="footer-link">Delivery</a><a
              href="about.php" class="footer-link">About</a><a href="contacts.php" class="footer-link">Contacts</a></div>
              
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