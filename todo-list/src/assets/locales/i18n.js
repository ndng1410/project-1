import Vue from "vue";
import VueI18n from "vue-i18n";
import en from "./en.json";
import vn from "./vn.json";

Vue.use(VueI18n);

const messages = {
    en,
    vn
}

const i18n = new VueI18n({
    locale: 'en',
    messages
})

export default i18n;
