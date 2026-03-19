<?php $page_title = 'Vérification du code - Admin'; ?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="eyebrow"><i class="fas fa-shield-alt"></i> Vérification</p>
      <h1>Entrez votre code</h1>
      <p class="lead">Un code à 6 chiffres a été envoyé à <strong><?= htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8') ?></strong></p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container" style="max-width: 500px;">
    <div class="card" style="padding: var(--space-8);">

      <?php if (!empty($errors)): ?>
        <div style="background: rgba(226, 75, 74, 0.1); border: 1px solid #e24b4a; border-radius: 8px; padding: 1rem; margin-bottom: var(--space-6);">
          <?php foreach ($errors as $error): ?>
            <p style="margin: 0; color: #e24b4a; font-size: 0.9rem;">
              <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
            </p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form action="/admin/verify" method="post">
        <label for="code" style="display: block; margin-bottom: var(--space-2); font-weight: 600;">
          <i class="fas fa-key"></i> Code de vérification
        </label>
        <input
          type="text"
          id="code"
          name="code"
          placeholder="000000"
          required
          autofocus
          maxlength="6"
          pattern="[0-9]{6}"
          inputmode="numeric"
          autocomplete="one-time-code"
          style="width: 100%; text-align: center; font-size: 1.8rem; letter-spacing: 8px; font-weight: 700; margin-bottom: var(--space-6);"
        >

        <button type="submit" class="btn btn-primary" style="width: 100%;">
          <i class="fas fa-sign-in-alt"></i> Vérifier et se connecter
        </button>
      </form>

      <p style="text-align: center; margin-top: var(--space-6); font-size: 0.85rem; color: var(--muted);">
        <i class="fas fa-clock"></i> Le code expire dans 10 minutes.
      </p>
      <p style="text-align: center; margin-top: var(--space-2);">
        <a href="/admin/login" style="font-size: 0.85rem;">
          <i class="fas fa-arrow-left"></i> Renvoyer un code
        </a>
      </p>
    </div>
  </div>
</section>
