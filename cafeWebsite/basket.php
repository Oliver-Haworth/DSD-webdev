<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

// 1. Server-side menu catalogue (prevents price tampering)
$menuCatalogue = [
    // Left Column: Espresso
    'espresso'    => ['name' => 'Espresso',        'price' => 2.60, 'desc' => '18g in, 36g out, 28 seconds',                       'category' => 'ESPRESSO',     'col' => 'left'],
    'flat_white'  => ['name' => 'Flat white',      'price' => 3.60, 'desc' => 'Double shot, 5oz of steamed milk',                  'category' => 'ESPRESSO',     'col' => 'left'],
    'latte'       => ['name' => 'Latte',           'price' => 3.80, 'desc' => 'Double shot, 8oz',                                  'category' => 'ESPRESSO',     'col' => 'left'],
    'cortado'     => ['name' => 'Cortado',         'price' => 3.20, 'desc' => 'Equal parts espresso and milk',                     'category' => 'ESPRESSO',     'col' => 'left'],
    'mocha'       => ['name' => 'Mocha',           'price' => 4.20, 'desc' => 'Dark chocolate, not syrup',                         'category' => 'ESPRESSO',     'col' => 'left'],
    
    // Left Column: Eat
    'toastie'     => ['name' => 'Cheese toastie',  'price' => 6.50, 'desc' => 'Sourdough, mature cheddar, onion chutney',          'category' => 'EAT',          'col' => 'left'],
    'soup'        => ['name' => 'Soup of the day', 'price' => 6.00, 'desc' => 'With bread and butter',                             'category' => 'EAT',          'col' => 'left'],
    'granola'     => ['name' => 'Granola bowl',    'price' => 5.50, 'desc' => 'Yoghurt, seasonal fruit, honey',                    'category' => 'EAT',          'col' => 'left'],
    'bacon_roll'  => ['name' => 'Bacon roll',      'price' => 5.00, 'desc' => 'Until 11:30 on weekdays',                           'category' => 'EAT',          'col' => 'left'],

    // Right Column: Filter & Tea
    'batch_brew'  => ['name' => 'Batch brew',      'price' => 2.80, 'desc' => 'Refills 1.00 while you stay',                       'category' => 'FILTER & TEA', 'col' => 'right'],
    'v60'         => ['name' => 'V60 pour-over',   'price' => 4.00, 'desc' => 'Single origin of the week, 15g to 250ml',           'category' => 'FILTER & TEA', 'col' => 'right'],
    'tea'         => ['name' => 'Loose-leaf tea',  'price' => 3.00, 'desc' => 'By the pot, served with a timer',                   'category' => 'FILTER & TEA', 'col' => 'right'],
    'hot_choc'    => ['name' => 'Hot chocolate',   'price' => 3.90, 'desc' => 'Whole milk, dark chocolate, no marshmallows unless asked', 'category' => 'FILTER & TEA', 'col' => 'right'],
];

// 2. Initialise basket in session
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

// 3. Handle Basket POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $itemId = $_POST['item_id'] ?? '';

    if ($action === 'add' && isset($menuCatalogue[$itemId])) {
        if (!isset($_SESSION['basket'][$itemId])) {
            $_SESSION['basket'][$itemId] = 0;
        }
        $_SESSION['basket'][$itemId]++;
    } elseif ($action === 'decrease' && isset($_SESSION['basket'][$itemId])) {
        $_SESSION['basket'][$itemId]--;
        if ($_SESSION['basket'][$itemId] <= 0) {
            unset($_SESSION['basket'][$itemId]);
        }
    } elseif ($action === 'remove' && isset($_SESSION['basket'][$itemId])) {
        unset($_SESSION['basket'][$itemId]);
    } elseif ($action === 'clear') {
        $_SESSION['basket'] = [];
    }

    // Redirect back to menu.php so refreshing doesn't resubmit the form
    $openDrawer = ($action !== 'add') ? '?basket=open' : '';
    header("Location: menu.php" . $openDrawer);
    exit();
}

// 4. Calculate basket totals
$basketCount = 0;
$basketTotal = 0.0;
foreach ($_SESSION['basket'] as $id => $qty) {
    if (isset($menuCatalogue[$id])) {
        $basketCount += $qty;
        $basketTotal += $menuCatalogue[$id]['price'] * $qty;
    }
}

// Helper function to group items by column and category
function getGroupedMenu($catalogue, $column) {
    $grouped = [];
    foreach ($catalogue as $id => $item) {
        if ($item['col'] === $column) {
            $grouped[$item['category']][$id] = $item;
        }
    }
    return $grouped;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>café</title>
    <meta name="description" content="An independent neighbourhood cafe serving freshly roasted coffee and daily bakes.">

    <link rel="stylesheet" href="basket.css">
</head>
<body>
    <nav class="navBar">
        <a href="./index.php" class="logo">
            Kettle Row <span class="coffee">Coffee</span>
        </a>

        <div class="right">
            <a href="./menu.php">Menu</a>
            <a href="./about.php">About</a>
            <a href="./contact.php">Contact</a>

            <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true): ?>
                <span class="user-greeting">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                <a href="./logout.php" class="logout-link">Logout</a>
            <?php else: ?>
                <a href="./login.php">Login</a>
            <?php endif; ?>

            <!-- Basket Trigger Button -->
            <button type="button" class="basket-toggle" id="basketToggle" aria-label="Open basket">
                Basket (<?php echo $basketCount; ?>) &bull; £<?php echo number_format($basketTotal, 2); ?>
            </button>
        </div>
    </nav>

    <main>
        <!-- Main Board Module -->
        <div class="menu-board">
            
            <!-- Header Section -->
            <div class="menu-header">
                <h1 class="menu-title">On the board</h1>
                <div class="menu-meta">PRICES IN £ &bull; OAT, SOY AND WHOLE MILK, SAME PRICE</div>
            </div>

            <!-- Menu Columns Layout -->
            <div class="menu-grid">

                <!-- Left Column -->
                <div class="menu-column">
                    <?php foreach (getGroupedMenu($menuCatalogue, 'left') as $categoryName => $items): ?>
                        <div class="menu-category">
                            <h2 class="category-title"><?php echo htmlspecialchars($categoryName); ?></h2>
                            <div class="category-items">
                                <?php foreach ($items as $id => $item): ?>
                                    <div class="menu-item">
                                        <div class="item-header">
                                            <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                            <div class="item-dots"></div>
                                            <span class="item-price"><?php echo number_format($item['price'], 2); ?></span>
                                            <form method="POST" action="menu.php" class="add-form">
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($id); ?>">
                                                <button type="submit" class="add-btn" title="Add <?php echo htmlspecialchars($item['name']); ?> to basket">+ Add</button>
                                            </form>
                                        </div>
                                        <p class="item-desc"><?php echo htmlspecialchars($item['desc']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Right Column -->
                <div class="menu-column">
                    <?php foreach (getGroupedMenu($menuCatalogue, 'right') as $categoryName => $items): ?>
                        <div class="menu-category">
                            <h2 class="category-title"><?php echo htmlspecialchars($categoryName); ?></h2>
                            <div class="category-items">
                                <?php foreach ($items as $id => $item): ?>
                                    <div class="menu-item">
                                        <div class="item-header">
                                            <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                            <div class="item-dots"></div>
                                            <span class="item-price"><?php echo number_format($item['price'], 2); ?></span>
                                            <form method="POST" action="menu.php" class="add-form">
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($id); ?>">
                                                <button type="submit" class="add-btn" title="Add <?php echo htmlspecialchars($item['name']); ?> to basket">+ Add</button>
                                            </form>
                                        </div>
                                        <p class="item-desc"><?php echo htmlspecialchars($item['desc']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- Footer Notes -->
            <div class="menu-footer">
                <span>Ask us about allergens before you order.</span>
                <span>Bring your own cup and take 30p off.</span>
            </div>

        </div>
    </main>

    <!-- Slide-out Basket Drawer -->
    <div class="basket-backdrop" id="basketBackdrop"></div>
    <aside class="basket-drawer" id="basketDrawer" aria-hidden="true">
        <div class="basket-header">
            <h2>Your Order</h2>
            <button type="button" class="close-basket" id="closeBasket" aria-label="Close basket">&times;</button>
        </div>

        <div class="basket-body">
            <?php if (empty($_SESSION['basket'])): ?>
                <p class="basket-empty">Your basket is empty. Pick something from the board to get started.</p>
            <?php else: ?>
                <ul class="basket-list">
                    <?php foreach ($_SESSION['basket'] as $id => $qty): 
                        if (!isset($menuCatalogue[$id])) continue;
                        $item = $menuCatalogue[$id];
                        $lineTotal = $item['price'] * $qty;
                    ?>
                        <li class="basket-item">
                            <div class="basket-item-info">
                                <span class="basket-item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                <span class="basket-item-price">£<?php echo number_format($lineTotal, 2); ?></span>
                            </div>
                            <div class="basket-item-controls">
                                <form method="POST" action="menu.php">
                                    <input type="hidden" name="action" value="decrease">
                                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($id); ?>">
                                    <button type="submit" class="qty-btn" aria-label="Decrease quantity">&minus;</button>
                                </form>
                                <span class="qty-display"><?php echo $qty; ?></span>
                                <form method="POST" action="menu.php">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($id); ?>">
                                    <button type="submit" class="qty-btn" aria-label="Increase quantity">+</button>
                                </form>
                                <form method="POST" action="menu.php" class="remove-form">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($id); ?>">
                                    <button type="submit" class="remove-btn">Remove</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['basket'])): ?>
            <div class="basket-footer">
                <div class="basket-total-row">
                    <span>Total</span>
                    <span class="basket-total-amount">£<?php echo number_format($basketTotal, 2); ?></span>
                </div>
                <div class="basket-actions">
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="action" value="clear">
                        <button type="submit" class="clear-btn">Clear</button>
                    </form>
                    <a href="checkout.php" class="checkout-btn">Checkout &rarr;</a>
                </div>
            </div>
        <?php endif; ?>
    </aside>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

    <script>
        const basketToggle = document.getElementById('basketToggle');
        const closeBasket = document.getElementById('closeBasket');
        const basketDrawer = document.getElementById('basketDrawer');
        const basketBackdrop = document.getElementById('basketBackdrop');

        function toggleDrawer(open) {
            basketDrawer.classList.toggle('open', open);
            basketBackdrop.classList.toggle('open', open);
            basketDrawer.setAttribute('aria-hidden', !open);
        }

        basketToggle.addEventListener('click', () => toggleDrawer(true));
        closeBasket.addEventListener('click', () => toggleDrawer(false));
        basketBackdrop.addEventListener('click', () => toggleDrawer(false));

        // Keep drawer open if user adjusted quantities inside the drawer
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('basket') === 'open') {
            toggleDrawer(true);
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>