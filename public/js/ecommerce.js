const app = Vue.createApp({
    data() {
        return {
            // for Profile
            isDisabled: true
        }
    },
    methods: {
        //for the main header of ecommerce
        switchHover() {
            const swtch = document.getElementById('switch');
            swtch.style.transform = "rotate(180deg)";

            const element = document.getElementsByClassName('hiddenIcons');
            for(let i = 0; i < element.length; i++){
                element[i].style.transform = "translateX(40%)";
                element[i].style.zIndex = "1";
                element[i].style.opacity = "1";
            }
        },
        switchUnHover() {
            const swtch = document.getElementById('switch');
            swtch.style.transform = "rotate(0)";

            const element = document.getElementsByClassName('hiddenIcons');
            
            for(let i = 0; i < element.length; i++){
                element[i].style.transform = "translateX(0)";
                element[i].style.opacity = "0";
                element[i].style.zIndex = "-1";
            }
        },
        //searchResult
        seeProduct(){
            window.location.href = "/productPage";
        },
        //checkOut
        showCheckOut(){
            window.location.href='checkOut';
        },
        // profile
        enableEdit() {
            var check = document.getElementById('saveBio');
            var xmark = document.getElementById('cancelBio');

            this.isDisabled = !this.isDisabled;
            this.$nextTick(() => {
                if (!this.isDisabled) {
                    this.$refs.bioTextarea.focus();
                    check.style.display = 'inline-block';
                    xmark.style.display = 'inline-block';
                }else{
                    check.style.display = 'none';
                    xmark.style.display = 'none';
                }
            });
        },
        submitBio() {
            document.getElementById('formBio').submit();
        }
    }
}).mount("body");