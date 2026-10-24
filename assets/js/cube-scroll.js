document.addEventListener('DOMContentLoaded', () => {
    const cubes = Array.from(document.querySelectorAll('[data-scroll-cube]'));
    const scene = document.querySelector('[data-cube-scene]');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    if (!cubes.length || !scene || reducedMotion.matches) {
        return;
    }

    let frameRequested = false;

    const updateCubes = () => {
        const bounds = scene.getBoundingClientRect();
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
        const progress = Math.min(1, Math.max(0, (viewportHeight - bounds.top) / (viewportHeight + bounds.height)));
        const turn = progress * 105;

        cubes.forEach((cube, index) => {
            const offset = index === 0 ? 0 : 1;
            cube.style.transform = `rotateX(${-26 + turn * 0.34 + offset * 5}deg) rotateY(${-38 + turn + offset * 8}deg) rotateZ(${-4 + progress * 8}deg)`;
        });

        frameRequested = false;
    };

    const scheduleUpdate = () => {
        if (!frameRequested) {
            frameRequested = true;
            window.requestAnimationFrame(updateCubes);
        }
    };

    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);
    updateCubes();
});
