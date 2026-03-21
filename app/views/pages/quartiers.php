<?php
$page_title = 'Quartiers de Lannion - Estimation Immobilière Lannion | Guide Détaillé';

$quartiers = [
    [
        'nom' => 'Centre Historique',
        'description' => "Coeur médiéval de Lannion avec ses maisons à colombages, ses escaliers de Brélévenez et ses places animées. Charme authentique breton, commerces et marchés.",
        'prix_m2' => 2400,
        'prix_moyen' => 200000,
        'caracteristiques' => ['Médiéval', 'Colombages', 'Patrimoine', 'Marché'],
        'population' => '~5000 habitants',
        'transports' => 'Bus TILT, Centre piéton',
        'attractivite' => 'Haute',
        'coords' => '48.7320,-3.4580',
        'tendance' => '+3.8%',
    ],
    [
        'nom' => 'Brélévenez',
        'description' => "Quartier historique sur les hauteurs avec son église romane et ses 142 marches. Vue panoramique sur la vallée du Léguer. Maisons de caractère et ambiance paisible.",
        'prix_m2' => 2200,
        'prix_moyen' => 220000,
        'caracteristiques' => ['Historique', 'Vue panoramique', 'Église romane', 'Calme'],
        'population' => '~3000 habitants',
        'transports' => 'Bus TILT, Piéton',
        'attractivite' => 'Haute',
        'coords' => '48.7350,-3.4550',
        'tendance' => '+3.2%',
    ],
    [
        'nom' => 'Servel / Technopole',
        'description' => "Secteur dynamique autour du technopole Anticipa. Pôle télécom historique (Orange, Nokia), logements récents et campus universitaire. Attractif pour les ingénieurs et chercheurs.",
        'prix_m2' => 2300,
        'prix_moyen' => 250000,
        'caracteristiques' => ['Technopole', 'Innovation', 'Campus', 'Moderne'],
        'population' => '~4000 habitants',
        'transports' => 'Bus TILT, Voiture',
        'attractivite' => 'Haute',
        'coords' => '48.7450,-3.4700',
        'tendance' => '+4.5%',
    ],
    [
        'nom' => 'Loguivy-lès-Lannion',
        'description' => "Ancien village rattaché à Lannion, ambiance rurale préservée. Maisons en pierre, jardins et proximité de la campagne bretonne. Idéal pour ceux cherchant le calme.",
        'prix_m2' => 1800,
        'prix_moyen' => 180000,
        'caracteristiques' => ['Rural', 'Pierre', 'Calme', 'Nature'],
        'population' => '~2500 habitants',
        'transports' => 'Bus TILT, Voiture',
        'attractivite' => 'Moyenne',
        'coords' => '48.7200,-3.4400',
        'tendance' => '+5.2%',
    ],
    [
        'nom' => 'Ker Uhel / Pouldiguy',
        'description' => "Quartier résidentiel avec équipements sportifs et parc de loisirs. Pavillons récents, commerces de proximité et vie de quartier active. Bon rapport qualité-prix.",
        'prix_m2' => 2000,
        'prix_moyen' => 210000,
        'caracteristiques' => ['Résidentiel', 'Sport', 'Loisirs', 'Familles'],
        'population' => '~3500 habitants',
        'transports' => 'Bus TILT, Pistes cyclables',
        'attractivite' => 'Moyenne à haute',
        'coords' => '48.7280,-3.4650',
        'tendance' => '+3.5%',
    ],
    [
        'nom' => 'Beg Léguer / Côte',
        'description' => "Secteur côtier entre Lannion et la mer. Proximité des plages de la Côte de Granit Rose. Résidences principales et secondaires, cadre exceptionnel entre terre et mer.",
        'prix_m2' => 2600,
        'prix_moyen' => 280000,
        'caracteristiques' => ['Côtier', 'Plages', 'Granit Rose', 'Cadre exceptionnel'],
        'population' => '~2000 habitants',
        'transports' => 'Voiture, Bus saisonnier',
        'attractivite' => 'Très haute',
        'coords' => '48.7500,-3.5000',
        'tendance' => '+5.8%',
    ],
];
?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="eyebrow">
        <i class="fas fa-map-marked-alt"></i> Quartiers de Lannion
      </p>
      <h1>Explorez les quartiers de Lannion</h1>
      <p class="lead">
        Comparez les prix au m², les tendances de marché et les points forts de chaque quartier pour affiner votre estimation immobilière.
      </p>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- CARTE INTERACTIVE -->
<!-- ================================================ -->
<section class="section section-alt">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">
        <i class="fas fa-map-pin"></i> Carte Interactive
      </p>
      <h2>Visualisez les quartiers sur la carte</h2>
    </div>

    <div class="card" style="padding: var(--space-6);">
      <p style="color: var(--text-secondary); margin-bottom: var(--space-4); font-size: var(--size-sm); display: flex; align-items: center; gap: var(--space-2);">
        <i class="fas fa-info-circle"></i> Cliquez sur un quartier pour centrer la carte et découvrir ses caractéristiques.
      </p>

      <div style="display: flex; flex-wrap: wrap; gap: var(--space-3); margin-bottom: var(--space-6);">
        <?php foreach ($quartiers as $index => $quartier): ?>
          <button
            type="button"
            class="btn btn-outline quartier-map-btn"
            data-nom="<?= htmlspecialchars($quartier['nom']); ?>"
            data-coords="<?= htmlspecialchars($quartier['coords']); ?>"
            data-zoom="15"
            data-index="<?= $index; ?>"
          >
            <i class="fas fa-location-dot"></i> <?= htmlspecialchars($quartier['nom']); ?>
          </button>
        <?php endforeach; ?>
      </div>

      <iframe
        id="google-map-quartiers"
        title="Carte des quartiers de Lannion"
        src="https://maps.google.com/maps?q=48.7320,-3.4580&z=13&output=embed"
        width="100%"
        height="480"
        style="border: 0; border-radius: var(--radius-xl); display: block;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- GRILLE QUARTIERS AVEC STATS -->
<!-- ================================================ -->
<section class="section">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">
        <i class="fas fa-chart-bar"></i> Détails par Quartier
      </p>
      <h2>Prix et caractéristiques clés</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: var(--space-6);">
      <?php foreach ($quartiers as $index => $quartier): ?>
        <article class="card quartier-card" data-quartier="<?= htmlspecialchars($quartier['nom']); ?>">
          <!-- En-tête avec prix et tendance -->
          <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-3); margin-bottom: var(--space-4); padding-bottom: var(--space-4); border-bottom: 1px solid var(--border-light);">
            <div style="flex: 1;">
              <h3 style="margin: 0 0 var(--space-1) 0; font-size: var(--size-2xl);"><?= htmlspecialchars($quartier['nom']); ?></h3>
              <p style="margin: 0; font-size: var(--size-sm); color: var(--text-muted);">
                <i class="fas fa-users"></i> <?= htmlspecialchars($quartier['population']); ?>
              </p>
            </div>
            <div style="text-align: right;">
              <div style="background: linear-gradient(135deg, rgba(139, 21, 56, 0.1), rgba(212, 175, 55, 0.08)); border-radius: var(--radius-lg); padding: var(--space-3) var(--space-4);">
                <p style="margin: 0; font-weight: 700; font-size: var(--size-lg); color: var(--primary);">
                  <?= number_format((int) $quartier['prix_m2'], 0, ',', ' '); ?> €/m²
                </p>
                <p style="margin: var(--space-1) 0 0 0; font-size: var(--size-xs); color: var(--text-secondary);">
                  <i class="fas fa-arrow-trend-up"></i> <?= htmlspecialchars($quartier['tendance']); ?>
                </p>
              </div>
            </div>
          </div>

          <!-- Description -->
          <p style="color: var(--text-secondary); font-size: var(--size-sm); margin-bottom: var(--space-4); line-height: var(--line-lg);">
            <?= htmlspecialchars($quartier['description']); ?>
          </p>

          <!-- Prix moyen -->
          <div style="background: var(--bg-alt); border-radius: var(--radius-lg); padding: var(--space-3) var(--space-4); margin-bottom: var(--space-4); border-left: 4px solid var(--accent);">
            <p style="margin: 0; font-size: var(--size-xs); color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Prix moyen estimé</p>
            <p style="margin: var(--space-1) 0 0 0; font-family: var(--font-primary); font-size: var(--size-2xl); font-weight: 800; color: var(--primary);">
              <?= number_format((int) $quartier['prix_moyen'], 0, ',', ' '); ?> €
            </p>
          </div>

          <!-- Caractéristiques -->
          <div style="margin-bottom: var(--space-4);">
            <p style="font-size: var(--size-xs); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: var(--space-2);">
              <i class="fas fa-check-circle"></i> Caractéristiques
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: var(--space-2);">
              <?php foreach ($quartier['caracteristiques'] as $caracteristique): ?>
                <span class="badge badge-primary">
                  <?= htmlspecialchars($caracteristique); ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Infos détaillées -->
          <div style="display: grid; gap: var(--space-3); font-size: var(--size-sm); margin-bottom: var(--space-4); padding: var(--space-4) 0; border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
            <div style="display: flex; gap: var(--space-3);">
              <span style="color: var(--primary); font-weight: 600; min-width: 120px;">
                <i class="fas fa-bus"></i> Transports
              </span>
              <span style="color: var(--text-secondary);">
                <?= htmlspecialchars($quartier['transports']); ?>
              </span>
            </div>
            <div style="display: flex; gap: var(--space-3);">
              <span style="color: var(--primary); font-weight: 600; min-width: 120px;">
                <i class="fas fa-star"></i> Attractivité
              </span>
              <span style="color: var(--text-secondary);">
                <?= htmlspecialchars($quartier['attractivite']); ?>
              </span>
            </div>
          </div>

          <!-- CTA Bouton -->
          <a href="/estimation#form-estimation" class="btn btn-primary full-width">
            <i class="fas fa-calculator"></i> Estimer mon bien ici
          </a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- COMPARATIF PRIX -->
<!-- ================================================ -->
<section class="section section-alt">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">
        <i class="fas fa-chart-line"></i> Comparatif des Prix
      </p>
      <h2>Évolution des prix au m² par quartier</h2>
    </div>

    <div class="card" style="padding: var(--space-8); overflow-x: auto;">
      <table style="width: 100%; border-collapse: collapse; font-size: var(--size-sm);">
        <thead>
          <tr style="border-bottom: 2px solid var(--border);">
            <th style="padding: var(--space-3) var(--space-4); text-align: left; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;">
              Quartier
            </th>
            <th style="padding: var(--space-3) var(--space-4); text-align: right; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;">
              Prix/m²
            </th>
            <th style="padding: var(--space-3) var(--space-4); text-align: right; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;">
              Prix Moyen
            </th>
            <th style="padding: var(--space-3) var(--space-4); text-align: center; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;">
              Tendance
            </th>
            <th style="padding: var(--space-3) var(--space-4); text-align: center; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;">
              Dynamisme
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($quartiers as $quartier):
            $prix_m2 = (int) $quartier['prix_m2'];
            $prix_moyen = (int) $quartier['prix_moyen'];
            $tendance = $quartier['tendance'];
            $dynamisme = match(true) {
              str_contains($quartier['attractivite'], 'Très haute') => '★★★★★',
              str_contains($quartier['attractivite'], 'Haute') => '★★★★',
              str_contains($quartier['attractivite'], 'Moyenne à haute') => '★★★★',
              default => '★★★'
            };
          ?>
            <tr style="border-bottom: 1px solid var(--border-light); transition: background var(--trans-fast);" onmouseover="this.style.background='var(--bg-alt)'" onmouseout="this.style.background='transparent'">
              <td style="padding: var(--space-3) var(--space-4); font-weight: 600; color: var(--text);">
                <?= htmlspecialchars($quartier['nom']); ?>
              </td>
              <td style="padding: var(--space-3) var(--space-4); text-align: right; color: var(--primary); font-weight: 700;">
                <?= number_format($prix_m2, 0, ',', ' '); ?> €
              </td>
              <td style="padding: var(--space-3) var(--space-4); text-align: right; color: var(--text-secondary);">
                <?= number_format($prix_moyen, 0, ',', ' '); ?> €
              </td>
              <td style="padding: var(--space-3) var(--space-4); text-align: center;">
                <span style="background: rgba(16, 185, 129, 0.1); color: var(--success); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); font-weight: 700; font-size: var(--size-xs);">
                  <?= htmlspecialchars($tendance); ?>
                </span>
              </td>
              <td style="padding: var(--space-3) var(--space-4); text-align: center; color: var(--accent); font-weight: 700; font-size: var(--size-sm);">
                <?= $dynamisme; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- GALERIE PHOTOS -->
<!-- ================================================ -->
<section class="section">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">
        <i class="fas fa-image"></i> Galerie Visuelle
      </p>
      <h2>Ambiances et paysages de Lannion</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
      <!-- Centre Historique -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1560969184-10fe8719e047?auto=format&fit=crop&w=500&q=80"
            alt="Centre Historique de Lannion"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-monument"></i> Centre Historique
        </figcaption>
      </figure>

      <!-- Brélévenez -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1559128010-7c1ad6e1b6a5?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Brélévenez Lannion"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-church"></i> Brélévenez
        </figcaption>
      </figure>

      <!-- Servel -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Servel Lannion"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-microchip"></i> Servel
        </figcaption>
      </figure>

      <!-- Loguivy-lès-Lannion -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Loguivy-lès-Lannion"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-leaf"></i> Loguivy-lès-Lannion
        </figcaption>
      </figure>

      <!-- Ker Uhel -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Ker Uhel Lannion"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-futbol"></i> Ker Uhel
        </figcaption>
      </figure>

      <!-- Beg Léguer -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Beg Léguer"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-umbrella-beach"></i> Beg Léguer
        </figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- FAQ QUARTIERS -->
<!-- ================================================ -->
<section class="section section-alt">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">
        <i class="fas fa-question-circle"></i> Questions Fréquentes
      </p>
      <h2>Vos questions sur les quartiers</h2>
    </div>

    <div class="faq-grid">
      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Quel est le quartier le plus dynamique ?
        </h3>
        <p>
          Beg Léguer affiche la tendance la plus forte (+5.8%) grâce à l'attrait de la Côte de Granit Rose. Loguivy-lès-Lannion suit avec +5.2% porté par le cadre rural recherché et les prix accessibles.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Quel quartier pour une famille ?
        </h3>
        <p>
          Ker Uhel est le quartier familial par excellence avec ses pavillons, ses équipements sportifs et son ambiance résidentielle calme. Loguivy-lès-Lannion offre aussi un excellent cadre de vie avec ses maisons en pierre et jardins.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Où trouver le meilleur investissement ?
        </h3>
        <p>
          Loguivy-lès-Lannion et Ker Uhel combinent des prix encore accessibles avec de fortes perspectives de plus-value grâce au dynamisme du bassin d'emploi technologique de Lannion.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Quel quartier offre le meilleur rapport qualité/prix ?
        </h3>
        <p>
          Loguivy-lès-Lannion et Ker Uhel proposent des prix au m² plus abordables (1 800 à 2 000 €/m²) tout en restant proches du centre. Idéal pour les primo-accédants souhaitant rester dans l'agglomération lannionnaise.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Les prix varient-ils beaucoup d'un quartier à l'autre ?
        </h3>
        <p>
          Oui, de 1 800 €/m² (Loguivy-lès-Lannion) à 2 600 €/m² (Beg Léguer). L'écart reflète la proximité du littoral, le patrimoine architectural et la demande. Lannion reste attractif comparé aux autres villes bretonnes de taille similaire.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Comment choisir son quartier pour vendre ?
        </h3>
        <p>
          Votre bien s'adapte à un profil de client. Utilisez notre estimation pour connaître le prix du marché, puis explorez les tendances de votre quartier pour fixer le bon prix de vente.
        </p>
      </article>
    </div>
  </div>
</section>

<!-- ================================================ -->
<!-- CTA FINAL -->
<!-- ================================================ -->
<section class="section">
  <div class="container">
    <div class="cta-final card">
      <p class="eyebrow">
        <i class="fas fa-lightbulb"></i> Prêt à connaître la valeur de votre bien ?
      </p>
      <h2>Estimez votre propriété dès maintenant</h2>
      <p class="lead">
        Quel que soit votre quartier, notre outil vous donne une estimation fiable et précise en quelques secondes.
      </p>
      <a href="/estimation#form-estimation" class="btn btn-primary">
        <i class="fas fa-calculator"></i> Commencer une estimation
      </a>
    </div>
  </div>
</section>

<script>
  (function () {
    const mapIframe = document.getElementById('google-map-quartiers');
    const buttons = document.querySelectorAll('.quartier-map-btn');

    if (!mapIframe || !buttons.length) {
      return;
    }

    buttons.forEach((button) => {
      button.addEventListener('click', () => {
        const coords = button.getAttribute('data-coords');
        const zoom = button.getAttribute('data-zoom') || '15';
        const nom = button.getAttribute('data-nom');

        if (!coords) {
          return;
        }

        // Update map
        mapIframe.setAttribute('src', `https://maps.google.com/maps?q=${coords}&z=${zoom}&output=embed`);

        // Update button states
        buttons.forEach((btn) => btn.classList.remove('active'));
        button.classList.add('active');

        // Smooth scroll to map
        mapIframe.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      });
    });

    // Set first button as active on load
    if (buttons.length > 0) {
      buttons[0].classList.add('active');
    }
  })();
</script>
