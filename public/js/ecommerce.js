const app = Vue.createApp({
    data() {
        return {
            // for Profile
            isDisabled: true,
            imagePreview: null,
            preloadedImages:[],
            selectedPaymentMethod: 'CoD',
            paymentMethods: [
                { value: 'CoD', label: 'Cash on Delivery' },
                { value: 'Gcash', label: 'GCash' },
                // Add more payment methods as needed
            ],
            //for Add to Cart
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
            const text = 'input';
            const text2 = 'shop'
            const shop = document.getElementsByClassName(text2.concat("-",id));//shop check input 
            const input = document.getElementsByClassName(text.concat("-",id));//product check input

            console.log(text.concat(id));

            for(var i = 0; i < input.length; i++){
                if(input[i].checked == true){
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
                }
            }

            if(counter > 0){
                // window.location.href='checkOut';
                var product = document.getElementsByClassName('forProduct');
                var classIds = [];
                for(var i = 0; i < product.length; i++){
                    console.log(product[i].checked);
                    if(product[i].checked == true){
                        // console.log(product[i].classList);
                        var classList = product[i].classList;

                        for(var j = 0; j < classList.length; j++){
                            console.log(classList[j]);
                            if(classList[j].includes('addtoCart-')){
                                classIds.push(classList[j]);
                            }
                        }
                    }
                }

                window.location.href = '/checkOut/' + classIds;
            }else{
                var modalInstance = new bootstrap.Modal(document.getElementById('selectProductModal'));
                modalInstance.show();
            }
        },
        // placeOrder(){
        //     var total = document.getElementById('totalPrice').innerText;

        //     console.log(this.paymentMethod);
        //     console.log(total);
        //     axios.post(window.checkoutPlaceOrderUrl, {
        //         paymentMethod: this.paymentMethod,
        //         totalPrice: total,
        //     })
        //     .then(response => {
        //         // Handle success response
        //         console.log(response.data);
        //     })
        //     .catch(error => {
        //         // Handle error response
        //         console.error(error);
        //     });
        // },
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
        submitDeliveryAddress(){
            document.getElementById('addAddress').submit();
        },
        editDeliveryAddress(){
            console.log('im here');
            var province = document.getElementById('province');
            var city = document.getElementById('city');

            console.log(province.value);
            console.log(city.value);

            // Check if the selected option is not the default one
            if (province.value !== "" && city.value !== "") {
                // If not empty, submit the form
                try{
                    document.getElementById('editAddressForm').submit();
    
                }catch(error){
                    console.error('An error occurred:', error);
    
                }
            } else {
                // If empty, show an alert or perform other actions
                alert('Please select province and city before submitting.');
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
        },

        editAddress(addressId) {
            window.location.href = `/get-data/${addressId}`;
        },

        deleteAddress(addressId) {
            window.location.href = `/delete-data/${addressId}`;
        }
    },
    computed: {
        selectedPaymentMethodLabel() {
          const selectedMethod = this.paymentMethods.find((method) => method.value === this.selectedPaymentMethod);
          return selectedMethod ? selectedMethod.label : '';
        },
    },
    mounted(){
        var $ = new City();
        var add = new City();
        add.showProvinces("#provinceAdd");
        add.showCities("#cityAdd");
        $.showProvinces("#province");
        $.showCities("#city");

        // const editAddressModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
        // this.$data.editAddressModal = editAddressModal;
    }
}).mount("body");