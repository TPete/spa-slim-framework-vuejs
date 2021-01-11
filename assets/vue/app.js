import Vue from "vue"
import router from "./router"
import App from "./App";

new Vue({
    components: { App },
    render: h => h(App),
    router
}).$mount("#app")
