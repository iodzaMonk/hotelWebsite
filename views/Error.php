<?php $this->title = 'Error'; ?>
<div class="max-w-3xl mx-auto p-6">
  <h1 class="text-2xl font-semibold mb-4">An error occurred</h1>
  <pre style="white-space:pre-wrap;word-wrap:break-word;" class="bg-gray-800/40 border border-white/20 rounded p-4">
<?= htmlspecialchars($error ?? 'Unknown error', ENT_QUOTES, 'UTF-8') ?>
  </pre>
</div>
