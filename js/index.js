/* ===================================
   NEXT LEVEL L.M. DISTRIBUTORS JS
   Enhanced with Modern Animations
   ================================= */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize all animation systems
    initPageLoader();
    initScrollAnimations();
    initParallaxEffects();
    initSmoothScrolling();
    initAdvancedScrollTriggers();
    initCounterAnimations();
    initTypewriterEffect();
    initFloatingElements();
    initScrollProgress();
    initMouseFollower();
    initScrollIndicator();
    initEnhancedCarousels();
    initNewsletterForm();
    
    // Initialize AOS (Animate On Scroll) library
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
});

/* ===================================
   PAGE LOADER
   ================================= */

function initPageLoader() {
    // Create page loader
    const loader = document.createElement('div');
    loader.className = 'page-loader';
    loader.innerHTML = '<div class="loader"></div>';
    document.body.appendChild(loader);
    
    // Hide loader when page is fully loaded
    window.addEventListener('load', () => {
        setTimeout(() => {
            loader.classList.add('hidden');
            setTimeout(() => {
                loader.remove();
            }, 500);
        }, 1000);
    });
}

/* ===================================
   ADVANCED SCROLL ANIMATIONS
   ================================= */

function initScrollAnimations() {
    // Enhanced Intersection Observer for scroll animations
    const animatedElements = document.querySelectorAll('.animate__animated, [data-animate], .fade-in');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Add staggered animation delays for multiple elements
                const delay = Array.from(element.parentNode.children).indexOf(element) * 100;
                
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0) scale(1)';
                    element.classList.add('animate__fadeInUp', 'animate__slow', 'visible');
                    
                    // Add custom data animations
                    const animationType = element.dataset.animate;
                    if (animationType) {
                        element.classList.add(`animate__${animationType}`);
                    }
                }, delay);
                
                observer.unobserve(element);
            }
        });
    }, observerOptions);
    
    // Prepare elements for animation
    animatedElements.forEach(element => {
        if (!element.classList.contains('fade-in')) {
            element.style.opacity = '0';
            element.style.transform = 'translateY(50px) scale(0.9)';
            element.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        }
        observer.observe(element);
    });
}

/* ===================================
   PARALLAX EFFECTS
   ================================= */

function initParallaxEffects() {
    const parallaxElements = document.querySelectorAll('.hero-image, .achievements-bg');
    let ticking = false;
    
    function updateParallax() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        parallaxElements.forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
        
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
    
    // Hero content parallax
    const heroContent = document.querySelector('.hero-content');
    if (heroContent) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.3;
            heroContent.style.transform = `translateY(${rate}px)`;
        });
    }
}

/* ===================================
   SMOOTH SCROLLING
   ================================= */

function initSmoothScrolling() {
    // Add smooth scroll behavior to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/* ===================================
   ADVANCED SCROLL TRIGGERS
   ================================= */

function initAdvancedScrollTriggers() {
    // Hero text reveal animation
    const heroText = document.querySelector('.hero-text h1');
    if (heroText) {
        const text = heroText.textContent;
        heroText.innerHTML = text.split('').map((char, index) => 
            `<span style="opacity: 0; transform: translateY(50px); display: inline-block; animation-delay: ${index * 50}ms;">${char === ' ' ? '&nbsp;' : char}</span>`
        ).join('');
        
        const spans = heroText.querySelectorAll('span');
        setTimeout(() => {
            spans.forEach((span, index) => {
                setTimeout(() => {
                    span.style.opacity = '1';
                    span.style.transform = 'translateY(0)';
                    span.style.transition = 'all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                }, index * 50);
            });
        }, 1000);
    }
    
    // Enhanced card hover effects
    const cards = document.querySelectorAll('.card, .staff-card, .product-item, .achievement-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-15px) scale(1.02)';
            card.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.2)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
            card.style.boxShadow = 'var(--box-shadow)';
        });
    });
    
    // Section reveal animations
    const sections = document.querySelectorAll('section');
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('section-visible');
                
                // Animate section children with stagger effect
                const children = entry.target.querySelectorAll('.card, .staff-card, .achievement-card, .testimonial-item, .product-item');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.style.opacity = '1';
                        child.style.transform = 'translateY(0) rotateX(0)';
                    }, index * 150);
                });
            }
        });
    }, { threshold: 0.2 });
    
    sections.forEach(section => {
        sectionObserver.observe(section);
        
        // Prepare children for animation
        const children = section.querySelectorAll('.card, .staff-card, .achievement-card, .testimonial-item, .product-item');
        children.forEach(child => {
            child.style.opacity = '0';
            child.style.transform = 'translateY(50px) rotateX(15deg)';
            child.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        });
    });
}

/* ===================================
   ENHANCED COUNTER ANIMATIONS
   ================================= */

function initCounterAnimations() {
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current-1) + '+';
                    } else {
                        counter.textContent = target + '+';
                    }
                    
                    if (current < target) {
                        requestAnimationFrame(updateCounter);
                    }
                };
                
                // Add pulsing animation effect
                counter.style.transform = 'scale(1.2)';
                counter.style.color = 'var(--secondary-color)';
                setTimeout(() => {
                    counter.style.transform = 'scale(1)';
                    counter.style.transition = 'transform 0.3s ease';
                }, 300);
                
                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => {
        counter.style.transition = 'transform 0.3s ease, color 0.3s ease';
        counterObserver.observe(counter);
    });
}

/* ===================================
   TYPEWRITER EFFECT
   ================================= */

function initTypewriterEffect() {
    const subtitle = document.querySelector('.hero-text p');
    if (subtitle) {
        const text = subtitle.textContent;
        subtitle.textContent = '';
        subtitle.style.borderRight = '2px solid white';
        subtitle.style.animation = 'blink 1s infinite';
        
        let i = 0;
        const typeWriter = () => {
            if (i < text.length) {
                subtitle.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 50);
            } else {
                setTimeout(() => {
                    subtitle.style.borderRight = 'none';
                    subtitle.style.animation = 'none';
                }, 1000);
            }
        };
        
        setTimeout(typeWriter, 2500);
    }
}

/* ===================================
   FLOATING ELEMENTS
   ================================= */

function initFloatingElements() {
    // Create floating particles effect
    createFloatingParticles();
    
    // Add floating animation to scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.style.animation = 'scrollIndicatorFloat 3s ease-in-out infinite';
    }
}

function createFloatingParticles() {
    const hero = document.querySelector('.hero');
    if (!hero) return;
    
    // Create 25 floating particles
    for (let i = 0; i < 25; i++) {
        const particle = document.createElement('div');
        particle.className = 'floating-particle';
        
        const size = Math.random() * 8 + 4;
        const animationDuration = Math.random() * 15 + 10;
        const delay = Math.random() * 5;
        
        particle.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            background: rgba(255, 255, 255, ${Math.random() * 0.6 + 0.2});
            border-radius: 50%;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation: float-particle ${animationDuration}s infinite linear;
            animation-delay: ${delay}s;
            pointer-events: none;
            z-index: 1;
        `;
        
        hero.appendChild(particle);
    }
}

/* ===================================
   SCROLL PROGRESS INDICATOR
   ================================= */

function initScrollProgress() {
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    document.body.appendChild(progressBar);
    
    let ticking = false;
    
    function updateScrollProgress() {
        const scrolled = (window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        progressBar.style.width = Math.min(scrolled, 100) + '%';
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollProgress);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
}

/* ===================================
   MOUSE FOLLOWER EFFECT
   ================================= */

function initMouseFollower() {
    // Only on desktop devices
    if (window.innerWidth <= 768) return;
    
    const follower = document.createElement('div');
    follower.className = 'mouse-follower';
    follower.style.cssText = `
        position: fixed;
        width: 20px;
        height: 20px;
        background: var(--primary-color);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        opacity: 0.7;
        transition: transform 0.1s ease;
        transform: translate(-50%, -50%);
        mix-blend-mode: difference;
    `;
    document.body.appendChild(follower);
    
    let mouseX = 0, mouseY = 0;
    let followerX = 0, followerY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });
    
    function animateFollower() {
        followerX += (mouseX - followerX) * 0.1;
        followerY += (mouseY - followerY) * 0.1;
        
        follower.style.left = followerX + 'px';
        follower.style.top = followerY + 'px';
        
        requestAnimationFrame(animateFollower);
    }
    
    animateFollower();
    
    // Hide follower when mouse leaves window
    document.addEventListener('mouseleave', () => {
        follower.style.opacity = '0';
    });
    
    document.addEventListener('mouseenter', () => {
        follower.style.opacity = '0.7';
    });
}

/* ===================================
   SCROLL INDICATOR FUNCTIONALITY
   ================================= */

function initScrollIndicator() {
    const scrollIndicator = document.querySelector('.scroll-indicator');
    
    if (scrollIndicator) {
        let ticking = false;
        
        function updateScrollIndicator() {
            const scrolled = window.pageYOffset;
            const heroHeight = window.innerHeight;
            
            if (scrolled > heroHeight * 0.1) {
                scrollIndicator.style.opacity = '0';
                scrollIndicator.style.transform = 'translateX(-50%) translateY(20px)';
            } else {
                scrollIndicator.style.opacity = '1';
                scrollIndicator.style.transform = 'translateX(-50%) translateY(0)';
            }
            
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateScrollIndicator);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
        
        // Smooth scroll to next section when clicked
        scrollIndicator.addEventListener('click', () => {
            const nextSection = document.querySelector('.info');
            if (nextSection) {
                const headerOffset = 80;
                const elementPosition = nextSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
}

/* ===================================
   ENHANCED CAROUSELS
   ================================= */

function initEnhancedCarousels() {
    // Wait for jQuery and Slick to be loaded
    if (typeof $ !== 'undefined' && $.fn.slick) {
        // Enhanced Product Carousel
        $('.product-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            dots: true,
            arrows: true,
            centerMode: true,
            centerPadding: '0px',
            pauseOnHover: true,
            pauseOnFocus: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false
                    }
                }
            ]
        });
        
        // Add 3D effect to carousel items
        $('.product-carousel').on('afterChange', function(event, slick, currentSlide){
            $('.product-item').removeClass('center-slide');
            $('.slick-center').addClass('center-slide');
        });
        
        // Enhanced Testimonial Carousel
        $('.testimonial-carousel').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: false,
            fade: false,
            cssEase: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
}

/* ===================================
   NEWSLETTER FORM HANDLING
   ================================= */

function initNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const submitBtn = this.querySelector('.btn-subscribe');
            
            if (email) {
                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
                submitBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Show success message
                    submitBtn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                    submitBtn.style.background = '#27ae60';
                    
                    // Reset form after 2 seconds
                    setTimeout(() => {
                        this.reset();
                        submitBtn.innerHTML = 'Subscribe <i class="fas fa-paper-plane"></i>';
                        submitBtn.style.background = 'var(--secondary-color)';
                        submitBtn.disabled = false;
                    }, 2000);
                }, 1500);
            }
        });
    }
}

/* ===================================
   UTILITY FUNCTIONS
   ================================= */

// Throttle function for performance optimization
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Debounce function for performance optimization
function debounce(func, wait, immediate) {
    let timeout;
    return function() {
        const context = this, args = arguments;
        const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

/* ===================================
   PERFORMANCE OPTIMIZATIONS
   ================================= */

// Optimize scroll events
let scrollTimeout;
window.addEventListener('scroll', () => {
    if (scrollTimeout) {
        cancelAnimationFrame(scrollTimeout);
    }
    
    scrollTimeout = requestAnimationFrame(() => {
        // Scroll-dependent animations go here
        updateParallaxElements();
    });
});

function updateParallaxElements() {
    // Update parallax elements efficiently
    const scrolled = window.pageYOffset;
    
    // Update hero parallax
    const heroImage = document.querySelector('.hero-image');
    if (heroImage && scrolled < window.innerHeight) {
        heroImage.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
}

/* ===================================
   ACCESSIBILITY ENHANCEMENTS
   ================================= */

// Respect user's motion preferences
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    // Disable animations for users who prefer reduced motion
    document.documentElement.style.setProperty('--transition', 'none');
    
    // Remove floating particles
    const particles = document.querySelectorAll('.floating-particle');
    particles.forEach(particle => particle.remove());
}

// Keyboard navigation support
document.addEventListener('keydown', (e) => {
    if (e.key === 'Tab') {
        document.body.classList.add('keyboard-navigation');
    }
});

document.addEventListener('mousedown', () => {
    document.body.classList.remove('keyboard-navigation');
});

/* ===================================
   ERROR HANDLING
   ================================= */

window.addEventListener('error', (e) => {
    console.warn('JavaScript error caught:', e.error);
    // Graceful degradation - ensure basic functionality works
});

// Console welcome message
console.log('%c Welcome to L.M. Distributors! 🥥', 'color: #2c5530; font-size: 15px; font-weight: bold;');
console.log('%cBuilt with ❤️ using modern web technologies', 'color: #f39c12; font-size: 14px;');