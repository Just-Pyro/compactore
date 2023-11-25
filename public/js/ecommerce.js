const app = Vue.createApp({
    data() {
        return {
            // for Profile
            isDisabled: true,
            imagePreview: null,
            preloadedImages:[],
            //for Add to Cart
            // quantity: 1,
            // productId: '{{ $product->id }}'
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
        seeProduct(id){
            window.location.href = "/productPage/"+id;
        },
        // for userCart
        check(id){
            const text = 'product';
            const text2 = 'shop'
            const shop = document.getElementsByClassName(text2.concat("-",id));
            const product = document.getElementsByClassName(text.concat("-",id));

            console.log(text.concat(id));

            for(var i = 0; i < product.length; i++){
                if(shop[i].checked == true){
                    product[i].checked = true;
                }else{
                    product[i].checked = false;
                }
            }
        },
        checkProduct(id){
            const text = 'product';
            const text2 = 'shop'
            const shop = document.getElementsByClassName(text2.concat("-",id));
            const product = document.getElementsByClassName(text.concat("-",id));

            console.log(text.concat(id));

            for(var i = 0; i < product.length; i++){
                if(product[i].checked == true){
                    shop[i].checked = true;
                }else{
                    shop[i].checked = false;
                }
            }
        },
        checkAll(){
            const allProduct = document.getElementById('allProduct');
            const all = document.getElementsByClassName('all');

            for(var i = 0; i < all.length; i++){
                if(allProduct.checked == true){
                    all[i].checked = true;
                }
                else{
                    all[i].checked = false;
                }
            }
        },
        //checkOut
        showCheckOut(){
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var counter = 0;
            for(var i = 0; i < checkboxes.length; i++){
                if(checkboxes[i].checked == true){
                    counter = i;
                    // console.log(checkboxes[i]);
                }
            }

            // console.log(counter);

            if(counter > 0){
                window.location.href='checkOut';
            }else{
                // alert("select a product");
                
                var modalInstance = new bootstrap.Modal(document.getElementById('selectProductModal'));
                modalInstance.show();
            }
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
        cancelBio(){
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
        },
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        },
        openStore(){
            document.getElementById('formOpenStore').submit();
        },
        //for seller
        toggleClass(event) {
            const el = event.target;

            if (el.classList.contains('link-dark')) {
                el.classList.toggle('active');
                el.classList.toggle('link-dark');
            }else{
                el.classList.toggle('link-dark');
                el.classList.toggle('active');
            }
        },
        loadImages(event) {
            const files = event.target.files;
      
            if (files.length > 0) {
              for (let i = 0; i < files.length; i++) {
                const image = new Image();
                image.src = URL.createObjectURL(files[i]);

                this.preloadedImages.push(image);
      
              }
            }
        }
    }
}).mount("body");