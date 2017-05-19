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

function writeUserData(userId, name, email, imageUrl) {
  firebase.database().ref('users/' + userId).set({
    username: name,
    email: email,
    profile_picture : imageUrl
  });
}
