import logoScrollWatcher from './home/logo';

export default {
    init() {
        // Javascript that fires on home.
        
    },
    
    finalize() {
        // Javascript that fires on home. after page specific JS is fires.
        logoScrollWatcher();
    }
}