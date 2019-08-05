import { TweenMax } from 'gsap/all';

const options = {
    rootMargin: '-200px 0px 0px 0px',
    threshold: 0.5
};

const logoHandler = () => {
    TweenMax.to(
        '.logo-wrapper.floater',
         0.5, 
         {
            top: 0,
            left: 0,
            x: 0,
            y: 0,
            position: 'relative',
            onComplete: () => {
                document.querySelector('.logo-wrapper').classList.remove('floater');
            },
            onStart: () => {
                document.querySelector('header').classList.add('floater');
            }
        }
    );
}

window['logoHandler'] = logoHandler;

const logoScrollWatcher = () => {
    if('IntersectionObserver' in window) {
        logoWatchFunction();
    }
}

const logoWatchFunction = () => {
    let observer = new IntersectionObserver((entries, observer) => {
        for (let i = 0; i < entries.length; i++) {
            if (entries[i].intersectionRatio <= 0.75) {
                logoHandler();
                observer.unobserve(document.querySelector('.logo-wrapper'));
            }
        }
    }, options); 

    observer.observe(document.querySelector('.logo-wrapper'));
}

export { logoHandler };
export default logoScrollWatcher;