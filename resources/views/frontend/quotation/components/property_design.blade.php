<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-20 family-Nunito-sans fw-800 light-black pb-3">What sort of property you are planning to design?</h4>
                </div>
            </div>
            <div id="property-design-section" class="row p-2 ">
                <div class="col-md-7">

                @foreach($propertyDesigns as $key => $design)

                    <div class="row bg-light-yellow py-2 mb-2 design-div" id="design-div-{{ $design->id }}" onClick="clickCheckbox({{$design->id}})">

                        <div class="col-2">
                            <img class="normal-images design-icon-{{ $design->id }}" src="{{ asset($design->icon_1)}}" id="{{'normal-image'.$design->id}}" width="64" alt="">
                            <img class="hover-images design-icon-{{ $design->id }}" src="{{ asset($design->icon_2)}}" id="{{'hover-image'.$design->id}}" style="display:none;" width="64" alt="">
                        </div>
                        <div class="col-8 text-start d-flex align-items-center">
                            <div class="form-check">
                                <p class="family-Nunito-sans fs-22 fw-600" id="{{'design-name'.$design->id}}">{{ $design->design_name }}</p>
                            </div>
                        </div>
                        <div class="col-2 text-start d-flex align-items-center justify-content-center">

                            <input class="design_id" type="hidden" name="design_id" value="{{ $design->id }}">
                            <input class="form-check-input select-design" type="radio" name="property_design" onClick="setSelectedItem({{$design->id}})" value="{{ $design->id }}" id="{{'selected-design'.$design->id}}">
                        </div>
                    </div>
                @endforeach

                </div>

                <div class="col-md-5 d-flex align-items-center justify-content-center " >

                @foreach($propertyDesigns as $key => $design)
                <img class="design-image" src="{{ asset($design->image)}}" style="display:{{$key != 0 ? 'none':'block'}}" id="{{'preview-image'.$design->id}}" width="300" alt="">
                @endforeach

                </div>

            </div>
        </div>
    </div>
