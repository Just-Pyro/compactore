const app = Vue.createApp({
    data(){
        return {
            location: "",
            placeholder: "Choose Location",
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
        seeProduct(id){
            window.location.href = "surplusProductPage/"+id;
        },
        seeCategory(){
            console.log("thisis category");
            window.location.href = "searchResult";
        },
        submitPost(){
            document.getElementById('postSurplusForm').submit();
        },
        chooseLocation(place){
            // console.log('im here')
            // console.log(place)
            switch(place){
                case 'All':
                    this.location = '';
                    this.placeholder = 'All Philippines';
                    break;
                case 'Manila':
                    this.location = 'Manila';
                    this.placeholder = 'Manila City';
                    break;
                case 'Quezon':
                    this.location = 'Quezon';
                    this.placeholder = 'Quezon City';
                    break;
                case 'Makati':
                    this.location = 'Makati';
                    this.placeholder = 'Makati City';
                    break;
                case 'Pasig':
                    this.location = 'Pasig';
                    this.placeholder = 'Pasig City';
                    break;
                case 'Mandaluyong':
                    this.location = 'Mandaluyong';
                    this.placeholder = 'Mandaluyong City';
                    break;
                case 'Cebu':
                    this.location = 'Cebu';
                    this.placeholder = 'Cebu City';
                    break;
                case 'Paranaque':
                    this.location = 'Paranaque';
                    this.placeholder = 'Paranaque City';
                    break;
                case 'Taguig':
                    this.location = 'Taguig';
                    this.placeholder = 'Taguig City';
                    break;
                case 'Las_Pinas':
                    this.location = 'Las Pinas';
                    this.placeholder = 'Las Pinas City';
                    break;
                case 'Cavite':
                    this.location = 'Cavite';
                    this.placeholder = 'Cavite City';
                    break;
            }
        },
        submitForm(){
            document.querySelector('#surplusSearchForm').submit();
        }
    }
}).mount("body");