document.addEventListener("DOMContentLoaded", function () {
    const successMessage = document.getElementById("success-message");
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.transition = "opacity 0.5s ease-out";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500);
        }, 2500);
    }
});
