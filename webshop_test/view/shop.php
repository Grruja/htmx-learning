<?php
include 'components/head.php';
?>

<body>
    <?php include 'components/navigation.php'; ?>
    <main>
        <div id="shopBgImg">
            <h1 class="text-center py-5 text-white">All Plants</h1>
        </div>

        <div class="container mt-5">
            <div class="border-bottom position-relative">
                <input hx-get="<?= BASE_URL ?>/product-search" 
                        hx-trigger="load, keyup change delay:1s" 
                        hx-target="#search-results" 
                        hx-swap="transition:true"
                        hx-sync="this:replace"
                        hx-indicator="#search-product-indicator"
                        class="form-control me-2 mb-5" 
                        name="search_value" type="search" placeholder="Search">
                
            </div>
                    
            <div>
                <div id="search-product-indicator" class="d-flex justify-content-center">
                    <div class="spinner-border text-success htmx-indicator mt-5" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div id="search-results" class="mt-5 row row-cols-1 row-cols-md-4 row-cols-sm-2 g-4">
    
                    <!-- productCard.php -->
                
                </div>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>