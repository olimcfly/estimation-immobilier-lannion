# Analyse du site estimation-immobilier-lannion.fr

## 1. Vue d'ensemble

**Type** : Application SaaS d'estimation immobilière locale
**Cible géographique** : Lannion (22300), Trégor, Bretagne
**Objectif** : Générer des leads vendeurs via un estimateur immobilier en ligne gratuit

---

## 2. Stack technique

| Composant | Technologie |
|---|---|
| **Backend** | PHP 8+ (strict_types), architecture MVC custom |
| **Base de données** | MySQL (PDO, requêtes préparées) |
| **Serveur** | Apache (.htaccess) |
| **Frontend** | HTML/CSS custom (app.css), JavaScript vanilla (main.js) |
| **Fonts** | Google Fonts (Playfair Display, DM Sans) |
| **Icônes** | FontAwesome 6.4.0 (CDN) |
| **APIs externes** | Perplexity AI (prix m²), OpenAI GPT-4o-mini (génération articles) |
| **Tests** | PHPUnit |

---

## 3. Architecture MVC

### 3.1 Routage (routes/web.php - 51 routes)

**Pages principales :**
- `GET /` → Page d'accueil
- `GET /estimation` → Formulaire d'estimation
- `POST /estimation` → Calcul estimation (server-side)
- `POST /api/estimation` → API JSON estimation
- `POST /lead` → Soumission lead

**Admin :**
- `GET /admin/leads` → Dashboard leads (accessible en maintenance)
- `GET /admin/blog` → Gestion articles
- CRUD complet blog + génération IA

**Contenu :**
- `/blog`, `/blog/{slug}` → Blog avec articles SEO
- `/quartiers`, `/services`, `/a-propos`, `/contact`, `/newsletter`
- `/guides`, `/podcast`, `/calculatrice`
- Pages légales : `/mentions-legales`, `/politique-confidentialite`, `/conditions-utilisation`, `/rgpd`

### 3.2 Controllers (5)

| Controller | Rôle |
|---|---|
| `EstimationController` | Estimation, API, leads |
| `PageController` | Pages statiques, newsletter, contact |
| `BlogController` | Affichage blog public |
| `AdminBlogController` | CRUD blog admin + génération IA |
| `ToolController` | Calculatrice immobilière |

### 3.3 Models (4)

| Model | Tables | Fonctions |
|---|---|---|
| `Lead` | `leads` | CRUD, filtrage par score, mise à jour statut |
| `Article` | `articles`, `article_revisions` | CRUD avec versioning |
| `NewsletterSubscriber` | `newsletter_subscribers` | Inscription/confirmation |
| `DesignTemplate` | `design_templates` | Lookup par slug |

### 3.4 Services (4)

| Service | Rôle |
|---|---|
| `EstimationService` | Calcul estimation (facteurs ville/type/surface/pièces) |
| `PerplexityService` | Récupération prix m² via API Perplexity (fallback local) |
| `LeadScoringService` | Scoring lead (chaud/tiède/froid) par budget+urgence+motivation |
| `AIService` | Génération articles SEO via OpenAI + tendances Perplexity |

### 3.5 Core (6 fichiers)

- `Router.php` → Routeur custom avec support paramètres `{id}`, `{slug}`
- `Database.php` → Singleton PDO
- `Config.php` → Accès configuration avec dot notation
- `Validator.php` → Validation string/email/float/int
- `View.php` → Rendu vues PHP avec layout
- `AdminAuth.php` → Authentification admin
- `helpers.php` → Fonctions utilitaires (dont `e()` pour échappement HTML)

---

## 4. Base de données (MySQL)

### Schema (4 tables + migrations)

```
leads          → id, website_id, nom, email, telephone, adresse, ville, estimation, urgence, motivation, notes, score(chaud|tiede|froid), statut(nouveau|contacté|signé), created_at
articles       → id, website_id, title, slug, content, meta_title, meta_description, persona, awareness_level, status(draft|published), created_at
article_revisions → id, article_id, revision_number, ... (mêmes champs qu'articles)
newsletter_subscribers → id, email(unique), confirmed_at, created_at
```

Un système de migrations SQL séquentielles est en place (`database/migrate.php`).

---

## 5. Fonctionnalités détaillées

### 5.1 Estimateur immobilier
- **Entrées** : ville, type de bien, surface, nombre de pièces
- **Algorithme** : prix de base (4 200 €/m²) × facteurs correctifs (ville, type, surface, pièces)
- **Sortie** : fourchette basse (-10%), médiane, haute (+10%) avec prix au m²
- **Facteurs** : Lannion ×0.85, Paris ×2.35, Lyon ×1.35 ; Maison ×1.08 ; Studio ×1.12 ; etc.
- **API Perplexity** : enrichissement optionnel des prix m² (fallback sur valeurs locales)

### 5.2 Capture de leads
- Formulaire post-estimation : nom, email, téléphone, adresse, ville, urgence, motivation, notes
- **Scoring automatique** : budget + urgence + motivation → score 3-9 → chaud (≥8) / tiède (≥5) / froid (<5)
- **Sécurité** : session TTL 30min, cooldown 60s entre soumissions, vérification IP
- **Dashboard admin** : liste avec filtres par score et mise à jour de statut

### 5.3 Blog / Content Marketing
- Articles avec personas cibles et niveaux de conscience (awareness funnel)
- Génération IA via OpenAI GPT-4o-mini avec prompt SEO structuré
- Tendances marché injectées depuis Perplexity
- Versioning des articles (table `article_revisions`)

### 5.4 Autres fonctionnalités
- **Newsletter** : inscription avec confirmation email
- **Calculatrice immobilière** : outil de simulation
- **Mode maintenance** : page 503 avec Retry-After, admin accessible
- **Pages de contenu** : quartiers, services, guides, podcast, processus, exemples

---

## 6. Analyse du site web (frontend)

### 6.1 Design & UX
- **Palette** : Bordeaux (#8B1538) + Or (#D4AF37) sur fond crème (#faf9f7) → positionnement premium
- **Typographie** : Playfair Display (titres) + DM Sans (corps) → élégant et lisible
- **Structure** : Hero → Avantages → Exemple résultat → Processus 3 étapes → FAQ → CTA final
- **CTA** : Répétition stratégique de "Estimer mon bien" sur toute la page (conversion-oriented)
- **Navigation** : 4 menus dropdown (Estimation, Immobilier, Ressources, À propos) + CTA header

### 6.2 SEO
- Balise canonical dynamique
- Meta description configurable par page
- Structure H1/H2/H3 hiérarchique
- URLs propres et descriptives (/estimation, /quartiers, /blog/{slug})
- Contenu localisé (Lannion, Trégor, Bretagne)

### 6.3 Éléments de confiance
- Statistiques affichées : 3 847 estimations, 4.8/5 satisfaction, 97% précision
- Mentions RGPD et SSL/TLS
- Numéro de téléphone visible
- Pages légales complètes

---

## 7. Points forts

1. **Architecture propre** : MVC bien structuré, PHP 8 strict, namespaces PSR-4
2. **Sécurité correcte** : requêtes préparées (PDO), validation des entrées, échappement HTML, protection anti-spam (session TTL + cooldown)
3. **Multi-tenant ready** : `website_id` sur les tables principales
4. **Fallback robuste** : toutes les API externes (Perplexity, OpenAI) ont des fallbacks locaux
5. **SEO solide** : URLs propres, meta tags, contenu localisé, blog intégré
6. **Scoring leads intelligent** : segmentation automatique pour prioriser le suivi commercial

---

## 8. Points d'amélioration identifiés

### Sécurité
- **CSRF** : pas de token CSRF sur les formulaires POST
- **Rate limiting** : le cooldown par session est contournable (nouvelle session = reset)
- **AdminAuth** : à vérifier que l'authentification admin est robuste
- **`getClientIp()`** : `X-Forwarded-For` est spoofable, ne devrait pas servir de contrôle de sécurité seul

### Architecture
- **Pas de Composer autoload** : `composer.json` présent mais pas de `vendor/` visible
- **Pas de cache** : les résultats d'estimation et appels API ne sont pas mis en cache
- **Pas d'ORM** : SQL écrit à la main (acceptable pour la taille du projet)
- **Pas de queue/jobs** : les appels API se font de façon synchrone

### Frontend
- **Pas de minification** : CSS/JS servis tels quels
- **Dépendances CDN** : FontAwesome et Google Fonts chargés depuis CDN (single point of failure)
- **Inline styles** : beaucoup de styles inline dans les vues (maintenabilité)
- **Responsive** : menu mobile présent mais à tester

### Fonctionnel
- **Estimation simpliste** : le calcul repose sur des facteurs statiques, peu de villes supportées
- **Pas de vrai algorithme IA** : malgré le marketing "algorithme IA", c'est un calcul basique avec facteurs
- **Pas d'envoi d'email** : la capture lead est stockée mais aucun email de confirmation/notification
- **Blog** : la génération IA est présente mais la qualité dépend entièrement de l'API externe

### Tests
- **Couverture limitée** : tests unitaires pour EstimationService, Helpers, Validator, Router uniquement
- **Pas de tests d'intégration** : pas de tests controllers/vues/base de données

---

## 9. Recommandations prioritaires

1. **Ajouter protection CSRF** sur tous les formulaires POST
2. **Implémenter un rate limiter** côté serveur (par IP, en base ou Redis)
3. **Mettre en cache** les résultats d'estimation et appels API Perplexity
4. **Envoyer des notifications email** à chaque nouveau lead (au moins à l'admin)
5. **Enrichir l'algorithme d'estimation** avec des données réelles de transactions (DVF, base notaires)
6. **Ajouter des tests d'intégration** pour les controllers et le workflow estimation→lead
7. **Réduire les inline styles** et déplacer dans app.css
8. **Minifier CSS/JS** en production
