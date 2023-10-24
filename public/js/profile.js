const app = Vue.createApp({
    data() {
        return {
            initialContent: "write something ...",
            editMode: false
        }
    },
    methods: {
        enableEdit() {
            this.editMode = true;
        }
    }
}).mount("#forProfile");