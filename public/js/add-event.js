const form = document.querySelector("form");
const prizeInput = form.querySelector('input[name="prize"]');
const feeInput = form.querySelector('input[name="fee"]');
const submit =  document.getElementById('submit');



function isNumber(value) {
    return !/^\s*$/.test(value) && !isNaN(value);
}


function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');

    if (document.getElementsByClassName("no-valid").length) {
        submit.disabled = 1;
    } else  {
        submit.disabled = 0;
    }
}



function validateNumber() {
    setTimeout(function () {
            markValidation(prizeInput, isNumber(prizeInput.value));
            markValidation(feeInput, isNumber(feeInput.value));
        },
        500
    );
}

prizeInput.addEventListener('keyup', validateNumber);
feeInput.addEventListener('keyup', validateNumber);


