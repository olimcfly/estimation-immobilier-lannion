<?php
$page_title = 'Quartiers d\'Aix-en-Provence - Estimation Immobilière Aix | Guide Détaillé';

$quartiers = [
    [
        'nom' => 'Centre Historique',
        'description' => "Le cœur vibrant d'Aix-en-Provence, entre le Cours Mirabeau, les fontaines et les hôtels particuliers. Idéal pour celles et ceux qui recherchent une vie urbaine active et culturelle.",
        'prix_m2' => 5800,
        'prix_moyen' => 580000,
        'caracteristiques' => ['Patrimoine', 'Fontaines', 'Culture', 'Commerces'],
        'population' => '~8000 habitants',
        'transports' => 'Bus Aix en Bus, TGV Aix (15 min)',
        'attractivite' => 'Très haute',
        'coords' => '43.5263,5.4454',
        'tendance' => '+4.8%',
    ],
    [
        'nom' => 'Mazarin',
        'description' => "Quartier élégant aux hôtels particuliers du XVIIe siècle, calme bourgeois et architecturalement remarquable. Très prisé des familles aisées.",
        'prix_m2' => 5500,
        'prix_moyen' => 550000,
        'caracteristiques' => ['Hôtels particuliers', 'Calme', 'Prestige', 'Architecture'],
        'population' => '~4500 habitants',
        'transports' => 'Bus urbains, centre piéton accessible',
        'attractivite' => 'Très haute',
        'coords' => '43.5240,5.4480',
        'tendance' => '+3.9%',
    ],
    [
        'nom' => 'Jas de Bouffan',
        'description' => "Quartier résidentiel familial avec centre commercial, écoles et espaces verts. Bon rapport qualité/prix pour les familles.",
        'prix_m2' => 3800,
        'prix_moyen' => 380000,
        'caracteristiques' => ['Familial', 'Commerces', 'Écoles', 'Espaces verts'],
        'population' => '~12000 habitants',
        'transports' => 'Bus Aix en Bus, accès autoroute',
        'attractivite' => 'Moyenne à haute',
        'coords' => '43.5280,5.4180',
        'tendance' => '+3.2%',
    ],
    [
        'nom' => 'Pont de l\'Arc',
        'description' => "Zone résidentielle moderne, bien connectée, avec immeubles récents et proximité du centre. Attire jeunes actifs et investisseurs.",
        'prix_m2' => 4200,
        'prix_moyen' => 420000,
        'caracteristiques' => ['Moderne', 'Résidentiel', 'Bien connecté', 'Investissement'],
        'population' => '~6000 habitants',
        'transports' => 'Bus, accès A8, proche gare TGV',
        'attractivite' => 'Haute',
        'coords' => '43.5180,5.4350',
        'tendance' => '+4.1%',
    ],
    [
        'nom' => 'Les Milles',
        'description' => "Quartier dynamique avec zone d'activités, logements neufs et projets urbains en développement. Prix accessibles pour la commune.",
        'prix_m2' => 3600,
        'prix_moyen' => 360000,
        'caracteristiques' => ['Dynamique', 'Neuf', 'Zone activités', 'Accessible'],
        'population' => '~10000 habitants',
        'transports' => 'Bus, gare TGV Aix, accès autoroute',
        'attractivite' => 'Moyenne',
        'coords' => '43.5040,5.3870',
        'tendance' => '+5.3%',
    ],
    [
        'nom' => 'Puyricard',
        'description' => "Village provençal au nord d'Aix, offrant bastides, terrains spacieux et un cadre de vie champêtre à quelques minutes du centre.",
        'prix_m2' => 4500,
        'prix_moyen' => 520000,
        'caracteristiques' => ['Village provençal', 'Bastides', 'Nature', 'Terrain'],
        'population' => '~5000 habitants',
        'transports' => 'Bus navette, accès routier vers centre',
        'attractivite' => 'Haute',
        'coords' => '43.5640,5.4260',
        'tendance' => '+3.5%',
    ],
];
?>

<section class="section page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="eyebrow">
        <i class="fas fa-map-marked-alt"></i> Quartiers d'Aix-en-Provence
      </p>
      <h1>Explorez les quartiers d'Aix-en-Provence</h1>
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
        title="Carte des quartiers d'Aix-en-Provence"
        src="https://maps.google.com/maps?q=43.5297,5.4474&z=13&output=embed"
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
              <div style="background: linear-gradient(135deg, rgba(0, 63, 135, 0.1), rgba(255, 215, 0, 0.08)); border-radius: var(--radius-lg); padding: var(--space-3) var(--space-4);">
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
      <h2>Ambiances et paysages d'Aix-en-Provence</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
      <!-- Centre Historique -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?auto=format&fit=crop&w=500&q=80"
            alt="Centre Historique d'Aix-en-Provence"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-building"></i> Centre Historique
        </figcaption>
      </figure>

      <!-- Mazarin -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Mazarin"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-landmark"></i> Mazarin
        </figcaption>
      </figure>

      <!-- Jas de Bouffan -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Jas de Bouffan"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-home"></i> Jas de Bouffan
        </figcaption>
      </figure>

      <!-- Pont de l'Arc -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Pont de l'Arc"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-city"></i> Pont de l'Arc
        </figcaption>
      </figure>

      <!-- Les Milles -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Les Milles"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-industry"></i> Les Milles
        </figcaption>
      </figure>

      <!-- Puyricard -->
      <figure style="margin: 0;">
        <div style="position: relative; overflow: hidden; border-radius: var(--radius-xl); height: 240px; background: var(--bg-alt);">
          <img
            src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=500&q=80"
            alt="Quartier Puyricard"
            style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--trans-base);"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'"
          >
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.4)); border-radius: var(--radius-xl);"></div>
        </div>
        <figcaption style="font-weight: 600; color: var(--text); margin-top: var(--space-2); font-size: var(--size-sm);">
          <i class="fas fa-tree"></i> Puyricard
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
          Les Milles affiche la tendance la plus forte (+5.3%) grâce à son développement urbain dynamique et son attrait pour les investisseurs. Centre Historique et Pont de l'Arc suivent étroitement.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Quel quartier pour une famille ?
        </h3>
        <p>
          Jas de Bouffan et Puyricard offrent un excellent rapport qualité/prix avec des maisons familiales, des espaces verts et une ambiance calme. Pont de l'Arc est aussi un bon compromis entre services et tranquillité.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Où trouver le meilleur investissement ?
        </h3>
        <p>
          Centre Historique et Mazarin combinent forte attractivité et bonnes perspectives de plusvalue. Les prix au m² y sont plus élevés mais l'évolution positive les justifie.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Existe-t-il un quartier tranquille et accessible ?
        </h3>
        <p>
          Pont de l'Arc et Puyricard incarnent ce balance parfait : cadre résidentiel paisible avec accès rapide aux services du centre-ville via les transports.
        </p>
      </article>

      <article class="card faq-card">
        <h3>
          <i class="fas fa-question-circle"></i> Les prix varient-ils beaucoup d'un quartier à l'autre ?
        </h3>
        <p>
          Oui, de 3 600 €/m² (Les Milles) à 5 800 €/m² (Centre Historique). L'écart reflète l'attractivité, la proximité des services et le charme du quartier. Les prix reflètent l'attractivité d'Aix-en-Provence en Provence.
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
