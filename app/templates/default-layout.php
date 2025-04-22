<?php

/**
 * Base Layout Template
 * 
 * @var App\Core\Page $page
 * @var string $content
 */
?>

<?php if ($_ENV['APP_ENV'] !== 'development')
  require dirname(__DIR__) . '/partials/_ascii-copyright.php'; ?>

<!DOCTYPE html>
<html lang="<?php echo $page->getLang(); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page->getTitle(); ?></title>
  <?php echo $page->renderStyles(); ?>
</head>

<body <?php echo $page->renderBodyAttributes(); ?>>
  <?php require dirname(__DIR__) . '/partials/_header.php'; ?>
  <?php echo $content; ?>
  <?php require dirname(__DIR__) . '/partials/_footer.php'; ?>
</body>

</html>
