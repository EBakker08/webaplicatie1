
<?php
//  Connectie naar database

$host = 'db';
$db = 'mydatabase';
$user = 'user';
$password = 'password';
$charset = 'utf8mb4';

//  pdo opties
$opties = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

//  dsn
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
  //  Create the connection
  $pdo = new PDO($dsn, $user, $password, $opties);
  //  Succes melding
  echo "Database connectie gelukt <br/>";
} catch (PDOException $e) {
  //  Foutmelding
  echo $e->getMessage();
  //  Stop (die)
  die("Sorry. database probleem");
}

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>STRAAT | Arnhem</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/logo.png" type="image/png" alt="STRAAT logo">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
</head>

<body>
  <header class="hero" role="banner">
    <div class="hero-bg"></div>
    <button class="login-btn" onclick="openModal()">Inloggen</button>
    <div class="logo">
      <div class="logo-mark">ST</div>
      <div class="logo-name">STRAAT</div>
      <div class="logo-tagline">Streetfood — Arnhem</div>
    </div>
  </header>

  <nav class="nav-strip" role="navigation" aria-label="Menu navigatie">
    <div class="search-wrap">
      <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.35-4.35" />
      </svg>
      <input type="search" placeholder="Zoek in het menu..." aria-label="Zoek gerechten" id="searchInput" />
    </div>
    <div class="cat-scroll" role="list">
      <button class="cat-btn active" data-cat="all">Alles</button>
      <button class="cat-btn" data-cat="burgers">Burgers</button>
      <button class="cat-btn" data-cat="fries">Friet</button>
      <button class="cat-btn" data-cat="kebab">Kebab</button>
      <button class="cat-btn" data-cat="kapsalon">Kapsalon</button>
      <button class="cat-btn" data-cat="durum">Durum</button>
      <button class="cat-btn" data-cat="snacks">Snacks</button>
      <button class="cat-btn" data-cat="drinks">Dranken</button>
    </div>
  </nav>

  <main class="layout">
    <section class="menu-section" aria-label="Menu">
      <!-- BURGERS -->
      <div class="category-block" data-section="burgers">
        <h2 class="category-title">Burgers</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="burgers" data-name="Straat Classic" data-price="13.50" data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner">🍔</div>
              <span class="product-badge">Bestseller</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">STRAAT Classic</h3>
              <p class="product-desc">Dikke Black Angus smashed patty, huisgemaakte burgersaus, augurk en karamelui op een brioche bun.</p>
              <div class="product-footer">
                <span class="product-price">€ 13,50</span>
                <button class="add-btn" aria-label="STRAAT Classic toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Double Trouble" data-price="16.90" data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner">🍔</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Double Grilled</h3>
              <p class="product-desc">Twee gegrilde patties, American cheese, crispy bacon, jalapeño mayo en verse tomaat.</p>
              <div class="product-footer">
                <span class="product-price">€ 16,50</span>
                <button class="add-btn" aria-label="Double Grilled toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Smoky BBQ Burger" data-price="15.50" data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5ddd5,#e8b8a0)">🍔</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Smoky BBQ</h3>
              <p class="product-desc">Gegrilde patty met gerookte BBQ saus, cheddar, bacon en krokante uitjes op een sesam bun.</p>
              <div class="product-footer">
                <span class="product-price">€ 15,50</span>
                <button class="add-btn" aria-label="Smoky BBQ toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Crispy Chicken" data-price="13.90" data-emoji="🍗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fdf3d5,#f5e0a0)">🍗</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Crispy Chicken</h3>
              <p class="product-desc">Gefrituurde kipfilet met koolslaw, sriracha honing en ingelegde komkommer.</p>
              <div class="product-footer">
                <span class="product-price">€ 14,50</span>
                <button class="add-btn" aria-label="Crispy Chicken toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Fire Bird Burger" data-price="14.50" data-emoji="🌶️">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fde8d5,#f9bea0)">🌶️</div>
              <span class="product-badge">Pittig</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Fire Bird Burger</h3>
              <p class="product-desc">Dubbel gemarineerde pittige kip, ghost pepper mayo, jalapeño's en ijsbergsla.</p>
              <div class="product-footer">
                <span class="product-price">€ 14,95</span>
                <button class="add-btn" aria-label="Fire Bird Burger toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Green Monster" data-price="14.20" data-emoji="🥗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#ddf0c0,#c5e89a)">🥗</div>
              <span class="product-badge badge-green">Vegan</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Green Monster</h3>
              <p class="product-desc">Plant-based patty met avocado, rucola, tomaat en frisse citroen-tahini dressing.</p>
              <div class="product-footer">
                <span class="product-price">€ 15,50</span>
                <button class="add-btn" aria-label="Green Monster toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- FRIES -->
      <div class="category-block" data-section="fries">
        <h2 class="category-title">Loaded Fries</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="fries" data-name="Truffle Fries" data-price="9.50" data-emoji="🍟">
            <div class="product-image">
              <div class="product-image-inner">🍟</div>
              <span class="product-badge">Fan favorite</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Truffle Fries</h3>
              <p class="product-desc">Huisgesneden friet met truffelolie, Parmezaan en verse peterselie.</p>
              <div class="product-footer">
                <span class="product-price">€ 7,50</span>
                <button class="add-btn" aria-label="Truffle Fries toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="fries" data-name="Cheese Fries" data-price="8.90" data-emoji="🧀">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fef9d5,#fce79a)">🧀</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Cheese Fries</h3>
              <p class="product-desc">Krokante friet overgoten met romige cheddar saus en crispy ui.</p>
              <div class="product-footer">
                <span class="product-price">€ 6,50</span>
                <button class="add-btn" aria-label="Cheese Fries toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="fries" data-name="Pulled Pork Fries" data-price="11.50" data-emoji="🥩">
            <div class="product-image">
              <div class="product-image-inner">🥩</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Pulled Pork Fries</h3>
              <p class="product-desc">Friet met langzaam gegaarde pulled pork, BBQ saus en jalapeño's.</p>
              <div class="product-footer">
                <span class="product-price">€ 9,50</span>
                <button class="add-btn" aria-label="Pulled Pork Fries toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- KEBAB -->
      <div class="category-block" data-section="kebab">
        <h2 class="category-title">Kebab &amp; Shoarma</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="kebab" data-name="Klassieke Shoarma" data-price="11.00" data-emoji="🌯">
            <div class="product-image">
              <div class="product-image-inner">🌯</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Klassieke Shoarma</h3>
              <p class="product-desc">Malse kipshoarma met verse sla, tomaat, ui en knoflooksaus in een warm pita brood.</p>
              <div class="product-footer">
                <span class="product-price">€ 15,50</span>
                <button class="add-btn" aria-label="Klassieke Shoarma toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="kebab" data-name="Kebab Schotel" data-price="12.50" data-emoji="🥙">
            <div class="product-image">
              <div class="product-image-inner">🥙</div>
              <span class="product-badge">Nieuw</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kebab Schotel</h3>
              <p class="product-desc">Gegrild kebabvlees op een bedje van fijngesneden groenten met tzatziki en hummus.</p>
              <div class="product-footer">
                <span class="product-price">€ 16,50</span>
                <button class="add-btn" aria-label="Kebab Schotel toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- KAPSALON -->
      <div class="category-block" data-section="kapsalon">
        <h2 class="category-title">Kapsalon</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="kapsalon" data-name="Kapsalon Doner" data-price="13.50" data-emoji="🥗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5f0d5,#ece09a)">🥗</div>
              <span class="product-badge">Aanbevolen</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kapsalon Doner</h3>
              <p class="product-desc">Friet met donervlees, gesmolten Gouda, ijsbergsla, tomaat en knoflooksaus. Een echte klassieker van STRAAT.</p>
              <div class="product-footer">
                <span class="product-price">€ 14,50</span>
                <button class="add-btn" aria-label="Kapsalon Doner toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="kapsalon" data-name="Kapsalon Shoarma" data-price="13.50" data-emoji="🥗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fdecd5,#f5cfa0)">🥗</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kapsalon Shoarma</h3>
              <p class="product-desc">Friet met kipshoarma, gesmolten Gouda, verse salade en huisgemaakte sambal &amp; knoflooksaus.</p>
              <div class="product-footer">
                <span class="product-price">€ 14,50</span>
                <button class="add-btn" aria-label="Kapsalon Shoarma toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- DURUM -->
      <div class="category-block" data-section="durum">
        <h2 class="category-title">Durum</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="durum" data-name="Straat Durum" data-price="10.50" data-emoji="🫔">
            <div class="product-image">
              <div class="product-image-inner">🫔</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Straat Durum</h3>
              <p class="product-desc">Dunne durum met gemengd gegrild vlees, verse groenten, geraspte kaas en huissaus.
              </p>
              <div class="product-footer">
                <span class="product-price">€ 9,50</span>
                <button class="add-btn" aria-label="Straat Durum toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="durum" data-name="Spicy Kip Durum" data-price="10.90" data-emoji="🌶️">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fde8d5,#f9bea0)">🌶️</div>
              <span class="product-badge">Pittig</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Spicy Kip Durum</h3>
              <p class="product-desc">Gemarineerde kip met sriracha, rode peper, coleslaw en limoen crème.</p>
              <div class="product-footer">
                <span class="product-price">€ 10,50</span>
                <button class="add-btn" aria-label="Spicy Kip Durum toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- SNACKS -->
      <div class="category-block" data-section="snacks">
        <h2 class="category-title">Snacks</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="snacks" data-name="Mozzarella Sticks" data-price="7.50" data-emoji="🧀">
            <div class="product-image">
              <div class="product-image-inner">🧀</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Mozzarella Sticks</h3>
              <p class="product-desc">Knapperige mozzarella sticks met marinara saus. 6 stuks per portie.</p>
              <div class="product-footer">
                <span class="product-price">€ 6,50</span>
                <button class="add-btn" aria-label="Mozzarella Sticks toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="snacks" data-name="Onion Rings" data-price="6.50" data-emoji="🍩">
            <div class="product-image">
              <div class="product-image-inner">🧅</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Onion Rings</h3>
              <p class="product-desc">Dikke, knapperig gepaneerde uienringen met chipotle dip. 6 stuks per portie.</p>
              <div class="product-footer">
                <span class="product-price">€ 5,95</span>
                <button class="add-btn" aria-label="Onion Rings toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- DRINKS -->
      <div class="category-block" data-section="drinks">
        <h2 class="category-title">Dranken</h2>
        <div class="product-grid">
          <article class="product-card" data-cat="drinks" data-name="Huislimonade" data-price="4.50" data-emoji="🍋">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fffde0,#fef5a0)">🍋</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">STRAAT Limonade</h3>
              <p class="product-desc">Dagvers geperste limonade met munt en een vleugje gember. (Inclusief € 0,15 plastic toeslag)</p>
              <div class="product-footer">
                <span class="product-price">€ 4,65</span>
                <button class="add-btn" aria-label="Huislimonade toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Cola" data-price="3.00" data-emoji="🥤">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5d5d5,#e89a9a)">🥤</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Coca-Cola</h3>
              <p class="product-desc">IJskoude Coca-Cola, geserveerd met ijs en een schijfje citroen. (Inclusief € 0,15 plastic toeslag)</p>
              <div class="product-footer">
                <span class="product-price">€ 3,65</span>
                <button class="add-btn" aria-label="Cola toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Cola" data-price="3.00" data-emoji="🥤">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5d5d5,#e89a9a)">🥤</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Coca-Cola Zero</h3>
              <p class="product-desc">Coca-Cola Zero, geserveerd met ijs en een schijfje citroen. (Inclusief € 0,15 plastic toeslag)</p>
              <div class="product-footer">
                <span class="product-price">€ 3,65</span>
                <button class="add-btn" aria-label="Cola Zero toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Fanta" data-price="3.00" data-emoji="🍊">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fef0d5,#fcc97a)">🍊</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Fanta Orange</h3>
              <p class="product-desc">Verfrissende Fanta Orange, geserveerd ijskoud met ijs. (Inclusief € 0,15 plastic toeslag)</p>
              <div class="product-footer">
                <span class="product-price">€ 3,65</span>
                <button class="add-btn" aria-label="Fanta toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Ijsthee" data-price="3.50" data-emoji="🍵">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#edf5d5,#cce89a)">🍵</div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Lipton Icetea Green</h3>
              <p class="product-desc">IJskoude Icetea Green, geserveerd met ijs en een schijfje citroen. (Inclusief € 0,15 plastic toeslag)</p>
              <div class="product-footer">
                <span class="product-price">€ 3,65</span>
                <button class="add-btn" aria-label="Ijsthee toevoegen">+</button>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
    <!-- CART -->
    <aside class="cart-sidebar" aria-label="Jouw bestelling">
      <div class="cart-header">
        <p class="cart-title">Jouw bestelling</p>
        <p class="cart-count" id="cartCount">0 items</p>
      </div>
      <div class="cart-items" id="cartItems">
        <div class="empty-cart" id="emptyCart">
          <span class="empty-cart-icon">🛍️</span>
          <p>Je winkelwagen is nog leeg.<br />Voeg iets lekkers toe!</p>
        </div>
      </div>
      <div class="cart-footer" id="cartFooter" style="display:none">
        <div class="cart-subtotal">
          <span class="cart-subtotal-label">Subtotaal</span>
          <span class="cart-subtotal-value" id="subtotal">€ 0,00</span>
        </div>
        <div class="cart-subtotal">
          <span class="cart-subtotal-label">Servicekosten</span>
          <span class="cart-subtotal-value">€ 1,50</span>
        </div>
        <div class="cart-total-row">
          <span class="cart-total-label">Totaal</span>
          <span class="cart-total-amount" id="cartTotal">€ 0,00</span>
        </div>
        <button class="checkout-btn" onclick="checkout()">Bestellen &rarr;</button>
      </div>
    </aside>
  </main>

  <!-- LOGIN MODAL -->
  <div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <button class="modal-close" onclick="closeModal()" aria-label="Sluiten">&times;</button>
      <div class="modal-logo">ST</div>
      <h2 class="modal-title" id="modalTitle">Welkom terug</h2>
      <p class="modal-sub">Log in op je Straat account</p>
      <form class="modal-form" onsubmit="handleLogin(event)">
        <div class="form-group">
          <label for="emailInput">E-mailadres</label>
          <input type="email" id="emailInput" placeholder="jouw@email.nl" autocomplete="email" required />
        </div>
        <div class="form-group">
          <label for="passwordInput">Wachtwoord</label>
          <div class="password-wrap">
            <input type="password" id="passwordInput" placeholder="••••••••" autocomplete="current-password" required />
            <button type="button" class="toggle-pw" onclick="togglePassword()" aria-label="Wachtwoord tonen">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
            </button>
          </div>
        </div>
        <a href="#" class="forgot-link">Wachtwoord vergeten?</a>
        <button type="submit" class="modal-submit" id="submitBtn">Inloggen</button>
      </form>
      <p class="modal-register">Nog geen account? <a href="#">Registreer je gratis</a></p>
    </div>
  </div>

  <div class="toast" id="toast" role="status" aria-live="polite"></div>



  <script>
    const cart = {};

    function openModal() {
        document.getElementById('modalOverlay').classList.add('open');
        document.body.style.overflow = 'hidden';
        setTimeout(() => document.getElementById('emailInput').focus(), 300);
    }

    function closeModal(e) {
        if (e && e.target !== document.getElementById('modalOverlay')) return;
        document.getElementById('modalOverlay').classList.remove('open');
        document.body.style.overflow = '';
    }

    function togglePassword() {
        const input = document.getElementById('passwordInput');
        const icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';
        } else {
            input.type = 'password';
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    }

    function handleLogin(e) {
        e.preventDefault();
        const btn = document.getElementById('submitBtn');
        btn.textContent = 'Laden...';
        btn.classList.add('loading');
        setTimeout(() => {
            btn.textContent = 'Inloggen';
            btn.classList.remove('loading');
            document.getElementById('modalOverlay').classList.remove('open');
            document.body.style.overflow = '';
            showToast('✅ Welkom terug!');
        }, 1200);
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') { document.getElementById('modalOverlay').classList.remove('open'); document.body.style.overflow = ''; }
    });



    function fmt(n) {
        return '€\u00A0' + n.toFixed(2).replace('.', ',');
    }

    function updateCart() {
        const itemsEl = document.getElementById('cartItems');
        const emptyEl = document.getElementById('emptyCart');
        const footerEl = document.getElementById('cartFooter');
        const countEl = document.getElementById('cartCount');
        const totalEl = document.getElementById('cartTotal');
        const subEl = document.getElementById('subtotal');

        document.querySelectorAll('.cart-item').forEach(el => el.remove());

        const keys = Object.keys(cart).filter(k => cart[k].qty > 0);

        if (!keys.length) {
            emptyEl.style.display = 'flex';
            footerEl.style.display = 'none';
            countEl.textContent = '0 items';
            return;
        }

        emptyEl.style.display = 'none';
        footerEl.style.display = 'block';

        let sub = 0, total = 0;
        keys.forEach(k => {
            const it = cart[k];
            sub += it.price * it.qty;
            total += it.qty;
            const div = document.createElement('div');
            div.className = 'cart-item';
            div.innerHTML = `
            <div class="cart-item-icon">${it.emoji}</div>
            <div class="cart-item-info">
              <p class="cart-item-name">${it.name}</p>
              <p class="cart-item-price">${fmt(it.price)}</p>
            </div>
            <div class="qty-control">
              <button class="qty-btn" onclick="changeQty('${k}',-1)" aria-label="Minder">&#8722;</button>
              <span class="qty-num">${it.qty}</span>
              <button class="qty-btn" onclick="changeQty('${k}',1)" aria-label="Meer">+</button>
            </div>`;
            itemsEl.appendChild(div);
        });

        countEl.textContent = total + (total === 1 ? ' item' : ' items');
        subEl.textContent = fmt(sub);
        totalEl.textContent = fmt(sub + 0.5);
    }

    function addToCart(name, price, emoji) {
        if (!cart[name]) cart[name] = { name, price: parseFloat(price), emoji, qty: 0 };
        cart[name].qty++;
        updateCart();
        showToast(emoji + '  ' + name + ' toegevoegd!');
    }

    function changeQty(key, d) {
        if (cart[key]) { cart[key].qty = Math.max(0, cart[key].qty + d); updateCart(); }
    }

    function checkout() {
        showToast('✅ Bestelling geplaatst! Smakelijk!');
        Object.keys(cart).forEach(k => delete cart[k]);
        setTimeout(updateCart, 200);
    }

    let toastT;
    function showToast(msg) {
        const t = document.getElementById('toast');
        t.textContent = msg;
        t.classList.add('show');
        clearTimeout(toastT);
        toastT = setTimeout(() => t.classList.remove('show'), 2200);
    }

    document.querySelectorAll('.add-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const card = btn.closest('.product-card');
            addToCart(card.dataset.name, card.dataset.price, card.dataset.emoji);
            btn.textContent = '✓';
            btn.style.background = 'var(--green-mid)';
            setTimeout(() => { btn.textContent = '+'; btn.style.background = ''; }, 700);
        });
    });

    document.querySelectorAll('.cat-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const cat = btn.dataset.cat;
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = (cat === 'all' || card.dataset.cat === cat) ? '' : 'none';
            });
            document.querySelectorAll('.category-block').forEach(block => {
                block.style.display = block.querySelectorAll('.product-card:not([style*="none"])').length ? '' : 'none';
            });
        });
    });

    document.getElementById('searchInput').addEventListener('input', e => {
        const q = e.target.value.toLowerCase();
        document.querySelectorAll('.product-card').forEach(card => {
            const match = (card.dataset.name + card.querySelector('.product-desc').textContent).toLowerCase().includes(q);
            card.style.display = match ? '' : 'none';
        });
        document.querySelectorAll('.category-block').forEach(block => {
            block.style.display = block.querySelectorAll('.product-card:not([style*="none"])').length ? '' : 'none';
        });
    });
  </script>
</body>

</html>
