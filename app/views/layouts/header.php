<!DOCTYPE html>
<html lang="fr">
<head>
  <?php
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $canonicalPath = (string) parse_url($requestUri, PHP_URL_PATH);
    $canonicalPath = $canonicalPath !== '' ? $canonicalPath : '/';
    if ($canonicalPath !== '/') {
        $canonicalPath = rtrim($canonicalPath, '/');
    }

    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $scheme = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $canonicalUrl = $scheme . '://' . $host . $canonicalPath;
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars((string) ($meta_description ?? 'Estimation immobilière Lannion - Évaluez votre bien gratuitement et découvrez nos guides immobiliers.'), ENT_QUOTES, 'UTF-8') ?>">
  <meta name="theme-color" content="#003f87">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl); ?>">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Estimation Immobilière Lannion' ?></title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- FontAwesome 6.4.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- CSS Principal Premium -->
  <link rel="stylesheet" href="/assets/css/app-premium.css">

  <!-- CSS Header Personnalisé Premium -->
  <style>
    /* ================================================ */
    /* HEADER PREMIUM - DESIGN SYSTEM */
    /* ================================================ */

    .site-header {
      position: sticky;
      top: 0;
      z-index: var(--z-sticky);
      backdrop-filter: blur(12px);
      background: rgba(var(--bg-rgb, 250, 249, 247), 0.95);
      border-bottom: 1px solid var(--border);
      box-shadow: var(--shadow-xs);
      transition: box-shadow var(--trans-fast);
    }

    .site-header:hover {
      box-shadow: var(--shadow-sm);
    }

    .header-container {
      width: min(1120px, calc(100% - var(--space-5)));
      margin-inline: auto;
      padding: var(--space-4) 0;
    }

    .header-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: var(--space-6);
    }

    /* ================================================ */
    /* BRAND / LOGO */
    /* ================================================ */

    .brand {
      display: flex;
      align-items: center;
      gap: var(--space-3);
      text-decoration: none;
      margin: 0;
      font-family: var(--font-primary);
      font-weight: 800;
      font-size: var(--size-lg);
      letter-spacing: var(--letter-tight);
      flex-shrink: 0;
      transition: transform var(--trans-fast);
    }

    .brand:hover {
      transform: translateY(-2px);
    }

    .brand-icon {
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: var(--radius-lg);
      color: white;
      font-size: var(--size-lg);
      font-weight: 700;
      box-shadow: var(--shadow-md);
      transition: all var(--trans-fast);
    }

    .brand:hover .brand-icon {
      transform: scale(1.05);
      box-shadow: var(--shadow-lg);
    }

    .brand span {
      color: var(--primary);
    }

    /* ================================================ */
    /* NAVIGATION PRINCIPALE */
    /* ================================================ */

    .nav-main {
      display: flex;
      align-items: center;
      gap: var(--space-2);
      flex: 1;
      margin: 0 var(--space-4);
    }

    .nav-item {
      position: relative;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: var(--space-2);
      padding: var(--space-3) var(--space-4);
      text-decoration: none;
      color: var(--text-muted);
      font-weight: 500;
      font-size: var(--size-sm);
      border-radius: var(--radius-md);
      transition: all var(--trans-fast);
      white-space: nowrap;
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: var(--space-4);
      right: var(--space-4);
      height: 2px;
      background: var(--accent);
      border-radius: 2px;
      opacity: 0;
      transform: scaleX(0);
      transform-origin: left;
      transition: all var(--trans-fast);
    }

    .nav-link:hover {
      color: var(--primary);
      background: rgba(0, 63, 135, 0.04);
    }

    .nav-link:hover::after {
      opacity: 1;
      transform: scaleX(1);
    }

    .nav-link.active {
      color: var(--primary);
      background: rgba(0, 63, 135, 0.08);
      font-weight: 600;
    }

    .nav-link.active::after {
      opacity: 1;
      transform: scaleX(1);
    }

    .nav-link i {
      font-size: var(--size-sm);
    }

    /* ================================================ */
    /* DROPDOWN MENU */
    /* ================================================ */

    .nav-dropdown {
      position: relative;
    }

    .dropdown-toggle::after {
      content: '';
      display: inline-block;
      width: 4px;
      height: 4px;
      border-right: 1.5px solid currentColor;
      border-bottom: 1.5px solid currentColor;
      transform: rotate(-45deg) translateY(-2px);
      margin-left: var(--space-2);
      transition: transform var(--trans-fast);
    }

    .nav-dropdown:hover .dropdown-toggle::after {
      transform: rotate(-135deg) translateY(2px);
    }

    .dropdown-menu {
      position: absolute;
      top: calc(100% + var(--space-3));
      left: 0;
      background: var(--secondary);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-lg);
      min-width: 240px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-8px);
      transition: all var(--trans-base);
      list-style: none;
      margin: 0;
      padding: var(--space-2);
      z-index: var(--z-dropdown);
      overflow: hidden;
    }

    .nav-dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .dropdown-menu li {
      margin: 0;
    }

    .dropdown-menu li + li {
      border-top: 1px solid var(--border-light);
    }

    .dropdown-menu a {
      display: flex;
      align-items: center;
      gap: var(--space-3);
      padding: var(--space-3) var(--space-4);
      color: var(--text);
      text-decoration: none;
      font-size: var(--size-sm);
      border-radius: var(--radius-md);
      transition: all var(--trans-fast);
      border-left: 3px solid transparent;
    }

    .dropdown-menu a:hover {
      background: var(--bg-alt);
      border-left-color: var(--primary);
      color: var(--primary);
      padding-left: calc(var(--space-4) + 2px);
    }

    .dropdown-menu i {
      width: 18px;
      text-align: center;
      color: var(--primary);
      font-size: var(--size-sm);
    }

    /* ================================================ */
    /* HEADER ACTIONS */
    /* ================================================ */

    .header-actions {
      display: flex;
      align-items: center;
      gap: var(--space-4);
      flex-shrink: 0;
    }

    .search-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .search-input {
      padding: var(--space-2) var(--space-3) var(--space-2) var(--space-8);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      font-family: var(--font-secondary);
      font-size: var(--size-sm);
      background: var(--bg-alt);
      color: var(--text);
      width: 180px;
      transition: all var(--trans-fast);
    }

    .search-input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 63, 135, 0.08);
      background: var(--secondary);
    }

    .search-input::placeholder {
      color: var(--text-light);
    }

    .search-icon {
      position: absolute;
      left: var(--space-3);
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      pointer-events: none;
      font-size: var(--size-sm);
    }

    .btn-cta {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: var(--space-2);
      padding: var(--space-3) var(--space-5);
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
      text-decoration: none;
      border: none;
      border-radius: var(--radius-lg);
      font-family: var(--font-secondary);
      font-weight: 600;
      font-size: var(--size-sm);
      cursor: pointer;
      transition: all var(--trans-base);
      box-shadow: var(--shadow-md);
      white-space: nowrap;
      position: relative;
      overflow: hidden;
    }

    .btn-cta::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      transform: translate(-50%, -50%);
      transition: width var(--trans-base), height var(--trans-base);
    }

    .btn-cta:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
    }

    .btn-cta:active {
      transform: translateY(0);
      box-shadow: var(--shadow-md);
    }

    .btn-cta:active::before {
      width: 300px;
      height: 300px;
    }

    .btn-cta i {
      font-size: var(--size-base);
    }

    /* ================================================ */
    /* RESPONSIVE - TABLET & MOBILE */
    /* ================================================ */

    @media (max-width: 1024px) {
      .nav-main {
        gap: var(--space-1);
        margin: 0 var(--space-3);
      }

      .nav-link {
        padding: var(--space-2) var(--space-3);
        font-size: var(--size-xs);
      }

      .nav-link::after {
        left: var(--space-3);
        right: var(--space-3);
      }

      .search-wrapper {
        display: none;
      }

      .header-wrapper {
        gap: var(--space-4);
      }
    }

    @media (max-width: 768px) {
      .header-container {
        padding: var(--space-3) 0;
      }

      .menu-toggle {
        display: flex;
        flex-direction: column;
        gap: var(--space-1);
        background: none;
        border: none;
        cursor: pointer;
        padding: var(--space-2);
        color: var(--text);
        transition: all var(--trans-fast);
      }

      .menu-toggle:hover {
        color: var(--primary);
      }

      .menu-toggle span {
        width: 24px;
        height: 2px;
        background: currentColor;
        border-radius: 2px;
        transition: all var(--trans-base);
      }

      .menu-toggle.active span:nth-child(1) {
        transform: translateY(9px) rotate(45deg);
      }

      .menu-toggle.active span:nth-child(2) {
        opacity: 0;
      }

      .menu-toggle.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
      }

      .nav-main {
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        background: var(--secondary);
        flex-direction: column;
        gap: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height var(--trans-base);
        border-bottom: 1px solid var(--border);
        margin: 0;
        padding: 0;
        z-index: var(--z-fixed);
      }

      .nav-main.active {
        max-height: calc(100vh - 60px);
        overflow-y: auto;
      }

      .nav-item {
        width: 100%;
      }

      .nav-link {
        padding: var(--space-4);
        border-radius: 0;
        justify-content: space-between;
        border-bottom: 1px solid var(--border-light);
      }

      .nav-link::after {
        display: none;
      }

      .dropdown-menu {
        position: static;
        opacity: 0;
        visibility: hidden;
        max-height: 0;
        overflow: hidden;
        box-shadow: none;
        border: none;
        background: var(--bg-alt);
        transform: none;
        transition: all var(--trans-base);
        padding: 0;
        margin: 0;
      }

      .nav-dropdown.active .dropdown-menu {
        opacity: 1;
        visibility: visible;
        max-height: 500px;
        padding: var(--space-2);
      }

      .dropdown-menu li {
        margin: 0;
      }

      .dropdown-menu li + li {
        border-top: none;
      }

      .dropdown-menu a {
        padding: var(--space-3) var(--space-4) var(--space-3) var(--space-8);
        font-size: var(--size-sm);
      }

      .dropdown-menu a:hover {
        padding-left: var(--space-8);
      }

      .header-actions {
        gap: var(--space-2);
      }

      .btn-cta {
        padding: var(--space-3) var(--space-4);
        font-size: var(--size-xs);
      }

      .brand {
        font-size: var(--size-base);
        gap: var(--space-2);
      }

      .brand-icon {
        width: 40px;
        height: 40px;
        font-size: var(--size-base);
      }
    }

    @media (max-width: 480px) {
      .header-container {
        padding: var(--space-2) 0;
        width: calc(100% - var(--space-4));
      }

      .header-wrapper {
        gap: var(--space-3);
      }

      .brand {
        font-size: var(--size-sm);
        gap: var(--space-2);
      }

      .brand-icon {
        width: 36px;
        height: 36px;
        font-size: var(--size-sm);
      }

      .brand span {
        display: none;
      }

      .nav-main {
        top: 56px;
      }

      .btn-cta {
        padding: var(--space-2) var(--space-3);
        font-size: var(--size-xs);
      }

      .btn-cta span {
        display: none;
      }

      .btn-cta i {
        margin: 0;
      }
    }

    /* ================================================ */
    /* ANIMATIONS & TRANSITIONS */
    /* ================================================ */

    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>

<!-- ================================================ -->
<!-- HEADER PREMIUM -->
<!-- ================================================ -->
<header class="site-header">
  <div class="header-container">
    <div class="header-wrapper">
      
      <!-- LOGO / BRAND -->
      <a href="/" class="brand">
        <div class="brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <span>Estimation Immobilier <span>Lannion</span></span>
      </a>

      <!-- NAVIGATION PRINCIPALE -->
      <nav class="nav-main" aria-label="Navigation principale" id="nav-main">
        
        <!-- Estimation Dropdown -->
        <div class="nav-item nav-dropdown" id="dropdown-estimation">
          <a href="/#form-estimation" class="nav-link dropdown-toggle">
            <i class="fas fa-calculator"></i> Estimation
          </a>
          <ul class="dropdown-menu" aria-label="Sous-menu estimation">
            <li><a href="/#form-estimation"><i class="fas fa-edit"></i> Estimer mon bien</a></li>
            <li><a href="/#example-result"><i class="fas fa-eye"></i> Voir un exemple</a></li>
            <li><a href="/#how-it-works"><i class="fas fa-cog"></i> Comment ça marche</a></li>
            <li><a href="/processus-estimation"><i class="fas fa-list-check"></i> Notre processus</a></li>
          </ul>
        </div>

        <!-- Quartiers Link -->
        <a href="/quartiers" class="nav-link">
          <i class="fas fa-map-marked-alt"></i> Quartiers
        </a>

        <!-- Ressources Dropdown -->
        <div class="nav-item nav-dropdown" id="dropdown-ressources">
          <a href="#" class="nav-link dropdown-toggle">
            <i class="fas fa-book-open"></i> Ressources
          </a>
          <ul class="dropdown-menu" aria-label="Sous-menu ressources">
            <li><a href="/guides"><i class="fas fa-file-pdf"></i> Guides complets</a></li>
            <li><a href="/podcast"><i class="fas fa-podcast"></i> Podcast immobilier</a></li>
            <li><a href="/newsletter"><i class="fas fa-envelope-open-text"></i> Newsletter</a></li>
          </ul>
        </div>

        <!-- À propos Link -->
        <a href="/a-propos" class="nav-link">
          <i class="fas fa-info-circle"></i> À propos
        </a>

        <!-- Contact Link -->
        <a href="/contact" class="nav-link">
          <i class="fas fa-envelope"></i> Contact
        </a>

      </nav>

      <!-- HEADER ACTIONS -->
      <div class="header-actions">
        <a href="/#form-estimation" class="btn-cta">
          <i class="fas fa-bolt"></i>
          <span>Estimer</span>
        </a>

        <!-- Menu Toggle Mobile -->
        <button class="menu-toggle" id="menu-toggle" aria-label="Basculer le menu" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>

    </div>
  </div>
</header>

<!-- Main Content Wrapper -->
<main id="main-content">
