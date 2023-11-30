const app = Vue.createApp({
    methods:{
        logout(){
            document.getElementById('logout-form').submit();
        }
    }
}).mount('body');