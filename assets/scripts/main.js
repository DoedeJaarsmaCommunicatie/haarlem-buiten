import '@fortawesome/fontawesome-free/js/all';
import jQuery from 'jquery';

import Router from './tools/Router';
import common from './routes/common';
import home from './routes/home';

const routes = new Router({
    common,
    home
});

window.routes = routes;

jQuery(document).ready(() => routes.loadEvents());
