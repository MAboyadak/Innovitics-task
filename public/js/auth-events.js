// action btns
// let regBtn = document.getElementById('register-btn');
let loginBtn = document.getElementById('login-btn');

// get routes
// const registerUrl = '/get-register-form';
const loginUrl = '/get-login-form';

// regBtn.addEventListener('click', function(e){
//     showRegForm();
// })

loginBtn.addEventListener('click', function(e){
    showLoginForm();
})

// function showRegForm(){
//     fetch(registerUrl)
//     .then( resp => resp.text())
//     .then(function(regForm){
//         document.getElementById('screen').innerHTML = regForm;
//     })
// }

function showLoginForm(){
    fetch(loginUrl)
    .then( resp => resp.text())
    .then(function(loginForm){
        document.getElementById('screen').innerHTML = loginForm;
    })
}