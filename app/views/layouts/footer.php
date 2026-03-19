<!-- ================================================ -->
<!-- FOOTER PREMIUM -->
<!-- ================================================ -->
<footer class="site-footer">
  <div class="footer-container">
    
    <!-- FOOTER MAIN CONTENT -->
    <div class="footer-content">
      <div class="footer-grid">

        <!-- COLONNE 1: BRAND & NEWSLETTER -->
        <div class="footer-column footer-brand">
          <div class="footer-logo">
            <div class="footer-icon">
              <i class="fas fa-home"></i>
            </div>
            <h3 class="footer-brand-name">
              Estimation Immobilier <span>Lannion</span>
            </h3>
          </div>

          <p class="footer-tagline">
            Estimez votre bien immobilier gratuitement à Lannion et région. Algorithme IA + expertise locale.
          </p>

          <!-- Newsletter Signup -->
          <div class="footer-newsletter">
            <h4 class="footer-section-title">Rester informé</h4>
            <form class="newsletter-form" method="POST" action="/api/newsletter">
              <input 
                type="email" 
                name="email" 
                placeholder="Votre email..." 
                required
                class="newsletter-input"
                aria-label="Email pour newsletter"
              >
              <button type="submit" class="newsletter-btn" aria-label="S'inscrire à la newsletter">
                <i class="fas fa-paper-plane"></i>
              </button>
            </form>
            <p class="newsletter-info">
              <i class="fas fa-lock"></i> Aucun spam, désinscription facile
            </p>
          </div>

          <!-- Réseaux Sociaux -->
          <div class="footer-social">
            <a href="https://facebook.com/estimation-lannion" 
               class="social-link" 
               title="Suivez-nous sur Facebook"
               target="_blank" 
               rel="noopener noreferrer">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com/estimation-lannion" 
               class="social-link" 
               title="Suivez-nous sur Instagram"
               target="_blank" 
               rel="noopener noreferrer">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://linkedin.com/company/estimation-lannion" 
               class="social-link" 
               title="Suivez-nous sur LinkedIn"
               target="_blank" 
               rel="noopener noreferrer">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://twitter.com/estimation_lannion" 
               class="social-link" 
               title="Suivez-nous sur Twitter"
               target="_blank" 
               rel="noopener noreferrer">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>

        <!-- COLONNE 2: ESTIMATION & RESSOURCES -->
        <div class="footer-column">
          <h4 class="footer-section-title">
            <i class="fas fa-calculator"></i> Estimation
          </h4>
          <ul class="footer-links">
            <li><a href="/#form-estimation">Estimer mon bien</a></li>
            <li><a href="/#example-result">Voir un exemple</a></li>
            <li><a href="/processus-estimation">Notre processus</a></li>
            <li><a href="/#how-it-works">Comment ça marche</a></li>
            <li><a href="/quartiers">Nos quartiers</a></li>
          </ul>

          <h4 class="footer-section-title" style="margin-top: var(--space-6);">
            <i class="fas fa-book-open"></i> Ressources
          </h4>
          <ul class="footer-links">
            <li><a href="/guides">Guides complets</a></li>
            <li><a href="/podcast">Podcast immobilier</a></li>
            <li><a href="/newsletter">Newsletter</a></li>
            <li><a href="/blog">Blog & articles</a></li>
          </ul>
        </div>

        <!-- COLONNE 3: ENTREPRISE & SUPPORT -->
        <div class="footer-column">
          <h4 class="footer-section-title">
            <i class="fas fa-building"></i> Entreprise
          </h4>
          <ul class="footer-links">
            <li><a href="/a-propos">À propos de nous</a></li>
            <li><a href="/contact">Nous contacter</a></li>
            <li><a href="tel:+33296053000">+33 2 96 05 30 00</a></li>
            <li><a href="mailto:contact@estimation-lannion.fr">contact@estimation-lannion.fr</a></li>
            <li><a href="/equipe">Notre équipe</a></li>
          </ul>

          <h4 class="footer-section-title" style="margin-top: var(--space-6);">
            <i class="fas fa-headset"></i> Support
          </h4>
          <ul class="footer-links">
            <li><a href="/faq">Questions fréquentes</a></li>
            <li><a href="/contact">Formulaire de contact</a></li>
            <li><a href="/mentions-legales#help">Centre d'aide</a></li>
            <li><a href="/mentions-legales#bugs">Signaler un bug</a></li>
          </ul>
        </div>

        <!-- COLONNE 4: LEGAL & CONFORMITÉ -->
        <div class="footer-column">
          <h4 class="footer-section-title">
            <i class="fas fa-shield-alt"></i> Conformité
          </h4>
          <ul class="footer-links">
            <li><a href="/mentions-legales">Mentions légales</a></li>
            <li><a href="/politique-confidentialite">Politique de confidentialité</a></li>
            <li><a href="/conditions-utilisation">Conditions d'utilisation</a></li>
            <li><a href="/politique-cookies">Politique de cookies</a></li>
            <li><a href="/rgpd">Conformité RGPD</a></li>
          </ul>

          <h4 class="footer-section-title" style="margin-top: var(--space-6);">
            <i class="fas fa-certificate"></i> Certifications
          </h4>
          <div class="footer-badges">
            <span class="badge">
              <i class="fas fa-lock"></i> SSL Sécurisé
            </span>
            <span class="badge">
              <i class="fas fa-shield-alt"></i> RGPD
            </span>
            <span class="badge">
              <i class="fas fa-check-circle"></i> Vérifiée
            </span>
          </div>
        </div>

      </div>
    </div>

    <!-- FOOTER BOTTOM -->
    <div class="footer-bottom">
      <div class="footer-bottom-container">
        <p class="footer-copyright">
          &copy; 2024 Estimation Immobilier Lannion. Tous droits réservés. SAS OCDM Agency.
        </p>
        <div class="footer-bottom-links">
          <a href="/sitemap.xml">Plan du site</a>
          <span class="separator">•</span>
          <a href="/rss.xml">Flux RSS</a>
          <span class="separator">•</span>
          <a href="#top" class="back-to-top">
            <i class="fas fa-arrow-up"></i> Retour en haut
          </a>
        </div>
      </div>
    </div>

  </div>
</footer>

<!-- ================================================ -->
<!-- STYLES FOOTER PREMIUM -->
<!-- ================================================ -->
<style>
  /* ================================================ */
  /* FOOTER CONTAINER */
  /* ================================================ */

  .site-footer {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: rgba(255, 255, 255, 0.9);
    padding: var(--space-12) 0 0;
    margin-top: var(--space-12);
    position: relative;
    overflow: hidden;
  }

  .site-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, 
      transparent, 
      rgba(255, 215, 0, 0.3) 50%, 
      transparent);
  }

  .footer-container {
    width: min(1120px, calc(100% - var(--space-5)));
    margin-inline: auto;
  }

  /* ================================================ */
  /* FOOTER CONTENT GRID */
  /* ================================================ */

  .footer-content {
    padding: var(--space-12) 0 var(--space-8);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: var(--space-8);
  }

  .footer-column {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
  }

  /* ================================================ */
  /* FOOTER BRAND COLUMN */
  /* ================================================ */

  .footer-brand {
    grid-column: span 1;
  }

  .footer-logo {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    margin-bottom: var(--space-2);
  }

  .footer-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 215, 0, 0.15);
    border-radius: var(--radius-lg);
    color: var(--accent);
    font-size: var(--size-xl);
    border: 1px solid rgba(255, 215, 0, 0.2);
  }

  .footer-brand-name {
    margin: 0;
    font-family: var(--font-primary);
    font-size: var(--size-lg);
    font-weight: 800;
    letter-spacing: var(--letter-tight);
    line-height: 1.2;
  }

  .footer-brand-name span {
    color: var(--accent);
  }

  .footer-tagline {
    margin: 0;
    font-size: var(--size-sm);
    color: rgba(255, 255, 255, 0.75);
    line-height: 1.6;
  }

  /* ================================================ */
  /* NEWSLETTER */
  /* ================================================ */

  .footer-newsletter {
    margin: var(--space-4) 0;
  }

  .newsletter-form {
    display: flex;
    gap: var(--space-2);
    margin: var(--space-2) 0;
  }

  .newsletter-input {
    flex: 1;
    padding: var(--space-3) var(--space-4);
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-md);
    color: white;
    font-family: var(--font-secondary);
    font-size: var(--size-sm);
    transition: all var(--trans-fast);
  }

  .newsletter-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
  }

  .newsletter-input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
  }

  .newsletter-btn {
    padding: var(--space-3) var(--space-4);
    background: var(--accent);
    border: none;
    border-radius: var(--radius-md);
    color: var(--primary);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--trans-fast);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .newsletter-btn:hover {
    background: rgba(255, 215, 0, 0.9);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
  }

  .newsletter-btn:active {
    transform: translateY(0);
  }

  .newsletter-info {
    margin: var(--space-2) 0 0;
    font-size: var(--size-xs);
    color: rgba(255, 255, 255, 0.6);
    display: flex;
    align-items: center;
    gap: var(--space-1);
  }

  /* ================================================ */
  /* RÉSEAUX SOCIAUX */
  /* ================================================ */

  .footer-social {
    display: flex;
    gap: var(--space-3);
    margin-top: var(--space-4);
  }

  .social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    color: white;
    text-decoration: none;
    transition: all var(--trans-fast);
  }

  .social-link:hover {
    background: var(--accent);
    border-color: var(--accent);
    color: var(--primary);
    transform: translateY(-3px);
  }

  /* ================================================ */
  /* FOOTER SECTIONS */
  /* ================================================ */

  .footer-section-title {
    margin: 0;
    font-size: var(--size-sm);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: var(--letter-wide);
    color: white;
    display: flex;
    align-items: center;
    gap: var(--space-2);
  }

  .footer-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
  }

  .footer-links li {
    margin: 0;
  }

  .footer-links a {
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    font-size: var(--size-sm);
    transition: all var(--trans-fast);
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
  }

  .footer-links a::before {
    content: '›';
    opacity: 0;
    transform: translateX(-4px);
    transition: all var(--trans-fast);
    font-weight: 700;
    color: var(--accent);
  }

  .footer-links a:hover {
    color: white;
    padding-left: var(--space-2);
  }

  .footer-links a:hover::before {
    opacity: 1;
    transform: translateX(0);
  }

  /* ================================================ */
  /* BADGES */
  /* ================================================ */

  .footer-badges {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
  }

  .badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-3);
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 215, 0, 0.2);
    border-radius: var(--radius-md);
    color: white;
    font-size: var(--size-xs);
    font-weight: 600;
    width: fit-content;
  }

  .badge i {
    color: var(--accent);
  }

  /* ================================================ */
  /* FOOTER BOTTOM */
  /* ================================================ */

  .footer-bottom {
    background: rgba(0, 0, 0, 0.2);
    padding: var(--space-4) 0;
  }

  .footer-bottom-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
    flex-wrap: wrap;
  }

  .footer-copyright {
    margin: 0;
    font-size: var(--size-xs);
    color: rgba(255, 255, 255, 0.6);
  }

  .footer-bottom-links {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-size: var(--size-xs);
  }

  .footer-bottom-links a {
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    transition: color var(--trans-fast);
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
  }

  .footer-bottom-links a:hover {
    color: var(--accent);
  }

  .separator {
    color: rgba(255, 255, 255, 0.3);
  }

  .back-to-top {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
  }

  /* ================================================ */
  /* RESPONSIVE */
  /* ================================================ */

  @media (max-width: 768px) {
    .site-footer {
      padding: var(--space-8) 0 0;
      margin-top: var(--space-8);
    }

    .footer-content {
      padding: var(--space-8) 0 var(--space-6);
    }

    .footer-grid {
      gap: var(--space-6);
    }

    .footer-brand {
      grid-column: span 2;
    }

    .footer-bottom-container {
      flex-direction: column;
      align-items: flex-start;
      gap: var(--space-3);
    }

    .footer-bottom-links {
      flex-wrap: wrap;
    }
  }

  @media (max-width: 480px) {
    .footer-container {
      width: calc(100% - var(--space-4));
    }

    .footer-grid {
      grid-template-columns: 1fr;
      gap: var(--space-6);
    }

    .footer-brand {
      grid-column: span 1;
    }

    .footer-logo {
      flex-direction: column;
      text-align: center;
    }

    .footer-brand-name {
      font-size: var(--size-base);
    }

    .footer-social {
      justify-content: center;
    }

    .footer-section-title {
      justify-content: flex-start;
    }

    .newsletter-form {
      flex-direction: column;
    }

    .newsletter-btn {
      width: 100%;
    }

    .footer-copyright {
      text-align: center;
    }

    .footer-bottom-links {
      justify-content: center;
      width: 100%;
    }
  }

  /* ================================================ */
  /* ANIMATIONS & TRANSITIONS */
  /* ================================================ */

  @media (prefers-reduced-motion: reduce) {
    .site-footer,
    .footer-links a,
    .social-link,
    .newsletter-input,
    .newsletter-btn {
      transition: none !important;
    }
  }

  /* Dark mode support */
  @media (prefers-color-scheme: dark) {
    .site-footer {
      background: linear-gradient(135deg, var(--primary-dark) 0%, #1a0515 100%);
    }
  }
</style>

</main>

<!-- ================================================ -->
<!-- SCRIPTS FOOTER -->
<!-- ================================================ -->
<script>
  // Scroll to top functionality
  document.addEventListener('DOMContentLoaded', function() {
    const backToTopLink = document.querySelector('.back-to-top');
    
    if (backToTopLink) {
      backToTopLink.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    }

    // Newsletter form handling
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
      newsletterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = this.querySelector('.newsletter-input').value;
        const btn = this.querySelector('.newsletter-btn');
        
        // Disabled state
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        // API call (à adapter à votre endpoint)
        fetch('/api/newsletter', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            this.querySelector('.newsletter-input').value = '';
            btn.innerHTML = '<i class="fas fa-check"></i>';
            btn.style.background = 'var(--success)';
            
            setTimeout(() => {
              btn.disabled = false;
              btn.innerHTML = '<i class="fas fa-paper-plane"></i>';
              btn.style.background = '';
            }, 3000);
          }
        })
        .catch(error => {
          console.error('Newsletter error:', error);
          btn.disabled = false;
          btn.innerHTML = '<i class="fas fa-paper-plane"></i>';
        });
      });
    }
  });
</script>

</body>
</html>
