<?php
session_start();
require 'config/database.php';

header('Content-Type: text/html; charset=UTF-8');

$productId = isset($_GET['id']) ? intval($_GET['id']) : null;

try {
    $query = "SELECT * 
              FROM products
              WHERE products.id = :product_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);

    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$product){
      header('Location: catalog.php');
    }

    $cartQuantity = 1;
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $cartQuery = "SELECT quantity FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $cartStmt = $pdo->prepare($cartQuery);
        $cartStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $cartStmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $cartStmt->execute();
        $cartItem = $cartStmt->fetch(PDO::FETCH_ASSOC);

        if ($cartItem) {
            $cartQuantity = $cartItem['quantity'];
        }
    }

    $query = "SELECT * 
              FROM products
              WHERE products.category_id = :category_id
                    AND products.id <> :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':category_id', $product['category_id'], PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);

    $stmt->execute();
    $related_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html data-wf-page="5baddb6a35e11306e19a4806" data-wf-site="5badda2935e11303a89a461e"
  data-wf-collection="5baddb6a35e1130af59a4804" data-wf-item-slug="teddy-bear">

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
      include "components/navbar.php"
    ?>
    <div class="section no-padding-vertical">
      <div class="wrapper side-paddings">
        <div class="breadcrumbs"><a href="index.php" class="link-grey">Home</a><img src="images/arrow-right-mini-icon-1.svg"
            alt="" class="breadcrumbs-arrow" /><a href="catalog.php" class="link-grey">Catalog</a><img
            src="images/arrow-right-mini-icon-1.svg" alt="" class="breadcrumbs-arrow" />
          <div><?= htmlspecialchars($product['name']); ?></div>
        </div>
      </div>
    </div>
    <div class="section no-padding-vertical">
      <div class="wrapper side-paddings">
        <div class="product">
          <div class="product-info">
            <h1><?= htmlspecialchars($product['name']); ?></h1>
            <p class="text-grey"><?= htmlspecialchars($product['description']); ?></p>
            <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_price_%22%2C%22to%22%3A%22innerHTML%22%7D%5D"
              class="product-price">Rp. <?= number_format(htmlspecialchars($product['price'])); ?> IDR</div>
            <div class="full-width">
            <?php if($product['stock'] > 0) : ?>
              <form data-node-type="commerce-add-to-cart-form" data-commerce-sku-id="5bae129d35e11310a69a82d2"
                data-loading-text="Adding to cart..." data-commerce-product-id="5bae129d1c68cc806025c48d"
                class="w-commerce-commerceaddtocartform add-to-cart"><input type="number" pattern="^[0-9]+$"
                  inputMode="numeric" id="quantity-652131f9f904302b3296412795400fe8"
                  name="quantity" min="1"
                  max="<?= htmlspecialchars($product['stock']); ?>"
                  class="w-commerce-commerceaddtocartquantityinput input quantity-input" style="padding:20px" value="<?= $cartQuantity ?>" />
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>"/>
                <div class="buy-buttons"><input type="submit"  data-node-type="commerce-add-to-cart-button"
                    data-loading-text="Adding to cart..." aria-busy="false" aria-haspopup="dialog"
                    class="w-commerce-commerceaddtocartbutton button add-to-cart-button" value="<?= $cartItem ? 'Update Cart' : 'Add to Cart'; ?>" /></div>
              </form>
            <?php else : ?>
              <div class="w-commerce-commerceaddtocartoutofstock out-of-stock" tabindex="0">
                <div>This product is out of stock.</div>
              </div>
            <?php endif;?>
              
              
              <div aria-live="" data-node-type="commerce-add-to-cart-error" style="display:none"
                class="w-commerce-commerceaddtocarterror form-error">
                <div data-node-type="commerce-add-to-cart-error"
                  data-w-add-to-cart-quantity-error="Product is not available in this quantity."
                  data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart."
                  data-w-add-to-cart-mixed-cart-error="You can’t purchase another product with a subscription."
                  data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item."
                  data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site."
                  data-w-add-to-cart-select-all-options-error="Please select an option in each set.">Product is not
                  available in this quantity.</div>
              </div>
            </div>
          </div>
          <div class="product-image-wrapper"><img alt=""
              data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_main_image_4dr%22%2C%22to%22%3A%22src%22%7D%5D"
              src="images/products/<?= htmlspecialchars($product['image_url']); ?>"
              sizes="(max-width: 479px) 83vw, (max-width: 767px) 75vw, (max-width: 991px) 76vw, 32vw"
              srcset="images/batik 1.jpg 500w, images/batik 1.jpg 1200w"
              class="full-width" /></div>
          <div class="product-details-wrapper">
            <div class="shop-header">
              <h5 class="no-margin">Product Details</h5>
              <div class="sku">
                <div>SKU: </div>
                <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_sku_%22%2C%22to%22%3A%22innerHTML%22%7D%5D">35009
                </div>
              </div>
              <div class="shop-header-line">
                <div class="shop-header-color green"></div>
              </div>
            </div>
            <div class="product-details w-richtext">
              <h4>Add Your Product Description</h4>
              <p>The rich text element allows you to create and format headings, paragraphs, blockquotes, images, and
                video all in one place instead of having to add and format them individually. Just double-click and
                easily create content. A rich text element can be used with static or dynamic content. For static
                content, just drop it into any page and begin editing. For dynamic content, add a rich text field to any
                collection and then connect a rich text element to that field in the settings panel. Voila!</p>
              <h4>Simple &amp; Elegant Template</h4>
              <p>Headings, paragraphs, blockquotes, figures, images, and figure captions can all be styled after a class
                is added to the rich text element using the "When inside of" nested selector system.</p>
              <ul>
                <li>Beautifully Designed</li>
                <li>Fully Responsive</li>
                <li>CMS Content</li>
                <li>Smooth Animations</li>
              </ul>
              <p>A successful marketing plan relies heavily on the pulling-power of advertising copy. Writing
                result-oriented ad copy is difficult, as it must appeal to, entice, and convince consumers to take
                action.</p>
              <h5>Perfect Choice for Your Business</h5>
              <p>Grabbing the consumer’s attention isn’t enough; you have to keep that attention for at least a few
                seconds. This is where your benefits come into play or a product description that sets your offer apart
                from the others.</p>
              <p>‍</p>
            </div>
            <div class="product-table">
              <div class="product-table-cell">
                <div>Width</div>
                <div class="product-table-info">
                  <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_width_%22%2C%22to%22%3A%22innerHTML%22%7D%5D">38
                  </div>
                  <div>  in</div>
                </div>
              </div>
              <div class="product-table-cell">
                <div>Height</div>
                <div class="product-table-info">
                  <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_height_%22%2C%22to%22%3A%22innerHTML%22%7D%5D">32
                  </div>
                  <div>  in</div>
                </div>
              </div>
              <div class="product-table-cell">
                <div>Length</div>
                <div class="product-table-info">
                  <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_length_%22%2C%22to%22%3A%22innerHTML%22%7D%5D">21.5
                  </div>
                  <div>  in</div>
                </div>
              </div>
              <div class="product-table-cell no-border-bottom">
                <div>Weight</div>
                <div class="product-table-info">
                  <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_weight_%22%2C%22to%22%3A%22innerHTML%22%7D%5D">24
                  </div>
                  <div>  oz</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="wrapper">
        <div class="shop-header">
          <h3>Related Products</h3><a href="catalog.php" class="link arrow-link">See All</a>
          <div class="shop-header-line">
            <div class="shop-header-color"></div>
          </div>
        </div>
        <div class="full-width w-dyn-list">
          <div role="list" class="products w-dyn-items">
          <?php if (!empty($related_products)) : ?>
              <?php foreach ($related_products as $product) : ?>
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
   

    <div class="section color no-padding-vertical">
      <div class="wrapper text-white">
        <div class="footer">
          <div class="footer-left"><a href="index.php" class="footer-brand w-nav-brand">
              <div>Shopify</div>
            </a></div>
          <div class="footer-nav"><a href="index.php" class="footer-link">Home</a><a href="catalog.php"
              class="footer-link">Catalog</a><a href="delivery.php" class="footer-link">Delivery</a><a href="about.php"
              class="footer-link">About</a><a href="contacts.php" class="footer-link">Contacts</a></div>
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
  <script src="js/webflow-script.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/script.js" type="text/javascript"></script>
</body>

</html>