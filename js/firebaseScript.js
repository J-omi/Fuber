// Initialize Firebase
var config = {
    apiKey: "AIzaSyAx-JE-QfILpLRSzpcuYzkJWisvtIFKwY0",
    authDomain: "fuber-a49d6.firebaseapp.com",
    databaseURL: "https://fuber-a49d6.firebaseio.com",
    projectId: "fuber-a49d6",
    storageBucket: "fuber-a49d6.appspot.com",
    messagingSenderId: "221357839904"
};

$(document).ready(function(){
    firebase.initializeApp(config);

    var dbRef = firebase.database().ref();
    var currUser = firebase.auth().currentUser; 
    
    var foodName = $("#foodName").val();
    var exp = $("#exp").val();
    var qty = $("#qty").val();
    
    //Remove food
    $(".removeBtn").click(function(){
        dbRef.child("fridges/1/" + $(this).attr("id")).remove();
    });
    
    //Add food on submit
    $("#submitFood").click(function(){
        /*alert($("#foodName").val() 
              + "\n" + $("#exp").val()
              + "\n" + $("#qty").val()
             );*/
        
        /*
        dbRef.child("fridges/1/").update($("#foodName").val());
        dbRef.child("fridges/1/" + $("#foodName").val()).set($("#exp").val());
        dbRef.child("fridges/1/" + $("#foodName").val()).set($("#qty").val());*/
        
        addFood(foodName, exp, qty);
    });
    
    //Sign up with Username and Email
    $("#signUp").click(function(){
        var email = $("#email").val();
        var pass = $("#pass").val();
        
        firebase.auth().createUserWithEmailAndPassword(email, pass).then(function(currUser) {
            var usrEmail = currUser.email;
            usrEmail = usrEmail.substr(0, usrEmail.indexOf('@'));
            
            dbRef.child("users/" + usrEmail + "/fridge_id").set(currUser.uid);
            
            alert("User successfully created! Welcome, " + usrEmail);
            
            window.location.replace("login.php");
        }).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;
            
            alert(errorCode + ": " + errorMessage);
        });
    });
    
    function addFood(foodName, exp, qty) {
        dbRef.child("fridges/1/").update(foodName);
        dbRef.child("fridges/1/" + foodName).set(exp);
        dbRef.child("fridges/1/" + foodName).set(qty);
    }
});
