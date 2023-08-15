// action btns
let lastFiveBtn = document.getElementById('last-five-btn');
let accounts = document.getElementById('accounts-btn');

// get routes
const accounts_url = '/all-accounts';
const last_five_transactions_url = '/last-five-transactions';
const account_balance = '/account-balance';

lastFiveBtn.addEventListener('click', function(e){
    getLastFive();
})

accounts.addEventListener('click', function(e){
    getAccounts();
})

function getLastFive(){
    fetch(last_five_transactions_url)
    .then( resp => resp.text())
    .then(function(resultHtml){
        document.getElementById('screen').innerHTML = resultHtml;
    })
}

function getAccounts(){
    fetch(accounts_url)
    .then( resp => resp.text())
    .then(function(resultHtml){
        document.getElementById('screen').innerHTML = resultHtml;
        let accountList = document.getElementsByClassName('account-name');
        for(let i=0; i <= accountList.length -1; i++){
            accountList[i].addEventListener('click', function(){
                initAccountActions(this)
            });
        }
    })
}

function initAccountActions(accountBtn){
    
    hideAll();
    let accActions = document.querySelector('.account-actions')

    if(accActions.classList.contains('d-none')){
        accActions.classList.remove('d-none');
    }

    let accountId = accountBtn.getAttribute('data-account-id');
    document.querySelector('input[name="account_id"]').value = accountId;

    let inquiryBtn = document.getElementById('inquiry-btn');
    let withdrawBtn = document.getElementById('withdraw-btn');

    inquiryBtn.addEventListener('click', function(){
        getAccountBalance();
    })

    withdrawBtn.addEventListener('click', function(){
        initWithdraw();
    })
}




function getAccountBalance(){
    
    let accountId = document.querySelector('input[name="account_id"]').value;
    const data = {
        account_id: accountId,
    };

    fetch(account_balance,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify(data)
    })
    .then( resp => resp.json())
    .then( result => {
        document.getElementById('acc-balance').innerText = result;
        document.querySelector('.acc-balance').classList.remove('d-none');
    })
}

function initWithdraw(){
    
    hideAll();
    let withdrawSec = document.querySelector('.withdraw-section')

    if(withdrawSec.classList.contains('d-none')){
        withdrawSec.classList.remove('d-none');
    }

    document.querySelector('input[name="action"]').value = "withdraw";

}

function hideAll(){
    let accList = document.querySelector('.account-list');
    let accActions = document.querySelector('.account-actions');
    let withdrawSec = document.querySelector('.withdraw-section');
    let accBalance = document.querySelector('.acc-balance');

    if(! accList.classList.contains('d-none')){
        accList.classList.add('d-none');
    }

    if(! accActions.classList.contains('d-none')){
        accActions.classList.add('d-none');
    }

    if(! withdrawSec.classList.contains('d-none')){
        withdrawSec.classList.add('d-none');
    }

    if(! accBalance.classList.contains('d-none')){
        accBalance.classList.add('d-none');
    }
}