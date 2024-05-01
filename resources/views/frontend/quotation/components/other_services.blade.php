<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-20 family-Nunito-sans fw-800 light-black py-3">Are you interested in any of these services ?</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">

                @foreach($services as $service)

                @if($service->allow_comments != 1)
                <div class="col-md-6 p-2">
                    <div class="other-service bg-light-yellow" other-service="{{$service->id}}">
                        <p class="family-Nunito-sans fs-20 align-items-center text-center quotation-border py-3">{{$service->property_service_name}}</p>
                    </div>
                </div>
                @else
                <div class="col-md-6 p-2 btn" data-bs-toggle="collapse" href="{{'#service-collapse'.$service->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="other-service bg-light-yellow" other-service="{{$service->id}}">
                        <p class="family-Nunito-sans fs-20 align-items-center text-center quotation-border py-3">{{$service->property_service_name}}</p>
                    </div>
                </div>
                <div class="collapse" id="{{'service-collapse'.$service->id}}">
                    <div class="">
                        <h6 class="font-16 family-Nunito-sans fw-700 light-black py-3">{{$service->description}}</h6>
                        <div class="row">

                            @foreach($service->serviceItems as $serviceItem)
                            <div class="col-md-4 my-2">
                                <div class="what-professionals bg-light-yellow" professional="{{$serviceItem->id}}">
                                    <p class="family-Nunito-sans fs-20 align-items-center text-center quotation-border py-3">{{$serviceItem->property_service_item_name}}</p>
                                </div>
                            </div>                                                            
                            @endforeach                           
                           
                        </div>
                    </div>
                </div>

                @endif

                @endforeach

            </div>
            {{--<div class="row pb-3 pe-0">
                <div class="col-12 pe-0 me-0">                    
                    <label for="exampleInputEmail1"></label>
                    <input type="text" id="service_you_need" name="service_you_need" class="service_you_need form-control quotation-fields bg-light-yellow family-Nunito-sans fs-20 align-items-center text-center quotation-border py-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tell us which service you need">
                </div>
            </div>--}}
        </div>
    </div>
