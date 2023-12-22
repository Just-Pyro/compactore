const app = Vue.createApp({
    data(){
        return {
            bookMarkPost: 0,
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
        submitPost(){
            document.getElementById('addPostForm').submit();
        },
        submitOffer(){
            console.log('here')
            var item = document.getElementById('forTitle');
            var des = document.getElementById('description');
            var img = document.getElementById('postImg');
            if(item.value != "" && des.value != "" && img.value != ""){
                document.getElementById('addOfferForm').submit();
            }else{
                alert('please fill in the input details');
            }
        },
        bookMark(id){
            this.bookMarkPost = id;
            console.log(id);
            console.log(this.bookMarkPost);
            setTimeout(() => document.getElementById('saveBookMarkForm').submit(), 10);
        },
        unbookMark(id){
            this.bookMarkPost = id;
            console.log(id);
            console.log(this.bookMarkPost);
            setTimeout(() => document.getElementById('unBookMarkForm').submit(), 10);
        },
        addOffer(id){
            window.location.href = `/add-offer/${id}`;
        },
        removeBookmark(id){
            this.bookMarkPost = id;
            console.log(id);
            console.log(this.bookMarkPost);
            setTimeout(() => document.getElementById('removeBookmark').submit(), 10);
        }
    }
}).mount("body");