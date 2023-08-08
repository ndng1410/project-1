import Vue from 'vue'
import App from './App.vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale_en from 'element-ui/lib/locale/lang/en';
import store from './assets/store/store';
import i18n from './assets/locales/i18n';
import router from './routes';
import './assets/style/global.css';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../node_modules/bootstrap/dist/js/bootstrap.min.js';

let locale = locale_en;

Vue.use(ElementUI, {locale});

Vue.config.productionTip = false

export const EventBus = new Vue();

new Vue({
  router,
  store, 
  i18n,
  render: h => h(App),
}).$mount('#app')