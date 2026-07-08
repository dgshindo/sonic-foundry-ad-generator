<?php
declare(strict_types=1);
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

<form method="post" action="/generate">

  <div class="form-group">
    <label for="product_name">Product Name</label>
    <input
      type="text"
      id="product_name"
      name="product_name"
      value="Sonic Foundry"
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
    ></textarea>
  </div>

  <div class="form-group">
    <label for="audience">Target Audience</label>
    <textarea
      id="audience"
      name="audience"
      rows="4"
      required
    ></textarea>
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
      >
    </div>

    <div class="form-group">
      <label for="sales_url">Sales URL</label>
      <input
        type="url"
        id="sales_url"
        name="sales_url"
        placeholder="https://..."
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