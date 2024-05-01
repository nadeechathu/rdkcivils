<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-20 family-Nunito-sans fw-800 light-black pb-3">Which part do you wish to extend?</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div id="extend-section" class="row">

             @foreach($designParts as $part)
             <div class="col-md-3 p-1">
             <button class="btn bg-light-yellow m-2 w-100 h-100 d-flex flex-column justify-content-center align-items-center" id="{{'partsection'.$part->id}}" data-bs-toggle="modal" data-bs-target="#part-{{ $part['id']}}">
                    <img src="{{ asset($part->image)}}" width="150" alt="">
                    <p class="family-Nunito-sans fs-20 fw-400 pt-2">{{ $part->part_name }}</p>
                    <p class="family-Nunito-sans fs-20 fw-400 pt-2" id="part-item-{{$part->id}}"></p>
                    <input type="text" name="sub_parts_to_extend[]" class="part-item-collector" hidden id="part-item-collector-{{$part->id}}">

                </button>
             </div>

                @include('frontend.quotation.components.part_items')


             @endforeach



            </div>
        </div>
    </div>
