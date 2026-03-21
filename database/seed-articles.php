#!/usr/bin/env php
<?php

/**
 * Seed script: insert 3 blog articles into the database.
 *
 * Usage: php database/seed-articles.php
 */

declare(strict_types=1);

require_once __DIR__ . '/../app/core/bootstrap.php';

use App\Core\Database;
use App\Core\Config;

echo "=== Seed : insertion de 3 articles blog ===\n\n";

try {
    $pdo = Database::connection();
    echo "Connexion OK\n\n";
} catch (\Throwable $e) {
    echo "ECHEC connexion : " . $e->getMessage() . "\n";
    exit(1);
}

$websiteId = (int) Config::get('website.id', 1);

$articles = [
    [
        'title' => 'Estimation immobilière à Lannion : comment obtenir le prix juste en 2026',
        'slug' => 'estimation-immobiliere-lannion-prix-juste-2026',
        'meta_title' => 'Estimation immobilière Lannion 2026 : obtenir le prix juste',
        'meta_description' => 'Découvrez les méthodes fiables pour estimer votre bien immobilier à Lannion en 2026. Prix au m², facteurs de valorisation et erreurs à éviter.',
        'persona' => 'Propriétaire hésitant',
        'awareness_level' => 'solution',
        'status' => 'published',
        'content' => <<<'HTML'
<h2>Pourquoi une estimation précise est essentielle à Lannion</h2>
<p>Le marché immobilier de Lannion reste dynamique, porté par le bassin d'emploi technologique du Trégor. En 2026, le prix moyen au m² à Lannion se situe autour de <strong>1 800 €</strong>, avec des écarts selon les quartiers. Une estimation trop haute fait fuir les acheteurs ; trop basse, vous perdez de l'argent.</p>

<h2>Les 3 méthodes d'estimation utilisées par les professionnels</h2>

<h3>1. La méthode comparative</h3>
<p>C'est la méthode la plus courante. Elle consiste à comparer votre bien avec des ventes récentes similaires dans le même quartier. À Lannion, les données DVF (Demandes de Valeurs Foncières) permettent d'accéder aux transactions réelles des 5 dernières années.</p>

<h3>2. La méthode par capitalisation</h3>
<p>Utilisée principalement pour les biens locatifs, elle évalue la valeur du bien en fonction des revenus locatifs qu'il génère. Un appartement T2 au Centre Historique loué 450 €/mois avec un rendement attendu de 5 % sera valorisé autour de 108 000 €.</p>

<h3>3. La méthode par le coût de remplacement</h3>
<p>Plus rare, elle calcule combien coûterait la reconstruction du bien à neuf, moins la vétusté. Elle est pertinente pour les maisons atypiques ou les biens de caractère dans des quartiers comme Brélévenez.</p>

<h2>Les facteurs qui font varier le prix à Lannion</h2>
<ul>
<li><strong>Le quartier</strong> : le Centre Historique, Brélévenez et Servel affichent les prix les plus élevés (2 200-2 600 €/m²)</li>
<li><strong>L'étage et la luminosité</strong> : un dernier étage avec ascenseur gagne 10-15 % par rapport au rez-de-chaussée</li>
<li><strong>Le DPE</strong> : un bien classé F ou G subit une décote de 10 à 20 % depuis les nouvelles réglementations</li>
<li><strong>L'extérieur</strong> : terrasse, balcon ou jardin ajoutent 5 à 15 % de valeur selon la surface</li>
<li><strong>Le stationnement</strong> : un parking en centre-ville peut valoir 8 000 à 15 000 € seul</li>
</ul>

<h2>Les erreurs classiques à éviter</h2>
<p>La première erreur est de se fier uniquement aux estimations en ligne sans les croiser. La seconde est de surévaluer les travaux réalisés : une cuisine refaite il y a 10 ans n'apporte plus de plus-value significative. Enfin, ne confondez pas prix affiché et prix de vente réel — à Lannion, la marge de négociation tourne autour de 3 à 5 %.</p>

<h2>FAQ</h2>
<h3>Combien coûte une estimation immobilière à Lannion ?</h3>
<p>Une estimation en ligne est gratuite. Un avis de valeur par un agent immobilier est également gratuit et sans engagement. Seule l'expertise par un expert agréé (obligatoire dans certains cas juridiques) est payante, entre 250 et 500 €.</p>

<h3>En combien de temps peut-on vendre à Lannion ?</h3>
<p>Le délai moyen de vente à Lannion est de 60 à 90 jours pour un bien correctement estimé. Un bien surévalué peut rester plus de 6 mois sur le marché.</p>

<p><strong>Estimez votre bien gratuitement</strong> : notre outil utilise les données réelles du marché de Lannion pour vous fournir une fourchette fiable en moins de 2 minutes. <a href="/estimation">Lancer mon estimation →</a></p>
HTML,
    ],
    [
        'title' => 'Vendre dans le Centre Historique : guide complet du quartier le plus prisé de Lannion',
        'slug' => 'vendre-centre-historique-guide-quartier-lannion',
        'meta_title' => 'Vendre au Centre Historique Lannion : prix, conseils et stratégie 2026',
        'meta_description' => 'Guide complet pour vendre votre bien dans le Centre Historique de Lannion. Prix au m², profil des acheteurs, délais de vente et conseils de mise en valeur.',
        'persona' => 'Propriétaire pressé',
        'awareness_level' => 'produit',
        'status' => 'published',
        'content' => <<<'HTML'
<h2>Le Centre Historique : un quartier en or pour les vendeurs</h2>
<p>Cœur médiéval de Lannion avec ses maisons à colombages et à encorbellements, le Centre Historique est devenu l'adresse la plus recherchée de la ville. Avec ses ruelles pittoresques, ses commerces de proximité et sa situation en surplomb du Léguer, le quartier attire familles, jeunes actifs du secteur télécom et investisseurs. Le prix moyen au m² y atteint <strong>2 200 à 2 600 €</strong> selon l'emplacement exact.</p>

<h2>Qui sont les acheteurs au Centre Historique ?</h2>
<ul>
<li><strong>Jeunes couples actifs</strong> (30-40 ans) cherchant un T3/T4 avec cachet, budget 150 000 – 220 000 €</li>
<li><strong>Familles</strong> en quête de maisons de ville ou grands appartements, budget 250 000 – 350 000 €</li>
<li><strong>Investisseurs</strong> visant la location meublée ou la colocation étudiante</li>
<li><strong>Cadres du secteur télécom</strong> travaillant sur le technopôle Anticipa et séduits par le cadre de vie breton</li>
</ul>

<h2>Les atouts à mettre en avant pour vendre vite</h2>

<h3>L'authenticité du bâti</h3>
<p>Les maisons à colombages et à encorbellements, les escaliers en granit, les parquets anciens et les cheminées en pierre sont des arguments de vente majeurs. Ne les cachez pas sous des faux plafonds ou du placo — les acheteurs veulent du caractère authentique.</p>

<h3>La vie de quartier</h3>
<p>Le marché de Lannion (jeudi matin place du Centre), les escaliers de Brélévenez, les berges du Léguer pour la promenade et le vélo… Mentionnez ces éléments dans votre annonce, ils font partie du produit.</p>

<h3>Les transports</h3>
<p>Le réseau de bus TILT dessert le quartier. L'accès à la voie express RN12 est rapide. Précisez les distances : 5 min à pied de la gare SNCF, 10 min en voiture du technopôle Anticipa.</p>

<h2>Stratégie de prix : ne surjouez pas</h2>
<p>Paradoxalement, les biens surévalués au Centre Historique mettent plus longtemps à se vendre. Les acheteurs connaissent le marché. Notre recommandation : estimez au prix juste et créez une urgence d'achat. Un bien bien positionné au Centre Historique se vend en <strong>30 à 45 jours</strong>.</p>

<h2>FAQ</h2>
<h3>Faut-il faire des travaux avant de vendre au Centre Historique ?</h3>
<p>Pour un bien en bon état, un simple rafraîchissement (peinture blanche, nettoyage des parquets) suffit. Pour un bien à rénover, mieux vaut vendre en l'état — les acheteurs du Centre Historique aiment personnaliser et le coût des travaux ne sera pas entièrement récupéré dans le prix.</p>

<h3>Quel est le meilleur moment pour vendre au Centre Historique ?</h3>
<p>Le printemps (mars-juin) reste la meilleure période. Les familles cherchent à s'installer avant la rentrée. Septembre-octobre offre aussi un bon pic d'activité.</p>

<p><strong>Estimez la valeur de votre bien au Centre Historique</strong> en quelques clics. Notre algorithme intègre les données spécifiques du quartier. <a href="/estimation">Obtenir mon estimation gratuite →</a></p>
HTML,
    ],
    [
        'title' => 'DPE et valeur immobilière : ce que tout propriétaire de Lannion doit savoir',
        'slug' => 'dpe-valeur-immobiliere-lannion-proprietaire',
        'meta_title' => 'DPE Lannion : impact sur la valeur de votre bien immobilier',
        'meta_description' => 'Comment le DPE influence le prix de vente de votre bien à Lannion. Décotes par classe énergétique, aides à la rénovation et stratégies pour vendre malgré un mauvais DPE.',
        'persona' => 'Propriétaire méfiant',
        'awareness_level' => 'problème',
        'status' => 'published',
        'content' => <<<'HTML'
<h2>Le DPE est devenu un critère décisif à Lannion</h2>
<p>Depuis les réformes réglementaires, le Diagnostic de Performance Énergétique (DPE) n'est plus un simple document administratif. Il conditionne directement la valeur de votre bien, sa capacité à être loué, et la vitesse à laquelle il se vendra. À Lannion, où le parc immobilier ancien est majoritaire, c'est un sujet qui concerne <strong>plus de 40 % des propriétaires</strong>.</p>

<h2>L'impact concret du DPE sur les prix à Lannion</h2>
<p>Les données du marché de Lannion montrent des écarts significatifs :</p>
<ul>
<li><strong>Classe A-B</strong> : prime de +6 à +10 % par rapport au prix moyen du quartier</li>
<li><strong>Classe C-D</strong> : prix dans la moyenne du marché, aucune décote</li>
<li><strong>Classe E</strong> : décote de -5 à -8 %, les acheteurs négocient systématiquement</li>
<li><strong>Classe F</strong> : décote de -10 à -15 %, interdiction de location depuis 2025</li>
<li><strong>Classe G</strong> : décote de -15 à -25 %, considéré comme « passoire thermique »</li>
</ul>

<h3>Un exemple concret</h3>
<p>Un appartement T3 de 70 m² à Ker Uhel, classé D, se vend autour de 140 000 €. Le même bien classé F se négocie entre 119 000 et 126 000 € — soit 14 000 à 21 000 € de différence. Mais attention : les travaux d'amélioration énergétique coûtent souvent moins que cette décote.</p>

<h2>Faut-il rénover avant de vendre ?</h2>

<h3>Quand la rénovation est rentable</h3>
<p>Si votre bien est classé F ou G et que les travaux pour passer en D ou E coûtent moins de 15 000 €, c'est presque toujours rentable. Les interventions les plus efficaces à Lannion :</p>
<ul>
<li><strong>Isolation des combles</strong> : 2 000 à 5 000 €, gain de 1 à 2 classes</li>
<li><strong>Remplacement des fenêtres</strong> : 5 000 à 10 000 € pour un T3, gain significatif en confort et DPE</li>
<li><strong>Changement de chaudière</strong> : 3 000 à 8 000 €, passage du fioul/gaz ancien vers une pompe à chaleur</li>
</ul>

<h3>Quand il vaut mieux vendre en l'état</h3>
<p>Si le bien nécessite une rénovation globale (toiture, façade, réseaux), vendez en l'état en ajustant le prix. Les investisseurs et les primo-accédants bricoleurs cherchent ce type de biens à Lannion, surtout dans les quartiers en devenir comme Loguivy-lès-Lannion ou Servel.</p>

<h2>Les aides disponibles en Côtes-d'Armor</h2>
<ul>
<li><strong>MaPrimeRénov'</strong> : jusqu'à 20 000 € selon les revenus et les travaux</li>
<li><strong>Éco-PTZ</strong> : prêt à taux zéro jusqu'à 50 000 € pour la rénovation énergétique</li>
<li><strong>Aides de Lannion-Trégor Communauté</strong> : subventions complémentaires pour les copropriétés</li>
<li><strong>CEE (Certificats d'Économie d'Énergie)</strong> : primes versées par les fournisseurs d'énergie</li>
</ul>

<h2>FAQ</h2>
<h3>Mon DPE est-il encore valable ?</h3>
<p>Les DPE réalisés avant le 1er juillet 2021 avec l'ancienne méthode ne sont plus valables. Si votre DPE date d'avant cette date, faites-le refaire avant de mettre en vente — le nouveau calcul pourrait d'ailleurs vous être favorable.</p>

<h3>Peut-on vendre un bien classé G ?</h3>
<p>Oui, la vente reste possible quelle que soit la classe DPE. Seule la <strong>mise en location</strong> est restreinte pour les classes F et G. Mais attendez-vous à une forte négociation de la part des acheteurs.</p>

<p><strong>Quel impact le DPE a-t-il sur votre bien ?</strong> Estimez sa valeur actuelle et découvrez le potentiel de valorisation. <a href="/estimation">Estimer mon bien maintenant →</a></p>
HTML,
    ],
];

$inserted = 0;

$sql = 'INSERT INTO articles (website_id, title, slug, content, meta_title, meta_description, persona, awareness_level, status, created_at)
        VALUES (:website_id, :title, :slug, :content, :meta_title, :meta_description, :persona, :awareness_level, :status, NOW())';

$stmt = $pdo->prepare($sql);

foreach ($articles as $i => $article) {
    echo "  " . ($i + 1) . ". {$article['title']}... ";

    // Check if slug already exists
    $check = $pdo->prepare('SELECT id FROM articles WHERE website_id = :wid AND slug = :slug LIMIT 1');
    $check->execute([':wid' => $websiteId, ':slug' => $article['slug']]);

    if ($check->fetch()) {
        echo "existe déjà, ignoré\n";
        continue;
    }

    try {
        $stmt->execute([
            ':website_id' => $websiteId,
            ':title' => $article['title'],
            ':slug' => $article['slug'],
            ':content' => $article['content'],
            ':meta_title' => $article['meta_title'],
            ':meta_description' => $article['meta_description'],
            ':persona' => $article['persona'],
            ':awareness_level' => $article['awareness_level'],
            ':status' => $article['status'],
        ]);
        echo "OK (ID: " . $pdo->lastInsertId() . ")\n";
        $inserted++;
    } catch (\PDOException $e) {
        echo "ERREUR - " . $e->getMessage() . "\n";
    }
}

echo "\n=== Résultat : {$inserted} article(s) inséré(s) ===\n";
