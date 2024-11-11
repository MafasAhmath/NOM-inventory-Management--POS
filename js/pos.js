$(document).ready(function () {
    const posSearchForm = document.querySelector('#posSearchForm');

    var form, barcode, name, qty, unPrc, discount, ttl, total, size;

    function calculateSeletedPrctTotal() {
        form = document.forms['posSearchForm'];
        qty = parseFloat(form.qty.value) || 1;
        unPrc = parseFloat(form.unPrc.value) || 0;
        discount = parseFloat(form.discount.value) || 0;
        total = (unPrc * qty) - discount;
        ttl = total;
        $('#ttl').text(total.toFixed(2));
        enablebtnAdd();
    } 

    $('#qty, #unPrc, #discount').on('input', function () {
        calculateSeletedPrctTotal();
    });

    //**----------------Search from clear
    const btnClear = posSearchForm.querySelector('#btn-clear');
    ttl = posSearchForm.querySelector('#ttl');
    unPrc = posSearchForm.querySelector('#unPrc');
    btnClear.addEventListener('click', function () {
        $(posSearchForm)[0].reset();
        calculateSeletedPrctTotal();

    })

    
    //Enable Add button    
    function enablebtnAdd() {  
        const posSearchForm = document.querySelector('#posSearchForm');
        const prdctAdd = posSearchForm.querySelector('#prdctAdd');

        const inputs = posSearchForm.querySelectorAll('input');

        function enable() {
            let allFilled = true;

            inputs.forEach(input => {
                if (input.value.trim() === '' && !input.hasAttribute('readonly') && !input.id('discount')) {
                    allFilled = false;
                }
            });

            if (allFilled) {
                prdctAdd.removeAttribute('disabled');
            } else {
                prdctAdd.setAttribute('disabled', true);
            }
        }

        inputs.forEach(input => {
            input.addEventListener('input', enable);
        });

        posSearchForm.addEventListener('mouseover', function () {
            enable();
        });

        enable(); // Initial check to set the button state
    }


   // Function to fetch product details based on barcode or name
function fetchProductDetails(query, type) {
    $.ajax({
        url: './forms/searchPrdct.php', // Update with your server URL
        method: 'POST',
        data: {
            query: query,
            type: type
        },
        success: function (response) {
            let data = JSON.parse(response);
            if (data.success) {
                // For suggestion box
                if (type === 'barcode') {
                    displaySuggestions('#barcodeSuggestions', data.data);
                } else if (type === 'description') {
                    displaySuggestions('#nameSuggestions', data.data);
                }
            } else {
                alert(data.message);
            }
        },
        error: function () {
            console.error('Error fetching product details');
        }
    });
}

function displaySuggestions(elementId, suggestions) {
    const suggestionBox = $(elementId);
    suggestionBox.empty();
    if (suggestions.length > 0) {
        suggestions.forEach(item => {
            suggestionBox.append(`<div data-barcode="${item.barcode}" data-name="${item.name}" data-unit_price="${item.unit_price}" data-qty="${item.qty}" data-size="${item.size}" data-unit_cost="${item.unit_cost}">${item.name}</div>`);
        });
        suggestionBox.show();
    } else {
        suggestionBox.hide();
    }
}

$('#barcode').on('keyup', function () {
    var query = $(this).val();
    if (query.length >= 2) { // Fetch details if the input length is greater than 2
        fetchProductDetails(query, 'barcode');
    }
});

$('#name').on('keyup', function () {
    var query = $(this).val();
    if (query.length >= 2) { // Fetch details if the input length is greater than 2
        fetchProductDetails(query, 'description');
    }
});

$(document).on('click', '.suggestion-box div', function () {
    const barcode = $(this).data('barcode');
    const name = $(this).data('name');
    const unit_price = $(this).data('unit_price');
    const qty = $(this).data('qty');
    const size = $(this).data('size');
    const unit_cost = $(this).data('unit_cost');

    if (qty <= 0) {            
        alert(`'${name}' is out of stock`);
    } else if (qty <= 5 && qty >= 0) {
        alert(`'${name}' is low stock. have only '${qty}'.`);
    }

    $('#barcode').val(barcode);
    $('#name').val(name);
    $('#unPrc').val(unit_price);
    $('#size').val(size);
    $('#discount').val(0);        
    $('#unitCst').text(unit_cost);

    calculateSeletedPrctTotal();
    
    // Hide suggestion boxes
    $('.suggestion-box').hide();
});

$(document).on('mouseleave', '.suggestion-box', function () {
    $(this).hide();
});


    //**---------------- show , Hide unit cost
    function costSpanShow() {
        const costSpan = posSearchForm.querySelector('#unitCst');
        $(costSpan).on('mouseenter', function () {
            // alert('hi');
            if (costSpan.hasAttribute('hidden')) {
                costSpan.removeAttribute('hidden');
            }
        });
        $(costSpan).on('mouseleave', function () {
            costSpan.setAttribute('hidden', true);
        });
        costSpan.setAttribute('hidden', true);
    }
    
    
    //**----------------Add the item to table
    $("#prdctAdd").on('click', function () {
        form = document.forms['posSearchForm'];
        barcode = form.barcode.value;
        name = form.name.value;
        qty = parseFloat(form.qty.value);
        unPrc = parseFloat(form.unPrc.value);
        discount = parseFloat(form.discount.value) || 0;
        total = (unPrc * qty) - discount;
        size = form.size.value;
        // size = document.getElementById('size').innerText;
        // alert('hi');

        var tr = document.createElement('tr');
        var tdNO = tr.appendChild(document.createElement('td'));
        var tdBarcode = tr.appendChild(document.createElement('td'));
        var tdName = tr.appendChild(document.createElement('td'));
        var tdSize = tr.appendChild(document.createElement('td'));
        var tdUnitPrc = tr.appendChild(document.createElement('td'));
        var tdQty = tr.appendChild(document.createElement('td'));
        var tdDiscount = tr.appendChild(document.createElement('td'));
        var tdTotal = tr.appendChild(document.createElement('td'));
        var tdAction = tr.appendChild(document.createElement('td'));

        var rowCount = document.querySelector('#posTbl tbody').rows.length + 1;

        tdNO.innerHTML = rowCount;
        tdBarcode.innerHTML = barcode;
        tdName.innerHTML = name;
        tdSize.innerHTML = size; // Update this to dynamically get the size if available

        // Make qty and discount editable
        tdQty.innerHTML = `<input type="number" class="qty-input form-control form-control-sm py-0 ps-1 " value="${qty}" min="0">`;
        tdUnitPrc.innerHTML = unPrc;
        tdDiscount.innerHTML = `<input type="number" class="discount-input form-control form-control-sm py-0" value="${discount}" min="0">`;

        tdTotal.innerHTML = total.toFixed(2);
        tdAction.innerHTML = "<i style='color:red; cursor: pointer;' id='prdctDel' class='bi bi-trash3 '></i>";

        document.querySelector('#posTbl tbody').appendChild(tr);
        $("#posSearchForm")[0].reset();
        $('#ttl').text('0');

        calculateSum();

        // Add event listeners for qty and discount inputs
        $(tr).find('.qty-input, .discount-input').on('change', function () {
            var $row = $(this).closest('tr');
            var qty = parseFloat($row.find('.qty-input').val());
            var unitPrice = parseFloat($row.find('td:eq(4)').text());
            var discount = parseFloat($row.find('.discount-input').val()) || 0;
            var total = (unitPrice * qty) - discount;            
            $row.find('td:eq(7)').text(total.toFixed(2));
           
            calculateSum();
            
        });

        // Handle row deletion
        $(tr).find('#prdctDel').on('click', function () {
            $(this).closest('tr').remove();

            const rows = document.querySelectorAll('#posTbl tbody tr');
            rows.forEach((row, index) => {
                row.cells[0].innerText = index + 1;
            });

            calculateSum();
        });

        
    });

    // function calculateSum() {
    //     var sum = 0;
    //     $('#posTbl tbody tr').each(function () {
    //         sum += parseFloat($(this).find('td:eq(7)').text());
    //     });
    //     $('#ttl').text(sum.toFixed(2));
    // }


    function calculateSum() {
        let sumOftdTotal = 0;
        let sumOftdDiscount = 0;
        let sumOftdQty = 0;
        const rows = document.querySelectorAll('#posTbl tbody tr');
        rows.forEach(row => {
            const totalCellValue = parseFloat(row.cells[7].innerText);
            const discountCellValue = parseFloat(row.cells[6].querySelector('input').value);
            const qtyCellValue = parseFloat(row.cells[5].querySelector('input').value);    
            
            if (!isNaN(totalCellValue)) {
                sumOftdTotal += totalCellValue;
            }
            if (!isNaN(discountCellValue)) {
                sumOftdDiscount += discountCellValue;
            }
            if (!isNaN(qtyCellValue)) {
                sumOftdQty += qtyCellValue;
            }
        });

        document.querySelector('#inputTotal').value = sumOftdTotal;
        document.querySelector('#inputDiscount').value = sumOftdDiscount;
        document.querySelector('#cardCount').innerHTML = rows.length;
        document.querySelector('#qtyCount').innerHTML = sumOftdQty;
    }

    // Remove product row
    // $("#posTbl").on('click', '#prdctDel', function (event) {
    //     if (event.target.closest('#prdctDel')) {
    //         const row = event.target.closest('tr');
    //         row.remove();

    //         // Update row numbers
    //         const rows = document.querySelectorAll('#posTbl tbody tr');
    //         rows.forEach((row, index) => {
    //             row.cells[0].innerText = index + 1;
    //         });

    //         // Recalculate the sum
    //         calculateSum();
    //     }
    // });



});