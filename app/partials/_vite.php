<!-- <?php $isDev = isset($_ENV['ENVIRONMENT']) && $_ENV['ENVIRONMENT'] === 'dev' && isset($_ENV['VITE_PORT']) ?>

<?php if($isDev) : ?>  
    <script type="module" src="<?php echo $_ENV['VITE_ORIGIN'] ?>:<?php echo $_ENV['VITE_PORT'] ?>/@vite/client"></script>
    <script type="module" src="<?php echo $_ENV['VITE_ORIGIN'] ?>:<?php echo  $_ENV['VITE_PORT'] ?>/src/scripts/main.js"></script>
    <script type="module" src="<?php echo $_ENV['VITE_ORIGIN'] ?>:<?php echo  $_ENV['VITE_PORT'] ?>/src/styles/global.scss"></script>
<?php else: ?>
    <script type="module" src="/src/scripts/main.js"></script>
    <link rel="stylesheet" href="/src/styles/main.css">
<?php endif; ?> -->
