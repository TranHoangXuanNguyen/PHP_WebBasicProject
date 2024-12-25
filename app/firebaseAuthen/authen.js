import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import {
  getAuth,
  GoogleAuthProvider,
  signInWithPopup,
  onAuthStateChanged,
  signOut,
} from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";

// Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyALwcfcRxniI2zcVkfpYax_hxgXcdasFEU",
  authDomain: "mama-s-kitchen-a96c9.firebaseapp.com",
  projectId: "mama-s-kitchen-a96c9",
  storageBucket: "mama-s-kitchen-a96c9.firebasestorage.app",
  messagingSenderId: "1033862000804",
  appId: "1:1033862000804:web:701c060462f14f37317631",
  measurementId: "G-Q6FDTF737E",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Initialize Firebase Auth
const auth = getAuth(app);

// Initialize Google Auth Provider
const provider = new GoogleAuthProvider();

export function signInWithGoogle() {
  signInWithPopup(auth, provider)
    .then(async (result) => {
      const user = result.user;
      console.log("User signed in with Google: ", user);

      try {
        const response = await fetch("/user/userLoginByGoogle", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            uid: user.uid,
            email: user.email,
            displayName: user.displayName,
          }),
        });

        if (response.ok) {
          console.log("Login data sent successfully");
          window.location.href = "/home";
        } else {
          console.error("Failed to send login data:", response.statusText);
        }
      } catch (error) {
        console.error("Error during fetch:", error);
      }
    })
    .catch((error) => {
      console.error("Error during sign in: ", error);
    });
}

// Monitor Auth State Changes
onAuthStateChanged(auth, (user) => {
  if (user) {
    console.log("User is logged in:", user.email);
  } else {
    console.log("User is not logged in");
  }
});

export function signOutUser() {
  const auth = getAuth();
  signOut(auth)
    .then(() => {
      console.log("User signed out");
      window.location.href = "/user/Signout";
    })
    .catch((error) => {
      console.error("Error signing out:", error);
    });
}
