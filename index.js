


const functions = require('firebase-functions');
const express = require('express');
const bodyParser = require('body-parser');
//const arksel = import(com.arksel);


const app = express();
//app.apply.package(com.arksel);
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

app.post('/ussd', (req, res) => {
    // Read the variables sent via POST from our API
    const {
        sessionId,
        serviceCode,
        text,
    } = req.body;

    let response = '';

    if (text == '') {
        // This is the first request. Note how we start the response with CON
      response = `CON Welcome to Ritcas! 
      What would you like to check ?
      1. Account Balance
      1. Meter Reading`;
    } else if ( text == '1') {
        //Business logic for first level response
      response = `CON Choose account information you want to view
      2. Meter Account Balance
      3. Meter Reading`;
    //} else if ( text == '2') {
        // Business logic for first level response
      //  $CreditBalance = '1400'
        // This is a terminal request. Note how we start the response with END
      //response = `END Your meter number is ${CreditBalance}`;
    } else if ( text == '1*2') {
        // This is a second level response where the user selected 1 in the first instance
        const AccountBalance = '1001';
        // This is a terminal request. Note how we start the response with END
        response = `END Your account number is ${AccountBalance}`
    } else if ( text == '1*3') {
        // This is a second level response where the user selected 1 in the first instance
        const MeterReading = '1400';
        // This is a terminal request. Note how we start the response with END
        response = `END Your Credit Balance is ${MeterReading}`
    
    }

    // Send the response back to the API
    res.set('Content-Type: text/plain');
    res.send(response)
})

    // // Create and Deploy Your First Cloud Functions
// // https://firebase.google.com/docs/functions/write-firebase-functions
//
exports.ussd = functions.https.onRequest(app); 
     

 