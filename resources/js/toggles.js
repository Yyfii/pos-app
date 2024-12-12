const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

if(togglePassword){
    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("bi-eye");
    });   
}

const links = document.querySelectorAll('.delayed-link');
if(links){
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetLink = this.href;
            setTimeout(function() {
                window.location.href = targetLink;
            }, 2000);
        });
    });
}
