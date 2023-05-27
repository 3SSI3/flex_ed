// use [alert();] to link the script.
alert();

// changing the navbar styls on scroll.
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle
    ('window-scroll', window.scrollY > 0)
})

// show/hide FAQ answer

const faqs = document.querySelectorAll('.faq'); //get all faqs using querySelectorAll
//looking through them
faqs.forEach(faq => {
    faq.addEventListener('click', () => {
        faq.classList.toggle('open');

        //changing icon when clicking.
        const icon = faq.querySelector('.faq__icon i');
        if(icon.className === 'uil uil-plus-circle') {
            icon.className = 'uil uil-minus-circle'
        } else {
            icon.className = 'uil uil-plus-circle';
        }
    })
})

//the navbar menu to be displayed/hid when 3dashes are clicked;
const menu = document.querySelector(".nav__menu");
const menuBTN = document.querySelector("#menu-button");
const closeBTN = document.querySelector("#close-menu-button");


menuBTN.addEventListener('click', () => {
    menu.style.display = "flex";
    //change icon when clicked.
    closeBTN.style.display = "inline-block";
    menuBTN.style.display = "none";
})

// close the menu bar.
const closeNav =  () => {
    menu.style.display = "none";
    closeBTN.style.display = "none";
    menuBTN.style.display = "inline-block";
}

closeBTN.addEventListener('click', closeNav)