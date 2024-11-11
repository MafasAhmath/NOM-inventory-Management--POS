// document.addEventListener('DOMContentLoaded', () => {

//**---------Product From--------------

$("#prdctFrom").ready(function () {

    validateCustomer('#prdctFrom');
    
    function validateCustomer(formId) {        
        const Form = document.querySelector(formId);
        const barcode = Form.querySelector('#barcode');
        const name = Form.querySelector('#prdctName');
        const cmpnyId = Form.querySelector('#cmpnyId');
        const brndId = Form.querySelector('#brndId');
        const ctgryId = Form.querySelector('#ctgryId');
        const size = Form.querySelector('#size');
        const unCst = Form.querySelector('#unCst');
        const unPrc = Form.querySelector('#unPrc');
        const qty = Form.querySelector('#qty');
        const desc = Form.querySelector('#desc');

        barcode.addEventListener('input', () => {
            validateAnyVal(barcode, 'Barcode is required');
        });

        name.addEventListener('input', () => {
            validateAnyVal(name, 'Prodect name is required');
        });

        cmpnyId.addEventListener('mouseenter', () => {
            validateSelect(cmpnyId, 'Please select Campany Name');
        });

        cmpnyId.addEventListener('mouseleave', () => {
            validateSelect(cmpnyId, 'Please select Campany Name');
        });

        brndId.addEventListener('mouseenter', () => {
            validateSelect(brndId, 'Please select Brand Name');
        });

        brndId.addEventListener('mouseleave', () => {
            validateSelect(brndId, 'Please select Brand Name');
        });

        ctgryId.addEventListener('mouseenter', () => {
            validateSelect(ctgryId, 'Please select Category Name');
        });

        ctgryId.addEventListener('mouseleave', () => {
            validateSelect(ctgryId, 'Please select Category Name');
        });

        size.addEventListener('input', () => {
            validateAnyVal(size, 'Size is required');
        });

        unCst.addEventListener('input', () => {
            validateAnyVal(unCst, 'Unit Cost is required');
        });

        unPrc.addEventListener('input', () => {
            validateAnyVal(unPrc, 'Unit price is required');
        });

        qty.addEventListener('input', () => {
            validateAnyVal(qty, 'qty is required');
        });

        desc.addEventListener('keyup', () => {
            validateAnyVal(desc, 'Description is required');
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**

//**---------Customer From--------------
$("#cstmrForm").ready(function () {


    validateCustomer('#cstmrForm');

    function validateCustomer(formId) {
        const Form = document.querySelector(formId);
        const fname = Form.querySelector('#fName');
        const lName = Form.querySelector('#lName');
        const phnNo = Form.querySelector('#phnNo');
        const email = Form.querySelector('#email');

        fname.addEventListener('input', () => {
            validateName(fname, 'First name is required');
        });

        lName.addEventListener('input', () => {
            validateName(lName, 'Last name is required');
        });

        phnNo.addEventListener('input', () => {
            validatePhone(phnNo);
        });

        email.addEventListener('input', () => {
            validateEmail(email);
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**

//**---------Supplier From--------------

$("#supplierForm").ready(function () {

    validateSupplier('#supplierForm');

    function validateSupplier(formId) {
        const Form = document.querySelector(formId);
        const fname = Form.querySelector('#fName');
        const lName = Form.querySelector('#lName');
        const phnNo = Form.querySelector('#phnNo');
        const email = Form.querySelector('#email');
        const nic = Form.querySelector('#nic');

        fname.addEventListener('input', () => {
            validateName(fname, 'First name is required');
        });

        lName.addEventListener('input', () => {
            validateName(lName, 'Last name is required');
        });

        phnNo.addEventListener('input', () => {
            validatePhone(phnNo);
        });

        email.addEventListener('input', () => {
            validateEmail(email);
        });

        nic.addEventListener('input', () => {
            validateNIC(nic);
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**

//**---------Company From--------------

$("#cmpnyForm").ready(function () {

    validateSupplier('#cmpnyForm');

    function validateSupplier(formId) {
        const Form = document.querySelector(formId);
        const name = Form.querySelector('#cmpnyname');
        const supplierName = Form.querySelector('#supplierId');

        name.addEventListener('input', () => {
            validateName(name, 'Company name is required');
        });

        supplierName.addEventListener('mouseenter', () => {

            validateSelect(supplierName, 'Please select Supplier Name');
        });

        supplierName.addEventListener('mouseleave', () => {

            validateSelect(supplierName, 'Please select Supplier Name');
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**

//**---------Brand From--------------

$("#brndForm").ready(function () {

    validateSupplier('#brndForm');

    function validateSupplier(formId) {
        const Form = document.querySelector(formId);
        const name = Form.querySelector('#brndname');
        const companyName = Form.querySelector('#cmpnyId');

        name.addEventListener('input', () => {
            validateName(name, 'Company name is required');
        });

        companyName.addEventListener('mouseUp', () => {
            validateSelect(companyName, 'Please select company Name');
        });

        companyName.addEventListener('mouseleave', () => {
            validateSelect(companyName, 'Please select company Name');
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**

//**---------Catagory From--------------

$("#ctgryForm").ready(function () {

    validateSupplier('#ctgryForm');

    function validateSupplier(formId) {
        const Form = document.querySelector(formId);
        const name = Form.querySelector('#ctgtyname');

        name.addEventListener('input', () => {
            validateName(name, 'Catagory name is required');
        });

        enablebtnSubmit(formId);
    }

});
//---------------------------------------------------**


//Enable button

function enablebtnSubmit(formId) {
    const Form = document.querySelector(formId);
    const inputs = Form.querySelectorAll('.inp-grp input');
    const btnSubmit = Form.querySelector('.btnSubmit');
    // const errorElement = Form.querySelectorAll('.inp-grp.error');

    // inputs.forEach(input => {
    //     input.addEventListener('keyup', () => {
    //         enable();
    //     });
    // });

    Form.addEventListener('mouseover', function () {
        enable();
    });

    function enable() {
        let allFilled = true;

        // Check if all input fields have a value
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });
        // const errorElements = Form.querySelectorAll('.inp-grp.error');
        // if (errorElements.length > 0) {
        //     allFilled = false;
        // }

        // Enable or disable the submit button based on the input values
        if (allFilled) {
            btnSubmit.removeAttribute('disabled');
        } else {
            btnSubmit.setAttribute('disabled', true);
        }
    }
    // Initially disable the submit button
    btnSubmit.setAttribute('disabled', true);
}

function validateName(ele, msg) {
    const eleVal = ele.value.trim();

    if (eleVal === '') {
        setError(ele, msg);
    } else {
        setSuccess(ele);
    }

    ele.addEventListener('keypress', (e) => {
        if (!/[a-zA-Z]/.test(e.key)) {
            e.preventDefault(); // Prevent non-alphabetic characters
            setError(ele, 'Numbers are not allowed');
        }
    });
}

function validateAnyVal(ele, msg) {
    const eleVal = ele.value.trim();

    if (eleVal === '') {
        setError(ele, msg);
    } else {
        setSuccess(ele);
    }
}


function validateSelect(ele, msg) {
    const eleVal = ele.value;

    if (ele.selectedIndex != 0) {
        setSuccess(ele);
    } else {
        setError(ele, msg);
    }

    function setError(element, message) {
        const selectP = element.parentElement;
        const inpGrp = selectP.parentElement;
        const errorElement = inpGrp.querySelector('.error');

        errorElement.innerText = message;
        inpGrp.classList.add('error');
        inpGrp.classList.remove('success');

        // need fix it
        // btnSubmit.setAttribute('disabled', true);   

    }

    function setSuccess(element) {
        const selectP = element.parentElement;
        const inpGrp = selectP.parentElement;
        const errorElement = inpGrp.querySelector('.error');

        errorElement.innerText = "";
        inpGrp.classList.add('success');
        inpGrp.classList.remove('error');
    }


}


function validatePhone(ele) {
    const eleVal = ele.value.trim();

    if (eleVal === '') {
        setError(ele, 'Phone number is required');
    } else if (!(eleVal.length >= 9 && eleVal.length <= 10)) {
        setError(ele, 'Phone number must be 9 or 10 ');
    } else {
        setSuccess(ele);
    }

    // Add an event listener to prevent input beyond the maximum length
    ele.addEventListener('input', () => {
        if (ele.value.length > 10) {
            ele.value = ele.value.slice(0, 10); // Trim to the maximum length
        }
    });

    // Prevent non-numeric input
    ele.addEventListener('keypress', (e) => {
        if (!/[0-9]/.test(e.key)) {
            e.preventDefault(); // Prevent non-numeric characters
        }
    });
}


function validateEmail(ele) {
    const emailVal = ele.value.trim();
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (emailVal === '') {
        setError(ele, 'Email id is required');
    } else if (!mailformat.test(emailVal)) {
        setError(ele, 'Please enter a valid email');
    } else {
        setSuccess(ele);
    }
}

function validateNIC(ele) {
    const NICVal = ele.value.trim();
    var NICformat = /^([5-9]{1}[0-9]{1}[0-3,5-8]{1}[0-9]{6}[vVxX])|([1-2]{1}[0-9]{2}[0-3,5-8]{1}[0-9]{7})$/;

    if (NICVal === '') {
        setError(ele, 'NIC ID is required');
    } else if (!NICformat.test(NICVal)) {
        setError(ele, 'Please enter a valid NIC');
    } else {
        setSuccess(ele);
    }

    ele.addEventListener('keypress', (e) => {
        const validChars = /[0-9vVxX]/;
        if (!validChars.test(e.key) || ele.value.length > 14) {
            e.preventDefault(); // Prevent invalid characters and limit input length
            setError(ele, 'Please enter a valid NIC');
        } else {
            setSuccess(ele);
        }
    });

    ele.addEventListener('input', () => {
        if (ele.value.length > 13) {
            ele.value = ele.value.slice(0, 12); // Trim to the maximum length
        }
    });
}





function setError(element, message) {
    const inpGrp = element.parentElement;
    const errorElement = inpGrp.querySelector('.error');

    errorElement.innerText = message;
    inpGrp.classList.add('error');
    inpGrp.classList.remove('success');

    // need fix it
    //btnSubmit.setAttribute('disabled', true);   

}

function setSuccess(element) {
    const inpGrp = element.parentElement;
    const errorElement = inpGrp.querySelector('.error');

    errorElement.innerText = "";
    inpGrp.classList.add('success');
    inpGrp.classList.remove('error');
}