const app = Vue.createApp({
    data() {
        return {
            isShown: true,
            conEmail: false,
            conPassword: false,
            mbe: true,
            mbp: true,
            okEmail: false,
            okPass: false
        }
    },
    methods: {
        change() {
            this.isShown = !this.isShown;
        }
    },
    mounted(){
        var logEmailEl = document.getElementById('errorLoginEmail');
        var logPassEl = document.getElementById('errorLoginPassword');

        if(logEmailEl !== null){
            this.mbe = false;
        }

        if(logPassEl !== null){
            this.mbp = false;
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