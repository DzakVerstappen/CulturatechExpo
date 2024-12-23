<?php
require_once 'config/database.php';
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '1');  

$userId = $_SESSION['user_id'];

try {
    $query = "
        SELECT 
            c.id as cart_id, 
            p.id as product_id, 
            p.name as product_name, 
            p.image_url as product_image,
            p.price as product_price,
            c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching cart data: " . $e->getMessage());
}

function getCartSubtotal($cartItems) {
  $subtotal = 0;
  foreach ($cartItems as $item) {
      $subtotal += $item['product_price'] * $item['quantity'];
  }
  return $subtotal;
}
?>

<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
      role="banner" class="nav-bar w-nav">
      <div class="nav-top">
        <div class="wrapper nav-top-wrapper">
          <div class="nav-top-info">
            <div class="nav-top-text">Call Us: +62 85123456789</div>
            <div class="w-hidden-tiny">Email: <a href="#" class="link-white">Shopify@gmail.com</a></div>
          </div>
          <div class="nav-top-social"><a href="https://x.com/cwookiesc?t=etALo2Gie5QIWoReiYYTFw&s=09" target="_blank"
            class="footer-social-link w-inline-block"><img src="images/twitter-icon-white.svg" alt="" /></a>
            <a href="https://facebook.com" target="_blank" class="footer-social-link w-inline-block"><img
              src="images/facebook-icon-white.svg" alt="" /></a>
              <a href="https://www.instagram.com/cyynvx/" target="_blank"
            class="footer-social-link w-inline-block"><img src="images/instagram-icon-white.svg" alt="" /></a>
            <a href="https://pin.it/2DYCfdSmr" target="_blank" class="footer-social-link w-inline-block"><img
              src="images/pinterest-icon-white.svg" alt="" /></a>
              <a href="https://youtube.com" target="_blank"
            class="footer-social-link w-inline-block"><img src="images/youtube-icon.svg" alt="" /></a></div>
        </div>
      </div>
      <div class="nav-main">
        <div class="wrapper nav-bar-wrapper"><a href="index.php" aria-current="page" class="brand w-nav-brand w--current">
        <img src="images/logo.png" alt="Shopify Logo" style="height: 50px; margin-right: 0px;">
            <div>Shopify</div>
          </a>
          <div class="navigation">
            <nav role="navigation" class="nav-menu w-nav-menu"><a href="catalog.php"
                class="nav-link w-nav-link">Catalog</a><a href="delivery.php" class="nav-link w-nav-link">Delivery</a><a
                href="about.php" class="nav-link w-nav-link">About</a><a href="contacts.php"
                class="nav-link w-nav-link">Contacts</a><a href="add_product.php"
                class="nav-link w-nav-link">Add Product</a>
            </nav>
            <div class="menu-button w-nav-button">
              <div class="w-icon-nav-menu"></div>
            </div>
            <div data-node-type="commerce-cart-wrapper" data-open-product="" data-wf-cart-type="modal"  data-wf-page-link-href-prefix="" class="w-commerce-commercecartwrapper"><a href="#"
                class="w-commerce-commercecartopenlink cart-button w-inline-block" role="button" aria-haspopup="dialog"
                aria-label="Open cart">
                <div class="w-inline-block" data-node-type="commerce-cart-open-link">Cart <img src="images/cart-icon.svg" alt="" class="cart-icon"  /></div>
                <div class="w-commerce-commercecartopenlinkcount item-count"><?= count($cartItems) ?></div>
                <?php if (isset($_SESSION['user_id'])): ?>
                <div class="profile" id="profile-icon" style="cursor:pointer;">
                    <img src="images/profile.png" alt="Profile" class="cart-icon" />
                </div>
                <div id="dropdown-menu" class="dropdown-menu" style="display:none; position:absolute; background-color:white; box-shadow:0px 4px 6px rgba(0,0,0,0.1); border-radius:4px; padding:10px;z-index: 100;width: 200px;">
                    <div class="dropdown-title">
                      <span style="font-weight: bold;">Welcome, <?php echo $_SESSION['user_name']; ?></span>
                    </div>
                    <div style="height:1px"></div>
                    <div class="dropdown-item" style="padding: 10px;font-size: 14px;" data-href="actions/logout.php">
                      <a href="actions/logout.php" style="text-decoration:none; color:black;">Logout</a>
                    </div>
                </div>
              <?php else: ?>
                <div class="profile" id="nav-login">Login</div>
              <?php endif; ?>
              </a>
              <div data-node-type="commerce-cart-container-wrapper" style="display:none"
                class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-modal">
                <div data-node-type="commerce-cart-container" role="dialog"
                  class="w-commerce-commercecartcontainer cart-container">
                  <div class="w-commerce-commercecartheader cart-header">
                    <h4 class="w-commerce-commercecartheading">Your Cart</h4><a href="#"
                      data-node-type="commerce-cart-close-link" class="w-commerce-commercecartcloselink w-inline-block"
                      role="button" aria-label="Close cart"><svg width="16px" height="16px" viewBox="0 0 16 16">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g fill-rule="nonzero" fill="#333333">
                            <polygon
                              points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8 9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835 2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524 2.38388348 6.23223305 8">
                            </polygon>
                          </g>
                        </g>
                      </svg></a>
                  </div>
                  <div class="w-commerce-commercecartformwrapper">
                  <?php if (!empty($cartItems)): ?>
                    <form data-node-type="commerce-cart-form"  class="w-commerce-commercecartform">
                      <script type="text/x-wf-template" id="wf-template-9336d8a7-ba52-2880-0c69-78271ccadf80">
                        %3Cdiv%20class%3D%22w-commerce-commercecartitem%22%3E%3Cimg%20data-wf-bindings%3D%22%255B%257B%2522src%2522%253A%257B%2522type%2522%253A%2522ImageRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_main_image_4dr%2522%257D%257D%255D%22%20src%3D%22%22%20alt%3D%22%22%20class%3D%22w-commerce-commercecartitemimage%20w-dyn-bind-empty%22%2F%3E%3Cdiv%20class%3D%22w-commerce-commercecartiteminfo%22%3E%3Cdiv%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_name_%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartproductname%20w-dyn-bind-empty%22%3E%3C%2Fdiv%3E%3Cdiv%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePrice%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522price%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_price_%2522%257D%257D%255D%22%3E%24%C2%A00.00%C2%A0USD%3C%2Fdiv%3E%3Ca%20href%3D%22%23%22%20role%3D%22%22%20data-wf-bindings%3D%22%255B%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20class%3D%22w-inline-block%22%20data-wf-cart-action%3D%22remove-item%22%20data-commerce-sku-id%3D%22%22%20aria-label%3D%22Remove%20item%20from%20cart%22%3E%3Cdiv%20class%3D%22cart-remove-link%22%3ERemove%3C%2Fdiv%3E%3C%2Fa%3E%3Cscript%20type%3D%22text%2Fx-wf-template%22%20id%3D%22wf-template-c45e9499-40b7-87db-1211-9942e2063fb9%22%3E%253Cli%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522PlainText%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D.name%252522%25257D%25257D%25255D%2522%253E%253C%252Fspan%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522CommercePropValues%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D%252522%25257D%25257D%25255D%2522%253E%253C%252Fspan%253E%253C%252Fli%253E%3C%2Fscript%3E%3Cul%20data-wf-bindings%3D%22%255B%257B%2522optionSets%2522%253A%257B%2522type%2522%253A%2522CommercePropTable%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%5B%5D%2522%257D%257D%252C%257B%2522optionValues%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_sku_values_3dr%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartoptionlist%22%20data-wf-collection%3D%22database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%22%20data-wf-template-id%3D%22wf-template-c45e9499-40b7-87db-1211-9942e2063fb9%22%3E%3Cli%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D.name%2522%257D%257D%255D%22%3E%3C%2Fspan%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D%2522%257D%257D%255D%22%3E%3C%2Fspan%3E%3C%2Fli%3E%3C%2Ful%3E%3C%2Fdiv%3E%3Cinput%20data-wf-bindings%3D%22%255B%257B%2522value%2522%253A%257B%2522type%2522%253A%2522Number%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522numberPrecision%2522%252C%2522params%2522%253A%255B%25220%2522%252C%2522numberPrecision%2522%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.count%2522%257D%257D%252C%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartquantity%20input%20quantity-input%22%20required%3D%22%22%20pattern%3D%22%5E%5B0-9%5D%2B%24%22%20inputMode%3D%22numeric%22%20type%3D%22number%22%20name%3D%22quantity%22%20autoComplete%3D%22off%22%20data-wf-cart-action%3D%22update-item-quantity%22%20data-commerce-sku-id%3D%22%22%20value%3D%221%22%2F%3E%3C%2Fdiv%3E
                      </script>
                      <div class="w-commerce-commercecartlist cart-list"
                        data-wf-collection="database.commerceOrder.userItems"
                        data-wf-template-id="wf-template-9336d8a7-ba52-2880-0c69-78271ccadf80">
                        
                        <?php foreach ($cartItems as $item): ?>
                        <div class="w-commerce-commercecartitem" data-id="<?= htmlspecialchars($item['product_id']) ?>">
                          <img
                            data-wf-bindings="%5B%7B%22src%22%3A%7B%22type%22%3A%22ImageRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.f_main_image_4dr%22%7D%7D%5D"
                            src="images/products/<?= htmlspecialchars($item['product_image']) ?>" alt="" class="w-commerce-commercecartitemimage item-detail" data-id="<?= htmlspecialchars($item['product_id']) ?>" style="cursor:pointer"/>
                          <div class="w-commerce-commercecartiteminfo">
                            <div
                              data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_name_%22%7D%7D%5D"
                              class="w-commerce-commercecartproductname item-detail" data-id="<?= htmlspecialchars($item['product_id']) ?>"  style="cursor:pointer"><?= htmlspecialchars($item['product_name']) ?></div>
                            <div
                              data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePrice%22%2C%22filter%22%3A%7B%22type%22%3A%22price%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.f_price_%22%7D%7D%5D">
                              Rp <?= number_format(htmlspecialchars($item["product_price"] * $item["quantity"])) ?></div><a href="#" role=""
                              data-wf-bindings="%5B%7B%22data-commerce-sku-id%22%3A%7B%22type%22%3A%22ItemRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.id%22%7D%7D%5D"
                              class="w-inline-block" data-wf-cart-action="remove-item" data-commerce-sku-id=""
                              aria-label="Remove item from cart">
                              <div class="cart-remove-link" data-id="<?= htmlspecialchars($item['product_id']) ?>">Remove</div>
                            </a>
                            <script type="text/x-wf-template" id="wf-template-c45e9499-40b7-87db-1211-9942e2063fb9">
                              %3Cli%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D.name%2522%257D%257D%255D%22%3E%3C%2Fspan%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D%2522%257D%257D%255D%22%3E%3C%2Fspan%3E%3C%2Fli%3E
                            </script>
                            <ul
                              data-wf-bindings="%5B%7B%22optionSets%22%3A%7B%22type%22%3A%22CommercePropTable%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr[]%22%7D%7D%2C%7B%22optionValues%22%3A%7B%22type%22%3A%22CommercePropValues%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.f_sku_values_3dr%22%7D%7D%5D"
                              class="w-commerce-commercecartoptionlist"
                              data-wf-collection="database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr"
                              data-wf-template-id="wf-template-c45e9499-40b7-87db-1211-9942e2063fb9">
                              <li><span
                                  data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr%5B%5D.name%22%7D%7D%5D"></span><span
                                  data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePropValues%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr%5B%5D%22%7D%7D%5D"></span>
                              </li>
                            </ul>
                          </div><input
                            data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22Number%22%2C%22filter%22%3A%7B%22type%22%3A%22numberPrecision%22%2C%22params%22%3A%5B%220%22%2C%22numberPrecision%22%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.count%22%7D%7D%2C%7B%22data-commerce-sku-id%22%3A%7B%22type%22%3A%22ItemRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.id%22%7D%7D%5D"
                            class="w-commerce-commercecartquantity input quantity-input" required="" pattern="^[0-9]+$" type="number" name="quantity" autoComplete="off"
                            data-wf-cart-action="update-item-quantity" data-commerce-sku-id="" style="padding: 0; margin: 0; text-align:center" value="<?= htmlspecialchars($item['quantity']) ?>" disabled />
                        </div>
                            <?php endforeach; ?>

                      </div>
                      <div class="w-commerce-commercecartfooter cart-footer">
                        <div aria-live="" aria-atomic="false" class="w-commerce-commercecartlineitem">
                          <div>Subtotal</div>
                          <div
                            data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePrice%22%2C%22filter%22%3A%7B%22type%22%3A%22price%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.subtotal%22%7D%7D%5D"
                            class="w-commerce-commercecartordervalue">Rp <?= number_format(htmlspecialchars(getCartSubtotal($cartItems))) ?></div>
                        </div>
                        <div>
                          <div
                            class="cart-pay-button"></div><a href="checkout.php" value="Continue to Checkout"
                             class="w-commerce-commercecartcheckoutbutton button"
                            data-loading-text="Hang Tight...">Continue to Checkout</a>
                        </div>
                      </div>
                    </form>
                    <?php else: ?>
                      <div class="w-commerce-commercecartemptystate">
                        <div>No items found.</div>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>