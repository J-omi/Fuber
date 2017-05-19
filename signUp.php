<!DOCTYPE html>
<html>
    <body>
        <head>
            <title>Sign Up</title>
        </head>
        
        <h2>Sign Up</h2>
        
        
        <table>
            <tr>
                <td>
                    <input id="email" type="text" placeholder="Email" required/>
                </td>
            <tr>
            
            <tr>
                <td>
                    <input id="pass" type="password" placeholder="Password" required/> 
                </td>
            </tr>
            
            <tr>
                <td>
                    <button id="submit" onclick="createUser()">Submit</button>
                    <button id="googleSubmit">Sign up with Google</button>
                </td>
            </tr>
        </table>
        
        <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyAx-JE-QfILpLRSzpcuYzkJWisvtIFKwY0",
                authDomain: "fuber-a49d6.firebaseapp.com",
                databaseURL: "https://fuber-a49d6.firebaseio.com",
                projectId: "fuber-a49d6",
                storageBucket: "fuber-a49d6.appspot.com",
                messagingSenderId: "221357839904"
            };
            firebase.initializeApp(config);
            
            var email = document.getElementById("email");
            var userPass = document.getElementById("pass");
            var provider = new firebase.auth.GoogleAuthProvider();
            var googleSub = document.getElementById("googleSubmit");
            
            //Authenticate with Google
            googleSub.onclick = function() {
                firebase.auth().signInWithPopup(provider).then(function(result) {
                    // This gives you a Google Access Token. You can use it to access the Google API.
                    var token = result.credential.accessToken;
                    // The signed-in user info.
                    var user = result.user;
                    // ...
                }).catch(function(error) {
                    // Handle Errors here.
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    // The email of the user's account used.
                    var email = error.email;
                    // The firebase.auth.AuthCredential type that was used.
                    var credential = error.credential;
                    // ...
                });                
            }
            
            //Create the user
            function createUser() {
                var emailVal = window.email.value;
                var userPassVal = window.userPass.value;
                
                firebase.auth().createUserWithEmailAndPassword(emailVal, userPassVal).then(function(){
                    //If the sign up was successful
                    window.location.replace("login.php");
                    
                }).catch(function(error){
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    
                    //If the sign in failed
                    document.writeln("Sign up failed: " + errorCode);
                    document.writeln(errorMessage);
                });
            }
        </script>        
    </body>
</html>