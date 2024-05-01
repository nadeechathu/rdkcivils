<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Quotation;
use App\Models\EmailSender;
use App\Models\PropertyPart;
use Illuminate\Http\Request;
use App\Models\PropertyDesign;
use App\Http\Controllers\Controller;
use App\Models\Extension;
use App\Models\PropertyPartItem;
use App\Models\PropertyService;
use App\Models\QuotationExtension;
use App\Models\QuotationProfessional;
use App\Models\QuotationService;

class QuotationController extends Controller
{
    //get quotation UI loading
    public function loadQuotation(Request $request){

        try{

            $propertyDesigns = PropertyDesign::loadActiveDesign();
            $designParts = PropertyPart::loadActiveParts();
            $services = PropertyService::getActiveServices();
            $booking = 1;
            return view('frontend.quotation.quotation',compact('propertyDesigns','designParts','services','booking'));

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }

    public function bookingAppointment(Request $request){

        try{

            $propertyDesigns = PropertyDesign::loadActiveDesign();
            $designParts = PropertyPart::loadActiveParts();
            $services = PropertyService::getActiveServices();
            $booking = 2;
            return view('frontend.quotation.quotation',compact('propertyDesigns','designParts','services','booking'));

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }



    //  Quotation form submit
    public function submitQuotation(Request $request){
// dd($request->all());
        // Quotation types
        // $type = 1; // quotation
        // $type = 2; // booking
        // if($request->date){
        //     $type = 2;
        // }else{
        //     $type = 1;
        // }

        $validator = \Validator::make($request->all(),
            array(
                // 'design_id' => 'required',
                // 'extend_part_ids' => 'required',
                // 'extend_sub_part_id' => 'required',
                // 'design_process_start' => 'required',
                // 'other_service' => 'required',
                'first_name' => 'required',
                // 'last_name' => 'required',
                // 'address' => 'required',
                // 'post_code' => 'required',
                // 'email' => 'required|email',
                'contact' => 'required',
                // 'g-recaptcha-response' => 'required',
            )
        );



        if ($validator->fails())
        {

            $message = 'Please fillout the required fields';

            if(sizeof($validator->messages()) > 0){
                $message = $validator->messages()->first();

            }

            return response()->json([
                'status' => false,
                'message' => $message
            ]);

        }

        try{

            $quotation  = new Quotation;

            $quotation->design_id = $request->design_id ?? 0;
            $quotation->bed_rooms = $request->bed_rooms ?? 'Null';
            $quotation->design_process_start = $request->design_process_start ?? 'Null';
            // $quotation->other_service = $request->other_service;
            // $quotation->professionals = $request->professionals;
            $quotation->expecting_service = $request->expecting_service ?? 'Null';
            $quotation->first_name = $request->first_name;
            $quotation->last_name = $request->last_name  ?? 'Null';
            $quotation->address = $request->address  ?? 'Null';
            $quotation->post_code = $request->post_code  ?? 'Null';
            $quotation->email = $request->email  ?? 'Null';
            $quotation->contact = $request->contact;
            $quotation->message = $request->message  ?? 'Null';
            $quotation->hear_about_us = $request->hear_about_us  ?? 'Null';
            $quotation->keep_me_update = $request->keep_me_update  ?? 'Null';
            $quotation->date = $request->date ?? '';
            $quotation->time = $request->time ?? '';
            $quotation->quotation_type = $request->type;
            $savedQuotation = Quotation::create($quotation->toArray());


            //updating reference id
            $referenceNo = "RDK-REF-".$savedQuotation->id;
            Quotation::where('id',$savedQuotation->id)->update(['reference_id'=>$referenceNo]);

            //saving extensions
            if($request->extend_part_ids != null){

                foreach($request->extend_part_ids as $partItemId){
                    $propertyPartItem = PropertyPartItem::where('id',$partItemId)->get()->first();

                    if($propertyPartItem != null){

                        $extension = new QuotationExtension;

                        $extension->quotation_id = $savedQuotation->id;
                        $extension->property_part_item_id = $partItemId;
                        $extension->property_part_id = $propertyPartItem->property_parts_id;

                        QuotationExtension::create($extension->toArray());
                    }
                }
            }

            //saving services
            if($request->other_service != null){

                $selectedServiceIds = explode(',',$request->other_service);
                $selectedServiceIds = array_filter($selectedServiceIds);

                foreach($selectedServiceIds as $selectedServiceId){

                    $service = new QuotationService;

                    $service->quotation_id = $savedQuotation->id;
                    $service->property_service_id = $selectedServiceId;

                    QuotationService::create($service->toArray());
                }
            }

            //saving professionals
            if($request->professionals != null){

                $selectedProfessionalIds = explode(',',$request->professionals);
                $selectedProfessionalIds = array_filter($selectedProfessionalIds);

                foreach($selectedProfessionalIds as $selectedProfessionalId){

                    $professional  = new QuotationProfessional;

                    $professional->quotation_id = $savedQuotation->id;
                    $professional->property_service_item_id = $selectedProfessionalId;

                    QuotationProfessional::create($professional->toArray());
                }
            }


            //sending email alerts
            EmailSender::sendQuotationEmail($savedQuotation->id);

            if($savedQuotation->quotation_type == 1) {

                return response()->json([
                    'status' => true,
                    'message' => 'We have received your quotation request, we will get back to you within 24 hours.'
                ]);

            } else {

                return response()->json([
                    'status' => true,
                    'message' => 'We have received your free call appointment request, we will get back to you soon.'
                ]);

            }

        } catch(\Exception $exception){

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please contact support'
            ]);
        }

    }

}
