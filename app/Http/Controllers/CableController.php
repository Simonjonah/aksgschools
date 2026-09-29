<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;

class CableController extends Controller
{
    //
    public function dstvsub(){
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=dstv');
        
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.dstvsub', compact('variations'));
        }
    
        return back()->with('error', 'Unable to fetch variations.');
    
    }



    public function verifydstv(Request $request){

            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                    'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                ])->post('https://sandbox.vtpass.com/api/merchant-verify', [
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
                // dd($responseData);
                $user = Cable::create([
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                    'ref_no' => substr(rand(0,time()),0, 9),
                    'name' => 'Admin',
                    'email' => Auth::guard('admin')->user()->email,
                    'user_id' => Auth::guard('admin')->user()->id,
                    'amount' => $request->amount,
                ]);

                return redirect()->route('admin.cablesub', ['ref_no' =>$user->ref_no]); 

            
            } catch (RequestException $e) {
    
                throw $e;
            }
        }

        public function cablesub($ref_no){
            $add_sub = Cable::where('ref_no', $ref_no)->first();

        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=dstv');
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.cablesub', compact('add_sub', 'variations'));

        }
    
        return back()->with('error', 'Unable to fetch variations.');
        }
    

        public function createcablesubsub(Request $request){
       
            // date_default_timezone_set('Africa/Lagos');
            // $currentTime = Carbon::now('Africa/Lagos')->format('YmdHi'); // e.g., 202412141630
            // // $currentTime = Carbon::now('Africa/Lagos')->setTimezone('Africa/Lagos')->format('h'); // e.g., 202412141630
            // $randomString = bin2hex(random_bytes(5)); // Generates a random string
            // $man =  $currentTime . $randomString;
            // dd($man);
          
                try {
                    $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                        'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                    ])->post('https://sandbox.vtpass.com/api/pay', [
                        'variation_amount' => $request->variation_amount,
                        'serviceID' => $request->serviceID,
                         "request_id" => $request->request_id,
                         'phone' => $request->phone,
                         'billersCode' => $request->billersCode,
                         'variation_code' => $request->variation_code,
                         'subscription_type' => $request->subscription_type,
                         'ref_no' => $request->ref_no,
                         
                        'callback_url' => route('transaction.callback'), 
        
                    ]);
                    
        
                    $responseData = json_decode($response->getBody()->getContents(), true);
                //    dd($responseData);
                // $cable = Cable::where('ref_no', $ref_no)->first();
                   

                    if ($responseData['code'] === '000') {
                        $transaction = $responseData['content']['transactions'];
                        if ($transaction['status'] == 'delivered') {
                            $totalAmount = $transaction['total_amount'];
                            $commission = $totalAmount * 0.01; // 1% of total_amount
                            $remainingBalance = $totalAmount - $commission;
                            // dd($cable);
                            $cable = Cable::create([
                                'status' => $transaction['status'],
                                'transaction_id' => $transaction['transactionId'],
                                'product_name' => $transaction['product_name'],
                                'unique_element' => $transaction['unique_element'],
                                'commission' => $transaction['commission'],
                                'total_amount' => $remainingBalance,
                                'balance' => $commission,
                                'type' => $transaction['type'],
                                'email' => $transaction['email'],
                                'phone' => $transaction['phone'],
                                'unit_price' => $transaction['unit_price'],
                                'quantity' => $transaction['quantity'],
                                'platform' => $transaction['platform'],
                                'method' => $transaction['method'],
                                'unit_price' => $transaction['unit_price'],
                                "request_id" => $request->request_id,
                                'serviceID' => $request->serviceID,
                                'name' => 'Admin',
                                'email' => Auth::guard('admin')->user()->email,
                                'user_id' => Auth::guard('admin')->user()->id,
                                'amount' => $request->amount,
                                'billersCode' => $request->billersCode,
                                'variation_code' => $request->variation_code,
                                'response_description' => $request->response_description,
                                'phone' => $request->phone,
                                'ref_no' => substr(rand(0,time()),0, 9),
                                'subscription_type' => $request->subscription_type,
                            ]);
        
                           
                
                        }elseif($transaction['content']['status'] === 'pending'){
                            $responseData = Cable::create([
                            'name' => 'Admin',
                            'email' => Auth::guard('admin')->user()->email,
                            'user_id' => Auth::guard('admin')->user()->id,
                            'amount' => $request->amount,
                            "request_id" => $request->request_id,
                            'serviceID' => $request->serviceID,
                            'phone' => $request->phone,
                            'status' => 'pending',
                            'ref_no' => substr(rand(0,time()),0, 9),
                        ]);
                        }elseif($transaction['content']['status'] === 'initiated'){
                            $responseData = Cable::create([
                                'name' => 'Admin',
                                'email' => Auth::guard('admin')->user()->email,
                                'user_id' => Auth::guard('admin')->user()->id,
                                'amount' => $request->amount,
                                "request_id" => $request->request_id,
    
                                'serviceID' => $request->serviceID,
                                'phone' => $request->phone,
                                'status' => 'pending',
                                'ref_no' => substr(rand(0,time()),0, 9),
                            ]); 
                        }
                    // dd($responseData);
        
                    if ($transaction['status'] == 'delivered') {
                        return redirect()->back()->with('success', 'Transaction  successful');
                    }
                    return redirect()->back()->with('fail', 'Transaction not successful');
            
                }
                return redirect()->back()->with('fail', 'Transaction not successful');
        
                } catch (RequestException $e) {
        
                    throw $e;
                }
            }

        public function gotv(){
            $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=gotv');
        
            if ($response->successful()) {
                $variations = $response->json()['content']['varations'];
                return view('dashboard.admin.vtu.gotv', compact('variations'));
            }
        
            return back()->with('error', 'Unable to fetch variations.');
        }


        public function showmaxtv(){

            try {
                // Example API request
                $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=showmax');
        
                if ($response->successful()) {
                    $variations = $response->json()['content']['varations'];
                    return view('dashboard.admin.vtu.showmaxtv', compact('variations'));
                }
              
            } catch (ConnectionException $e) {
                // Log the error for debugging
                Log::error('Connection error: ' . $e->getMessage());
        
                // Redirect to the home page with an error message
                return redirect('admin/home')->with('error', 'Unable to connect to the server. Please check your internet connection.');
            }

            $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=showmax');
        
            if ($response->successful()) {
                $variations = $response->json()['content']['varations'];
                return view('dashboard.admin.vtu.showmaxtv', compact('variations'));
            }
        
            return view('dashboard.admin.vtu.home');

        }
        

        public function startimesubtv(){
            $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=startimes');
        
            if ($response->successful()) {
                $variations = $response->json()['content']['varations'];
                return view('dashboard.admin.vtu.startimesubtv', compact('variations'));
            }
        
            return back()->with('error', 'Unable to fetch variations.');
        }

        
        
        public function verifygotv(Request $request){

            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                    'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                ])->post('https://sandbox.vtpass.com/api/merchant-verify', [
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
                // dd($responseData);
                $user = Cable::create([
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                    'ref_no' => substr(rand(0,time()),0, 9),
                    'name' => 'Admin',
                    'email' => Auth::guard('admin')->user()->email,
                    'user_id' => Auth::guard('admin')->user()->id,
                    'amount' => $request->amount,
                ]);

                return redirect()->route('admin.cablesubgotv', ['ref_no' =>$user->ref_no]); 

            
            } catch (RequestException $e) {
    
                throw $e;
            }
        }



        public function verifystartime(Request $request){

            try {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-key' => '7b52bc44745a46b5f32de1111dc7b490',
                    'secret-key' => 'SK_3141f63b14985c711dd7673e3cbdcdec61cfebd883c'
                ])->post('https://sandbox.vtpass.com/api/merchant-verify', [
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                ]);
                
    
                $responseData = json_decode($response->getBody()->getContents(), true);
                // dd($responseData);
                $user = Cable::create([
                    'billersCode' => $request->billersCode,
                    'serviceID' => $request->serviceID,
                    'ref_no' => substr(rand(0,time()),0, 9),
                    'name' => 'Admin',
                    'email' => Auth::guard('admin')->user()->email,
                    'user_id' => Auth::guard('admin')->user()->id,
                    'amount' => $request->amount,
                ]);

                return redirect()->route('admin.cablesubstatimes', ['ref_no' =>$user->ref_no]); 

            
            } catch (RequestException $e) {
    
                throw $e;
            }
        }

     
        public function cablesubgotv($ref_no){
            $add_sub = Cable::where('ref_no', $ref_no)->first();

        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=gotv');
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.cablesubgotv', compact('add_sub', 'variations'));

        }
    }

        public function cablesubstatimes($ref_no){
            $add_sub = Cable::where('ref_no', $ref_no)->first();
        $response = Http::get('https://sandbox.vtpass.com/api/service-variations?serviceID=startimes');
        if ($response->successful()) {
            $variations = $response->json()['content']['varations'];
            return view('dashboard.admin.vtu.cablesubstartimes', compact('add_sub', 'variations'));

        }
         
    }



    public function viewcablesub(){
            $view_cables = Cable::whereNotNull('status')->latest()->get();
        return view('dashboard.admin.vtu.viewcablesub', compact('view_cables'));
    }


    public function viewcable($ref_no){
        $view_cables = Cable::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.vtu.viewcable', compact('view_cables'));
    }



    public function deletecables($ref_no){
        $view_cables = Cable::where('ref_no', $ref_no)->delete();
    return redirect()->back()->with('success', 'You have deleted the subscription successfully');
    }

    
}
