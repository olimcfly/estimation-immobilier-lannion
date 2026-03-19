<?php $page_title = 'Contact - Estimation Immobilière Lannion | Nous Sommes Disponibles'; ?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner card">
      <p class="eyebrow">
        <i class="fas fa-envelope"></i> Nous contacter
      </p>
      <h1>Contactez-nous à Lannion</h1>
      <p class="lead">
        Nous sommes à votre écoute pour répondre à toutes vos questions
        concernant l'estimation et la vente de votre bien immobilier à Lannion.
      </p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-layout">
      <article class="card contact-info">
        <h2><i class="fas fa-map-marker-alt"></i> Nos coordonnées à Lannion</h2>

        <div class="info-block">
          <p class="info-label"><i class="fas fa-phone"></i> Téléphone direct</p>
          <p class="info-value"><a href="tel:+33296000000">+33 2 96 00 00 00</a></p>
        </div>

        <div class="info-block">
          <p class="info-label"><i class="fas fa-envelope"></i> Email contact</p>
          <p class="info-value">
            <a href="mailto:contact@estimation-immobilier-lannion.fr">contact@estimation-immobilier-lannion.fr</a>
          </p>
        </div>

        <div class="info-block">
          <p class="info-label"><i class="fas fa-map-marker-alt"></i> Adresse</p>
          <p class="info-value">
            15 Rue des Chapeliers<br>
            22300 Lannion<br>
            France
          </p>
        </div>

        <div class="info-block">
          <p class="info-label"><i class="fas fa-clock"></i> Horaires d'ouverture</p>
          <ul class="hours-list">
            <li>
              <span>Lundi - Vendredi :</span>
              <strong>9h - 18h</strong>
            </li>
            <li>
              <span>Samedi :</span>
              <strong>10h - 12h</strong>
            </li>
            <li>
              <span>Dimanche :</span>
              <strong>Fermé</strong>
            </li>
          </ul>
        </div>
      </article>

      <article class="card contact-form-card" id="form-contact">
        <h2><i class="fas fa-comment-dots"></i> Envoyez-nous un message</h2>
        <p class="form-intro">
          Remplissez le formulaire ci-dessous. Votre demande est transmise au propriétaire du site.
        </p>

        <?php if (isset($success_message)): ?>
          <p class="alert alert-success" style="margin-bottom: 1rem;">
            <i class="fas fa-check-circle"></i> <?= e($success_message) ?>
          </p>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
          <p class="alert alert-error" style="margin-bottom: 1rem;">
            <i class="fas fa-exclamation-triangle"></i> <?= e($error_message) ?>
          </p>
        <?php endif; ?>

        <form class="form-grid form-contact" action="/contact" method="post" novalidate>
          <label for="nom" class="full-width">
            <span><i class="fas fa-user"></i> Nom *</span>
            <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
          </label>

          <label for="email" class="full-width">
            <span><i class="fas fa-envelope"></i> Email *</span>
            <input type="email" id="email" name="email" placeholder="vous@exemple.com" required>
          </label>

          <label for="telephone" class="full-width">
            <span><i class="fas fa-phone"></i> Téléphone</span>
            <input type="tel" id="telephone" name="telephone" placeholder="+33 6 00 00 00 00">
          </label>

          <label for="message" class="full-width">
            <span><i class="fas fa-pen"></i> Message *</span>
            <textarea id="message" name="message" rows="6" placeholder="Décrivez votre besoin" required></textarea>
          </label>

          <div class="full-width" style="display:none;" aria-hidden="true">
            <label for="website">Ne pas remplir ce champ</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </div>

          <label for="captcha" class="full-width">
            <span><i class="fas fa-shield-alt"></i> Vérification anti-spam *</span>
            <input type="text" id="captcha" name="captcha" placeholder="Combien font 3 + 2 ?" required>
            <small style="display:block; margin-top:0.4rem; color:var(--muted);">
              CAPTCHA recommandé : vous pouvez connecter Google reCAPTCHA côté serveur.
            </small>
          </label>

          <button type="submit" class="btn btn-primary full-width" style="display:flex; justify-content:center; align-items:center; gap:0.5rem;">
            <i class="fas fa-paper-plane"></i> Envoyer
          </button>

          <p class="form-footer full-width" style="text-align:center; margin-top:0.5rem; font-size:0.85rem;">
            <i class="fas fa-lock"></i> Validation côté serveur, honeypot anti-spam et envoi email au propriétaire du site.
          </p>
        </form>
      </article>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow"><i class="fas fa-map"></i> Nous trouver facilement</p>
      <h2>Notre emplacement à Lannion</h2>
    </div>

    <article class="card" style="padding: 0; overflow: hidden;">
      <iframe
        title="Carte Google Maps - Lannion"
        src="https://www.google.com/maps?q=Lannion+22300&output=embed"
        width="100%"
        height="420"
        style="border:0; display:block;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
      </iframe>
    </article>
  </div>
</section>
