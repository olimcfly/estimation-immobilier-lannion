<?php $page_title = 'Connexion Admin - Estimation Immobilier Lannion'; ?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="eyebrow"><i class="fas fa-lock"></i> Espace Administrateur</p>
      <h1>Connexion Admin</h1>
      <p class="lead">Entrez votre adresse email autorisée pour recevoir un code de vérification.</p>
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

      <form action="/admin/login" method="post">
        <label for="email" style="display: block; margin-bottom: var(--space-2); font-weight: 600;">
          <i class="fas fa-envelope"></i> Adresse email
        </label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="votre@email.fr"
          required
          autofocus
          style="width: 100%; margin-bottom: var(--space-6);"
        >

        <button type="submit" class="btn btn-primary" style="width: 100%;">
          <i class="fas fa-paper-plane"></i> Recevoir mon code
        </button>
      </form>

      <p style="text-align: center; margin-top: var(--space-6); font-size: 0.85rem; color: var(--muted);">
        <i class="fas fa-shield-alt"></i> Seules les adresses email autorisées peuvent se connecter.
      </p>
    </div>
  </div>
</section>
