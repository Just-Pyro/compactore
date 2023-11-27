const app = Vue.createApp({
    data(){
        return {
            cards: [
                {id: 1, isOn: false, categoryName: "Property", totalListings: "100,000+"},
                {id: 2, isOn: false, categoryName: "Autos", totalListings: "10,000+"},
                {id: 3, isOn: false, categoryName: "Mobile Phones & Gadgets", totalListings: "100,000+"},
                {id: 4, isOn: false, categoryName: "Fashion", totalListings: "100,000+"}
            ],
            houses: [
                {id: 1, isOn: false, price: "P5,000,002", detailName: "house # 1"},
                {id: 2, isOn: false, price: "P4,030,102", detailName: "house # 2"},
                {id: 3, isOn: false, price: "P6,503,702", detailName: "house # 3"},
                {id: 4, isOn: false, price: "P3,150,432", detailName: "house # 4"}
            ],
            cars: [
                {id: 1, isOn: false, price: "P334,900", detailName: "car # 1"},
                {id: 2, isOn: false, price: "P400,121", detailName: "car # 2"},
                {id: 3, isOn: false, price: "P540,098", detailName: "car # 3"},
                {id: 4, isOn: false, price: "P890,299", detailName: "car # 4"}
            ],
            gadgets: [
                {id: 1, isOn: false, price: "P5,900", detailName: "mobile phone # 1"},
                {id: 2, isOn: false, price: "P2,000", detailName: "bluetooth Controller"},
                {id: 3, isOn: false, price: "P1,100", detailName: "PSP 3000"},
                {id: 4, isOn: false, price: "P10,200", detailName: "new nintendo 2ds xl"}
            ],
            clothings: [
                {id: 1, isOn: false, price: "60", detailName: "Hoodie supreme"},
                {id: 2, isOn: false, price: "100", detailName: "sleeveless hoodie - white"},
                {id: 3, isOn: false, price: "120", detailName: "Polo shirt emerald green size L"},
                {id: 4, isOn: false, price: "200", detailName: "turquoise blue"}
            ]
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
        // toggleShadow(card){
        //     console.log(card)
        //     card.isOn = !card.isOn;
        // },
        seeProduct(id){
            window.location.href = "surplusProductPage/"+id;
        },
        seeCategory(){
            console.log("thisis category");
            window.location.href = "searchResult";
        },
        submitPost(){
            document.getElementById('postSurplusForm').submit();
        }
    }
}).mount("body");