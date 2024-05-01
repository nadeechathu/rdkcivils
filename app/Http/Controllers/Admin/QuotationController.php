<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Exception;
use App\Models\Quotation;
use App\Models\PropertyPart;
use Illuminate\Http\Request;
use App\Models\PropertyDesign;
use App\Models\PropertyService;
use App\Models\PropertyPartItem;
use App\Models\PropertyServiceItem;
use App\Http\Controllers\Controller;
use App\Models\QuotationExtension;
use App\Models\QuotationProfessional;
use App\Models\QuotationService;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //  *** Load all quotations
    public function loadAllQuotation()
    {

        $hasPermission = Auth::user()->hasPermission('view_quotations');

        if ($hasPermission) {



            $loadQuotations = Quotation::loadQuotations();

            foreach ($loadQuotations as $quotation) {

                $extensionPartItemIds = QuotationExtension::where('quotation_id', $quotation->id)->pluck('property_part_item_id')->toArray();

                $quotation->extensions = PropertyPartItem::whereIn('id', $extensionPartItemIds)->get();

                $extensionPartIds = QuotationExtension::where('quotation_id', $quotation->id)->pluck('property_part_id')->toArray();

                $quotation->parts = PropertyPart::whereIn('id', $extensionPartIds)->get();

                $propertyServiceIds = QuotationService::where('quotation_id', $quotation->id)->pluck('property_service_id')->toArray();

                $quotation->services = PropertyService::whereIn('id', $propertyServiceIds)->get();

                $professionalIds = QuotationProfessional::where('quotation_id', $quotation->id)->pluck('property_service_item_id')->toArray();

                $quotation->professionals = PropertyServiceItem::whereIn('id', $professionalIds)->get();
            }

            return  view('admin.quotations.all_quotations.all_quotations', compact('loadQuotations'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    //  *** Load Property Design
    public function loadAllPropertyDesigns()
    {

        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            $allPropertyDesigns =  PropertyDesign::getAllQuotations();
            return  view('admin.quotations.property_designs.all_property_designs', compact('allPropertyDesigns'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    //  *** Create UI Property Design
    public function createPropertyDesign()
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            return view('admin.quotations.property_designs.components.new_property_design');
        } else {

            return redirect('admin/not_allowed');
        }
    }

    //  *** Store property design data
    public function storePropertyDesign(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'design_name' => 'required',
                'icon_1' => 'required | max:2048 | dimensions:ratio=1/1 ',
                'icon_2' => 'required | max:2048 | dimensions:ratio=1/1',
                'image' => 'required | max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required',
                'is_active' => 'required',
            ]);

            try {

                $iconUrl1 = "";
                if ($request->icon_1) {
                    $imageName = $request->design_name . time() . 'icon-1.' . $request->icon_1->getClientOriginalName();
                    $request->icon_1->move(public_path('images/uploads/quotations/'), $imageName);
                    $iconUrl1 = 'images/uploads/quotations/' . $imageName;
                }
                $iconUrl2 = "";
                if ($request->icon_2) {
                    $imageName = $request->design_name . time() . 'icon-2.' . $request->icon_2->getClientOriginalName();
                    $request->icon_2->move(public_path('images/uploads/quotations/'), $imageName);
                    $iconUrl2 = 'images/uploads/quotations/' . $imageName;
                }
                $imageUrl = "";
                if ($request->image) {
                    $imageName = $request->design_name . time() . 'd-img.' . $request->image->getClientOriginalName();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;
                }

                $propertyDesign = new PropertyDesign();
                $propertyDesign->design_name = $request->design_name;
                $propertyDesign->icon_1 = $iconUrl1;
                $propertyDesign->icon_2 = $iconUrl2;
                $propertyDesign->image =  $imageUrl;
                $propertyDesign->description = $request->description;
                $propertyDesign->is_active = $request->is_active;
                $propertyDesign->save();

                return back()->with('success', 'Property design is create successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Update property design data
    public function updatePropertyDesign(Request $request)
    {


        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'design_name' => 'required',
                'icon_1' => ' max:2048 | dimensions:ratio=1/1 ',
                'icon_2' => ' max:2048 | dimensions:ratio=1/1',
                'image' => ' max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required',
                'is_active' => 'required',
            ]);

            try {


                $getPropertyDesign = PropertyDesign::where('id', $request->id)->first();



                if ($request->icon_1) {
                    $imageName = time() . 'icon-1.' . $request->icon_1->getClientOriginalName();
                    $request->icon_1->move(public_path('images/uploads/quotations/'), $imageName);
                    $iconUrl1 = 'images/uploads/quotations/' . $imageName;

                    $getPropertyDesign->icon_1 = $iconUrl1;
                }

                if ($request->icon_2) {
                    $imageName = time() . 'icon-2.' . $request->icon_2->getClientOriginalName();
                    $request->icon_2->move(public_path('images/uploads/quotations/'), $imageName);
                    $iconUrl2 = 'images/uploads/quotations/' . $imageName;

                    $getPropertyDesign->icon_2 = $iconUrl2;
                }

                if ($request->image) {
                    $imageName = time() . 'd-img.' . $request->image->getClientOriginalName();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;

                    $getPropertyDesign->image =  $imageUrl;
                }

                $getPropertyDesign->design_name = $request->design_name;
                $getPropertyDesign->description = $request->description;
                $getPropertyDesign->is_active = $request->is_active;
                $getPropertyDesign->save();

                return back()->with('success', 'Property design is update successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    //  *** Delete property design data
    public function deletePropertyDesign($id)
    {


        $hasPermission = Auth::user()->hasPermission('delete_quotation_config');

        if ($hasPermission) {

            $getPropertyDesign = PropertyDesign::where('id', $id)->first();
            $getPropertyDesign->delete();
            return back()->with('success', 'Property design is delete successfully');
        } else {

            return redirect('admin/not_allowed');
        }
    }




    //  *** Load property parts data
    public function loadAllPropertyParts()
    {

        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            $allPropertyParts =  PropertyPart::getAllPropertyParts();
            return  view('admin.quotations.property_parts.all_property_parts', compact('allPropertyParts'));
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Create UI Property Design
    public function createPropertyParts()
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            return view('admin.quotations.property_parts.components.new_property_parts');
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Store property parts data
    public function storePropertyParts(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'part_name' => 'required',
                'image' => 'required | max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required',
                'is_active' => 'required',
            ]);

            try {


                $imageUrl = "";
                if ($request->image) {
                    $imageName = time() . 'img.' . $request->image->extension();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;
                }

                $propertyDesign = new PropertyPart();
                $propertyDesign->part_name = $request->part_name;
                $propertyDesign->image =  $imageUrl;
                $propertyDesign->description = $request->description;
                $propertyDesign->is_active = $request->is_active;
                $propertyDesign->save();
                return back()->with('success', 'Property Parts is create successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    // *** Property parts update
    public function updatePropertyParts(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {


            $request->validate([
                'part_name' => 'required',
                'image' => 'max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required',
                'is_active' => 'required',
            ]);


            try {



                $propertyPart = PropertyPart::getPropertyPart($request->id);

                if ($request->image) {
                    $imageName = time() . 'img.' . $request->image->extension();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;
                    $propertyPart->image =  $imageUrl;
                }

                $propertyPart->part_name = $request->part_name;

                $propertyPart->description = $request->description;
                $propertyPart->is_active = $request->is_active;
                $propertyPart->save();
                return back()->with('success', 'Property Parts is update successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    //  *** Delete property part data
    public function deletePropertyParts($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_quotation_config');

        if ($hasPermission) {

            $getPropertyPart = PropertyPart::where('id', $id)->first();
            $getPropertyPart->delete();
            return back()->with('success', 'Property parts is delete successfully');
        } else {

            return redirect('admin/not_allowed');
        }
    }



    // *** Load all property item parts for index
    public function loadAllPropertyItemParts()
    {

        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            $propertyPartList = PropertyPart::where('is_active', 1)->get();
            $allPropertyPartItems =  PropertyPartItem::loadAllPropertyItems();
            return  view('admin.quotations.property_part_items.all_property_part_items', compact('allPropertyPartItems', 'propertyPartList'));
        } else {

            return redirect('admin/not_allowed');
        }
    }



    // *** Store property part items
    public function storePropertyItemParts(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'property_parts_id' => 'required',
                'part_item_name' => 'required',
                'image' => 'required | max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required ',
                'is_active' => 'required',

            ]);


            try {

                $imageUrl = "";
                if ($request->image) {
                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;
                }

                $propertyItemPart = new PropertyPartItem();
                $propertyItemPart->property_parts_id = $request->property_parts_id;
                $propertyItemPart->part_item_name = $request->part_item_name;
                $propertyItemPart->image =  $imageUrl;
                $propertyItemPart->description = $request->description;
                $propertyItemPart->is_active = $request->is_active;
                $propertyItemPart->save();
                return back()->with('success', 'Property Parts item is create successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** update property part items
    public function updatePropertyItemParts(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'property_parts_id' => 'required',
                'part_item_name' => 'required  ',
                'image' => 'max:2048 | dimensions:ratio=1/1',
                // 'description' => 'required',
                'is_active' => 'required',

            ]);

            try {


                $imageUrl = "";
                if ($request->image) {
                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('images/uploads/quotations/'), $imageName);
                    $imageUrl = 'images/uploads/quotations/' . $imageName;
                }

                $propertyItemPart = PropertyPartItem::getPropertyPartItem($request->id);
                $propertyItemPart->property_parts_id = $request->property_parts_id;
                $propertyItemPart->part_item_name = $request->part_item_name;
                $propertyItemPart->image =  $imageUrl;
                $propertyItemPart->description = $request->description;
                $propertyItemPart->is_active = $request->is_active;
                $propertyItemPart->save();
                return back()->with('success', 'Property Parts item is update successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    public function deletePropertyItemParts($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_quotation_config');

        if ($hasPermission) {

            try {
                $propertyItemPart = PropertyPartItem::getPropertyPartItem($id);
                $propertyItemPart->delete();
                return back()->with('success', 'Property Parts item is delete successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    // *** Load all property item parts for index
    public function loadAllPropertyService()
    {

        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            $allServices = PropertyService::loadServices();
            return view('admin.quotations.property_services.all_property_services', compact('allServices'));
        } else {

            return redirect('admin/not_allowed');
        }
    }


    // *** store property service
    public function storePropertyService(Request $request)
    {


        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {


            $request->validate([
                'property_service_name' => 'required',
                // 'description' =>  'required',
                'allow_comments' => 'required',
                'is_active' => 'required',
            ]);

            try {
                $propertyService =  new PropertyService();
                $propertyService->property_service_name = $request->property_service_name;
                $propertyService->description =  $request->description;
                $propertyService->allow_comments =  $request->allow_comments;
                $propertyService->is_active =  $request->is_active;
                $propertyService->save();
                return back()->with('success', 'Property service is create successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Property Service update
    public function updatePropertyService(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {

            $request->validate([
                'property_service_name' => 'required',
                // 'description' =>  'required',
                'allow_comments' => 'required',
                'is_active' => 'required',
            ]);

            try {
                $propertyService = PropertyService::getService($request->id);
                $propertyService->property_service_name = $request->property_service_name;
                $propertyService->description =  $request->description;
                $propertyService->allow_comments =  $request->allow_comments;
                $propertyService->is_active =  $request->is_active;
                $propertyService->save();
                return back()->with('success', 'Property service is update successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    // *** Property service Delete
    public function deletePropertyService($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_quotation_config');

        if ($hasPermission) {

            try {
                $propertyService = PropertyService::getService($id);
                $propertyService->delete();
                return back()->with('success', 'Property service item is delete successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }



    // *** Load all property service item  for index
    public function loadAllPropertyServiceItem()
    {


        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            $loadServiceItems = PropertyServiceItem::loadServiceItems();
            $getActiveServices = PropertyService::where('is_active', 1)->where('allow_comments', 1)->get();
            return view('admin.quotations.property_services_items.all_service_items', compact('getActiveServices', 'loadServiceItems'));
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Property service item store
    public function storePropertyServiceItem(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {


            $request->validate([
                'property_service_id' => 'required',
                'property_service_item_name' => 'required',
                'is_active' => 'required',
            ]);


            try {
                $serviceItem = new PropertyServiceItem();
                $serviceItem->property_service_id = $request->property_service_id;
                $serviceItem->property_service_item_name = $request->property_service_item_name;
                $serviceItem->description = $request->description;
                $serviceItem->is_active = $request->is_active;
                $serviceItem->save();
                return back()->with('success', 'Property service item is create successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //  *** Property service item update
    public function updatePropertyServiceItem(Request $request)
    {


        $hasPermission = Auth::user()->hasPermission('edit_quotation_config');

        if ($hasPermission) {


            $request->validate([
                'property_service_id' => 'required',
                'property_service_item_name' => 'required',
                'is_active' => 'required',
            ]);


            try {
                $serviceItem = PropertyServiceItem::getServiceItem($request->id);
                $serviceItem->property_service_id = $request->property_service_id;
                $serviceItem->property_service_item_name = $request->property_service_item_name;
                $serviceItem->description = $request->description;
                $serviceItem->is_active = $request->is_active;
                $serviceItem->save();
                return back()->with('success', 'Property service item is update successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function deletePropertyServiceItem($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_quotation_config');

        if ($hasPermission) {

            try {
                $serviceItem = PropertyServiceItem::getServiceItem($id);
                $serviceItem->delete();
                return back()->with('success', 'Property service item is delete successfully');
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }


    //print quotation
    public function printQuotation($id)
    {

        $hasPermission = Auth::user()->hasPermission('view_quotation_config');

        if ($hasPermission) {

            try {

                $quotation = Quotation::with('design')->where('id', $id)->get()->first();

                if ($quotation != null) {

                    $extensionPartItemIds = QuotationExtension::where('quotation_id', $quotation->id)->pluck('property_part_item_id')->toArray();

                    $quotation->extensions = PropertyPartItem::whereIn('id', $extensionPartItemIds)->get();

                    $extensionPartIds = QuotationExtension::where('quotation_id', $quotation->id)->pluck('property_part_id')->toArray();

                    $quotation->parts = PropertyPart::whereIn('id', $extensionPartIds)->get();

                    $propertyServiceIds = QuotationService::where('quotation_id', $quotation->id)->pluck('property_service_id')->toArray();

                    $quotation->services = PropertyService::whereIn('id', $propertyServiceIds)->get();

                    $professionalIds = QuotationProfessional::where('quotation_id', $quotation->id)->pluck('property_service_item_id')->toArray();

                    $quotation->professionals = PropertyServiceItem::whereIn('id', $professionalIds)->get();

                    return view('admin.quotations.all_quotations.components.print_quotation', compact('quotation'));
                } else {

                    return back()->with('error', 'Could not find the quotation to print');
                }
            } catch (Exception $exception) {

                $error = $exception->getMessage();
                return view('frontend.errors.error_500', compact('error'));
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }
}
