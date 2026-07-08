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