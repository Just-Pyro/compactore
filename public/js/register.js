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
        },
        async checkInputs(event){
            
            this.conEmail = false;
            this.conPassword = false;;
            // this.mbe = true;
            
            var email = document.getElementById('loginEmail').value;
            var pass = document.getElementById('loginPassword').value;
            var passfeedback = document.getElementById('passFeedback');
            var emailfeedback = document.getElementById('emailFeedback');

            if(email === ""){
                event.preventDefault();

                this.conEmail = true;
                this.mbe = false;
                this.mbp = true;
                passfeedback.style.display = "none";
                emailfeedback.style.display = "block";
            }else{
                if(this.validateEmail(email)){
                    this.okEmail = true;
                    this.mbe = true;
                    
                    if(pass === ""){
                        event.preventDefault();
                        this.conPassword = true;
                        this.mbp = false;
                        passfeedback.style.display = "block";
                        emailfeedback.style.display = "none";
                    }else{
                        this.okPass = true;
                    }


                }else{
                    event.preventDefault();
                    if(this.okEmail){
                        this.okEmail = false;
                    }
                    this.mbp = true;
                    this.mbe = false;
                    this.conEmail = true;
                    passfeedback.style.display = "none";
                    emailfeedback.style.display = "block";
                }
            }
        },
        checkPassword(){
            const pass = document.getElementById('password').value;
            const conpass = document.getElementById('confirmPassword').value;

            if(pass != conpass){
                alert('password and confirm password did not match!');
            }else{
                document.getElementById('registerForm').submit();
            }
        },
        validateEmail(email) {
            // Regular expression for a valid email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          
            // Test the email against the regex
            return emailRegex.test(email);
        },
        passToggle() {

            var loginPass = document.getElementById('loginPassword');
            var regPass = document.getElementById('password');
            var conPass = document.getElementById('confirmPassword');

            var icon1 = document.getElementById('eyeicon1');
            var icon2 = document.getElementById('eyeicon2');
            var icon3 = document.getElementById('eyeicon3');

            console.log(conPass.type)

            if(loginPass.type === "password"){
                loginPass.type = "text";
                icon1.classList.remove('fa-eye-slash');
                icon1.classList.add('fa-eye');
            }else{
                loginPass.type = "password";
                icon1.classList.remove('fa-eye');
                icon1.classList.add('fa-eye-slash');
            }

            if(regPass.type === "password"){
                regPass.type = "text";
                icon2.classList.remove('fa-eye-slash');
                icon2.classList.add('fa-eye');
            }else{
                regPass.type = "password";
                icon2.classList.remove('fa-eye');
                icon2.classList.add('fa-eye-slash');
            }

            if(conPass.type === "password"){
                conPass.type = "text";
                icon3.classList.remove('fa-eye-slash');
                icon3.classList.add('fa-eye');
            }else{
                conPass.type = "password";
                icon3.classList.remove('fa-eye');
                icon3.classList.add('fa-eye-slash');
            }
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