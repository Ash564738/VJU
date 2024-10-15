const currentLocation = window.location.href;

const navLinks = document.querySelectorAll('.nav-link');

function setActiveToNavLink() {
    let foundActive = false;

    navLinks.forEach(link => {
        link.classList.remove('active');

        if (currentLocation.includes(link.href)) {
            link.classList.add('active');
            foundActive = true;
        }
    });

    if (!foundActive) {
        navLinks[0].classList.add('active');
    }
}

setActiveToNavLink();
console.log("Current URL:", currentLocation);
navLinks.forEach(link => console.log("Link URL:", link.href));
