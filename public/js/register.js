const app = Vue.createApp({
    data() {
        return {
            isShown: true
        }
    },
    methods: {
        change() {
            this.isShown = !this.isShown;
        }
    }
}).mount("#app");

const header1 = Vue.createApp({
    methods: {
        reloadPage() {
            location.reload();
            window.location.href = "#title";
        }
    }
}).mount("#head1");