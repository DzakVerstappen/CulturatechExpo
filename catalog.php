<?php
session_start();
require 'config/database.php';

header('Content-Type: text/html; charset=UTF-8');

$categoryId = isset($_GET['category']) ? intval($_GET['category']) : null;

try {
    $query = "SELECT products.id, products.name, products.description, products.price, products.image_url, categories.nama AS category_name 
              FROM products
              LEFT JOIN categories ON products.category_id = categories.id";

    if ($categoryId) {
        $query .= " WHERE products.category_id = :category_id";
    }

    $stmt = $pdo->prepare($query);

    if ($categoryId) {
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
    }

    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = $pdo->prepare("SELECT id, nama FROM categories");
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html data-wf-page="5baf791a7a16ad127cda1ebc" data-wf-site="5badda2935e11303a89a461e">

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
          <div>Catalog</div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="wrapper">
        <div class="shop-header">
          <h3 class="no-margin w-hidden-small w-hidden-tiny">
                <?php if($categoryId) : ?>
                  <?php foreach ($categories as $category): ?>
                  <?php if($category['id'] == $categoryId) : ?>
                    <?= htmlspecialchars($category['nama']); ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php else : ?>  
                  All Product
                <?php endif; ?></h3>
          <div class="shop-categories-wrapper">
            <div class="w-dyn-list">
              <div role="list" class="shop-categories w-dyn-items">
              <?php if($categoryId) : ?>
                <div role="listitem" class="w-dyn-item"><a href="catalog.php"
                class="shop-category-link">All Product</a></div>
                <?php else : ?>  
                  <div role="listitem" class="w-dyn-item"><a href="catalog.php" aria-current="page"
                  class="shop-category-link w--current">All Product</a></div>
                <?php endif; ?>
              <?php foreach ($categories as $category): ?>
                <?php if($category['id'] == $categoryId) : ?>
                  <div role="listitem" class="w-dyn-item"><a href="catalog.php?category=<?= $category['id']; ?>" aria-current="page"
                  class="shop-category-link w--current"><?= htmlspecialchars($category['nama']); ?></a></div>
                <?php else : ?>
                  <div role="listitem" class="w-dyn-item"><a href="catalog.php?category=<?= $category['id']; ?>"
                  class="shop-category-link"><?= htmlspecialchars($category['nama']); ?></a></div>
                <?php endif; ?>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="shop-header-line">
            <div class="shop-header-color green w-hidden-small w-hidden-tiny"></div>
          </div>
        </div>
        <div class="full-width w-dyn-list">
          <div role="list" class="products w-dyn-items">
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
          <div class="footer-left"><a href="index.php " class="footer-brand w-nav-brand">
              <div>Shopify</div>
            </a></div>
          <div class="footer-nav"><a href="index.php" class="footer-link">Home</a><a href="catalog.php" aria-current="page"
              class="footer-link w--current">Catalog</a><a href="delivery.php" class="footer-link">Delivery</a><a
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