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
    
    //Remove food
    $(".removeBtn").click(function(){
        dbRef.child("fridges/1/" + $(this).attr("id")).remove();
    });
    
    //Add food
    $("#submitFood").click(function(){
        /*alert($("#foodName").val() 
              + "\n" + $("#exp").val()
              + "\n" + $("#qty").val()
             );*/
        
        dbRef.child("fridges/1/").update($("#foodName").val());
        dbRef.child("fridges/1/" + $("#foodName").val()).set($("#exp").val());
        dbRef.child("fridges/1/" + $("#foodName").val()).set($("#qty").val());
    });
});
