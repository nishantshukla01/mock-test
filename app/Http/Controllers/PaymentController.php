<?php

namespace App\Http\Controllers;

use App\encdec_paytm;
use App\Exam;
use App\GatewayResponse;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->merchant_key = config('app.paytm_merchant_key');
        $this->merchant_id = config('app.paytm_merchant_id');
        $this->txn_url = config('app.paytm_txn_url');
        $this->website = config('app.paytm_website');
        $this->industry_type_id = config('app.paytm_industry_type_id');
        $this->channel_id = config('app.paytm_channel_id');
    }

    function createOrder(Request $request, $id)
    {
        try {
            //            return $this->txn_url;
            $user = Auth::user();
            $exam = Exam::find(decrypt($id));
            $userid = $user->id;
            $userMOBILE_NO = $user->mobile;
            $userEMAIL = $user->email ? $user->email : '';
            $examid = $exam->id;
            $exam_cost = $exam->exam_cost;
            $order_id = rand(1000000000, 9999999999);
            /*Create new model for user and order no in Payment model*/
            $paymentMaster = new Payment();
            $paymentMaster->user_id = $userid;
            $paymentMaster->exam_id = $examid;
            $paymentMaster->amount = $exam_cost;
            $paymentMaster->order_no = $order_id;
            $paymentMaster->save();
            /* initialize an array with request parameters */
            $paytmParams = array(
                /* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
                "MID" => $this->merchant_id,
                /* Find your WEBSITE in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
                "WEBSITE" => $this->website,
                /* Find your INDUSTRY_TYPE_ID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
                "INDUSTRY_TYPE_ID" => $this->industry_type_id,
                /* WEB for website and WAP for Mobile-websites or App */
                "CHANNEL_ID" => $this->channel_id,
                /* Enter your unique order id */
                "ORDER_ID" => $order_id,
                /* unique id that belongs to your customer */
                "CUST_ID" => $userid,
                /* customer's mobile number */
                "MOBILE_NO" => $userMOBILE_NO,
                /* customer's email */
                "EMAIL" => $userEMAIL,
                "TXN_AMOUNT" => (float)$exam_cost,
                /* on completion of transaction, we will send you the response on this URL */
                "CALLBACK_URL" => route('payment.callback'),
            );
            $encdec_paytm = new encdec_paytm();
            $checksum = $encdec_paytm->getChecksumFromArray($paytmParams, $this->merchant_key);
            $url = 'https://securegw-stage.paytm.in/order/process';
            return view('Paytm.Payment', ['paytmParams' => $paytmParams, 'checksum' => $checksum, 'url' => $url]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'page' => 'Yhi', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function paymentCallback(Request $request)
    {
        DB::beginTransaction();
        try {

            $paytmChecksum = "";
            $paramList = array();
            $messageList = array();
            $isValidChecksum = "FALSE";

            $paramList = $_POST;
            $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

            //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
            $encdec_paytm = new encdec_paytm();
            $isValidChecksum = $encdec_paytm->verifychecksum_e($paramList, $this->merchant_key, $paytmChecksum); //will return TRUE or FALSE string.
            $messageList = [
                'TXNID' => $_POST['TXNID'] ?? '',
                'ORDERID' => $_POST['ORDERID'],
                'TXNAMOUNT' => $_POST['TXNAMOUNT'],
                'CURRENCY' => $_POST['CURRENCY'],
                'PAYMENTMODE' => $_POST['PAYMENTMODE'] ?? 'ONLINE',
                'RESPMSG' => $_POST['RESPMSG']
            ];
            $payments = Payment::where(['user_id' => Auth::id(), 'order_no' => $_POST['ORDERID']])->first();
            $payments->status = 'completed';
            $payments->save();
            DB::commit();
            $headerMsg = 'Transaction status is success';
            $slug = $payments->PaymentExam->slug;
            $redirect_to = route('client.mocktest.attempt', $slug);
            return view('Paytm.response', ['messageList' => $messageList, 'headerMsg' => $headerMsg, 'redirect_to' => $redirect_to]);

            if ($isValidChecksum == "TRUE") {
                if ($_POST["STATUS"] == "TXN_SUCCESS") {
                    $headerMsg = 'Transaction status is success';
                    $payments = Payment::where(['user_id' => Auth::id(), 'order_no' => $_POST['ORDERID']])->first();
                    $payments->status = 'completed';
                    $payments->save();
                    $gateway = new GatewayResponse();
                    $gateway->payment_id = $payments->id;
                    $gateway->TXNID = $_POST['TXNID'];
                    $gateway->CURRENCY = $_POST['CURRENCY'];
                    $gateway->GATEWAYNAME = $_POST['GATEWAYNAME'];
                    $gateway->RESPMSG = $_POST['RESPMSG'];
                    $gateway->BANKNAME = $_POST['BANKNAME'];
                    $gateway->PAYMENTMODE = $_POST['PAYMENTMODE'];
                    $gateway->MID = $_POST['MID'];
                    $gateway->RESPCODE = $_POST['RESPCODE'];
                    $gateway->TXNAMOUNT = $_POST['TXNAMOUNT'];
                    $gateway->ORDERID = $_POST['ORDERID'];
                    $gateway->STATUS = $_POST['STATUS'];
                    $gateway->BANKTXNID = $_POST['BANKTXNID'];
                    $gateway->TXNDATE = $_POST['TXNDATE'];
                    $gateway->save();
                    DB::commit();
                    $slug = $payments->PaymentExam->slug;
                    $redirect_to = route('client.mocktest.attempt', $slug);
                } elseif ($_POST["STATUS"] == "PENDING") {
                    $headerMsg = 'Transaction status is Pending';
                    //                    return $_POST['ORDERID'];
                    $payments = Payment::where(['user_id' => Auth::id(), 'order_no' => $_POST['ORDERID']])->first();
                    $payments->status = 'confirmation_pending';
                    $payments->save();
                    $gateway = new GatewayResponse();
                    $gateway->payment_id = $payments->id;
                    $gateway->CURRENCY = $_POST['CURRENCY'];
                    $gateway->GATEWAYNAME = $_POST['GATEWAYNAME'];
                    $gateway->RESPMSG = $_POST['RESPMSG'];
                    $gateway->BANKNAME = $_POST['BANKNAME'];
                    $gateway->PAYMENTMODE = $_POST['PAYMENTMODE'];
                    $gateway->MID = $_POST['MID'];
                    $gateway->RESPCODE = $_POST['RESPCODE'];
                    $gateway->TXNAMOUNT = $_POST['TXNAMOUNT'];
                    $gateway->ORDERID = $_POST['ORDERID'];
                    $gateway->STATUS = $_POST['STATUS'];
                    $gateway->BANKTXNID = $_POST['BANKTXNID'];
                    $gateway->TXNDATE = $_POST['TXNDATE'];
                    $gateway->save();
                    DB::commit();
                    $slug = $payments->PaymentExam->slug;
                    $redirect_to = route('client.mocktest.attempt', $slug);
                } else {
                    $headerMsg = 'Transaction status is failure';
                    //                    return $_POST['ORDERID'];
                    $payments = Payment::where(['user_id' => Auth::id(), 'order_no' => $_POST['ORDERID']])->first();
                    $payments->status = 'failed';
                    $payments->save();
                    $gateway = new GatewayResponse();
                    $gateway->payment_id = $payments->id;
                    $gateway->CURRENCY = $_POST['CURRENCY'];
                    $gateway->GATEWAYNAME = $_POST['GATEWAYNAME'];
                    $gateway->RESPMSG = $_POST['RESPMSG'];
                    $gateway->BANKNAME = $_POST['BANKNAME'];
                    $gateway->PAYMENTMODE = $_POST['PAYMENTMODE'];
                    $gateway->MID = $_POST['MID'];
                    $gateway->RESPCODE = $_POST['RESPCODE'];
                    $gateway->TXNAMOUNT = $_POST['TXNAMOUNT'];
                    $gateway->ORDERID = $_POST['ORDERID'];
                    $gateway->STATUS = $_POST['STATUS'];
                    $gateway->BANKTXNID = $_POST['BANKTXNID'];
                    $gateway->TXNDATE = $_POST['TXNDATE'];
                    $gateway->save();
                    DB::commit();
                    $slug = $payments->PaymentExam->slug;
                    $redirect_to = route('client.mocktest.attempt', $slug);
                }
                return view('Paytm.response', ['messageList' => $messageList, 'headerMsg' => $headerMsg, 'redirect_to' => $redirect_to]);
            } else {
                $headerMsg = 'Checksum mismatched';
                $payments = Payment::where(['user_id' => Auth::id(), 'order_no' => $_POST['ORDERID']])->first();
                $payments->status = 'suspicious';
                $payments->save();
                $gateway = new GatewayResponse();
                $gateway->payment_id = $payments->id;
                $gateway->CURRENCY = $_POST['CURRENCY'] ?? '';
                $gateway->GATEWAYNAME = $_POST['GATEWAYNAME'] ?? '';
                $gateway->RESPMSG = $_POST['RESPMSG'] ?? '';
                $gateway->BANKNAME = $_POST['BANKNAME'] ?? '';
                $gateway->PAYMENTMODE = $_POST['PAYMENTMODE'] ?? '';
                $gateway->MID = $_POST['MID'] ?? '';
                $gateway->RESPCODE = $_POST['RESPCODE'] ?? '';
                $gateway->TXNAMOUNT = $_POST['TXNAMOUNT'] ?? '';
                $gateway->ORDERID = $_POST['ORDERID'] ?? '';
                $gateway->STATUS = $_POST['STATUS'] ?? '';
                $gateway->BANKTXNID = $_POST['BANKTXNID'] ?? '';
                $gateway->TXNDATE = $_POST['TXNDATE'] ?? date('Y-m-d H:i:s');
                $gateway->save();
                DB::commit();
                $slug = $payments->PaymentExam->slug;
                $redirect_to = route('client.mocktest.attempt', $slug);
                //Process transaction as suspicious.
                return view('Paytm.response', ['messageList' => $messageList, 'headerMsg' => $headerMsg, 'redirect_to' => $redirect_to]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage(), 'line' => $exception->getLine()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
}
