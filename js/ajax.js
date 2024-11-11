// ==================== CREADIT PAGE ========================

$(document).ready(function () {

    // showMessage("showMessage", "s");
    function showMessage(message, action) {

        const messageBox = $('#messageBox');
        messageBox.text(message).fadeIn(1000); // Use fadeIn to show the div with animation
        setTimeout(() => {
            messageBox.fadeOut(750); // Use fadeOut to hide the div with animation
        }, 3000); // 3000 milliseconds = 3 seconds

        if (action === 's') {
            messageBox.removeClass('text-bg-danger').addClass('text-bg-success');
        } else {
            messageBox.removeClass('text-bg-success').addClass('text-bg-danger');
        }
    }


    // --|| Customer||-- ***********************************************

    
    $("#customerModal").on("click", "#cstmrSave", function (event) {
        
        $.ajax({
            url: "./forms/cstmrHandle.php",
            type: "post",
            data: $("#cstmrForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#cstmrForm")[0].reset();
                $('#customerModal').modal('hide');
                $("#content-section").load("./credit.php");
            }
        })
    });

    $("#cstmrTbl").on("click", "#cstmrUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#cstmrSave').val("Update");
        $("#cstmrId").val(id);
        $("#action").val(action);

        var fName = row.closest('tr').find('td:eq(2)').text(); $('#fName').val(fName);
        var lName = row.closest('tr').find('td:eq(3)').text(); $('#lName').val(lName);
        var name = row.closest('tr').find('td:eq(4)').text(); $("input[name='gender'][value='" + name + "']").prop('checked', true);
        var phnNo = row.closest('tr').find('td:eq(5)').text(); $('#phnNo').val(phnNo);
        var email = row.closest('tr').find('td:eq(6)').text(); $('#email').val(email);
        var desc = row.closest('tr').find('td:eq(7)').text(); $('#desc').val(desc);

        $('#customerModal').modal('show');

        $("#close-cstmrMdl").on('click', function () {
            $('#customerModal').modal('hide');
            $('#cstmrSave').val("Save");
            $("#cstmrForm")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });


    $("#cstmrTbl").on("click", "#cstmrDel", function () {
        var id = $(this).data("id");
        $.ajax({
            url: "./forms/cstmrHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./credit.php");
            }
        })
    });


    // --|| Ledger||-- ***********************************************

    $("#ledgerModal").on("click", "#ledgerSave", function (event) {
        event.preventDefault();
        $.ajax({
            url: "./forms/ledgerHandle.php",
            type: "post",
            data: $("#ledgerForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#content-section").load("./credit.php");
                $("#ledgerForm")[0].reset();
                $('#ledgerModal').modal('hide');
            }

        })


    });

    $("#ledgerTbl").on("click", "#ledgerUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#ledgerSave').val("Update");
        //alert(id);
        $("#ledgerId").val(id);
        $("#action").val(action);

        var date = row.closest('tr').find('td:eq(2)').text();
        var formattedDate = new Date(date).toISOString().slice(0, 10); $('#date').val(formattedDate);
        var total = row.closest('tr').find('td:eq(3)').text(); $('#total').val(total);
        var credit = row.closest('tr').find('td:eq(4)').text(); $('#crdt').val(credit);
        var debit = row.closest('tr').find('td:eq(5)').text(); $('#debit').val(debit);
        var cstmrid = row.closest('tr').find('td:eq(6)').text().trim(); $('#cstmrid').val(cstmrid);

        $('#ledgerModal').modal('show');

        $("#close-ledgerMdl").on('click', function () {

            $('#ledgerModal').modal('hide');
            $('#ledgerSave').val("Save");
            $("#ledgerForm")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });


    $("#ledgerTbl").on("click", "#ledgerDel", function () {
        var id = $(this).data("id");
        alert(id);

        $.ajax({
            url: "./forms/ledgerHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./credit.php");
            }
        })
    });


    // ==================== OTHERS PAGE ========================


    // --|| Campany||--***********************************************

    $("#companyModal").on("click", "#cmpnySave", function (event) {
        event.preventDefault();
        $.ajax({
            url: "./forms/compnyHandle.php",
            type: "post",
            data: $("#cmpnyForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#content-section").load("./others.php");
                $("#cmpnyForm")[0].reset();
                $('#companyModal').modal('hide');
            }
        })
    });


    $("#cmpnyTbl").on("click", "#cmpnyUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#cmpnySave').val("Update");
        //alert(id);
        $("#cmpnyId").val(id);
        $("#action").val(action);

        var name = row.closest('tr').find('td:eq(2)').text();
        $('#cmpnyname').val(name);


        var supplierid = row.closest('tr').find('td:eq(3)').text();

        $('#supplierId option').each(function () {
            if ($(this).data('suppliername') == supplierid) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        })

        // var supplierid = row.closest('tr').find('td:eq(3)').text();
        // $('#name').val(supplierid);

        $('#companyModal').modal('show');

        $("#close-cmpnyMdl").on('click', function () {

            $('#companyModal').modal('hide');
            $('#cmpnySave').val("Save");
            $("#cmpnyForm")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });

    $("#cmpnyTbl").on("click", "#cmpnyDel", function () {
        var id = $(this).data("id");
        $.ajax({
            url: "./forms/compnyHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./others.php");
            }
        })
    });


    // --|| Brand||--***********************************************

    $("#brandModal").on("click", "#brndSave", function (event) {
        event.preventDefault();
        $.ajax({
            url: "./forms/brndHandle.php",
            type: "post",
            data: $("#brndForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#content-section").load("./others.php");
                $("#brndForm")[0].reset();
                $('#brandModal').modal('hide');
            }
        })
    });


    $("#brndTbl").on("click", "#brndUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#brndSave').val("Update");        
        $("#brndId").val(id);
        $("#action").val(action);

        var name = row.closest('tr').find('td:eq(2)').text();
        $('#brndname').val(name);
        
        var cmpnyId = row.closest('tr').find('td:eq(3)').text();
        $('#cmpnyId option').each(function () {
            if ($(this).data('cmpnyname') == cmpnyId) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        })

        console.log('Form fields set: ', {
            brndId: $("#brndId").val(),
            name: $('#name').val(),
            cmpnyId: $('#cmpnyId').val()
        });
        
        // var cmpnyId = row.closest('tr').find('td:eq(3)').text(); $('#cmpnyId').val(cmpnyId);

        $('#brandModal').modal('show');
        $("#close-brndMdl").on('click', function () {

            $("#brndForm")[0].reset();
            $('#brandModal').modal('hide');
            $('#brndSave').val("Save");
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });

    $("#brndTbl").on("click", "#brndDel", function () {
        var id = $(this).data("id");
        alert(id);

        $.ajax({
            url: "./forms/brndHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./others.php");
            }
        })
    });

    // --|| Catagery||--***********************************************

    $("#catageryModal").on("click", "#ctgtySave", function (event) {
        event.preventDefault();
        $.ajax({
            url: "./forms/catgryHandle.php",
            type: "post",
            data: $("#ctgryForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#content-section").load("./others.php");
                $("#ctgryForm")[0].reset();
                $('#catageryModal').modal('hide');
            }
        })
    });


    $("#ctgryTbl").on("click", "#ctgryUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#ctgtySave').val("Update");
        $("#ctgtyId").val(id);
        $("#action").val(action);

        var name = row.closest('tr').find('td:eq(2)').text();
        $('#ctgtyname').val(name);

        $('#catageryModal').modal('show');

        $("#close-ctgryMdl").on('click', function () {

            $('#catageryModal').modal('hide');
            $('#ctgtySave').val("Save");
            $("#ctgryForm")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });

    $("#ctgryTbl").on("click", "#ctgryDel", function () {
        var id = $(this).data("id");
        $.ajax({
            url: "./forms/catgryHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./others.php");
            }
        })
    });


    // --|| Supplier||--***********************************************

    $("#supplierModal").on("click", "#slprSave", function (event) {
        event.preventDefault();
        $.ajax({
            url: "./forms/slprHandle.php",
            type: "post",
            data: $("#supplierForm").serialize(),
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, 's');
                $("#content-section").load("./others.php");
                $("#supplierForm")[0].reset();
                $('#supplierModal').modal('hide');
            }
        })
    });


    $("#slprTbl").on("click", "#slprUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#slprSave').val("Update");
        $("#slprId").val(id);
        $("#action").val(action);

        var fName = row.closest('tr').find('td:eq(2)').text(); $('#fName').val(fName);
        var lName = row.closest('tr').find('td:eq(3)').text(); $('#lName').val(lName);
        var name = row.closest('tr').find('td:eq(4)').text(); $("input[name='gender'][value='" + name + "']").prop('checked', true);
        var phnNo = row.closest('tr').find('td:eq(5)').text(); $('#phnNo').val(phnNo);
        var email = row.closest('tr').find('td:eq(6)').text(); $('#email').val(email);
        var nic = row.closest('tr').find('td:eq(7)').text(); $('#nic').val(nic);

        $('#supplierModal').modal('show');

        $("#close-splrMdl").on('click', function () {

            $('#supplierModal').modal('hide');
            $('#slprSave').val("Save");
            $("#supplierForm")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });

    $("#slprTbl").on("click", "#slprDel", function () {
        var id = $(this).data("id");
        $.ajax({
            url: "./forms/slprHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./others.php");
            }
        })
    });

   

    // ==================== ALL PRODUCT PAGE ========================

    // --|| Product||-- ***********************************************
    $("#productModal").on("click", "#prdctSave", function (event) {
        event.preventDefault();
        
        $.ajax({
            url: "./forms/prdctHandle.php",
            type: "post",
            data: $("#prdctFrom").serialize(),
            success: function (response) {
                try {
                    let data = JSON.parse(response);
                    if (data.status === 'success') {
                        showMessage(data, 's');
                    } else {
                        showMessage(data, 'e');
                    }
                } catch (e) {
                    console.error("Error parsing JSON response:", e);
                    console.error("Raw response:", response);
                    showMessage({ message: "An unexpected response was received. Please try again." }, 'e');
                }
                $("#prdctFrom")[0].reset();
                $('#productModal').modal('hide');
                $("#content-section").load("./allProduct.php");
            }
        });
    });
    
    
    // $("#productModal").on("click", "#prdctSave", function (event) {
    //     event.preventDefault();
    //     console.log("hi");
    //     $.ajax({
    //         url: "./forms/prdctHandle.php",
    //         type: "post",
    //         data: $("#prdctFrom").serialize(),
    //         success: function (response) {
    //             let data = JSON.parse(response);                
    //             showMessage(data, 's');
    //             $("#prdctFrom")[0].reset();
    //             $('#productModal').modal('hide');
    //             $("#content-section").load("./allProduct.php");
    //         }
    //     })
    // });

    $("#prdctTbl").on("click", "#prdctUpdate", function () {
        var row = $(this);
        var id = $(this).data("id");
        var action = $(this).data("action");
        $('#prdctSave').val("Update");
        $("#barcode").val(id);
        $("#action").val(action);

        var name = row.closest('tr').find('td:eq(2)').text();
        $('#prdctName').val(name);

        var cmpnyId = row.closest('tr').find('td:eq(3)').text();
        $('#cmpnyId option').each(function () {
            if ($(this).data('cmpnyname') == cmpnyId) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        });

        var brndId = row.closest('tr').find('td:eq(4)').text();
        $('#brndId option').each(function () {
            if ($(this).data('brndname') == brndId) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        });

        var ctgryId = row.closest('tr').find('td:eq(5)').text();
        $('#ctgryId option').each(function () {
            if ($(this).data('ctgryname') == ctgryId) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        });


        // var cmpnyId = row.closest('tr').find('td:eq(3)').text();    $('#cmpnyId').val(cmpnyId);
        // var brndId = row.closest('tr').find('td:eq(4)').text();     $('#brndId').val(brndId);
        // var ctgryId = row.closest('tr').find('td:eq(5)').text(); $('#ctgryId').val(ctgryId);

        var size = row.closest('tr').find('td:eq(6)').text(); $('#size').val(size);
        var unCst = row.closest('tr').find('td:eq(7)').text(); $('#unCst').val(unCst);
        var unPrc = row.closest('tr').find('td:eq(8)').text(); $('#unPrc').val(unPrc);
        var qty = row.closest('tr').find('td:eq(9)').text(); $('#qty').val(qty);
        var desc = row.closest('tr').find('td:eq(10)').text(); $('#desc').val(desc);

        $('#productModal').modal('show');

        $("#close-prdctMdl").on('click', function () {

            $('#productModal').modal('hide');
            $('#prdctSave').val("Save");
            $("#prdctFrom")[0].reset();
        });
        //console.log($("#id").val()); // Check if the value is assigned to the input field
    });


    $("#prdctTbl").on("click", "#prdctDel", function () {
        var id = $(this).data("id");


        $.ajax({
            url: "./forms/prdctHandle.php",
            type: "post",
            data: { id: id, del: "del" },
            success: function (response) {
                let data = JSON.parse(response);
                showMessage(data, '');
                $("#content-section").load("./allProduct.php");
            }
        })
    });

    // ==================== SALES PAGE ========================



    // ==================== STOCK IN PAGE ========================



    // ==================== STOCK OUT PAGE ========================




});