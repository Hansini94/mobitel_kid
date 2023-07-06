<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Paymentconnection {

    function __construct() {
        $this->ci = & get_instance();    // get a reference to CodeIgniter.
    }

    // Define Variables
    // ----------------

    private $errorExists = false;             // Indicates if an error exists
    private $errorMessage;                    // The error message
    private $postData;                        // Data to be posted to the payment server
    private $responseMap;                     // Array of receipt data 
    private $secureHashSecret;                // Used for one way hashing in 3-party transactions
    private $hashInput;
    private $message;

    public function addDigitalOrderField($field, $value) {

        if (strlen($value) == 0)
            return false;      // Exit the function if no $value data is provided
        if (strlen($field) == 0)
            return false;      // Exit the function if no $value data is provided




            
// Add the digital order information to the data to be posted to the Payment Server
        $this->postData .= (($this->postData == "") ? "" : "&") . urlencode($field) . "=" . urlencode($value);

        // Add the key's value to the hash input (only used for 3 party)
        $this->hashInput .= $field . "=" . $value . "&";

        return true;
    }

    public function sendMOTODigitalOrder($vpcURL, $proxyHostAndPort = "", $proxyUserPwd = "") {
        $message = "";
        // Generate and Send Digital Order (& receive DR)
        // *******************************************************
        // Exit if there is no data to send to the Virtual Payment Client
        if (strlen($this->postData) == 0)
            return false;


        // Get a HTTPS connection to VPC Gateway and do transaction
        // turn on output buffering to stop response going to browser
        ob_start();

        // initialise Client URL object
        $ch = curl_init();

        // set the URL of the VPC
        curl_setopt($ch, CURLOPT_URL, $vpcURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postData);

        if (strlen($proxyHostAndPort) > 0) {
            if (strlen($proxyUserPwd) > 0) {
                // (optional) set the proxy IP address, port and proxy username and password
                curl_setopt($ch, CURLOPT_PROXY, $proxyHostAndPort, CURLOPT_PROXYUSERPWD, $proxyUserPwd);
            } else {
                // (optional) set the proxy IP address and port without proxy authentication
                curl_setopt($ch, CURLOPT_PROXY, $proxyHostAndPort);
            }
        }

        // (optional) certificate validation
        // trusted certificate file
        //curl_setopt($ch, CURLOPT_CAINFO, "c:/temp/ca-bundle.crt");
        //turn on/off cert validation
        // 0 = don't verify peer, 1 = do verify
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        // 0 = don't verify hostname, 1 = check for existence of hostame, 2 = verify
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        // connect
        curl_exec($ch);

        // get response
        $response = ob_get_contents();

        // turn output buffering off.
        ob_end_clean();

        // set up message paramter for error outputs
        $this->errorMessage = "";

        // serach if $response contains html error code
        if (strchr($response, "<HTML>") || strchr($response, "<html>")) {
            ;
            $this->errorMessage = $response;
        } else {
            // check for errors from curl
            if (curl_error($ch))
                $this->errorMessage = "curl_errno=" . curl_errno($ch) . " (" . curl_error($ch) . ")";
        }


        // close client URL
        curl_close($ch);

        // Extract the available receipt fields from the VPC Response
        // If not present then let the value be equal to 'No Value Returned'
        $this->responseMap = array();

        // process response if no errors
        if (strlen($message) == 0) {
            $pairArray = explode("&", $response);
            foreach ($pairArray as $pair) {
                $param = explode("=", $pair);
                $this->responseMap[urldecode($param[0])] = urldecode($param[1]);
            }

            return true;
        } else {

            return false;
        }
    }

    public function getDigitalOrder($vpcURL) {

        $redirectURL = $vpcURL . "?" . $this->postData;

        return $redirectURL;
    }

    public function decryptDR($digitalReceipt) {

        // Decrypt Digital Receipt
        // ********************************


        if (!$this->socketCreated)
            return false;        // Exit function if an the socket connection hasn't been created
        if ($this->errorExists)
            return false;           // Exit function if an error exists






            
// (This primary command to decrypt the Digital Receipt)
        $cmdResponse = $this->sendCommand("3,$digitalReceipt");

        if (substr($cmdResponse, 0, 1) != "1") {
            // Retrieve the Payment Client Error (There may be none to retrieve)
            $cmdResponse = $this->sendCommand("4,PaymentClient.Error");
            if (substr($cmdResponse, 0, 1) == "1") {
                $exception = substr($cmdResponse, 2);
            }

            $this->errorMessage = "(11) Digital Order has not created correctly - decryptDR($digitalReceipt) failed - $exception";
            $this->errorExists = true;

            return false;
        }

        // Set the socket timeout value to normal
        $this->payClientTimeout = $this->SHORT_SOCKET_TIMEOUT;

        // Automatically call the nextResult function
        $this->nextResult();

        return true;
    }

    public function getResultField($field) {


        return $this->null2unknown($field);


        //return substr($cmdResponse,0,1) == "1" ? substr($cmdResponse,2) : "";
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function setSecureSecret($secret) {
        $this->secureHashSecret = $secret;
    }

    public function hashAllFields() {
        $this->hashInput = rtrim($this->hashInput, "&");
        return strtoupper(hash_hmac('SHA256', $this->hashInput, pack("H*", $this->secureHashSecret)));
    }

    public function null2unknown($key) {

        // This subroutine takes a data String and returns a predefined value if empty
        // If data Sting is null, returns string "No Value Returned", else returns input
        // @param $in String containing the data String
        // @return String containing the output String

        if (array_key_exists($key, $this->responseMap)) {
            if (!is_null($this->responseMap[$key])) {
                return $this->responseMap[$key];
            }
        }
        return "No Value Returned";
    }

//  ----------------------------------------------------------------------------
// This function uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
   public function getResultDescription($responseCode) {

        switch ($responseCode) {
            case "0" : $result = "Transaction Successful";
                break;
            case "?" : $result = "Transaction status is unknown";
                break;
            case "E" : $result = "Referred";
                break;
            case "1" : $result = "Transaction Declined";
                break;
            case "2" : $result = "Bank Declined Transaction";
                break;
            case "3" : $result = "No Reply from Bank";
                break;
            case "4" : $result = "Expired Card";
                break;
            case "5" : $result = "Insufficient funds";
                break;
            case "6" : $result = "Error Communicating with Bank";
                break;
            case "7" : $result = "Payment Server detected an error";
                break;
            case "8" : $result = "Transaction Type Not Supported";
                break;
            case "9" : $result = "Bank declined transaction (Do not contact Bank)";
                break;
            case "A" : $result = "Transaction Aborted";
                break;
            case "B" : $result = "Fraud Risk Blocked";
                break;
            case "C" : $result = "Transaction Cancelled";
                break;
            case "D" : $result = "Deferred transaction has been received and is awaiting processing";
                break;
            case "E" : $result = "Transaction Declined - Refer to card issuer";
                break;
            case "F" : $result = "3D Secure Authentication failed";
                break;
            case "I" : $result = "Card Security Code verification failed";
                break;
            case "L" : $result = "Shopping Transaction Locked (Please try the transaction again later)";
                break;
            case "M" : $result = "Transaction Submitted (No response from acquirer)";
                break;
            case "N" : $result = "Cardholder is not enrolled in Authentication scheme";
                break;
            case "P" : $result = "Transaction has been received by the Payment Adaptor and is being processed";
                break;
            case "R" : $result = "Transaction was not processed - Reached limit of retry attempts allowed";
                break;
            case "S" : $result = "Duplicate SessionID (Amex Only)";
                break;
            case "T" : $result = "Address Verification Failed";
                break;
            case "U" : $result = "Card Security Code Failed";
                break;
            case "V" : $result = "Address Verification and Card Security Code Failed";
                break;
            default : $result = "Unable to be determined";
        }
        return $result;
    }

//  ----------------------------------------------------------------------------
// This function uses the QSI AVS Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.
// @param avsResultCode String containing the QSI AVS Result Code
// @return description String containing the appropriate description

   public function getAVSResultDescription($avsResultCode) {

        if ($avsResultCode != "") {
            switch ($avsResultCode) {
                Case "Unsupported" : $result = "AVS not supported or there was no AVS data provided";
                    break;
                Case "X" : $result = "Exact match - address and 9 digit ZIP/postal code";
                    break;
                Case "Y" : $result = "Exact match - address and 5 digit ZIP/postal code";
                    break;
                Case "W" : $result = "9 digit ZIP/postal code matched, Address not Matched";
                    break;
                Case "S" : $result = "Service not supported or address not verified (international transaction)";
                    break;
                Case "G" : $result = "Issuer does not participate in AVS (international transaction)";
                    break;
                Case "C" : $result = "Street Address and Postal Code not verified for International Transaction due to incompatible formats.";
                    break;
                Case "I" : $result = "Visa Only. Address information not verified for international transaction.";
                    break;
                Case "A" : $result = "Address match only";
                    break;
                Case "Z" : $result = "5 digit ZIP/postal code matched, Address not Matched";
                    break;
                Case "R" : $result = "Issuer system is unavailable";
                    break;
                Case "U" : $result = "Address unavailable or not verified";
                    break;
                Case "E" : $result = "Address and ZIP/postal code not provided";
                    break;
                Case "B" : $result = "Street Address match for international transaction. Postal Code not verified due to incompatible formats.";
                    break;
                Case "N" : $result = "Address and ZIP/postal code not matched";
                    break;
                Case "0" : $result = "AVS not requested";
                    break;
                Case "D" : $result = "Street Address and postal code match for international transaction.";
                    break;
                Case "M" : $result = "Street Address and postal code match for international transaction.";
                    break;
                Case "P" : $result = "Postal Codes match for international transaction but street address not verified due to incompatible formats.";
                    break;
                Case "K" : $result = "Card holder name only matches.";
                    break;
                Case "F" : $result = "Street address and postal code match. Applies to U.K. only.";
                    break;
                default : $result = "Unable to be determined";
            }
        } else {
            $result = "null response";
        }
        return $result;
    }

//  ----------------------------------------------------------------------------
// This function uses the QSI CSC Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.
// @param cscResultCode String containing the QSI CSC Result Code
// @return description String containing the appropriate description

   public function getCSCResultDescription($cscResultCode) {

        if ($cscResultCode != "") {
            switch ($cscResultCode) {
                Case "Unsupported" : $result = "CSC not supported or there was no CSC data provided";
                    break;
                Case "M" : $result = "Exact code match";
                    break;
                Case "S" : $result = "Merchant has indicated that CSC is not present on the card (MOTO situation)";
                    break;
                Case "P" : $result = "Code not processed";
                    break;
                Case "U" : $result = "Card issuer is not registered and/or certified";
                    break;
                Case "N" : $result = "Code invalid or not matched";
                    break;
                default : $result = "Unable to be determined";
                    break;
            }
        } else {
            $result = "null response";
        }
        return $result;
    }

}

?>
