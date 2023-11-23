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

                    // Attempt to log in
                    // try {
                    //     const response = await fetch('/login', {
                    //         method: 'POST',
                    //         headers: {
                    //             'Content-Type': 'application/json',
                    //         },
                    //         body: JSON.stringify({
                    //             loginEmail: email,
                    //             loginPassword: pass,
                    //         }),
                    //     });
            
                    //     const responseData = await response.json();
            
                    //     if (responseData.redirect) {
                    //         // If login is successful, update UI or show a success message
                    //         console.log('Login successful!'); // Update this part based on your needs
                    //     } else {
                    //         // Handle unsuccessful login (e.g., show a modal or error message)
                    //         this.loginError = true;
                    //         // event.preventDefault();
                    //         console.log('Login failed. Show your modal or error message.');
                    //         // window.location.reload();
                    //     }
                    // } catch (error) {
                    //     // Handle network errors or other issues
                    //     // console.error('An error occurred during the login:', error);

                    //     if (error.response && error.response.status === 401) {
                    //         // Handle invalid credentials or other errors
                    //         this.loginError = true;
                    //         console.log('Login attempt failed. Show your modal or error message.');
                    //         event.preventDefault(); // Prevent the default form submission
                    //         return; // Stop further execution
                    //     } else {
                    //         // Handle other errors
                    //         console.error('An error occurred during the login:', error);
                    //         // Optionally, you might want to show an error message to the user
                    //     }
                    
                    //     // event.preventDefault();
                    //     // console.log("i'm here");
                    // //     // window.location.reload();
                    // }
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