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
        checkInputs(event){
            this.conEmail = false;
            this.conPassword = false;;
            this.mbe = true;
            // this.mbp = true;

            var email = document.getElementById('loginEmail').value;
            var pass = document.getElementById('loginPassword').value;
            var passfeedback = document.getElementById('passFeedback');
            var emailfeedback = document.getElementById('emailFeedback');

            if(email === ""){
                event.preventDefault();
                this.conEmail = true;
                this.mbe = false;
                passfeedback.style.display = "none";
            }else{
                if(this.validateEmail(email)){
                    this.okEmail = true;
                    
                    if(pass === ""){
                        event.preventDefault();
                        passfeedback.style.display = "block";
                        this.conPassword = true;
                        this.mbp = false;
                        emailfeedback.style.display = "none";
                    }

                    this.okPass = true;
                }else{
                    event.preventDefault();
                    this.conEmail = true;
                    this.mbe = false;
                    passfeedback.style.display = "none";
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
            var eyeicon = document.getElementById("eyeicon");
            var x = document.getElementById("loginPassword");
            if (x.type === "password") {
              x.type = "text";
              eyeicon.classList.remove("fa-regular", "fa-eye-slash"); 
              eyeicon.classList.add("fa-regular", "fa-eye");
            } else {
              x.type = "password";
              eyeicon.classList.remove("fa-regular", "fa-eye");
              eyeicon.classList.add("fa-regular", "fa-eye-slash"); 
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