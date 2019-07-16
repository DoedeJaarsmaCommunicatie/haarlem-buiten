import { navHandler } from './common/navigation';

export default {
    init() {
        // Javascript that fires on all pages.
        navHandler();
    },
    
    finalize() {
        // Javascript that fires on all pages. after page specific JS is fires.
    }
}