export default function () {
    const logo = document.querySelector('.logo-wrapper');
    const height = window.innerHeight;
    const inc = Number(35/height);

    if (!logo) {
        throw new Error('Logo wrapper not found');
    }

    logo.style.opacity = 0;

    window.addEventListener('scroll', () => {
        logo.style.opacity = Number(logo.style.opacity) + inc;
    });
}
