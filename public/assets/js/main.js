/**
 * =====================================================
 * MAIN.JS - Premium Animations & Interactions
 * =====================================================
 * - Menu mobile toggle
 * - Dropdown menus
 * - Scroll animations
 * - Newsletter forms
 * - Intersection Observer for lazy animations
 */

document.addEventListener('DOMContentLoaded', function() {

  // =====================================================
  // 1. MOBILE MENU TOGGLE
  // =====================================================
  const menuToggle = document.getElementById('menu-toggle');
  const navMain = document.getElementById('nav-main');
  
  if (menuToggle && navMain) {
    menuToggle.addEventListener('click', function() {
      navMain.classList.toggle('active');
      menuToggle.classList.toggle('active');
      this.setAttribute('aria-expanded', 
        this.getAttribute('aria-expanded') === 'false' ? 'true' : 'false'
      );
    });

    // Close menu when clicking a link
    const navLinks = navMain.querySelectorAll('.nav-link:not(.dropdown-toggle)');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navMain.classList.remove('active');
        menuToggle.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // =====================================================
  // 2. DROPDOWN MENUS (Mobile)
  // =====================================================
  const dropdowns = document.querySelectorAll('.nav-dropdown');
  dropdowns.forEach(dropdown => {
    const toggle = dropdown.querySelector('.dropdown-toggle');
    if (toggle && window.innerWidth <= 768) {
      toggle.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          dropdown.classList.toggle('active');
          
          // Close other dropdowns
          dropdowns.forEach(other => {
            if (other !== dropdown) {
              other.classList.remove('active');
            }
          });
        }
      });
    }
  });

  // =====================================================
  // 3. HEADER SCROLL EFFECT
  // =====================================================
  const header = document.querySelector('.site-header');
  let lastScrollTop = 0;

  if (header) {
    window.addEventListener('scroll', function() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      
      // Add shadow on scroll
      if (scrollTop > 10) {
        header.style.boxShadow = 'var(--shadow-md)';
      } else {
        header.style.boxShadow = 'var(--shadow-xs)';
      }
      
      lastScrollTop = scrollTop;
    });
  }

  // =====================================================
  // 4. BACK TO TOP SMOOTH SCROLL
  // =====================================================
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

  // =====================================================
  // 5. NEWSLETTER FORM HANDLING
  // =====================================================
  const newsletterForms = document.querySelectorAll('.newsletter-form');
  
  newsletterForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const emailInput = this.querySelector('.newsletter-input');
      const btn = this.querySelector('.newsletter-btn');
      const email = emailInput.value.trim();
      
      // Validation
      if (!email || !email.includes('@')) {
        emailInput.style.borderColor = 'var(--error)';
        setTimeout(() => {
          emailInput.style.borderColor = '';
        }, 2000);
        return;
      }
      
      // Disable button
      btn.disabled = true;
      const originalHTML = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
      
      // API call
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
          emailInput.value = '';
          btn.innerHTML = '<i class="fas fa-check"></i>';
          btn.style.background = 'var(--success)';
          
          setTimeout(() => {
            btn.disabled = false;
            btn.innerHTML = originalHTML;
            btn.style.background = '';
          }, 3000);
        } else {
          throw new Error('Newsletter signup failed');
        }
      })
      .catch(error => {
        console.error('Newsletter error:', error);
        btn.disabled = false;
        btn.innerHTML = originalHTML;
        emailInput.style.borderColor = 'var(--error)';
        setTimeout(() => {
          emailInput.style.borderColor = '';
        }, 2000);
      });
    });
  });

  // =====================================================
  // 6. INTERSECTION OBSERVER - SCROLL ANIMATIONS
  // =====================================================
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-in');
        
        // Optionally stop observing after animation
        // observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe elements for animation
  const animateElements = document.querySelectorAll(
    '.card, .stat-box, .feature-card, .faq-card, .team-card, .value-card, .about-card'
  );
  
  animateElements.forEach(el => {
    observer.observe(el);
  });

  // =====================================================
  // 7. FORM VALIDATION & FOCUS EFFECTS
  // =====================================================
  const inputs = document.querySelectorAll('input, textarea, select');
  
  inputs.forEach(input => {
    input.addEventListener('focus', function() {
      this.parentElement.classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
      this.parentElement.classList.remove('focused');
    });
    
    // Real-time validation
    if (input.type === 'email') {
      input.addEventListener('blur', function() {
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
        if (this.value && !isValid) {
          this.classList.add('invalid');
        } else {
          this.classList.remove('invalid');
        }
      });
    }
  });

  // =====================================================
  // 8. SMOOTH SCROLL FOR ANCHOR LINKS
  // =====================================================
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  
  anchorLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      if (href === '#' || href === '#top') return;
      
      const targetElement = document.querySelector(href);
      
      if (targetElement) {
        e.preventDefault();
        
        const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
        const targetPosition = targetElement.offsetTop - headerHeight - 20;
        
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  // =====================================================
  // 9. ACTIVE NAV LINK ON SCROLL
  // =====================================================
  function updateActiveNavLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('[id]');
    
    let current = '';
    
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 100;
      if (window.pageYOffset >= sectionTop) {
        current = section.getAttribute('id');
      }
    });
    
    navLinks.forEach(link => {
      link.classList.remove('active');
      const href = link.getAttribute('href');
      if (href === `#${current}`) {
        link.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', updateActiveNavLink);

  // =====================================================
  // 10. CONTACT FORM HANDLING
  // =====================================================
  const contactForm = document.querySelector('form[action*="contact"]');
  
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerText;
      
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
      
      fetch('/api/contact', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          this.reset();
          submitBtn.innerHTML = '<i class="fas fa-check"></i> Envoyé!';
          submitBtn.style.background = 'var(--success)';
          
          setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerText = originalText;
            submitBtn.style.background = '';
          }, 3000);
        } else {
          throw new Error('Submission failed');
        }
      })
      .catch(error => {
        console.error('Form error:', error);
        submitBtn.disabled = false;
        submitBtn.innerText = originalText;
        submitBtn.style.color = 'var(--error)';
        
        setTimeout(() => {
          submitBtn.style.color = '';
        }, 2000);
      });
    });
  }

  // =====================================================
  // 11. LAZY LOAD IMAGES
  // =====================================================
  if ('IntersectionObserver' in window) {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.add('loaded');
          observer.unobserve(img);
        }
      });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
  }

  // =====================================================
  // 12. COUNTER ANIMATIONS (For stats)
  // =====================================================
  function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        element.textContent = target.toLocaleString();
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current).toLocaleString();
      }
    }, 16);
  }

  // Trigger counter animation when stat box enters viewport
  const statNumbers = document.querySelectorAll('.stat-number');
  const statObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const number = entry.target;
        const target = parseInt(number.textContent.replace(/[^\d]/g, ''));
        
        if (!number.classList.contains('animated')) {
          animateCounter(number, target);
          number.classList.add('animated');
        }
        
        statObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  statNumbers.forEach(stat => statObserver.observe(stat));

  // =====================================================
  // 13. KEYBOARD ACCESSIBILITY
  // =====================================================
  // Close mobile menu on Escape
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && navMain && navMain.classList.contains('active')) {
      navMain.classList.remove('active');
      menuToggle.classList.remove('active');
      menuToggle.setAttribute('aria-expanded', 'false');
    }
  });

  // =====================================================
  // 14. PREFETCH LINKS FOR PERFORMANCE
  // =====================================================
  const links = document.querySelectorAll('a[href^="/"]');
  links.forEach(link => {
    link.addEventListener('mouseenter', function() {
      const href = this.getAttribute('href');
      const link = document.createElement('link');
      link.rel = 'prefetch';
      link.href = href;
      document.head.appendChild(link);
    });
  });

});

// =====================================================
// 15. RESIZE HANDLER - Close mobile menu on resize
// =====================================================
window.addEventListener('resize', function() {
  if (window.innerWidth > 768) {
    const navMain = document.getElementById('nav-main');
    const menuToggle = document.getElementById('menu-toggle');
    
    if (navMain) {
      navMain.classList.remove('active');
    }
    if (menuToggle) {
      menuToggle.classList.remove('active');
      menuToggle.setAttribute('aria-expanded', 'false');
    }
  }
});

// =====================================================
// 16. PREFERS REDUCED MOTION
// =====================================================
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (prefersReducedMotion) {
  document.documentElement.style.scrollBehavior = 'auto';
  const style = document.createElement('style');
  style.textContent = `
    * {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
    }
  `;
  document.head.appendChild(style);
}
