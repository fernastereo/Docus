//----------------------------------------------------------------------------
//
//  $Id: PrintLabel.js 38773 2015-09-17 11:45:41Z nmikalko $ 
//
// Project -------------------------------------------------------------------
//
//  DYMO Label Framework
//
// Content -------------------------------------------------------------------
//
//  DYMO Label Framework JavaScript Library Samples: Print label
//
//----------------------------------------------------------------------------
//
//  Copyright (c), 2010, Sanford, L.P. All Rights Reserved.
//
//----------------------------------------------------------------------------


var company = document.getElementById('company');
var codeDocument = document.getElementById('codedocument');
var daterec = document.getElementById('daterec');
var subject = document.getElementById('subject');
var sender = document.getElementById('sender');
var pages = document.getElementById('pages');
var copies = document.getElementById('copies');
var printButton = document.getElementById('printButton');

window.onload = function() {
    JsBarcode("#barcode", codeDocument.value);
    var barcode = document.getElementById("barcode");
    barcode.setAttribute("style", "width: 300px;");
};

printButton.addEventListener('click', (e) => {
    e.preventDefault();
    printJS('barcodeContainer', 'html');
});