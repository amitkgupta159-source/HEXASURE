document.addEventListener('DOMContentLoaded', () => {
    // Mobile Navigation Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            const isOpen = navLinks.classList.contains('open');
            mobileToggle.setAttribute('aria-expanded', String(isOpen));
            if (isOpen) {
                mobileToggle.textContent = '✕';
            } else {
                mobileToggle.textContent = '☰';
            }
        });

        navLinks.addEventListener('click', event => {
            if (event.target.closest('a') && navLinks.classList.contains('open')) {
                navLinks.classList.remove('open');
                mobileToggle.setAttribute('aria-expanded', 'false');
                mobileToggle.textContent = '☰';
            }
        });
    }

    // Microcopy Interaction
    const btnGrowth = document.getElementById('btn-growth');
    const btnCases = document.getElementById('btn-cases');
    const growthItems = document.querySelectorAll('#microcopy-growth .microcopy-item');
    const casesItem = document.getElementById('microcopy-cases');

    if (btnGrowth || btnCases) {
        const allItems = [...Array.from(growthItems), casesItem].filter(Boolean);

        function highlight(itemsToHighlight) {
            allItems.forEach(item => {
                if (itemsToHighlight.includes(item)) {
                    item.classList.add('active');
                    item.classList.remove('inactive');
                } else {
                    item.classList.add('inactive');
                    item.classList.remove('active');
                }
            });
        }

        function reset() {
            allItems.forEach(item => {
                item.classList.remove('active');
                item.classList.remove('inactive');
            });
        }

        if (btnGrowth) {
            btnGrowth.addEventListener('mouseenter', () => highlight(Array.from(growthItems)));
            btnGrowth.addEventListener('mouseleave', reset);
        }

        if (btnCases) {
            btnCases.addEventListener('mouseenter', () => highlight([casesItem]));
            btnCases.addEventListener('mouseleave', reset);
        }
    }

    // Testimonials Carousel Logic
    const track = document.querySelector('.carousel-track');
    if (track) {
        const slides = Array.from(track.children);
        const nextButton = document.querySelector('.next-btn');
        const prevButton = document.querySelector('.prev-btn');
        const dotsNav = document.querySelector('.carousel-dots');

        if (slides.length > 0) {
            const slideWidth = slides[0].getBoundingClientRect().width;

            // Arrange slides next to one another
            const setSlidePosition = (slide, index) => {
                slide.style.left = slideWidth * index + 'px';
            };
            // slides.forEach(setSlidePosition); // Not needed with flexbox, but good for absolute positioning fallback if needed. 
            // With flexbox, we just translate the track.

            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.classList.add('carousel-dot');
                if (index === 0) dot.classList.add('current-slide');
                dot.ariaLabel = `Slide ${index + 1}`;
                dotsNav.appendChild(dot);
            });

            const dots = Array.from(dotsNav.children);

            const moveToSlide = (track, currentSlide, targetSlide) => {
                // For flex container, we translate based on index * 100% or width
                // Using style.left from previous logic might be safer if we stick to that, 
                // but let's use index based calculation for responsiveness
                const targetIndex = slides.findIndex(slide => slide === targetSlide);
                track.style.transform = 'translateX(-' + (targetIndex * 100) + '%)';

                currentSlide.classList.remove('current-slide');
                targetSlide.classList.add('current-slide');
            }

            const updateDots = (currentDot, targetDot) => {
                currentDot.classList.remove('current-slide');
                targetDot.classList.add('current-slide');
            }

            // Next Button
            if (nextButton) {
                nextButton.addEventListener('click', e => {
                    const currentSlide = track.querySelector('.current-slide') || slides[0];
                    let nextSlide = currentSlide.nextElementSibling;
                    const currentDot = dotsNav.querySelector('.current-slide') || dots[0];
                    let nextDot = currentDot.nextElementSibling;

                    if (!nextSlide) {
                        nextSlide = slides[0];
                        nextDot = dots[0];
                    }

                    moveToSlide(track, currentSlide, nextSlide);
                    updateDots(currentDot, nextDot);
                });
            }

            // Prev Button
            if (prevButton) {
                prevButton.addEventListener('click', e => {
                    const currentSlide = track.querySelector('.current-slide') || slides[0];
                    let prevSlide = currentSlide.previousElementSibling;
                    const currentDot = dotsNav.querySelector('.current-slide') || dots[0];
                    let prevDot = currentDot.previousElementSibling;

                    if (!prevSlide) {
                        prevSlide = slides[slides.length - 1];
                        prevDot = dots[dots.length - 1];
                    }

                    moveToSlide(track, currentSlide, prevSlide);
                    updateDots(currentDot, prevDot);
                });
            }

            // Dot Nav
            dotsNav.addEventListener('click', e => {
                const targetDot = e.target.closest('button');
                if (!targetDot) return;

                const currentSlide = track.querySelector('.current-slide') || slides[0];
                const currentDot = dotsNav.querySelector('.current-slide') || dots[0];
                const targetIndex = dots.findIndex(dot => dot === targetDot);
                const targetSlide = slides[targetIndex];

                moveToSlide(track, currentSlide, targetSlide);
                updateDots(currentDot, targetDot);
            });

            // Initialize first slide class
            slides[0].classList.add('current-slide');
        }
    }
});
