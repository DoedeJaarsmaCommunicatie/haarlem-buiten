const navHandler = () => {
    const hovers = document.querySelectorAll('[data-action="nav-handler"]');

    if (hovers.length === 0) {
        return;
    }

    for (let el of hovers) {
        _navHandler(el);
    }
};

const _navHandler = (element) => {
    const { target, event } = element.dataset;
    const acceptedEvents = [
        'mouseover',
        'click'
    ];

    if (event.length === 0 || !event) {
        throw Error('No event supplied');
    }

    if (acceptedEvents.indexOf(event) === -1) {
        throw Error(`Incorrect event used, supported events: ${acceptedEvents.join(', ')}`);
    }

    if (target.length === 0 || !target) {
        throw Error('No target supplied');
    }

    _addEvents({element, event, target});
}

const _addEvents = ({element, event, target}) => {
    const el = document.querySelector(target);
    const elClasses = ['active'];
    const bodyClasses = [
        'hovering',
        `hover-${target.split('.').join('').split('#').join().split('-').join('_')}`,
        `hover-${element.id.split('.').join('').split('#').join().split('-').join('_')}`
    ];

    element.addEventListener(event, function () {
        if (el.length === 0) {
            return;
        }

        for (let c of elClasses) {
            el.classList.toggle(c);
        }

        for (let c of bodyClasses) {
            document.body.classList.toggle(c);
        }
    });

    if (event === 'mouseover') {
        element.addEventListener('mouseout', function () {
            if (el.length === 0) {
                return;
            }

            el.classList.remove(...elClasses);

            document.body.classList.remove(
                ...bodyClasses
            );
        });
    }
}


export { navHandler };