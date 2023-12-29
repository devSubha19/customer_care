  
const sidebar = document.querySelector(".sidebar");
const menuButton = document.getElementById("menu-btn");
const mainContent = document.querySelector(".main-content");

// Add a click event listener to the menu button
menuButton.addEventListener("click", () => {
  // Toggle the 'hidden' class on the sidebar to hide/show it
  sidebar.classList.toggle("hidden");
  mainContent.classList.toggle("main-content-expanded");
});

 

function showpass(inputId) {
    const eyeicon = document.querySelector(`#${inputId} ~ .eye i`);
    
    eyeicon.classList.toggle('fa-eye-slash');
    eyeicon.classList.toggle('fa-eye');
    eyeicon.classList.toggle('open');
    
    const passwordInput = document.getElementById(inputId);

    const inputType = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = inputType;
}
 
    function handleClick(event) {
        const clickedUrl = event.target.getAttribute('href');
        const listItems = document.querySelectorAll('.grid-item');
        listItems.forEach(li => {
            li.classList.remove('active');
        });

        event.target.parentElement.classList.add('active');
        localStorage.setItem('lastClickedUrl', clickedUrl);
    }

    const anchorElements = document.querySelectorAll('.grid-item a');
    anchorElements.forEach(anchor => {
        anchor.addEventListener('click', handleClick);

        const lastClickedUrl = localStorage.getItem('lastClickedUrl');
        if (lastClickedUrl && anchor.getAttribute('href') === lastClickedUrl) {
            anchor.parentElement.classList.add('active');
        }
    });
 
