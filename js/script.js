const cart = {};

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
