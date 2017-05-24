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
                    <button id="signUp">Sign Up</button>
                    <button id="googleAuth">Sign up with Google</button>
                </td>
            </tr>
        </table>
        
        <script src="js/jquery.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
        <script src="js/firebaseScript.js"></script>

    </body>
</html>