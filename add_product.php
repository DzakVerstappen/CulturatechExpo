<?php
session_start();
require 'config/database.php';

$query = $pdo->prepare("SELECT id, nama FROM categories");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html data-wf-page="5baddb6a56ac543f344ddaa7" data-wf-site="5badda2935e11303a89a461e">

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
          <div>Add Product</div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="wrapper">
        <div data-node-type="commerce-checkout-form-container" data-wf-page-link-href-prefix="" class="w-commerce-commercecheckoutformcontainer checkout-form">
          <div class="w-commerce-commercelayoutmain order-main-column">
            <div class="order-block">
              <div class="pay-buttons">
                <div data-node-type="commerce-cart-quick-checkout-actions" style="display:none" class="payment-method">
                  <a role="button" aria-haspopup="dialog" aria-label="Apple Pay"
                    data-node-type="commerce-cart-apple-pay-button"
                    style="background-image:-webkit-named-image(apple-pay-logo-white);background-size:100% 50%;background-position:50% 50%;background-repeat:no-repeat"
                    class="w-commerce-commercecartapplepaybutton pay-button" tabindex="0">
                    <div></div>
                  </a><a role="button" tabindex="0" aria-haspopup="dialog"
                    data-node-type="commerce-cart-quick-checkout-button" style="display:none"
                    class="w-commerce-commercecartquickcheckoutbutton pay-button"><svg
                      class="w-commerce-commercequickcheckoutgoogleicon" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                      <defs>
                        <polygon id="google-mark-a" points="0 .329 3.494 .329 3.494 7.649 0 7.649"></polygon>
                        <polygon id="google-mark-c" points=".894 0 13.169 0 13.169 6.443 .894 6.443"></polygon>
                      </defs>
                      <g fill="none" fill-rule="evenodd">
                        <path fill="#4285F4"
                          d="M10.5967,12.0469 L10.5967,14.0649 L13.1167,14.0649 C14.6047,12.6759 15.4577,10.6209 15.4577,8.1779 C15.4577,7.6339 15.4137,7.0889 15.3257,6.5559 L7.8887,6.5559 L7.8887,9.6329 L12.1507,9.6329 C11.9767,10.6119 11.4147,11.4899 10.5967,12.0469">
                        </path>
                        <path fill="#34A853"
                          d="M7.8887,16 C10.0137,16 11.8107,15.289 13.1147,14.067 C13.1147,14.066 13.1157,14.065 13.1167,14.064 L10.5967,12.047 C10.5877,12.053 10.5807,12.061 10.5727,12.067 C9.8607,12.556 8.9507,12.833 7.8887,12.833 C5.8577,12.833 4.1387,11.457 3.4937,9.605 L0.8747,9.605 L0.8747,11.648 C2.2197,14.319 4.9287,16 7.8887,16">
                        </path>
                        <g transform="translate(0 4)">
                          <mask id="google-mark-b" fill="#fff">
                            <use xlink:href="#google-mark-a"></use>
                          </mask>
                          <path fill="#FBBC04"
                            d="M3.4639,5.5337 C3.1369,4.5477 3.1359,3.4727 3.4609,2.4757 L3.4639,2.4777 C3.4679,2.4657 3.4749,2.4547 3.4789,2.4427 L3.4939,0.3287 L0.8939,0.3287 C0.8799,0.3577 0.8599,0.3827 0.8459,0.4117 C-0.2821,2.6667 -0.2821,5.3337 0.8459,7.5887 L0.8459,7.5997 C0.8549,7.6167 0.8659,7.6317 0.8749,7.6487 L3.4939,5.6057 C3.4849,5.5807 3.4729,5.5587 3.4639,5.5337"
                            mask="url(#google-mark-b)"></path>
                        </g>
                        <mask id="google-mark-d" fill="#fff">
                          <use xlink:href="#google-mark-c"></use>
                        </mask>
                        <path fill="#EA4335"
                          d="M0.894,4.3291 L3.478,6.4431 C4.113,4.5611 5.843,3.1671 7.889,3.1671 C9.018,3.1451 10.102,3.5781 10.912,4.3671 L13.169,2.0781 C11.733,0.7231 9.85,-0.0219 7.889,0.0001 C4.941,0.0001 2.245,1.6791 0.894,4.3291"
                          mask="url(#google-mark-d)"></path>
                      </g>
                    </svg><svg class="w-commerce-commercequickcheckoutmicrosofticon" xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" viewBox="0 0 16 16">
                      <g fill="none" fill-rule="evenodd">
                        <polygon fill="#F05022" points="7 7 1 7 1 1 7 1"></polygon>
                        <polygon fill="#7DB902" points="15 7 9 7 9 1 15 1"></polygon>
                        <polygon fill="#00A4EE" points="7 15 1 15 1 9 7 9"></polygon>
                        <polygon fill="#FFB700" points="15 15 9 15 9 9 15 9"></polygon>
                      </g>
                    </svg>
                    <div>Pay with browser.</div>
                  </a></div>
                <div
                  data-wf-paypal-button="{&quot;layout&quot;:&quot;horizontal&quot;,&quot;color&quot;:&quot;blue&quot;,&quot;shape&quot;:&quot;pill&quot;,&quot;label&quot;:&quot;paypal&quot;,&quot;tagline&quot;:false,&quot;note&quot;:false}"
                  class="payment-method"></div>
              </div>
            </div>
            <form
              id="form-add-product"
              method="POST"
              action="actions/add_product.php"
              class="w-commerce-commercecheckoutcustomerinfowrapper order-block"
              enctype="multipart/form-data"
              >
              <div>
                <div class="w-commerce-commercecheckoutblockheader order-block-header">
                  <h4 class="order-block-heading">Add Product</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent order-block-content">
                <div style="margin-top: 20px;">
                    <label for=""
                    class="w-commerce-commercecheckoutlabel label">Product photo</label><input
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom" type="file" name="photo"
                    required="" />
                </div>
                <div style="margin-top: 20px;">
                    <label for=""
                    class="w-commerce-commercecheckoutlabel label">Name</label><input
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom" type="text" name="name"
                    required="" />
                </div>
                <div style="margin-top: 20px;">
                    <label for="textarea-name" class="w-commerce-commercecheckoutlabel label">Description</label>
                    <textarea
                      id="textarea-description"
                      class="w-commerce-commercecheckoutemailinput input no-margin-bottom"
                      name="description"
                      required=""
                      style="height:100px"
                      rows="4"></textarea>
                </div>
                <div style="margin-top:20px">
                  <label for="category" class="w-commerce-commercecheckoutlabel label">Category</label>
                  <select
                    id="category"
                    name="category"
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom"
                    required>
                    <option value="" disabled selected>Select a category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['nama']); ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div style="margin-top:20px">
                    <label for=""
                    class="w-commerce-commercecheckoutlabel label">Price</label><input
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom" type="number" name="price"
                    required="" />
                </div>
                <div style="margin-top:20px">
                    <label for=""
                    class="w-commerce-commercecheckoutlabel label">Stock</label><input
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom" type="number" name="stock"
                    required="" />
                </div>
              </div>
              <button type="submit"
              class="w-commerce-commercecheckoutplaceorderbutton button" style="width: 100%;" data-loading-text="Adding product ...">Add Product</button>
            </form>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/webflow-script.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
</body>

</html>