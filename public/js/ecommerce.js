const app = Vue.createApp({
    data() {
        return {
            // for Profile
            isDisabled: true,
            imagePreview: null,
            preloadedImages:[]
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
            // const bio = document.getElementById('bio_input').value;
            // const fullName = document.getElementById('fullname').value;
            // const phoneNumber = document.getElementById('phoneNumber').value;
            // const genderMale = document.getElementById('genderMale').value;
            // const genderFemale = document.getElementById('genderFemale').value;
            // const bday = document.getElementById('bday').value;
            // const profileImg = document.querySelector('#profileImg');

            // if(profileImg){
            //     const prof = true;
            // }else{
            //     const prof = false;
            // }

            // if(bio != "" || fullName != "" || phoneNumber != "" || genderMale != "" || genderFemale != "" || bday != "" || prof == true){
                document.getElementById('formOpenStore').submit();
            //     console.log('here')
            //     console.log(bio)
            //     console.log(fullName)
            //     console.log(phoneNumber)
            //     console.log(genderMale)
            //     console.log(genderFemale)
            //     console.log(bday)
            //     console.log(profileImg)
            // }else{
            //     alert('no profile yet');
            // }
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