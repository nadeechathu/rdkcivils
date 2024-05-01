<?php

namespace App\Models;

use Log;
use URL;
use Mail;
use App\Mail\ReviewEmail;
use App\Models\Quotation;
use App\Models\UserInquiry;
use App\Mail\QuotationEmail;
use App\Mail\UserInquiryMail;
use App\Mail\RegistrationEmail;
use App\Mail\QuotationEmailCustomer;
use App\Mail\RegistrationApprovalEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailSender extends Model
{
    use HasFactory;


    public static function sendUserInquryEmail($inquiryId){


        Log::channel('email_log')->info("[Inquiry email] ====> Received request to send inquiry placed email for the inquiry id == ".$inquiryId);

        $response = response()->json([]);

        try{


            $inquiry = UserInquiry::where('id',$inquiryId)->get()->first();

            if($inquiry != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $details = array(
                    'subject' => $inquiry->subject." - ".config('app.name')." - Inquiry Submitted",
                    'email' =>  $inquiry->email,
                    'name' =>  $inquiry->first_name.' '.$inquiry->last_name,
                    'phone' =>  $inquiry->phone,
                    'message' => $inquiry->message,
                    'introduction' => 'Hi '.$inquiry->first_name.',',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => false

                );

                Mail::to($inquiry->email)->send(new UserInquiryMail($details));



                $inquiryEmailSettings = GeneralSetting::getSettingByKey('inquiry_email');

                $inquiryEmails = explode(',',$inquiryEmailSettings->description);

                $inquiryEmails = array_filter($inquiryEmails);

                $adminInquiryDetails = array(
                    'subject' => $inquiry->subject." - ".config('app.name')." - New Inquiry Received",
                    'email' =>  $inquiry->email,
                    'name' =>  $inquiry->first_name,
                    'phone' =>  $inquiry->phone,
                    'message' => $inquiry->message,
                    'introduction' => 'Hello, ',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => true

                );

                foreach($inquiryEmails as $inquiryEmail){

                    if($inquiryEmail != null){

                        Mail::to($inquiryEmail)->send(new UserInquiryMail($adminInquiryDetails));

                    }

                }

                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Inquiry confirmation mail sent successfully to email - '.$inquiry->email

                ]);

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the Inquiry for id - '.$inquiryId

                ]);
            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Inquiry email] ====>  Error occured when sending inquiry email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Inquiry email] ====>  Returning response == ".json_encode($response));

        return $response;

    }

    public static function sendRegistrationEmail($userId, $password, $adminCreated){


        Log::channel('email_log')->info("[Registration Email] ====> Received request to send user registration email for the user id == ".$userId);

        $response = response()->json([]);

        try{


            $user = User::where('id',$userId)->get()->first();

            if($user != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $details = array(
                    'subject' => config('app.name')." - Account Created ",
                    'email' =>  $user->email,
                    'introduction' => 'Hi '. $user->first_name.',',
                    'link' =>  URL::to('/client-login'),
                    'contact_link' => URL::to('/contact-us'),
                    'logo' => URL::to($siteLogo->description),
                    'user' => $user,
                    'password' => $password,
                    'admin_created' => $adminCreated,
                    'is_admin' => false,

                );

                Mail::to($user->email)->send(new RegistrationEmail($details));

                //sending admin email
                $adminDetails = array(
                    'subject' => config('app.name')." - New Customer Registration",
                    'introduction' => 'Hi,',
                    'logo' => URL::to($siteLogo->description),
                    'user' => $user,
                    'is_admin' => true,

                );

                $adminEmails = GeneralSetting::getSettingByKey('admin_emails');

                $adminEmails = explode(',',$adminEmails->description);

                $adminEmails = array_filter($adminEmails);

                foreach($adminEmails as $adminEmail){

                    if($adminEmail != null){

                        Mail::to($adminEmail)->send(new RegistrationEmail($adminDetails));
                    }
                }



                $response = response()->json([
                    'status' => 'success',
                    'message' => 'User registration email successfully to email - '.$user->email

                ]);

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the user for id - '.$userId

                ]);
            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Registration Email] ====>  Error occured when sending registration email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Registration Email] ====>  Returning response == ".json_encode($response));

        return $response;

    }

    public static function sendRegistrationApprovalEmail($userId){


        Log::channel('email_log')->info("[Registration Approval Email] ====> Received request to send user registration approval email for the user id == ".$userId);

        $response = response()->json([]);

        try{


            $user = User::where('id',$userId)->get()->first();

            if($user != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $details = array(
                    'subject' => config('app.name')." - Registration Approved ",
                    'email' =>  $user->email,
                    'introduction' => 'Hi '. $user->first_name.',',
                    'link' =>  URL::to('/client-login'),
                    'contact_link' => URL::to('/contact-us'),
                    'logo' => URL::to($siteLogo->description),
                    'user' => $user

                );

                Mail::to($user->email)->send(new RegistrationApprovalEmail($details));

                $response = response()->json([
                    'status' => 'success',
                    'message' => 'User registration email successfully to email - '.$user->email

                ]);

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the user for id - '.$userId

                ]);
            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Registration Approval Email] ====>  Error occured when sending registration approval email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Registration Approval Email] ====>  Returning response == ".json_encode($response));

        return $response;

    }

    //  Send quotation email to admin & customer
    public static function sendQuotationEmail($quotationId){

        Log::channel('email_log')->info("[Quotation Email] ====> Received request to quotation placed email for the quotation == ".$quotationId);

        $response = response()->json([]);

        try{


            $quotation = Quotation::with('design')->where('id',$quotationId)->get()->first();
            // $loadQuotations = Quotation::loadQuotations();



            $extensionPartItemIds = QuotationExtension::where('quotation_id',$quotation->id)->pluck('property_part_item_id')->toArray();

            $quotation->extensions = PropertyPartItem::whereIn('id',$extensionPartItemIds)->get();

            $extensionPartIds = QuotationExtension::where('quotation_id',$quotation->id)->pluck('property_part_id')->toArray();

            $quotation->parts = PropertyPart::whereIn('id',$extensionPartIds)->get();

            $propertyServiceIds = QuotationService::where('quotation_id',$quotation->id)->pluck('property_service_id')->toArray();

            $quotation->services = PropertyService::whereIn('id',$propertyServiceIds)->get();

            $professionalIds = QuotationProfessional::where('quotation_id',$quotation->id)->pluck('property_service_item_id')->toArray();

            $quotation->professionals = PropertyServiceItem::whereIn('id',$professionalIds)->get();




            if($quotation != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $details = array(
                    'subject' => $quotation->quotation_type == 1 ? $quotation->reference_id." -  Quotation Request" : $quotation->reference_id." - Free Call Appointment ",
                    'email' =>  $quotation->email,
                    'reference_id'=>$quotation->reference_id,
                    'name' =>  $quotation->first_name.' '.$quotation->last_name,
                    'phone' =>  $quotation->contact,
                    'message' => $quotation->message,
                    'introduction' => 'Hi '.$quotation->first_name.',',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => false,
                     'quotationDetails' => $quotation,
                    'is_quotation' => $quotation->quotation_type == 1 ? true : false

                );

                Log::channel('email_log')->info("[Quotation Email] ====> Sending customer quotation email == ".$quotation->email);

                Mail::to($quotation->email)->send(new QuotationEmailCustomer($details));

                $adminEmailSettings = GeneralSetting::getSettingByKey('inquiry_email');

                $adminEmails = explode(',',$adminEmailSettings->description);

                $adminEmail = array_filter($adminEmails);

                $adminDetails = array(
                    'subject' => $quotation->quotation_type == 1 ? $quotation->reference_id." - New Quotation Request Received " : $quotation->reference_id." - New Free Call Request Received ",
                    'email' =>  $quotation->email,
                    'reference_id'=>$quotation->reference_id,
                    'name' =>  $quotation->first_name,
                    'phone' =>  $quotation->phone,
                    'message' => $quotation->message,
                    'introduction' => 'Hello.!, ',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => true,
                    'quotationDetails' => $quotation,
                    'is_quotation' => $quotation->quotation_type == 1 ? true : false

                );



                $adminEmails = GeneralSetting::getSettingByKey('admin_emails');

                $adminEmails = explode(',',$adminEmails->description);

                $adminEmails = array_filter($adminEmails);

                foreach($adminEmails as $adminEmail){

                    if($adminEmail != null){

                        Log::channel('email_log')->info("[Quotation Email] ====> Sending admin quotation email == ".$adminEmail);

                        Mail::to($adminEmail)->send(new QuotationEmail($adminDetails));
                    }
                }

                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Quotation Email confirmation mail sent successfully'

                ]);

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the Quotation for id - '.$quotationId

                ]);
            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Inquiry email] ====>  Error occured when sending inquiry email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Inquiry email] ====>  Returning response == ".json_encode($response));

        return $response;

    }

    // send customer review reply

    public static function sendCustomerReviewReply($reviewId){
        Log::channel('email_log')->info("[Customer review  Email] ====> New review added by customer  == ".$reviewId);

        $response = response()->json([]);

        try{

            $getReview = Testimonial::where('id', $reviewId)->first();

            if($getReview != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $reviewData = array(

                    'subject' => " RDK - Thank you for the review ",
                    'email' =>  $getReview->email,
                    'name' =>  $getReview->name,
                    'message' => $getReview->description,
                    'introduction' => 'Hi '.$getReview->name.',',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => false,
                    'rating' => $getReview->rating ,

                );

                Mail::to($getReview->email)->send(new ReviewEmail($reviewData));
              
                $adminEmailSettings = GeneralSetting::getSettingByKey('inquiry_email');

                $adminEmails = explode(',',$adminEmailSettings->description);

                $adminEmail = array_filter($adminEmails);

                $reviewData = array(

                    'subject' => " RDK - New customer review ",
                    'email' =>  $getReview->email,
                    'name' =>  $getReview->name,
                    'message' => $getReview->description,
                    'introduction' => 'Hello, ',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => true,
                    'rating' => $getReview->rating ,

                );

                $adminEmails = GeneralSetting::getSettingByKey('admin_emails');

                $adminEmails = explode(',',$adminEmails->description);

                $adminEmails = array_filter($adminEmails);

                foreach($adminEmails as $adminEmail){

                    if($adminEmail != null){

                        Mail::to($adminEmail)->send(new ReviewEmail($reviewData));
                    }
                }

               return  $response = response()->json([
                    'status' => 'success',
                    'message' => 'Testimonial Email sent successfully'

                ]);

            }else{

                 return $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the testimonial for id - '.$reviewId

                ]);

            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Review email] ====>  Error occured when sending review email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

    }



}
