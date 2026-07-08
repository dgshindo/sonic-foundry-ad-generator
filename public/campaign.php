<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/db.php';

$campaignId = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$campaignId) {
    http_response_code(400);
    exit('Invalid campaign ID.');
}

$database = getDatabase();

$statement = $database->prepare(
    '
    SELECT *
    FROM campaigns
    WHERE id = :id
    '
);

$statement->execute([
    ':id' => $campaignId,
]);

$savedCampaign = $statement->fetch();

if (!$savedCampaign) {
    http_response_code(404);
    exit('Campaign not found.');
}

$campaign = json_decode(
    $savedCampaign['campaign_json'],
    true
);

if (!is_array($campaign)) {
    http_response_code(500);
    exit('Campaign data could not be loaded.');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>
    <?= htmlspecialchars($savedCampaign['product_name']) ?>
    - Saved Campaign
  </title>

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >

  <link
    rel="stylesheet"
    href="/assets/css/app.css"
  >
</head>

<body>
  <main class="page">
    <section class="panel">

      <h1>Saved Campaign</h1>

      <p>
        <strong>Product:</strong>
        <?= htmlspecialchars($savedCampaign['product_name']) ?>
      </p>

      <p>
        <strong>Platform:</strong>
        <?= htmlspecialchars($savedCampaign['platform']) ?>
      </p>

      <p>
        <strong>Tone:</strong>
        <?= htmlspecialchars($savedCampaign['tone']) ?>
      </p>

      <p>
        <a href="/history">Back to Campaign History</a>
      </p>


      <?php require __DIR__ . '/../app/views/campaign-results.php'; ?>

    </section>
  </main>

  <script src="/assets/js/app.js"></script>
</body>
</html>