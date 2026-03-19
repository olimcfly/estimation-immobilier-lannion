<?php $page_title = 'Tableau de bord Admin'; ?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="eyebrow"><i class="fas fa-tachometer-alt"></i> Administration</p>
      <h1>Tableau de bord</h1>
      <p class="lead">Bienvenue, <strong><?= htmlspecialchars($email ?? 'Admin', ENT_QUOTES, 'UTF-8') ?></strong></p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">

      <!-- Leads -->
      <a href="/admin/leads" class="card" style="text-decoration: none; color: inherit; transition: transform 0.2s;">
        <div style="text-align: center; padding: var(--space-6);">
          <i class="fas fa-users" style="font-size: 2.5rem; color: var(--primary); margin-bottom: var(--space-4);"></i>
          <h3 style="margin-bottom: var(--space-2);">Leads</h3>
          <p style="color: var(--muted); font-size: 0.9rem;">Gérer les demandes d'estimation et les contacts prospects.</p>
          <span class="btn btn-small" style="margin-top: var(--space-4);">
            <i class="fas fa-arrow-right"></i> Voir les leads
          </span>
        </div>
      </a>

      <!-- Blog -->
      <a href="/admin/blog" class="card" style="text-decoration: none; color: inherit; transition: transform 0.2s;">
        <div style="text-align: center; padding: var(--space-6);">
          <i class="fas fa-newspaper" style="font-size: 2.5rem; color: var(--primary); margin-bottom: var(--space-4);"></i>
          <h3 style="margin-bottom: var(--space-2);">Blog</h3>
          <p style="color: var(--muted); font-size: 0.9rem;">Créer, modifier et publier des articles de blog.</p>
          <span class="btn btn-small" style="margin-top: var(--space-4);">
            <i class="fas fa-arrow-right"></i> Gérer le blog
          </span>
        </div>
      </a>

      <!-- Newsletter -->
      <a href="/admin/newsletter" class="card" style="text-decoration: none; color: inherit; transition: transform 0.2s;">
        <div style="text-align: center; padding: var(--space-6);">
          <i class="fas fa-envelope-open-text" style="font-size: 2.5rem; color: var(--primary); margin-bottom: var(--space-4);"></i>
          <h3 style="margin-bottom: var(--space-2);">Newsletter</h3>
          <p style="color: var(--muted); font-size: 0.9rem;">Voir les abonnés à la newsletter.</p>
          <span class="btn btn-small" style="margin-top: var(--space-4);">
            <i class="fas fa-arrow-right"></i> Voir les abonnés
          </span>
        </div>
      </a>

    </div>

    <!-- Déconnexion -->
    <div style="text-align: center; margin-top: var(--space-8);">
      <a href="/admin/logout" class="btn" style="color: #e24b4a; border-color: #e24b4a;">
        <i class="fas fa-sign-out-alt"></i> Déconnexion
      </a>
    </div>
  </div>
</section>
