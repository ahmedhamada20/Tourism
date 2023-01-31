<div>
    @foreach ($transfer->extras as $row)

        <div class="row">
            <div class="col-md-3 mt-1 sameh">
                <button class="btn btn-primary btn-block" >{{ $row->name }}</button>
            </div>
            <div class="col-md-3 mt-1">
                <button class="btn btn-primary btn-block ">{{trans('app.price')}} :  {{ getPriceInCuracy($row->price_person_en) }}</button>
            </div>
            @if ($cart->where('id', $row->id)->count())
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-danger btn-block mt-3" wire:click="deleted({{ $row->id }})">deleted</button>
                    </div>
                </div>

            @else
                <form action="" wire:submit.prevent="save({{ $row->id }})" method="POST" style="    position: absolute;">
                    @csrf

                    <div class="col-md-3">
                        <input type="number" name="quantity" wire:model="quantity.{{ $row->id }}"
                            placeholder="number" class="form-control">
                    </div>

                    <div class="col-md-3 mt-1">
                        <button class="btn btn-warning btn-block">{{trans('app.add')}}</button>
                    </div>


                </form>
            @endif
            <hr class="mt-3">
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-success btn-block">{{trans('app.cart_item')}} <span
                    style="margin-left: 10px; color: white;font-weight: bolder">
                    {{ $cartCart }}</span></button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success btn-block">{{trans('app.total_card')}} <span
                    style="margin-left: 10px; color: white;font-weight: bolder">
                    {{ getPriceInCuracy($cartTotal) }}</span></button>
        </div>
    </div>
</div>





{{-- <div style="text-align: center">
    <div class="row">
        <div class="col">
            @foreach ($transfer->extras as $row)
                <div class="row">
                    <div class="col">
                        <label></label>
                        <p class="text-danger">{{ $row->name }}</p>
                    </div>

                    @if ($cart->where('id', $row->id)->count())
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-danger btn-sm" wire:click="deleted({{$row->id}})">deleted</button>
                        </div>
                    </div>
                    @else
                        <form action="" wire:submit.prevent="save({{ $row->id }})" method="POST">
                            @csrf

                            <div class="col-3">
                                <input type="number" wire:model="quantity.{{ $row->id }}" class="form-control"
                                    placeholder="number" name="" id="">
                            </div>

                            <div class="col">
                                <button class="btn btn-success">save</button>
                            </div>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <button class="btn btn-success">Cart  || {{ $cartCart }}</button>
    <button class="btn btn-success">Total || {{ $cartTotal }}</button>
</div> --}}
