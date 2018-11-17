import router from "./router";

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// axios
const axios = require('axios');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

// apply interceptor on response
axios.interceptors.response.use(
    response => response,
    error => {
        const { status } = error.response

        if (status === 401) {
            window.location.href = window.base
        }

        if (status === 403) {
            router.push({ name: '403' })
        }

        if (status === 404) {
            router.push({ name: '404' })
        }

        return Promise.reject(error)
    }
);

window.axios = axios

// This enables all language support via CDN
require('./vendor/prism.js');
Prism.plugins.autoloader.use_minified = true;
Prism.plugins.autoloader.languages_path = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/';

// smooth scroll functionality
require('smoothscroll-for-websites');
