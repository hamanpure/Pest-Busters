const container =document.querySelector('.container')
const loginLink =document.querySelector('.login-link')
const registerLink =document.querySelector('.register-link')
const btnPopup =document.querySelector('.btnlogin-popup');
const iconClose =document.querySelector('.close-icon')

registerLink.addEventListener('click',()=> {
    container.classList.add('active');

});
loginLink.addEventListener('click',()=> {
    container.classList.remove('active');

});

btnPopup.addEventListener('click',()=> {
    container.classList.add('active-popup');
});
iconClose.addEventListener('click',()=> {
    container.classList.remove('active-popup');
});