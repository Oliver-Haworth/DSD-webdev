<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>café </title>
    <meta name="description" content="An independent neighbourhood cafe serving freshly roasted coffee and daily bakes.">

    <link rel="stylesheet" href="menu.css">
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
                
                <!-- Category: Espresso -->
                <div class="menu-category">
                    <h2 class="category-title">ESPRESSO</h2>
                    <div class="category-items">
                        
                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Espresso</span>
                                <div class="item-dots"></div>
                                <span class="item-price">2.60</span>
                            </div>
                            <p class="item-desc">18g in, 36g out, 28 seconds</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Flat white</span>
                                <div class="item-dots"></div>
                                <span class="item-price">3.60</span>
                            </div>
                            <p class="item-desc">Double shot, 5oz of steamed milk</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Latte</span>
                                <div class="item-dots"></div>
                                <span class="item-price">3.80</span>
                            </div>
                            <p class="item-desc">Double shot, 8oz</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Cortado</span>
                                <div class="item-dots"></div>
                                <span class="item-price">3.20</span>
                            </div>
                            <p class="item-desc">Equal parts espresso and milk</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Mocha</span>
                                <div class="item-dots"></div>
                                <span class="item-price">4.20</span>
                            </div>
                            <p class="item-desc">Dark chocolate, not syrup</p>
                        </div>

                    </div>
                </div>

                <!-- Category: Eat -->
                <div class="menu-category">
                    <h2 class="category-title">EAT</h2>
                    <div class="category-items">
                        
                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Cheese toastie</span>
                                <div class="item-dots"></div>
                                <span class="item-price">6.50</span>
                            </div>
                            <p class="item-desc">Sourdough, mature cheddar, onion chutney</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Soup of the day</span>
                                <div class="item-dots"></div>
                                <span class="item-price">6.00</span>
                            </div>
                            <p class="item-desc">With bread and butter</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Granola bowl</span>
                                <div class="item-dots"></div>
                                <span class="item-price">5.50</span>
                            </div>
                            <p class="item-desc">Yoghurt, seasonal fruit, honey</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Bacon roll</span>
                                <div class="item-dots"></div>
                                <span class="item-price">5.00</span>
                            </div>
                            <p class="item-desc">Until 11:30 on weekdays</p>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Right Column -->
            <div class="menu-column">
                
                <!-- Category: Filter & Tea -->
                <div class="menu-category">
                    <h2 class="category-title">FILTER &amp; TEA</h2>
                    <div class="category-items">
                        
                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Batch brew</span>
                                <div class="item-dots"></div>
                                <span class="item-price">2.80</span>
                            </div>
                            <p class="item-desc">Refills 1.00 while you stay</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">V60 pour-over</span>
                                <div class="item-dots"></div>
                                <span class="item-price">4.00</span>
                            </div>
                            <p class="item-desc">Single origin of the week, 15g to 250ml</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Loose-leaf tea</span>
                                <div class="item-dots"></div>
                                <span class="item-price">3.00</span>
                            </div>
                            <p class="item-desc">By the pot, served with a timer</p>
                        </div>

                        <div class="menu-item">
                            <div class="item-header">
                                <span class="item-name">Hot chocolate</span>
                                <div class="item-dots"></div>
                                <span class="item-price">3.90</span>
                            </div>
                            <p class="item-desc">Whole milk, dark chocolate, no marshmallows unless asked</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Footer Notes -->
        <div class="menu-footer">
            <span>Ask us about allergens before you order.</span>
            <span>Bring your own cup and take 30p off.</span>
        </div>

    </div>
    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>