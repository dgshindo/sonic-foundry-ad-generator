<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/AdGenerator.php';
require_once __DIR__ . '/../app/db.php';

$productName = trim($_POST['product_name'] ?? '');
$description = trim($_POST['description'] ?? '');
$audience = trim($_POST['audience'] ?? '');
$tone = trim($_POST['tone'] ?? '');
$platform = trim($_POST['platform'] ?? '');
$price = trim($_POST['price'] ?? '');
$salesUrl = trim($_POST['sales_url'] ?? '');

$generator = new AdGenerator();

$campaign = $generator->generate([
    'product_name' => $productName,
    'description' => $description,
    'audience' => $audience,
    'tone' => $tone,
    'platform' => $platform,
    'price' => $price,
    'sales_url' => $salesUrl,
]);

$database = getDatabase();

$statement = $database->prepare(
    '
    INSERT INTO campaigns (
        product_name,
        description,
        audience,
        tone,
        platform,
        price,
        sales_url,
        campaign_json,
        created_at
    )
    VALUES (
        :product_name,
        :description,
        :audience,
        :tone,
        :platform,
        :price,
        :sales_url,
        :campaign_json,
        :created_at
    )
    '
);

$statement->execute([
    ':product_name' => $productName,
    ':description' => $description,
    ':audience' => $audience,
    ':tone' => $tone,
    ':platform' => $platform,
    ':price' => $price,
    ':sales_url' => $salesUrl,
    ':campaign_json' => json_encode($campaign, JSON_PRETTY_PRINT),
    ':created_at' => date('c'),
]);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Generated Campaign - Sonic Foundry Ad Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
  <main class="page">
    <section class="panel">
      <h1>Generated Campaign</h1>

      <p>
        Campaign generated for:
        <strong><?= htmlspecialchars($productName) ?></strong>
      </p>

      <h2>Input Summary</h2>

      <ul>
        <li><strong>Description:</strong> <?= htmlspecialchars($description) ?></li>
        <li><strong>Audience:</strong> <?= htmlspecialchars($audience) ?></li>
        <li><strong>Tone:</strong> <?= htmlspecialchars($tone) ?></li>
        <li><strong>Platform:</strong> <?= htmlspecialchars($platform) ?></li>
        <li><strong>Price / Offer:</strong> <?= htmlspecialchars($price) ?></li>
        <li><strong>Sales URL:</strong> <?= htmlspecialchars($salesUrl) ?></li>
      </ul>
    <?php require __DIR__ . '/../app/views/campaign-results.php'; ?>

      <p>
        <a href="/">Create another campaign</a>
      </p>
    </section>
  </main>
  <script src="/assets/js/app.js"></script>
</body>
</html>