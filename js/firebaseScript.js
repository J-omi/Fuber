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
	    var uid = getCookie("uid");	    
            dbRef.child("fridges/" + uid + "/" + $(this).attr("id")).remove();

        firebase.auth().onAuthStateChanged(function(currUser){
            //Each Remove button has an id matches the name of their respective food.
            //Delete the food that matches the id of their Remove button.
            if (currUser) {
                dbRef.child("fridges/" + userId + "/" + $(this).attr("id")).remove();
            }
        });
        
        window.location.replace("ingredients.php");
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
    $("#signup").click(function(){
        var email = $("#email").val();
        var pass = $("#pass").val();

        firebase.auth().createUserWithEmailAndPassword(email, pass).then(function(currUser) {
            var usrEmail = currUser.email;
            usrEmail = usrEmail.substr(0, usrEmail.indexOf('@'));

            dbRef.child("users/" + usrEmail + "/fridge_id").set(currUser.uid);


            dbRef.child("fridges/" + currUser.uid + "/" + "Sugar" + "/expirationDays").set("0");
            dbRef.child("fridges/" + currUser.uid + "/" + "Sugar" + "/quantity").set("1");

            dbRef.child("fridges/" + currUser.uid + "/" + "Flour" + "/expirationDays").set("0");
            dbRef.child("fridges/" + currUser.uid + "/" + "Flour" + "/quantity").set("1");
	    document.cookie = "uid=" + currUser.uid;

            window.location.replace("login.html");
        }).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;

            alert(errorCode + ": " + errorMessage);
        });
    });

    //change Sign In/Sign Out button text
    firebase.auth().onAuthStateChanged(function(currUser){
        if (currUser) {
            $("#home_login").html("SIGN OUT");
        } else {
            $("#home_login").html("SIGN IN");
        }
    });
    
    //Log in with Username and Email
    $("#login").click(function(){
		var emailVal = $("#email").val();
		var passVal = $("#pass").val();

		firebase.auth().signInWithEmailAndPassword(emailVal, passVal).then(function(currUser) {
	    document.cookie = "uid=" + currUser.uid;

            window.location.replace("index.html");

    	}).catch(function(error) {
    		var errorCode = error.code;
        	var errorMessage = error.message;

        	alert(errorCode + ": " + errorMessage);
    	});
	});

    //LOG OUT, and redirect to sign in page
    $("#home_login").click(function(){
		firebase.auth().signOut().then(function() {
		  // Sign-out successful.
		    document.cookie = "uid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

            window.location.replace("login.html");
		}).catch(function(error) {
			var errorCode = error.code;
        	var errorMessage = error.message;
        
        	alert(errorCode + ": " + errorMessage);
		});
    });
    
    /*function addFood(currUser, foodName, exp, qty) {

        dbRef.child("fridges/1/").update(foodName);
        dbRef.child("fridges/1/" + foodName).set(exp);
        dbRef.child("fridges/1/" + foodName).set(qty);
        firebase.auth().onAuthStateChanged(function(currUser){
            var userId = currUser.uid;

            if (currUser) {
                dbRef.child("fridges/" + userId + "/" + foodName + "/expirationDays").set(exp);
                dbRef.child("fridges/" + userId + "/" + foodName + "/quantity").set(qty);
            }
        });
    }*/
    
    //Sign up with a Google account
    $("#googleAuth").click(function(){
        
        var provider = new firebase.auth.GoogleAuthProvider();
        
        firebase.auth().signInWithPopup(provider).then(function(result) {
            var user = result.user;

            var usrEmail = user.email;
            usrEmail = usrEmail.substr(0, usrEmail.indexOf('@'));

            dbRef.child("users/" + usrEmail + "/fridge_id").set(user.uid);


            dbRef.child("fridges/" + user.uid + "/" + "Sugar" + "/expirationDays").set("0");
            dbRef.child("fridges/" + user.uid + "/" + "Sugar" + "/quantity").set("1");

            dbRef.child("fridges/" + user.uid + "/" + "Flour" + "/expirationDays").set("0");
            dbRef.child("fridges/" + user.uid + "/" + "Flour" + "/quantity").set("1");
	    document.cookie = "uid=" + user.uid;
            
            window.location.replace("index.html");
            
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;

            alert(errorCode + ": " + errorMessage + "\n"
                 + email + "\n"
                 + credential);
        });
    });
});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

