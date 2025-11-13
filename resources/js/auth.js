import { auth, googleProvider } from "./firebase-config";
import {
    signInWithPopup,
    signInWithEmailAndPassword,
    onAuthStateChanged,
    signOut,
} from "firebase/auth";

function byId(id) {
    return document.getElementById(id);
}

// Login with Google
const googleBtn = byId("btnGoogleLogin");
if (googleBtn) {
    googleBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        try {
            await signInWithPopup(auth, googleProvider);
            window.location.href = "/dashboard";
        } catch (err) {
            alert(err.message);
        }
    });
}

// Email/password login
const loginForm = byId("loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const email = byId("loginEmail").value.trim();
        const password = byId("loginPassword").value;
        try {
            await signInWithEmailAndPassword(auth, email, password);
            window.location.href = "/dashboard";
        } catch (err) {
            alert(err.message);
        }
    });
}

// Registration UI removed per request

// Optional: simple logout handler if an element exists
const logoutLinks = document.querySelectorAll("[data-logout]");
logoutLinks.forEach((el) => {
    el.addEventListener("click", async (e) => {
        e.preventDefault();
        try {
            await signOut(auth);
        } catch {}
        window.location.href = "/";
    });
});

// Redirect to login if not authenticated and page requires auth (simple gate)
const requiresAuth = document.body?.dataset?.requiresAuth === "true";
if (requiresAuth) {
    onAuthStateChanged(auth, (user) => {
        if (!user) window.location.href = "/login";
    });
}
