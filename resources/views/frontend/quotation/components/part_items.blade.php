<div class="modal fade" id="part-{{ $part['id']}}" tabindex="-1" aria-labelledby="part-{{ $part['id']}}" aria-hidden="true">
                    <div class="modal-dialog extend-modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content extend-modal-content text-center">
                            <div class="modal-header extend-modal-header text-center bg-brown">
                                <h5 class="modal-title extend-modal-title family-Nunito-sans fw-500 text-center text-light" id="part-{{ $part['id']}}">{{ $part->part_name }}</h5>
                                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close" id="{{'modal-close'.$part['id']}}"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    @if(sizeof($part->itemsForProperties) > 0)
                                    @foreach($part->itemsForProperties as $item)
                                        <div data-id="{{ $part['id'] }}" subitem-id="{{ $item['id'] }}" data-name="{{$item->part_item_name }}" class="part-item col-4 m-2 modal-square bg-light-yellow d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset($item->image)}}" width="100" alt="">
                                            <p class="family-Nunito-sans fs-20 fw-400 pt-2">{{ $item->part_item_name }}</p>

                                        </div>
                                    @endforeach
                                    @else
                                    <h6>No items found</h6>
                                    @endif


                                </div>
                            </div>
                            <div class="modal-footer text-center justify-content-center">
                                <button type="button" class="btn family-Nunito-sans fs-18 text-light bg-brown rounded-0 px-3" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
