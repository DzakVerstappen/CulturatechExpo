<?php
session_start();

require "config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
try {
  $query = "SELECT * 
            FROM users
            WHERE users.id = :user_id";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
} catch (PDOException $e) {
  die("Error fetching products: " . $e->getMessage());
}
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
    <?php
      if (empty($cartItems)) {
        echo "<script>window.location.href='catalog.php'</script>";
        exit();
      }
    ?>
    <div class="section no-padding-vertical">
      <div class="wrapper side-paddings">
        <div class="breadcrumbs"><a href="index.php" class="link-grey">Home</a><img src="images/arrow-right-mini-icon-1.svg"
            alt="" class="breadcrumbs-arrow" />
          <div>Checkout</div>
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
              action="actions/checkout.php"
              method="POST"
            >
            <div data-node-type="commerce-checkout-customer-info-wrapper"
              class="w-commerce-commercecheckoutcustomerinfowrapper order-block">
              <div>
                <div class="w-commerce-commercecheckoutblockheader order-block-header">
                  <h4 class="order-block-heading">Customer Info</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent order-block-content"><label for=""
                    class="w-commerce-commercecheckoutlabel label">Email</label><input
                    data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.customerEmail%22%7D%7D%5D"
                    class="w-commerce-commercecheckoutemailinput input no-margin-bottom" value="<?= htmlspecialchars($user["email"]) ?>" type="text" name="email"
                    required="" disabled /></fieldset>
              </div>
              <div>
                <div class="w-commerce-commercecheckoutblockheader order-block-header">
                  <h4 class="order-block-heading">Shipping Address</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent order-block-content"><label for=""
                    class="w-commerce-commercecheckoutlabel label">Full Name</label><input
                    data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.shippingAddressAddressee%22%7D%7D%5D"
                    class="w-commerce-commercecheckoutshippingfullname input" name="name" type="text"
                    required="" /><label for="" class="w-commerce-commercecheckoutlabel label">Street Address
                   </label><input
                    data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.shippingAddressLine1%22%7D%7D%5D"
                    class="w-commerce-commercecheckoutshippingstreetaddress input" name="address_street" type="text"
                    required="" />
                  <div class="w-commerce-commercecheckoutrow form-columns">
                    <div class="w-commerce-commercecheckoutcolumn"><label for=""
                        class="w-commerce-commercecheckoutlabel label">City</label><input
                        data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.shippingAddressCity%22%7D%7D%5D"
                        class="w-commerce-commercecheckoutshippingcity input" name="address_city" type="text"
                        required="" /></div>
                    <div class="w-commerce-commercecheckoutcolumn"><label for=""
                        class="w-commerce-commercecheckoutlabel label">State/Province</label><input
                        data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.shippingAddressState%22%7D%7D%5D"
                        class="w-commerce-commercecheckoutshippingstateprovince input" name="address_state"
                        type="text" required /></div>
                    <div class="w-commerce-commercecheckoutcolumn"><label for=""
                        class="w-commerce-commercecheckoutlabel label">Zip/Postal Code</label><input
                        data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.shippingAddressPostalCode%22%7D%7D%5D"
                        data-node-type="commerce-checkout-shipping-zip-field"
                        class="w-commerce-commercecheckoutshippingzippostalcode input" name="address_zip" type="text"
                        required="" /></div>
                  </div><label for="" class="w-commerce-commercecheckoutlabel label">Country</label>
                  <div class="select-wrapper no-margin-bottom"><select
                      class="w-commerce-commercecheckoutshippingcountryselector select" name="address_country" required>
                      <option disabled selected>Select a country</option>
                      <option value="AF">Afghanistan</option>
                      <option value="AX">Aland Islands</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AG">Antigua and Barbuda</option>
                      <option value="AR">Argentina</option>
                      <option value="AM">Armenia</option>
                      <option value="AW">Aruba</option>
                      <option value="AU">Australia</option>
                      <option value="AT">Austria</option>
                      <option value="AZ">Azerbaijan</option>
                      <option value="BS">Bahamas</option>
                      <option value="BH">Bahrain</option>
                      <option value="BD">Bangladesh</option>
                      <option value="BB">Barbados</option>
                      <option value="BY">Belarus</option>
                      <option value="BE">Belgium</option>
                      <option value="BZ">Belize</option>
                      <option value="BJ">Benin</option>
                      <option value="BM">Bermuda</option>
                      <option value="BT">Bhutan</option>
                      <option value="BO">Bolivia</option>
                      <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                      <option value="BA">Bosnia and Herzegovina</option>
                      <option value="BW">Botswana</option>
                      <option value="BR">Brazil</option>
                      <option value="IO">British Indian Ocean Territory</option>
                      <option value="VG">British Virgin Islands</option>
                      <option value="BN">Brunei</option>
                      <option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option>
                      <option value="BI">Burundi</option>
                      <option value="CV">Cabo Verde</option>
                      <option value="KH">Cambodia</option>
                      <option value="CM">Cameroon</option>
                      <option value="CA">Canada</option>
                      <option value="KY">Cayman Islands</option>
                      <option value="CF">Central African Republic</option>
                      <option value="TD">Chad</option>
                      <option value="CL">Chile</option>
                      <option value="CN">China</option>
                      <option value="CX">Christmas Island</option>
                      <option value="CC">Cocos Islands</option>
                      <option value="CO">Colombia</option>
                      <option value="KM">Comoros</option>
                      <option value="CK">Cook Islands</option>
                      <option value="CR">Costa Rica</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CW">Curacao</option>
                      <option value="CY">Cyprus</option>
                      <option value="CZ">Czechia</option>
                      <option value="CD">Democratic Republic of the Congo</option>
                      <option value="DK">Denmark</option>
                      <option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option>
                      <option value="DO">Dominican Republic</option>
                      <option value="EC">Ecuador</option>
                      <option value="EG">Egypt</option>
                      <option value="SV">El Salvador</option>
                      <option value="GQ">Equatorial Guinea</option>
                      <option value="ER">Eritrea</option>
                      <option value="EE">Estonia</option>
                      <option value="SZ">Eswatini</option>
                      <option value="ET">Ethiopia</option>
                      <option value="FK">Falkland Islands</option>
                      <option value="FO">Faroe Islands</option>
                      <option value="FJ">Fiji</option>
                      <option value="FI">Finland</option>
                      <option value="FR">France</option>
                      <option value="GF">French Guiana</option>
                      <option value="PF">French Polynesia</option>
                      <option value="TF">French Southern Territories</option>
                      <option value="GA">Gabon</option>
                      <option value="GM">Gambia</option>
                      <option value="GE">Georgia</option>
                      <option value="DE">Germany</option>
                      <option value="GH">Ghana</option>
                      <option value="GI">Gibraltar</option>
                      <option value="GR">Greece</option>
                      <option value="GL">Greenland</option>
                      <option value="GD">Grenada</option>
                      <option value="GP">Guadeloupe</option>
                      <option value="GU">Guam</option>
                      <option value="GT">Guatemala</option>
                      <option value="GG">Guernsey</option>
                      <option value="GN">Guinea</option>
                      <option value="GW">Guinea-Bissau</option>
                      <option value="GY">Guyana</option>
                      <option value="HT">Haiti</option>
                      <option value="HN">Honduras</option>
                      <option value="HK">Hong Kong</option>
                      <option value="HU">Hungary</option>
                      <option value="IS">Iceland</option>
                      <option value="IN">India</option>
                      <option value="ID">Indonesia</option>
                      <option value="IR">Iran</option>
                      <option value="IQ">Iraq</option>
                      <option value="IE">Ireland</option>
                      <option value="IM">Isle of Man</option>
                      <option value="IL">Israel</option>
                      <option value="IT">Italy</option>
                      <option value="CI">Ivory Coast</option>
                      <option value="JM">Jamaica</option>
                      <option value="JP">Japan</option>
                      <option value="JE">Jersey</option>
                      <option value="JO">Jordan</option>
                      <option value="KZ">Kazakhstan</option>
                      <option value="KE">Kenya</option>
                      <option value="KI">Kiribati</option>
                      <option value="XK">Kosovo</option>
                      <option value="KW">Kuwait</option>
                      <option value="KG">Kyrgyzstan</option>
                      <option value="LA">Laos</option>
                      <option value="LV">Latvia</option>
                      <option value="LB">Lebanon</option>
                      <option value="LS">Lesotho</option>
                      <option value="LR">Liberia</option>
                      <option value="LY">Libya</option>
                      <option value="LI">Liechtenstein</option>
                      <option value="LT">Lithuania</option>
                      <option value="LU">Luxembourg</option>
                      <option value="MO">Macao</option>
                      <option value="MG">Madagascar</option>
                      <option value="MW">Malawi</option>
                      <option value="MY">Malaysia</option>
                      <option value="MV">Maldives</option>
                      <option value="ML">Mali</option>
                      <option value="MT">Malta</option>
                      <option value="MH">Marshall Islands</option>
                      <option value="MQ">Martinique</option>
                      <option value="MR">Mauritania</option>
                      <option value="MU">Mauritius</option>
                      <option value="YT">Mayotte</option>
                      <option value="MX">Mexico</option>
                      <option value="FM">Micronesia</option>
                      <option value="MD">Moldova</option>
                      <option value="MC">Monaco</option>
                      <option value="MN">Mongolia</option>
                      <option value="ME">Montenegro</option>
                      <option value="MS">Montserrat</option>
                      <option value="MA">Morocco</option>
                      <option value="MZ">Mozambique</option>
                      <option value="MM">Myanmar</option>
                      <option value="NA">Namibia</option>
                      <option value="NR">Nauru</option>
                      <option value="NP">Nepal</option>
                      <option value="NL">Netherlands</option>
                      <option value="NC">New Caledonia</option>
                      <option value="NZ">New Zealand</option>
                      <option value="NI">Nicaragua</option>
                      <option value="NE">Niger</option>
                      <option value="NG">Nigeria</option>
                      <option value="NU">Niue</option>
                      <option value="NF">Norfolk Island</option>
                      <option value="KP">North Korea</option>
                      <option value="MK">North Macedonia</option>
                      <option value="MP">Northern Mariana Islands</option>
                      <option value="NO">Norway</option>
                      <option value="OM">Oman</option>
                      <option value="PK">Pakistan</option>
                      <option value="PW">Palau</option>
                      <option value="PS">Palestinian Territory</option>
                      <option value="PA">Panama</option>
                      <option value="PG">Papua New Guinea</option>
                      <option value="PY">Paraguay</option>
                      <option value="PE">Peru</option>
                      <option value="PH">Philippines</option>
                      <option value="PN">Pitcairn</option>
                      <option value="PL">Poland</option>
                      <option value="PT">Portugal</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option>
                      <option value="CG">Republic of the Congo</option>
                      <option value="RE">Reunion</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russia</option>
                      <option value="RW">Rwanda</option>
                      <option value="BL">Saint Barthelemy</option>
                      <option value="SH">Saint Helena</option>
                      <option value="KN">Saint Kitts and Nevis</option>
                      <option value="LC">Saint Lucia</option>
                      <option value="MF">Saint Martin</option>
                      <option value="PM">Saint Pierre and Miquelon</option>
                      <option value="VC">Saint Vincent and the Grenadines</option>
                      <option value="WS">Samoa</option>
                      <option value="SM">San Marino</option>
                      <option value="ST">Sao Tome and Principe</option>
                      <option value="SA">Saudi Arabia</option>
                      <option value="SN">Senegal</option>
                      <option value="RS">Serbia</option>
                      <option value="SC">Seychelles</option>
                      <option value="SL">Sierra Leone</option>
                      <option value="SG">Singapore</option>
                      <option value="SX">Sint Maarten</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="KR">South Korea</option>
                      <option value="SS">South Sudan</option>
                      <option value="ES">Spain</option>
                      <option value="LK">Sri Lanka</option>
                      <option value="SD">Sudan</option>
                      <option value="SR">Suriname</option>
                      <option value="SJ">Svalbard and Jan Mayen</option>
                      <option value="SE">Sweden</option>
                      <option value="CH">Switzerland</option>
                      <option value="SY">Syria</option>
                      <option value="TW">Taiwan</option>
                      <option value="TJ">Tajikistan</option>
                      <option value="TZ">Tanzania</option>
                      <option value="TH">Thailand</option>
                      <option value="TL">Timor Leste</option>
                      <option value="TG">Togo</option>
                      <option value="TK">Tokelau</option>
                      <option value="TO">Tonga</option>
                      <option value="TT">Trinidad and Tobago</option>
                      <option value="TN">Tunisia</option>
                      <option value="TR">Turkey</option>
                      <option value="TM">Turkmenistan</option>
                      <option value="TC">Turks and Caicos Islands</option>
                      <option value="TV">Tuvalu</option>
                      <option value="VI">U.S. Virgin Islands</option>
                      <option value="UG">Uganda</option>
                      <option value="UA">Ukraine</option>
                      <option value="AE">United Arab Emirates</option>
                      <option value="GB">United Kingdom</option>
                      <option value="US">United States</option>
                      <option value="UM">United States Minor Outlying Islands</option>
                      <option value="UY">Uruguay</option>
                      <option value="UZ">Uzbekistan</option>
                      <option value="VU">Vanuatu</option>
                      <option value="VA">Vatican</option>
                      <option value="VE">Venezuela</option>
                      <option value="VN">Vietnam</option>
                      <option value="WF">Wallis and Futuna</option>
                      <option value="EH">Western Sahara</option>
                      <option value="YE">Yemen</option>
                      <option value="ZM">Zambia</option>
                      <option value="ZW">Zimbabwe</option>
                    </select></div>
                </fieldset>
              </div>
            </div>
            <div class="w-commerce-commercecheckoutshippingmethodswrapper order-block">
              <div>
                <div class="w-commerce-commercecheckoutblockheader order-block-header">
                  <h4 class="order-block-heading">Shipping Method</h4>
                </div>
                <fieldset>
                  <div class="w-commerce-commercecheckoutshippingmethodslist shipping-methods-list">
                    <label
                      class="w-commerce-commercecheckoutshippingmethoditem shipping-method-item"><input required=""
                        class="shipping-method-radio-button" value="instant" type="radio" name="shipping-method-choice" />
                      <div class="w-commerce-commercecheckoutshippingmethoddescriptionblock">
                        <div class="w-commerce-commerceboldtextblock">Instant</div>
                        <div class="text-grey">Instant delivery that arrives in less than 2 days</div>
                      </div>
                      <div>Rp 50,000</div>
                    </label>
                    <label
                      class="w-commerce-commercecheckoutshippingmethoditem shipping-method-item"><input required=""
                        class="shipping-method-radio-button" value="reguler" type="radio" name="shipping-method-choice" />
                      <div class="w-commerce-commercecheckoutshippingmethoddescriptionblock">
                        <div class="w-commerce-commerceboldtextblock">Reguler</div>
                        <div class="text-grey">Reguler delivery that arrives in less than 5 days</div>
                      </div>
                      <div>Rp 20,000</div>
                    </label>
                    <label
                      class="w-commerce-commercecheckoutshippingmethoditem shipping-method-item"><input required=""
                        class="shipping-method-radio-button" value="cargo" type="radio" name="shipping-method-choice" />
                      <div class="w-commerce-commercecheckoutshippingmethoddescriptionblock">
                        <div class="w-commerce-commerceboldtextblock">Cargo</div>
                        <div class="text-grey">Cargo delivery that arrives in less than 4 days</div>
                      </div>
                      <div>Rp 35,000</div>
                    </label>
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="w-commerce-commercecheckoutpaymentinfowrapper order-block">
              <div>
                <div class="w-commerce-commercecheckoutblockheader order-block-header">
                  <h4 class="order-block-heading">Payment Info</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent order-block-content">
                  <label for=""
                        class="w-commerce-commercecheckoutlabel label">Payment Method</label>
                  <div class="select-wrapper">
                  <select
                      class="w-commerce-commercecheckoutshippingcountryselector select" name="payment_method" required>
                      <option disabled selected>Select payment method</option>
                      <option value="card">Credit/Debit Card</option>
                      <option value="gopay">Gopay</option>
                      <option value="shopeepay">Shopeepay</option>
                      <option value="dana">Dana</option>
                      <option value="ovo">Ovo</option>
                    </select></div>
                  
                  <div id="card-payment-input">
                    <label for=""
                      class="w-commerce-commercecheckoutlabel label">Card Number</label>
                      <input class="input" style="width:100%" name="card_number" type="number" />
                    <div class="w-commerce-commercecheckoutrow">
                      <div class="w-commerce-commercecheckoutcolumn"><label for=""
                          class="w-commerce-commercecheckoutlabel label">Expiration Date</label>
                        <input class="input" style="width:100%" name="expiration_date" type="date" />
                      </div>
                      <div class="w-commerce-commercecheckoutcolumn"><label for=""
                          class="w-commerce-commercecheckoutlabel label">Security Code</label>
                        <input class="input" style="width:100%" name="security_code" type="number" />
                      </div>
                    </div>
                  </div>
                  <div id="ewallet-payment-input">
                      <label for=""
                        class="w-commerce-commercecheckoutlabel label">Phone Number</label>
                        <input
                        class="input" style="width:100%" name="phone_number" type="number" />
                    </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="w-commerce-commercelayoutsidebar order-sidebar">
            <div class="w-commerce-commercecheckoutorderitemswrapper order-block-side">
              <div class="w-commerce-commercecheckoutsummaryblockheader order-block-side-header">
                <h5 class="no-margin">Items in Order</h5>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent order-block-side-content">
                <div role="list" class="w-commerce-commercecheckoutorderitemslist">
                <?php foreach ($cartItems as $item): ?>
                  <div role="listitem" class="w-commerce-commercecheckoutorderitem"><img
                      src="images/products/<?= htmlspecialchars($item["product_image"]) ?>" alt="" class="w-commerce-commercecartitemimage" />
                    <div class="w-commerce-commercecheckoutorderitemdescriptionwrapper">
                      <div
                        class="w-commerce-commerceboldtextblock"><?= htmlspecialchars($item["product_name"]) ?></div>
                      <div class="w-commerce-commercecheckoutorderitemquantitywrapper">
                        <div>Quantity: <?= htmlspecialchars($item["quantity"]) ?></div>
                      </div>
                      <ul
                        class="w-commerce-commercecheckoutorderitemoptionlist"
                        <li><span
                        </li>
                      </ul>
                    </div>
                    <div>Rp <?= number_format(htmlspecialchars($item["product_price"] * $item["quantity"])) ?></div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutordersummarywrapper order-block-side">
              <div class="w-commerce-commercecheckoutsummaryblockheader order-block-side-header">
                <h5 class="no-margin">Order Summary</h5>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent order-block-side-content">
                <div class="w-commerce-commercecheckoutsummarylineitem">
                  <div>Subtotal</div>
                  <div id="subtotal" data-value="<?= getCartSubtotal($cartItems) ?>">
                  Rp <?= number_format(htmlspecialchars(getCartSubtotal($cartItems))) ?>
                  </div>
                </div>
                <div class="w-commerce-commercecheckoutordersummaryextraitemslist">
                  <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem">
                    <div>Shipping</div>
                    <div id="shipping">-</div>
                  </div>
                </div>
                <div class="w-commerce-commercecheckoutsummarylineitem">
                  <div>Total</div>
                  <div class="w-commerce-commercecheckoutsummarytotal" id="total">
                    -
                    </div>
                </div>
              </fieldset>
            </div><button type="submit"
              class="w-commerce-commercecheckoutplaceorderbutton button" style="width:100%" data-loading-text="Placing Order...">Place Order</button>
          </div>
          </form>
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