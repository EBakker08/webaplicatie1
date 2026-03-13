
<?php

include_once 'database.php';

?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>STRAAT | Arnhem</title>
  <link rel="icon" href="img/logo.png" type="image/png" alt="STRAAT logo">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="hero" role="banner">

    <!-- Decoratieve achtergrondlaag met kleurverlopen -->
    <div class="hero-bg"></div>

    <div class="hero-actions">
      <button class="hero-btn" id="adminBtn" onclick="goAdmin()">⚙ Admin</button>
      <button class="hero-btn" id="loginBtn" onclick="handleAuthClick()">Inloggen</button>
    </div>

    <!-- Gecentreerd logo: oranje blokje + naam + tagline -->
    <div class="logo">
      <div class="logo-mark">ST</div>
      <div class="logo-name">STRAAT</div>
      <div class="logo-tagline">Streetfood — Arnhem</div>
    </div>

  </header>
  <nav class="nav-strip" role="navigation" aria-label="Menu navigatie">

    <!-- Zoekbalk met vergroot-glas icoon -->
    <div class="search-wrap">
      <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.35-4.35" />
      </svg>
      <!-- id="searchInput" wordt door JS gebruikt voor de zoekfunctie -->
      <input type="search" placeholder="Zoek in het menu..." aria-label="Zoek gerechten" id="searchInput" />
    </div>

    <!-- Categorie-filterknopjes — data-cat wordt door JS gebruikt om te filteren -->
    <div class="cat-scroll" role="list">
      <button class="cat-btn active" data-cat="all">Alles</button>
      <button class="cat-btn" data-cat="burgers">Burgers</button>
      <button class="cat-btn" data-cat="fries">Loaded Fries</button>
      <button class="cat-btn" data-cat="kebab">Kebab</button>
      <button class="cat-btn" data-cat="kapsalon">Kapsalon</button>
      <button class="cat-btn" data-cat="durum">Durum</button>
      <button class="cat-btn" data-cat="snacks">Snacks</button>
      <button class="cat-btn" data-cat="drinks">Dranken</button>
    </div>

  </nav>

  <main class="layout">

    <section class="menu-section" aria-label="Menu">

      <!-- ── BURGERS ─────────────────────────────────────────── -->
      <div class="category-block" data-section="burgers">
        <h2 class="category-title">Burgers</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="burgers" data-name="Straat Classic" data-price="13.50"
            data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Bestseller</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Straat Classic</h3>
              <p class="product-desc">Dikke Black Angus smashed patty, huisgemaakte burgersaus, augurk en karamelui op
                een brioche bun.</p>
              <div class="product-footer">
                <span class="product-price">€ 13,50</span>
                <button class="add-btn" aria-label="Straat Classic toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Double Trouble" data-price="16.90"
            data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Double Trouble</h3>
              <p class="product-desc">Twee gegrilde patties, American cheese, crispy bacon, jalapeño mayo en verse
                tomaat.</p>
              <div class="product-footer">
                <span class="product-price">€ 16,90</span>
                <button class="add-btn" aria-label="Double Trouble toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Green Monster" data-price="14.20" data-emoji="🥗">
            <div class="product-image">
              <!-- Inline stijl overschrijft de standaard crème gradient voor dit product -->
              <div class="product-image-inner" style="background:linear-gradient(135deg,#ddf0c0,#c5e89a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
              <!-- badge-green geeft de groene kleur ipv oranje -->
              <span class="product-badge badge-green">Vegan</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Green Monster</h3>
              <p class="product-desc">Plant-based patty met avocado, rucola, tomaat en frisse citroen-tahini dressing.
              </p>
              <div class="product-footer">
                <span class="product-price">€ 14,20</span>
                <button class="add-btn" aria-label="Green Monster toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Crispy Chicken" data-price="13.90"
            data-emoji="🍗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fdf3d5,#f5e0a0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Crispy Chicken</h3>
              <p class="product-desc">Gefrituurde kipfilet met koolslaw, sriracha honing en ingelegde komkommer.</p>
              <div class="product-footer">
                <span class="product-price">€ 13,90</span>
                <button class="add-btn" aria-label="Crispy Chicken toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Smoky BBQ Burger" data-price="15.50"
            data-emoji="🍔">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5ddd5,#e8b8a0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Smoky BBQ Burger</h3>
              <p class="product-desc">Gegrilde patty met gerookte BBQ saus, cheddar, bacon en krokante uitjes op een
                sesam bun.</p>
              <div class="product-footer">
                <span class="product-price">€ 15,50</span>
                <button class="add-btn" aria-label="Smoky BBQ Burger toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="burgers" data-name="Fire Bird Burger" data-price="14.50"
            data-emoji="🌶️">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fde8d5,#f9bea0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Pittig</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Fire Bird Burger</h3>
              <p class="product-desc">Dubbel gemarineerde pittige kip, ghost pepper mayo, jalapeño's en ijsbergsla. Niet
                voor angsthazen.</p>
              <div class="product-footer">
                <span class="product-price">€ 14,50</span>
                <button class="add-btn" aria-label="Fire Bird Burger toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── LOADED FRIES ─────────────────────────────────────── -->
      <div class="category-block" data-section="fries">
        <h2 class="category-title">Loaded Fries</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="fries" data-name="Truffle Fries" data-price="9.50" data-emoji="🍟">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Fan fave</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Truffle Fries</h3>
              <p class="product-desc">Huisgesneden friet met truffelolie, Parmezaan en verse peterselie.</p>
              <div class="product-footer">
                <span class="product-price">€ 9,50</span>
                <button class="add-btn" aria-label="Truffle Fries toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="fries" data-name="Cheese Fries" data-price="8.90" data-emoji="🧀">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fef9d5,#fce79a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Cheese Fries</h3>
              <p class="product-desc">Krokante friet overgoten met romige cheddar saus en crispy ui.</p>
              <div class="product-footer">
                <span class="product-price">€ 8,90</span>
                <button class="add-btn" aria-label="Cheese Fries toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="fries" data-name="Pulled Pork Fries" data-price="11.50"
            data-emoji="🥩">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Pulled Pork Fries</h3>
              <p class="product-desc">Friet met langzaam gegaarde pulled pork, BBQ saus en jalapeño's.</p>
              <div class="product-footer">
                <span class="product-price">€ 11,50</span>
                <button class="add-btn" aria-label="Pulled Pork Fries toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── KEBAB & SHOARMA ──────────────────────────────────── -->
      <div class="category-block" data-section="kebab">
        <h2 class="category-title">Kebab &amp; Shoarma</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="kebab" data-name="Klassieke Shoarma" data-price="11.00"
            data-emoji="🌯">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Klassieke Shoarma</h3>
              <p class="product-desc">Malse kipshoarma met verse sla, tomaat, ui en knoflooksaus in een warm pita brood.
              </p>
              <div class="product-footer">
                <span class="product-price">€ 11,00</span>
                <button class="add-btn" aria-label="Klassieke Shoarma toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="kebab" data-name="Kebab Schotel" data-price="12.50" data-emoji="🥙">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Nieuw</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kebab Schotel</h3>
              <p class="product-desc">Gegrild kebabvlees op een bedje van fijngesneden groenten met tzatziki en hummus.
              </p>
              <div class="product-footer">
                <span class="product-price">€ 12,50</span>
                <button class="add-btn" aria-label="Kebab Schotel toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── KAPSALON ─────────────────────────────────────────── -->
      <div class="category-block" data-section="kapsalon">
        <h2 class="category-title">Kapsalon</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="kapsalon" data-name="Kapsalon Doner" data-price="13.50"
            data-emoji="🥗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5f0d5,#ece09a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Favoriet</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kapsalon Doner</h3>
              <p class="product-desc">Friet met donervlees, gesmolten Gouda, ijsbergsla, tomaat en knoflooksaus. Een
                klassieker van de straat.</p>
              <div class="product-footer">
                <span class="product-price">€ 13,50</span>
                <button class="add-btn" aria-label="Kapsalon Doner toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="kapsalon" data-name="Kapsalon Shoarma" data-price="13.50"
            data-emoji="🥗">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fdecd5,#f5cfa0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Kapsalon Shoarma</h3>
              <p class="product-desc">Friet met kipshoarma, gesmolten Gouda, verse salade en huisgemaakte sambal &amp;
                knoflooksaus.</p>
              <div class="product-footer">
                <span class="product-price">€ 13,50</span>
                <button class="add-btn" aria-label="Kapsalon Shoarma toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── DURUM ────────────────────────────────────────────── -->
      <div class="category-block" data-section="durum">
        <h2 class="category-title">Durum</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="durum" data-name="Straat Durum" data-price="10.50" data-emoji="🫔">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Straat Durum</h3>
              <p class="product-desc">Dunne durum met gemengd gegrild vlees, verse groenten, geraspte kaas en huissaus.
              </p>
              <div class="product-footer">
                <span class="product-price">€ 10,50</span>
                <button class="add-btn" aria-label="Straat Durum toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="durum" data-name="Spicy Kip Durum" data-price="10.90"
            data-emoji="🌶️">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fde8d5,#f9bea0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
              <span class="product-badge">Pittig</span>
            </div>
            <div class="product-body">
              <h3 class="product-name">Spicy Kip Durum</h3>
              <p class="product-desc">Gemarineerde kip met sriracha, rode peper, coleslaw en limoen crème.</p>
              <div class="product-footer">
                <span class="product-price">€ 10,90</span>
                <button class="add-btn" aria-label="Spicy Kip Durum toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── SNACKS ───────────────────────────────────────────── -->
      <div class="category-block" data-section="snacks">
        <h2 class="category-title">Snacks</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="snacks" data-name="Mozzarella Sticks" data-price="7.50"
            data-emoji="🧀">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Mozzarella Sticks</h3>
              <p class="product-desc">Knapperige mozzarella sticks met marinara saus — 6 stuks per portie.</p>
              <div class="product-footer">
                <span class="product-price">€ 7,50</span>
                <button class="add-btn" aria-label="Mozzarella Sticks toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="snacks" data-name="Onion Rings" data-price="6.50" data-emoji="🍩">
            <div class="product-image">
              <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT"
                  alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Onion Rings</h3>
              <p class="product-desc">Dikke, knapperig gepaneerde uienringen met chipotle dip.</p>
              <div class="product-footer">
                <span class="product-price">€ 6,50</span>
                <button class="add-btn" aria-label="Onion Rings toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- ── DRANKEN ──────────────────────────────────────────── -->
      <div class="category-block" data-section="drinks">
        <h2 class="category-title">Dranken</h2>
        <div class="product-grid">

          <article class="product-card" data-cat="drinks" data-name="Huislimonade" data-price="4.50" data-emoji="🍋">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fffde0,#fef5a0)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Huislimonade</h3>
              <p class="product-desc">Dagvers geperste limonade met munt en een vleugje gember.</p>
              <div class="product-footer">
                <span class="product-price">€ 4,50</span>
                <button class="add-btn" aria-label="Huislimonade toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Cola" data-price="3.00" data-emoji="🥤">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#f5d5d5,#e89a9a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Cola</h3>
              <p class="product-desc">IJskoude Coca-Cola, geserveerd met ijs en een schijfje citroen.</p>
              <div class="product-footer">
                <span class="product-price">€ 3,00</span>
                <button class="add-btn" aria-label="Cola toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Fanta" data-price="3.00" data-emoji="🍊">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#fef0d5,#fcc97a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Fanta</h3>
              <p class="product-desc">Verfrissende Fanta Orange, geserveerd ijskoud met ijs.</p>
              <div class="product-footer">
                <span class="product-price">€ 3,00</span>
                <button class="add-btn" aria-label="Fanta toevoegen">+</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-cat="drinks" data-name="Ijsthee" data-price="3.50" data-emoji="🍵">
            <div class="product-image">
              <div class="product-image-inner" style="background:linear-gradient(135deg,#edf5d5,#cce89a)"><img
                  src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto"
                  style="width:100%;height:100%;object-fit:cover;" /></div>
            </div>
            <div class="product-body">
              <h3 class="product-name">Ijsthee</h3>
              <p class="product-desc">Huisgemaakte ijsthee met citroen en een vleugje honing — licht en verfrissend.</p>
              <div class="product-footer">
                <span class="product-price">€ 3,50</span>
                <button class="add-btn" aria-label="Ijsthee toevoegen">+</button>
              </div>
            </div>
          </article>

        </div>
      </div>

    </section>

    <aside class="cart-sidebar" aria-label="Jouw bestelling">

      <!-- Bovenste balk: label + item-teller (bijgewerkt door JS) -->
      <div class="cart-header">
        <p class="cart-title">Jouw bestelling</p>
        <p class="cart-count" id="cartCount">0 items</p>
      </div>

      <!-- Scrollbare lijst waar JS de cart-items in plaatst -->
      <div class="cart-items" id="cartItems">
        <!-- Lege-winkelwagen bericht — JS verbergt dit zodra er items zijn -->
        <div class="empty-cart" id="emptyCart">
          <span class="empty-cart-icon">🛍️</span>
          <p>Je bestelling is nog leeg.<br />Voeg iets lekkers toe!</p>
        </div>
      </div>

      <!-- Prijsoverzicht + bestelknop — standaard verborgen, JS toont het -->
      <div class="cart-footer" id="cartFooter" style="display:none">
        <div class="cart-subtotal">
          <span class="cart-subtotal-label">Subtotaal</span>
          <!-- id="subtotal" wordt door JS bijgewerkt -->
          <span class="cart-subtotal-value" id="subtotal">€ 0,00</span>
        </div>
        <div class="cart-subtotal">
          <span class="cart-subtotal-label">Servicekosten</span>
          <span class="cart-subtotal-value">€ 0,50</span>
        </div>
        <div class="cart-total-row">
          <span class="cart-total-label">Totaal</span>
          <!-- id="cartTotal" wordt door JS bijgewerkt -->
          <span class="cart-total-amount" id="cartTotal">€ 0,00</span>
        </div>
        <!-- Roept de JS checkout()-functie aan -->
        <button class="checkout-btn" onclick="checkout()">Bestellen &rarr;</button>
      </div>

    </aside>

  </main>

  <!-- ============================================================
     LOGIN MODAL — Verschijnt over de pagina heen als de user
     op "Inloggen" klikt. Bevat rol-keuze (Bezoeker / Admin),
     e-mail + wachtwoord formulier.
     JS beheert zichtbaarheid via de .open CSS-klasse.
     ============================================================ -->
  <div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

      <!-- Sluitknop (×) rechtsboven in de modal -->
      <button class="modal-close" onclick="closeModal()" aria-label="Sluiten">&times;</button>

      <!-- Klein oranje logo-blokje bovenin -->
      <div class="modal-logo">ST</div>

      <h2 class="modal-title" id="modalTitle">Welkom terug</h2>
      <p class="modal-sub">Log in op je Straat account</p>

      <!-- ── ROL KEUZE ──────────────────────────────────────────
         Twee knoppen in een pill-toggle: Bezoeker of Admin.
         JS leest welke actief is bij het inloggen.
         Standaard staat Bezoeker geselecteerd. -->
      <div class="role-toggle" role="group" aria-label="Kies je rol">
        <button type="button" class="role-btn active" id="roleBezoeker" onclick="setRole('bezoeker')">Bezoeker</button>
        <button type="button" class="role-btn" id="roleAdmin" onclick="setRole('admin')">Admin</button>
      </div>

      <!-- Formulier — onsubmit roept JS handleLogin() aan -->
      <form class="modal-form" onsubmit="handleLogin(event)">

        <!-- E-mailadres veld -->
        <div class="form-group">
          <label for="emailInput">E-mailadres</label>
          <input type="email" id="emailInput" placeholder="jouw@email.nl" autocomplete="email" required />
        </div>

        <!-- Wachtwoordveld met toon/verberg-knop -->
        <div class="form-group">
          <label for="passwordInput">Wachtwoord</label>
          <div class="password-wrap">
            <input type="password" id="passwordInput" placeholder="••••••••" autocomplete="current-password" required />
            <!-- Oogicoon — JS wisselt tussen type="password" en type="text" -->
            <button type="button" class="toggle-pw" onclick="togglePassword()" aria-label="Wachtwoord tonen">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Link voor wachtwoord reset (nog niet functioneel) -->
        <a href="#" class="forgot-link">Wachtwoord vergeten?</a>

        <!-- Submitknop — id="submitBtn" wordt door JS aangepast tijdens laden -->
        <button type="submit" class="modal-submit" id="submitBtn">Inloggen</button>

      </form>

      <!-- Registratie-link onderaan (nog niet functioneel) -->
      <p class="modal-register">Nog geen account? <a href="#">Registreer je gratis</a></p>

    </div>
  </div>

  <!-- ============================================================
     ADMIN PANEEL — Schuift van rechts in als admin ingelogd is.
     Toont alle menu-items met bewerkbare naam en prijs.
     Opslaan past de productkaarten live aan op de pagina.
     ============================================================ -->
  <div class="admin-overlay" id="adminOverlay" onclick="closeAdminPanel(event)">
    <div class="admin-panel" role="dialog" aria-modal="true" aria-label="Menu beheer">

      <!-- Bovenste balk: logo + titel + sluitknop -->
      <div class="admin-header">
        <div class="admin-header-left">
          <div class="admin-logo">ST</div>
          <div>
            <p class="admin-panel-title">Menu beheer</p>
            <p class="admin-panel-sub">Pas naam en prijs aan, of voeg items toe</p>
          </div>
        </div>
        <button class="admin-close" onclick="closeAdminPanel()" aria-label="Sluiten">&times;</button>
      </div>

      <!-- Scrollbare lijst van alle menu-items — ingevuld door JS -->
      <div class="admin-list" id="adminList"></div>

      <!-- Onderste balk: nieuw item + opslaan -->
      <div class="admin-footer">

        <!-- Formulier voor nieuw item — JS toont/verbergt dit -->
        <div class="admin-new-form" id="adminNewForm">
          <div class="admin-new-row">
            <input type="text" id="newEmoji" placeholder="Emoji (bv. 🍔)" maxlength="4" style="max-width:90px" />
            <input type="text" id="newName" placeholder="Naam product" />
          </div>
          <div class="admin-new-row">
            <select id="newCat">
              <option value="burgers">Burgers</option>
              <option value="fries">Loaded Fries</option>
              <option value="kebab">Kebab &amp; Shoarma</option>
              <option value="kapsalon">Kapsalon</option>
              <option value="durum">Durum</option>
              <option value="snacks">Snacks</option>
              <option value="drinks">Dranken</option>
            </select>
            <input type="number" id="newPrice" placeholder="Prijs (bv. 12.50)" step="0.01" min="0" />
          </div>
          <input type="text" id="newDesc" placeholder="Omschrijving..." />
          <button class="admin-new-confirm" onclick="confirmNewItem()">+ Toevoegen aan menu</button>
        </div>

        <button class="admin-add-btn" id="adminAddBtn" onclick="toggleNewForm()">+ Nieuw item toevoegen</button>
        <button class="admin-save-btn" onclick="saveAdminChanges()">Wijzigingen opslaan</button>

      </div>
    </div>
  </div>

  <!--=============================== FOOTER =============================== -->

  <footer class="site-footer">
    <div class="footer-inner">

      <!-- Links: klein logo + bedrijfsnaam -->
      <div class="footer-brand">
        <span class="footer-logo">ST</span>
        <span class="footer-name">STRAAT Streetfood</span>
      </div>

      <!-- Midden: klikbare contactgegevens -->
      <div class="footer-contact">
        <a href="/cdn-cgi/l/email-protection#a6cfc8c0c9e6d5d2d4c7c7d2c0c9c9c288c8ca"><span class="__cf_email__"
            data-cfemail="6a03040c052a191e180b0b1e0c05050e440406">straat-arnhem@straatstreetfood.nl</span></a>
        <span class="footer-divider">·</span>
        <a href="tel:+31201234567">06 123 45 678</a>
      </div>

      <!-- Rechts: copyright -->
      <p class="footer-copy">&copy; 2026 STRAAT Streetfood. Alle rechten voorbehouden.</p>

    </div>
  </footer>

  <!-- Toast notificatie element — JS voegt .show toe om het zichtbaar te maken -->
  <div class="toast" id="toast" role="status" aria-live="polite"></div>

  <!-- ============================================================
     JAVASCRIPT — Alle interactieve logica van de pagina
     ============================================================ -->
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script>

    /* ── WINKELWAGEN STATE ──────────────────────────────────────
       Eén object dat de volledige winkelwagen bijhoudt.
       Sleutel = productnaam, waarde = { name, price, emoji, qty }
       Dit object leeft alleen in het geheugen — bij herladen is het weg. */
    const cart = {};

    /* ── GEBRUIKER STATE ────────────────────────────────────────
       Houdt de ingelogde gebruiker bij (null = niet ingelogd).
       Waarde: { role: 'bezoeker' | 'admin' }
       Leeft alleen in het geheugen — bij herladen is het weg. */
    let currentUser = null;

    /* ── GESELECTEERDE ROL IN DE MODAL ─────────────────────────
       Bijgehouden terwijl de modal open is, voordat er ingelogd wordt. */
    let selectedRole = 'bezoeker';

    /* ── ROL WISSELEN IN DE MODAL ───────────────────────────────
       Markeert de juiste knop als actief in de Bezoeker/Admin toggle. */
    function setRole(role) {
      selectedRole = role;
      document.getElementById('roleBezoeker').classList.toggle('active', role === 'bezoeker');
      document.getElementById('roleAdmin').classList.toggle('active', role === 'admin');
    }

    /* ── MODAL: OPENEN ──────────────────────────────────────────
       Voegt .open toe aan de overlay (maakt hem zichtbaar via CSS),
       vergrendelt de pagina-scroll en focust het e-mailveld.
       Reset de rol-toggle terug naar Bezoeker bij elke opening. */
    function openModal() {
      setRole('bezoeker'); /* Rol-toggle altijd resetten naar Bezoeker */
      document.getElementById('modalOverlay').classList.add('open');
      document.body.style.overflow = 'hidden'; /* Voorkomt scrollen op achtergrond */
      setTimeout(() => document.getElementById('emailInput').focus(), 300);
    }

    /* ── MODAL: SLUITEN ─────────────────────────────────────────
       Verwijdert .open van de overlay en herstelt de scroll.
       Als er een event meegegeven wordt (klik op overlay),
       sluit hij alleen als je buiten de modal klikt. */
    function closeModal(e) {
      if (e && e.target !== document.getElementById('modalOverlay')) return;
      document.getElementById('modalOverlay').classList.remove('open');
      document.body.style.overflow = '';
    }

    /* ── WACHTWOORD ZICHTBAAR MAKEN ─────────────────────────────
       Wisselt het wachtwoordveld tussen type="password" (verborgen)
       en type="text" (zichtbaar) en past het SVG-oogicoon aan. */
    function togglePassword() {
      const input = document.getElementById('passwordInput');
      const icon = document.getElementById('eyeIcon');
      if (input.type === 'password') {
        input.type = 'text';
        /* Doorgestreept oog: wachtwoord is nu zichtbaar */
        icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';
      } else {
        input.type = 'password';
        /* Normaal oog: wachtwoord is verborgen */
        icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
      }
    }

    /* ── LOGIN AFHANDELEN ───────────────────────────────────────
       Wordt aangeroepen als het formulier verstuurd wordt.
       Slaat de gekozen rol op in currentUser, sluit de modal
       en past de knoppen in de header aan via updateAuthUI(). */
    function handleLogin(e) {
      e.preventDefault(); /* Voorkomt dat de pagina herlaadt */
      const btn = document.getElementById('submitBtn');
      btn.textContent = 'Laden...';
      btn.classList.add('loading'); /* CSS maakt de knop grijs en niet-klikbaar */
      setTimeout(() => {
        btn.textContent = 'Inloggen';
        btn.classList.remove('loading');
        /* Sla de ingelogde gebruiker op met de gekozen rol */
        currentUser = { role: selectedRole };
        document.getElementById('modalOverlay').classList.remove('open');
        document.body.style.overflow = '';
        updateAuthUI();
        const label = selectedRole === 'admin' ? 'Admin' : 'Bezoeker';
        showToast('✅ Ingelogd als ' + label + '!');
      }, 1200);
    }

    /* ── INLOGGEN / UITLOGGEN KNOP ──────────────────────────────
       Als er een gebruiker is → uitloggen en UI resetten.
       Anders → login modal openen. */
    function handleAuthClick() {
      if (currentUser) {
        currentUser = null;
        updateAuthUI();
        showToast('👋 Uitgelogd!');
      } else {
        openModal();
      }
    }

    /* ── ADMIN KNOP ─────────────────────────────────────────────
       Controleert of de ingelogde gebruiker de rol 'admin' heeft.
       Zo ja → opent het admin paneel en laadt de menu-items.
       Zo nee → toon een waarschuwing. */
    function goAdmin() {
      if (currentUser && currentUser.role === 'admin') {
        openAdminPanel();
      } else {
        showToast('⚠️ Je moet ingelogd zijn als admin');
      }
    }

    /* ── ADMIN PANEEL: OPENEN ───────────────────────────────────
       Laadt alle huidige productkaarten in de admin-lijst
       en schuift het paneel in beeld. */
    function openAdminPanel() {
      renderAdminList();
      document.getElementById('adminOverlay').classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    /* ── ADMIN PANEEL: SLUITEN ──────────────────────────────────
       Sluit het paneel als je op de overlay klikt of op × drukt. */
    function closeAdminPanel(e) {
      if (e && e.target !== document.getElementById('adminOverlay')) return;
      document.getElementById('adminOverlay').classList.remove('open');
      document.body.style.overflow = '';
      /* Reset het nieuwe-item formulier */
      document.getElementById('adminNewForm').classList.remove('open');
    }

    /* ── ADMIN LIJST OPBOUWEN ───────────────────────────────────
       Leest alle .product-card elementen van de pagina en
       tekent voor elk item een bewerkbare rij in het paneel. */
    function renderAdminList() {
      const list = document.getElementById('adminList');
      list.innerHTML = '';

      /* Groepeer kaarten per sectie */
      const sections = {
        burgers: { label: 'Burgers', cards: [] },
        fries: { label: 'Loaded Fries', cards: [] },
        kebab: { label: 'Kebab & Shoarma', cards: [] },
        kapsalon: { label: 'Kapsalon', cards: [] },
        durum: { label: 'Durum', cards: [] },
        snacks: { label: 'Snacks', cards: [] },
        drinks: { label: 'Dranken', cards: [] },
      };

      document.querySelectorAll('.product-card').forEach(card => {
        const cat = card.dataset.cat;
        if (sections[cat]) sections[cat].cards.push(card);
      });

      /* Bouw rijen per sectie */
      Object.values(sections).forEach(sec => {
        if (!sec.cards.length) return;

        /* Sectie-label */
        const lbl = document.createElement('p');
        lbl.className = 'admin-section-label';
        lbl.textContent = sec.label;
        list.appendChild(lbl);

        sec.cards.forEach(card => {
          const row = document.createElement('div');
          row.className = 'admin-row';

          const emoji = card.dataset.emoji;
          const name = card.dataset.name;
          const price = card.dataset.price;

          row.innerHTML = `
          <div class="admin-row-icon">${emoji}</div>
          <input class="admin-row-name"  type="text"   value="${name}"  data-card-name="${name}" />
          <input class="admin-row-price" type="number" value="${price}" step="0.01" min="0" data-card-name="${name}" />
          <button class="admin-row-del" onclick="deleteItem('${name}')" aria-label="Verwijderen">✕</button>`;

          list.appendChild(row);
        });
      });
    }

    /* ── ITEM VERWIJDEREN ───────────────────────────────────────
       Verbergt de productkaart op de pagina en hertekent de admin-lijst. */
    function deleteItem(name) {
      document.querySelectorAll('.product-card').forEach(card => {
        if (card.dataset.name === name) card.remove();
      });
      /* Verberg eventueel lege categorieblokken */
      document.querySelectorAll('.category-block').forEach(block => {
        if (!block.querySelectorAll('.product-card').length) block.style.display = 'none';
      });
      renderAdminList();
      showToast('🗑️ ' + name + ' verwijderd');
    }

    /* ── NIEUW-ITEM FORMULIER TONEN/VERBERGEN ───────────────────
       Klapt het invoerformulier open of dicht. */
    function toggleNewForm() {
      const form = document.getElementById('adminNewForm');
      const btn = document.getElementById('adminAddBtn');
      const open = form.classList.toggle('open');
      btn.textContent = open ? '✕ Annuleren' : '+ Nieuw item toevoegen';
    }

    /* ── NIEUW ITEM TOEVOEGEN ───────────────────────────────────
       Leest het formulier, maakt een nieuwe productkaart
       en voegt die in de juiste categorie-sectie in. */
    function confirmNewItem() {
      const emoji = document.getElementById('newEmoji').value.trim() || '🍽️';
      const name = document.getElementById('newName').value.trim();
      const cat = document.getElementById('newCat').value;
      const price = parseFloat(document.getElementById('newPrice').value);
      const desc = document.getElementById('newDesc').value.trim();

      if (!name || isNaN(price) || price <= 0) {
        showToast('⚠️ Vul naam en prijs in');
        return;
      }

      /* Bouw de nieuwe productkaart HTML */
      const priceStr = price.toFixed(2).replace('.', ',');
      const article = document.createElement('article');
      article.className = 'product-card';
      article.dataset.cat = cat;
      article.dataset.name = name;
      article.dataset.price = price.toFixed(2);
      article.dataset.emoji = emoji;
      article.innerHTML = `
      <div class="product-image">
        <div class="product-image-inner"><img src="https://placehold.co/400x320/e8e2d8/a09880?text=STRAAT" alt="Product foto" style="width:100%;height:100%;object-fit:cover;" /></div>
      </div>
      <div class="product-body">
        <h3 class="product-name">${name}</h3>
        <p class="product-desc">${desc || 'Geen omschrijving.'}</p>
        <div class="product-footer">
          <span class="product-price">€ ${priceStr}</span>
          <button class="add-btn" aria-label="${name} toevoegen">+</button>
        </div>
      </div>`;

      /* Koppel de add-to-cart listener aan de nieuwe knop */
      article.querySelector('.add-btn').addEventListener('click', () => {
        addToCart(name, price.toFixed(2), emoji);
        const btn = article.querySelector('.add-btn');
        btn.textContent = '✓';
        btn.style.background = 'var(--green-mid)';
        setTimeout(() => { btn.textContent = '+'; btn.style.background = ''; }, 700);
      });

      /* Voeg kaart toe aan de juiste categorie-sectie op de pagina */
      const block = document.querySelector(`.category-block[data-section="${cat}"]`);
      if (block) {
        block.style.display = '';
        block.querySelector('.product-grid').appendChild(article);
      }

      /* Leeg het formulier en sluit het */
      ['newEmoji', 'newName', 'newPrice', 'newDesc'].forEach(id => document.getElementById(id).value = '');
      toggleNewForm();
      renderAdminList();
      showToast('✅ ' + name + ' toegevoegd aan het menu!');
    }

    /* ── WIJZIGINGEN OPSLAAN ────────────────────────────────────
       Leest alle ingevulde naam- en prijsvelden in de admin-lijst
       en past de bijbehorende productkaarten op de pagina aan. */
    function saveAdminChanges() {
      document.querySelectorAll('.admin-row').forEach(row => {
        const nameInput = row.querySelector('.admin-row-name');
        const priceInput = row.querySelector('.admin-row-price');
        if (!nameInput || !priceInput) return;

        const originalName = nameInput.dataset.cardName;
        const newName = nameInput.value.trim();
        const newPrice = parseFloat(priceInput.value);

        if (!newName || isNaN(newPrice) || newPrice <= 0) return;

        /* Zoek de bijbehorende kaart op de pagina */
        const card = document.querySelector(`.product-card[data-name="${originalName}"]`);
        if (!card) return;

        /* Pas de zichtbare tekst en data-attributen aan */
        card.querySelector('.product-name').textContent = newName;
        card.querySelector('.product-price').textContent = '€ ' + newPrice.toFixed(2).replace('.', ',');
        card.dataset.name = newName;
        card.dataset.price = newPrice.toFixed(2);

        /* Werk ook het aria-label van de add-knop bij */
        const addBtn = card.querySelector('.add-btn');
        if (addBtn) addBtn.setAttribute('aria-label', newName + ' toevoegen');
      });

      closeAdminPanel();
      showToast('✅ Menu opgeslagen!');
    }

    /* ── AUTH UI BIJWERKEN ──────────────────────────────────────
       Past de tekst van de Login-knop aan op basis van de login-staat,
       en geeft de Admin-knop een groene kleur als de rol admin is. */
    function updateAuthUI() {
      const loginBtn = document.getElementById('loginBtn');
      const adminBtn = document.getElementById('adminBtn');
      if (currentUser) {
        /* Ingelogd: knoptekst toont "Uitloggen" */
        loginBtn.textContent = 'Uitloggen';
        /* Admin-knop wordt groen als de ingelogde rol admin is */
        adminBtn.classList.toggle('is-admin', currentUser.role === 'admin');
      } else {
        /* Niet ingelogd: knoptekst terug naar "Inloggen" */
        loginBtn.textContent = 'Inloggen';
        adminBtn.classList.remove('is-admin');
      }
    }

    /* ── ESCAPE-TOETS SLUIT MODALS ─────────────────────────────
       Luistert naar toetsaanslagen op de hele pagina.
       Sluit zowel de login-modal als het admin-paneel. */
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        document.getElementById('modalOverlay').classList.remove('open');
        document.getElementById('adminOverlay').classList.remove('open');
        document.body.style.overflow = '';
      }
    });

    /* ── HULPFUNCTIE: GETAL NAAR EURO-FORMAAT ───────────────────
       Zet een getal om naar een leesbare prijsstring.
       Voorbeeld: 12.5 → "€ 12,50" */
    function fmt(n) {
      return '€\u00A0' + n.toFixed(2).replace('.', ',');
    }

    /* ── WINKELWAGEN HERTEKENEN ─────────────────────────────────
       Verwijdert alle bestaande .cart-item elementen uit de DOM
       en tekent ze opnieuw op basis van de huidige cart-state.
       Beheert ook de zichtbaarheid van lege-staat vs. gevulde staat. */
    function updateCart() {
      const itemsEl = document.getElementById('cartItems');
      const emptyEl = document.getElementById('emptyCart');
      const footerEl = document.getElementById('cartFooter');
      const countEl = document.getElementById('cartCount');
      const totalEl = document.getElementById('cartTotal');
      const subEl = document.getElementById('subtotal');

      /* Verwijder alle eerder getekende winkelwagen-rijen */
      document.querySelectorAll('.cart-item').forEach(el => el.remove());

      /* Filter op items met qty > 0 */
      const keys = Object.keys(cart).filter(k => cart[k].qty > 0);

      /* Lege staat: toon het lege-bericht en verberg de footer */
      if (!keys.length) {
        emptyEl.style.display = 'flex';
        footerEl.style.display = 'none';
        countEl.textContent = '0 items';
        return;
      }

      /* Gevulde staat: verberg het lege-bericht en toon de footer */
      emptyEl.style.display = 'none';
      footerEl.style.display = 'block';

      let sub = 0, total = 0;

      /* Bouw voor elk cart-item een HTML-rij en voeg deze toe aan de DOM */
      keys.forEach(k => {
        const it = cart[k];
        sub += it.price * it.qty; /* Optel subtotaal */
        total += it.qty;             /* Optel totaal aantal items */

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

      /* Werk de tekst en bedragen bij */
      countEl.textContent = total + (total === 1 ? ' item' : ' items');
      subEl.textContent = fmt(sub);
      totalEl.textContent = fmt(sub + 0.5); /* Subtotaal + €0,50 servicekosten */
    }

    /* ── PRODUCT AAN WINKELWAGEN TOEVOEGEN ──────────────────────
       Maakt een nieuw cart-item aan als het product nog niet bestaat,
       verhoogt de hoeveelheid, herlaadt de winkelwagen en toont een toast. */
    function addToCart(name, price, emoji) {
      if (!cart[name]) cart[name] = { name, price: parseFloat(price), emoji, qty: 0 };
      cart[name].qty++;
      updateCart();
      showToast(emoji + '  ' + name + ' toegevoegd!');
    }

    /* ── HOEVEELHEID WIJZIGEN ───────────────────────────────────
       Verhoogt of verlaagt de hoeveelheid van een cart-item.
       Math.max(0, ...) zorgt dat qty nooit negatief wordt. */
    function changeQty(key, d) {
      if (cart[key]) {
        cart[key].qty = Math.max(0, cart[key].qty + d);
        updateCart();
      }
    }

    /* ── BESTELLING PLAATSEN ────────────────────────────────────
       Simuleert een bestelling: toont een toast, leegt de cart
       en hertekent de winkelwagen na een korte vertraging. */
    function checkout() {
      showToast('✅ Bestelling geplaatst! Smakelijk!');
      Object.keys(cart).forEach(k => delete cart[k]);
      setTimeout(updateCart, 200);
    }

    /* ── TOAST TONEN ────────────────────────────────────────────
       Voegt .show toe (CSS maakt de toast zichtbaar),
       en verwijdert het na 2,2 seconden weer.
       clearTimeout voorkomt dat de timer gereset wordt bij snel klikken. */
    let toastT;
    function showToast(msg) {
      const t = document.getElementById('toast');
      t.textContent = msg;
      t.classList.add('show');
      clearTimeout(toastT);
      toastT = setTimeout(() => t.classList.remove('show'), 2200);
    }

    /* ── "+" KNOPPEN ────────────────────────────────────────────
       Koppelt een click-listener aan elke .add-btn op de pagina.
       Leest de product-data uit de data-attributen van de bovenliggende kaart
       en roept addToCart() aan. Geeft ook visuele feedback via een groen vinkje. */
    document.querySelectorAll('.add-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const card = btn.closest('.product-card'); /* Loopt omhoog in de DOM naar de kaart */
        addToCart(card.dataset.name, card.dataset.price, card.dataset.emoji);
        /* Tijdelijke visuele bevestiging: groen vinkje voor 700ms */
        btn.textContent = '✓';
        btn.style.background = 'var(--green-mid)';
        setTimeout(() => { btn.textContent = '+'; btn.style.background = ''; }, 700);
      });
    });

    /* ── CATEGORIE FILTER ───────────────────────────────────────
       Koppelt een click-listener aan elke categorie-knop in de nav.
       Markeert de aangeklikte knop als actief en verbergt alle kaarten
       die niet tot de geselecteerde categorie behoren.
       Verbergt ook lege categorieblokken zodat er geen losse titels overblijven. */
    document.querySelectorAll('.cat-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        /* Verwijder .active van alle knoppen, voeg toe aan de aangeklikte */
        document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cat = btn.dataset.cat; /* bv. "burgers", "fries" of "all" */

        /* Toon/verberg individuele kaarten */
        document.querySelectorAll('.product-card').forEach(card => {
          card.style.display = (cat === 'all' || card.dataset.cat === cat) ? '' : 'none';
        });

        /* Verberg categorieblokken waarvan alle kaarten verborgen zijn */
        document.querySelectorAll('.category-block').forEach(block => {
          block.style.display = block.querySelectorAll('.product-card:not([style*="none"])').length ? '' : 'none';
        });
      });
    });

    /* ── ZOEKFUNCTIE ────────────────────────────────────────────
       Luistert bij elke toetsaanslag in het zoekveld.
       Vergelijkt de invoer met de naam + beschrijving van elke kaart.
       Verbergt niet-overeenkomende kaarten en lege categorieblokken. */
    document.getElementById('searchInput').addEventListener('input', e => {
      const q = e.target.value.toLowerCase();

      document.querySelectorAll('.product-card').forEach(card => {
        /* Combineer naam en beschrijving voor de zoekopdracht */
        const match = (card.dataset.name + card.querySelector('.product-desc').textContent)
          .toLowerCase().includes(q);
        card.style.display = match ? '' : 'none';
      });

      /* Verberg lege categorieblokken (zelfde logica als bij de filter) */
      document.querySelectorAll('.category-block').forEach(block => {
        block.style.display = block.querySelectorAll('.product-card:not([style*="none"])').length ? '' : 'none';
      });
    });

  </script>
</body>

</html>
