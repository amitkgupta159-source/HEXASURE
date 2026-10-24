document.addEventListener('DOMContentLoaded', () => {
    const modalOverlay = document.getElementById('serviceModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalBody = document.getElementById('modalBody');
    const closeBtn = document.querySelector('.modal-close');
    const viewButtons = document.querySelectorAll('.btn-view-details');

    // Function to open modal
    function openModal(title, contentUrl) {
        modalTitle.textContent = title;
        modalBody.innerHTML = '<div class="text-center"><div class="loader-spinner"></div><p>Loading details...</p></div>';
        modalOverlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling

        // Fetch content via AJAX
        fetch(contentUrl)
            .then(response => response.text())
            .then(html => {
                // Extract the main content from the fetched page
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                // Get the main content (everything between header and footer)
                const mainContent = doc.querySelector('main')?.innerHTML;

                if (mainContent) {
                    // Create a temp div to manipulate the HTML
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = mainContent;

                    // Remove 'reveal' class from all elements to ensure visibility
                    // The reveal class usually sets opacity: 0 waiting for scroll
                    const revealedElements = tempDiv.querySelectorAll('.reveal');
                    revealedElements.forEach(el => {
                        el.classList.remove('reveal');
                        // Reset styles that might be set by CSS for reveal
                        el.style.opacity = '1';
                        el.style.transform = 'none';
                        el.style.visibility = 'visible';
                    });

                    // Also remove any delay classes as they might interfere
                    const delayedElements = tempDiv.querySelectorAll('[class*="delay-"]');
                    delayedElements.forEach(el => {
                        el.className = el.className.replace(/delay-\d+/g, '');
                    });

                    modalBody.innerHTML = tempDiv.innerHTML;
                } else {
                    modalBody.innerHTML = '<p>Details not available.</p>';
                }
            })
            .catch(err => {
                console.error('Error loading details:', err);
                modalBody.innerHTML = '<p class="text-danger">Failed to load details. Please try again later.</p>';
            });
    }

    // Function to close modal
    function closeModal() {
        if (modalOverlay) {
            modalOverlay.classList.remove('active');
        }
        document.body.style.overflow = '';
    }

    // Event Listeners
    viewButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent flip if inside flip container (though button is on back)
            const title = btn.getAttribute('data-title');
            const url = btn.getAttribute('data-url');
            openModal(title, url);
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    // Close on click outside
    if (modalOverlay) {
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
                closeModal();
            }
        });
    }
});
