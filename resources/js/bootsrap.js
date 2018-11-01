try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

require('./vendor/prism.js');
// This enables all language support via CDN
Prism.plugins.autoloader.use_minified = true;
Prism.plugins.autoloader.languages_path = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/';

require('smoothscroll-for-websites');
