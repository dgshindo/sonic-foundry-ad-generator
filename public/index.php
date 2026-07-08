<?php
declare(strict_types=1);

$defaultProductName = 'The Sonic Identity Blueprint';

$defaultDescription = 'The Sonic Identity Blueprint is a practical guide for storytellers and creators who want to make AI-generated music that sounds intentional, consistent, and uniquely their own. Rather than focusing on technical tutorials or generic prompt formulas, the book teaches readers how to define an artist’s voice, emotional world, sound, values, and creative boundaries. With real-world examples and a hands-on workbook, readers learn to transform their stories and ideas into a cohesive sonic identity they can use with AI music tools such as Suno.';

$defaultAudience = 'Aspiring creators, storytellers, writers, and AI music enthusiasts who have ideas and stories to tell but may not have traditional musical training. Especially suited for people using AI music tools who want to move beyond random song generation and create a consistent, recognizable artistic sound across individual songs and complete albums.';

$defaultPrice = '$24.99';

$defaultSalesUrl = 'https://mbell314.gumroad.com/l/hykfur';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sonic Foundry Ad Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
  <main class="page">
  <section class="panel">
    <h1>Sonic Foundry Ad Generator</h1>

<p>
  Build advertising campaigns, social posts, image prompts,
  and short-form video concepts from a single product profile.
</p>
<p>
  <a href="/history">View campaign history</a>
</p>
<form method="post" action="/generate">

  <div class="form-group">
    <label for="product_name">Product Name</label>
    <input
      type="text"
      id="product_name"
      name="product_name"
      value="<?= htmlspecialchars($defaultProductName) ?>"
      required
    >
  </div>

  <div class="form-group">
    <label for="description">Product Description</label>
    <textarea
      id="description"
      name="description"
      rows="6"
      required
    ><?= htmlspecialchars($defaultDescription) ?></textarea>
  </div>

  <div class="form-group">
    <label for="audience">Target Audience</label>
    <textarea
      id="audience"
      name="audience"
      rows="4"
      required
    ><?= htmlspecialchars($defaultAudience) ?></textarea>
  </div>

  <div class="form-row">

    <div class="form-group">
      <label for="tone">Campaign Tone</label>

      <select id="tone" name="tone">
        <option value="authoritative">Authoritative</option>
        <option value="educational">Educational</option>
        <option value="inspiring">Inspiring</option>
        <option value="provocative">Provocative</option>
        <option value="direct">Direct Response</option>
      </select>
    </div>

    <div class="form-group">
      <label for="platform">Primary Platform</label>

      <select id="platform" name="platform">
        <option value="facebook">Facebook</option>
        <option value="instagram">Instagram</option>
        <option value="youtube">YouTube</option>
        <option value="tiktok">TikTok</option>
      </select>
    </div>

  </div>

  <div class="form-row">

    <div class="form-group">
      <label for="price">Price / Offer</label>
      <input
        type="text"
        id="price"
        name="price"
        placeholder="$9.99"
        value="<?= htmlspecialchars($defaultPrice) ?>"
      >
    </div>

    <div class="form-group">
      <label for="sales_url">Sales URL</label>
      <input
        type="url"
        id="sales_url"
        name="sales_url"
        placeholder="https://..."
        value="<?= htmlspecialchars($defaultSalesUrl) ?>"
      >
    </div>

  </div>

  <button type="submit">
    Generate Campaign
  </button>

</form>
  </section>
</main>
</body>
</html>