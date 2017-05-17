// Initialize Firebase
var config = {
    apiKey: "AIzaSyAx-JE-QfILpLRSzpcuYzkJWisvtIFKwY0",
    authDomain: "fuber-a49d6.firebaseapp.com",
    databaseURL: "https://fuber-a49d6.firebaseio.com",
    projectId: "fuber-a49d6",
    storageBucket: "fuber-a49d6.appspot.com",
    messagingSenderId: "221357839904"
};

var foodId = 0;

firebase.initializeApp(config);

function addFood() {
    var dbRef = firebase.database().ref();
    var foodName = document.getElementById("textBox");
    var inventoryBtn = document.getElementById("addInv");
    
    
    dbRef.child("Food/foodId" + window.foodId + "/foodName").set(foodName.value);
    
    window.foodId += 1;
}