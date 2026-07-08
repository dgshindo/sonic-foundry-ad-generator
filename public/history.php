<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/db.php';

$database = getDatabase();

$campaigns = $database
    ->query(
        '
        SELECT
            id,
            product_name,
            platform,
            tone,
            price,
            sales_url,
            created_at
        FROM campaigns
        ORDER BY created_at DESC
        '
    )
    ->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Campaign History - Sonic Foundry Ad Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
  <main class="page">
    <section class="panel">
      <h1>Campaign History</h1>

      <p>
        <a href="/">Create a new campaign</a>
      </p>

      <?php if (!$campaigns): ?>
        <p>No campaigns saved yet.</p>
      <?php else: ?>
        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Product</th>
              <th>Platform</th>
              <th>Tone</th>
              <th>Price</th>
              <th>Sales URL</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($campaigns as $campaign): ?>
              <tr>
                <td><?= htmlspecialchars($campaign['created_at']) ?></td>
                <td><?= htmlspecialchars($campaign['product_name']) ?></td>
                <td><?= htmlspecialchars($campaign['platform']) ?></td>
                <td><?= htmlspecialchars($campaign['tone']) ?></td>
                <td><?= htmlspecialchars($campaign['price'] ?? '') ?></td>
                <td>
                  <?php if (!empty($campaign['sales_url'])): ?>
                    <a href="<?= htmlspecialchars($campaign['sales_url']) ?>" target="_blank">
                      Link
                    </a>
                  <?php endif; ?>
                </td>
                <td><a href="/campaign?id=<?= (int) $campaign['id'] ?>">View Campaign</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>