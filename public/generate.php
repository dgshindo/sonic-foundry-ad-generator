<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/AdGenerator.php';

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
    <h2>Ad Angles</h2>
        <button type="button" onclick="copyTextById('angles')">Copy</button>

        <ul id="angles">
            <?php foreach ($campaign['angles'] as $angle): ?>
                <li><?= htmlspecialchars($angle) ?></li>
            <?php endforeach; ?>
        </ul>

<h2>Headlines</h2>
<button type="button" onclick="copyTextById('headlines')">Copy</button>
<ul id="headlines">
    <?php foreach ($campaign['headlines'] as $headline): ?>
        <li><?= htmlspecialchars($headline) ?></li>
    <?php endforeach; ?>
    </ul>

<h2>Captions</h2>
<button type="button" onclick="copyTextById('captions')">Copy</button>
<ul id="captions">
    <?php foreach ($campaign['captions'] as $caption): ?>
        <li><?= htmlspecialchars($caption) ?></li>
    <?php endforeach; ?>
    </ul>

<h2>Calls to Action</h2>
<button type="button" onclick="copyTextById('ctas')">Copy</button>
<ul id="ctas">
  <?php foreach ($campaign['ctas'] as $cta): ?>
    <li><?= htmlspecialchars($cta) ?></li>
  <?php endforeach; ?>
</ul>

<h2>Image Prompts</h2>
<button type="button" onclick="copyTextById('image-prompts')">Copy</button>
<ul id="image-prompts">
  <?php foreach ($campaign['image_prompts'] as $prompt): ?>
    <li><?= htmlspecialchars($prompt) ?></li>
  <?php endforeach; ?>
</ul>

<h2>Short Video Scripts</h2>

<?php foreach ($campaign['short_scripts'] as $index => $script): ?>
  <?php $scriptId = 'script-' . $index; ?>

  <div class="result-card">
    <h3>Script <?= $index + 1 ?></h3>

    <button type="button" onclick="copyTextById('<?= $scriptId ?>')">
      Copy Script
    </button>

    <div id="<?= $scriptId ?>">
      <p><strong>Hook:</strong> <?= htmlspecialchars($script['hook']) ?></p>
      <p><strong>Body:</strong> <?= htmlspecialchars($script['body']) ?></p>
      <p><strong>CTA:</strong> <?= htmlspecialchars($script['cta']) ?></p>
    </div>
  </div>
<?php endforeach; ?>

      <p>
        <a href="/">Create another campaign</a>
      </p>
    </section>
  </main>
  <script src="/assets/js/app.js"></script>
</body>
</html>