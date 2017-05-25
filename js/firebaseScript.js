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

    /*
    var foodName = $("#foodName").val();
    var exp = $("#exp").val();
    var qty = $("#qty").val();*/

    //Remove food
    $(".removeBtn").click(function(){
            dbRef.child("fridges/1/" + $(this).attr("id")).remove();

        firebase.auth().onAuthStateChanged(function(currUser){
            //Each Remove button has an id matches the name of their respective food.
            //Delete the food that matches the id of their Remove button.
            if (currUser) {
                dbRef.child("fridges/" + userId + "/" + $(this).attr("id")).remove();
            }
        });
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

        firebase.auth().onAuthStateChanged(function(currUser){
            var userId = currUser.uid;
            var foodName = $("#foodName").val();
            var exp = $("#exp").val();
            var qty = $("#qty").val();

            if (currUser) {
                dbRef.child("fridges/" + userId + "/" + foodName + "/expirationDays").set(exp);
                dbRef.child("fridges/" + userId + "/" + foodName + "/quantity").set(qty);
            }
        });
    });

    //Sign up with Username and Email
    $("#signUp").click(function(){
        var email = $("#email").val();
        var pass = $("#pass").val();

        firebase.auth().createUserWithEmailAndPassword(email, pass).then(function(currUser) {
            var usrEmail = currUser.email;
            usrEmail = usrEmail.substr(0, usrEmail.indexOf('@'));

            dbRef.child("users/" + usrEmail + "/fridge_id").set(currUser.uid);

            
            dbRef.child("fridges/" + currUser.uid + "/" + "Sugar" + "/expirationDays").set("1");
            dbRef.child("fridges/" + currUser.uid + "/" + "Sugar" + "/quantity").set("1");

            dbRef.child("fridges/" + currUser.uid + "/" + "Flour" + "/expirationDays").set("1");
            dbRef.child("fridges/" + currUser.uid + "/" + "Flour" + "/quantity").set("1");

            window.location.replace("login.html");
        }).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;

            alert(errorCode + ": " + errorMessage);
        });
    });

    //Log in with Username and Email
    $("#login").click(function(){
		var emailVal = $("#email").val();
		var passVal = $("#pass").val();

		firebase.auth().signInWithEmailAndPassword(emailVal, passVal).then(function(currUser) {
            window.location.replace("index.html");

    	}).catch(function(error) {
    		var errorCode = error.code;
        	var errorMessage = error.message;

        	alert(errorCode + ": " + errorMessage);
    	});
	});

    function addFood(currUser, foodName, exp, qty) {

        /*dbRef.child("fridges/1/").update(foodName);
        dbRef.child("fridges/1/" + foodName).set(exp);
        dbRef.child("fridges/1/" + foodName).set(qty);*/
        firebase.auth().onAuthStateChanged(function(currUser){
            var userId = currUser.uid;

            if (currUser) {
                dbRef.child("fridges/" + userId + "/" + foodName + "/expirationDays").set(exp);
                dbRef.child("fridges/" + userId + "/" + foodName + "/quantity").set(qty);
            }
        });
    }
});
