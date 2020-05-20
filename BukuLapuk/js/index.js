const logincontainer = document.querySelector('#logincontainer');
const registercontainer = document.querySelector('#registercontainer');
const logintab = document.querySelector('#login-tab');
const registertab = document.querySelector('#register-tab');
const loginsection = document.getElementById('login-section');
const registersection = document.getElementById('register-section');
const maybelaterlogin = document.getElementById('maybeLater-Login');
const maybelaterregister = document.getElementById('maybeLater-Register');
const masuklogin = document.getElementById('masuk-Login');
const daftarregister = document.getElementById('daftar-Register');




logintab.addEventListener('click', function(){
    loginactive();
});

registertab.addEventListener('click', function(){
    registeractive();
});

loginsection.addEventListener('click', function(){
    document.querySelector('.background-modal').style.display = 'flex';
    loginactive();
});

registersection.addEventListener('click', function () {
    document.querySelector('.background-modal').style.display = 'flex';
    registeractive();
});

maybelaterlogin.addEventListener('click', function(){
    document.querySelector('.background-modal').style.display = 'none';
});

maybelaterregister.addEventListener('click', function () {
    document.querySelector('.background-modal').style.display = 'none';
});

masuklogin.addEventListener('click', function () {
    logregsuccess();
});

daftarregister.addEventListener('click', function () {
    logregsuccess();
});


function loginactive(){
    logincontainer.style.display = "block";
    registercontainer.style.display = "none";
    logintab.classList.remove('inactive');
    registertab.classList.add('inactive');
}

function registeractive(){
    logincontainer.style.display = "none";
    registercontainer.style.display = "block";
    logintab.classList.add('inactive');
    registertab.classList.remove('inactive');
}

function logregsuccess(){
    window.location.href="index.php";
}






