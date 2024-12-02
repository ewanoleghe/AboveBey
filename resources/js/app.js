import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import '@fortawesome/fontawesome-free/css/all.min.css'; // Import Font Awesome CSS
import '../css/app.css';

import { ZiggyVue } from '../../vendor/tightenco/ziggy'; 
import Layout from './Layouts/Layout.vue';
import NotFound from './Pages/NotFound.vue'; // Import the NotFound component


// Create Inertia app
createInertiaApp({
    title: (title) => `Above and Beyond Care ${title}`, // Adjusted for clarity
    resolve: name => {
      // Dynamically import pages
      const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
      const page = pages[`./Pages/${name}.vue`] || NotFound; // Fallback to NotFound; // OR  let page = pages[ ./Pages/${name}.vue ];
  
      // Set layout if not defined
      page.default.layout = page.default.layout || Layout;
  
      return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
          .use(plugin)
          .use(ZiggyVue)
          .component('Head', Head)
          .component('Link', Link)
          .mount(el)
  },

  progress: {
    color: 'red',
  includeCSS: true,
  showSpinner: false,
},

})