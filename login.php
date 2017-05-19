<!DOCTYPE html>
<html>
    <body>
        <head>
            <title>Sign In</title>
        </head>
        
        <h2>Sign In</h2>
        
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
                    <button id="submit" onclick="linkStart()">Submit</button>
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

            //Log into the user
            function linkStart() {
                var emailVal = window.email.value;
                var userPassVal = window.userPass.value
                
                firebase.auth().signInWithEmailAndPassword(emailVal, userPassVal).then(function() {
                    window.location.replace("index.html");
                    
                }).catch(function(error) {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    
                    document.writeln("Sign in failed: " + errorCode);
                    document.writeln(errorMessage);
                });
            }
        </script>
    </body>
</html>