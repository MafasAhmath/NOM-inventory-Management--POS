const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

//--|| Time Date ||--
function updateDateTime() {
    const now = new Date();

    const options = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
    const currentDateTime = now.toLocaleDateString('en-GB', options);

    document.querySelector('#datetime').textContent = currentDateTime;


}
setInterval(updateDateTime, 1000);



// function cstmtRefresh(event) {
//     event.preventDefault(); 
//     $('#cstmrTbl').load(location.href + " #cstmrTbl");
// }

// function dashboardPage() {
//     $("#content-section").load("./dashboard.php");
// }
// function POSPage() {
//     $("#content-section").load("./pos.php");
// }
// function salesPage() {
//     $("#content-section").load("./sales.php");
// }
// function productPage() {
//     $("#content-section").load("./allProduct.php");
// }
// function stkInPage() {
//     $("#content-section").load("./stockin.php");
// }
// function stkOutPage() {
//     $("#content-section").load("./stockout.php");
// }
// function creditPage() {
//     $("#content-section").load("./credit.php");
// }
// function reportPage() {
//     $("#content-section").load("./report.php");
// }
// function othersPage() {
//     $("#content-section").load("./others.php");
// }


//---- page change ----

// const btnDashboard = document.querySelector("#btnDashboard");
// const btnPOS = document.querySelector("#btnPOS");
// const btnSales = document.querySelector("#btnSales");
// const btnAllProduct = document.querySelector("#btnAllProduct");
// const btnStkIn = document.querySelector("#btnStkIn");
// const btnStkOut = document.querySelector("#btnStkOut");
// const btnCredit = document.querySelector("#btnCredit");
// const btnReport = document.querySelector("#btnReport");
// const btnOthers = document.querySelector("#btnOthers");



// function hideAllSections() {
//     const sections = document.querySelectorAll("section");
//     sections.forEach(section => {
//         section.classList.add("d-none");
//     });
// }

// function showSection(sectionId) {
//     hideAllSections();
//     const section = document.querySelector(sectionId);
//     section.classList.remove("d-none");
// }

// btnDashboard.addEventListener("click", function () {
//     showSection('#dashboard');
// });

// btnPOS.addEventListener("click", function () {
//     showSection('#pos');
// });

// btnSales.addEventListener("click", function () {
//     showSection('#sales');
// });

// btnAllProduct.addEventListener("click", function () {
//     showSection('#allProduct');
// });

// btnStkIn.addEventListener("click", function () {
//     showSection('#stkIn');
// });

// btnStkOut.addEventListener("click", function () {
//     showSection('#stkOut');
// });

// btnCredit.addEventListener("click", function () {
//     showSection('#credit');
// });

// btnReport.addEventListener("click", function () {
//     showSection('#report');
// });

// btnOthers.addEventListener("click", function () {
//     showSection('#others');
// });





// popup model


// document.addEventListener('DOMContentLoaded', function () {
//     const changeLink = document.querySelector('#btnUpdate');
//     const targetElement = document.querySelector('#customerModal');

//     // Add click event listener to the anchor tag
//     changeLink.addEventListener('click', function () {
//         // Change the value of the 'style' attribute of the target element
//         targetElement.setAttribute('style', 'display: block;');
//         targetElement.classList.add('show');
//         targetElement.setAttribute('aria-hidden', 'false');
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     // Check if cstmr_ID parameter exists in the URL
//     const urlParams = new URLSearchParams(window.location.search);
//     const cstmrID = urlParams.get('cstmr_ID');

//     if (cstmrID) {
//         // If cstmr_ID exists, execute the function
//         const targetElement = document.querySelector('#customerModal');

//         // Change the value of the 'style' attribute of the target element
//         targetElement.setAttribute('style', 'display: block;');
//         targetElement.classList.add('show');
//         targetElement.setAttribute('aria-hidden', 'false');
//     }
// });




// function goBack() {
//     window.history.back();
// }
// document.addEventListener('DOMContentLoaded', function () {
//     // Check if cstmr_ID parameter exists in the URL
//     const urlParams = new URLSearchParams(window.location.search);
//     const cstmrID = urlParams.get('cstmr_ID');

//     if (cstmrID) {
//         // If cstmr_ID exists, show the modal
//         const targetElement = document.querySelector('#customerModal');
//         targetElement.setAttribute('style', 'display: block;');
//         targetElement.classList.add('show');
//         targetElement.setAttribute('aria-hidden', 'false');

//         //showSection('#credit');
//         //goBack();
//         // Add click event listener to the close button of the modal
//         const closeButton = document.querySelector('#btn-close');
//         if (closeButton) {

//             closeButton.addEventListener('click', function () {
//                 goBack();
//                 showSection('#credit');
//                 //window.location.href = 'index.php'; 
//                 //event.preventDefault();
//                 /*const urlWithoutCstmrID = window.location.href.split('?')[0];
//                 history.replaceState({}, document.title, urlWithoutCstmrID);*/
//                 //targetElement.classList.remove('show');
//                 //targetElement.setAttribute('aria-hidden', 'true');

//             });

//             //showSection('#credit');
//         }


//     }
// });





