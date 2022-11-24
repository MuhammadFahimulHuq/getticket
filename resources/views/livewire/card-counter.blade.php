<div class="container flex flex-row justify-center gap-5 mt-5">
    <div class="cart  w-3/4 flex flex-col gap-5">
        @if($promotions->count()>0)
        {{-- <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg><span>{{$promotions->count()}}</span>  
        </div> --}}
        @foreach($promotions as $promotion)
        <div class="flex flex-row justify-between bg-white">
      <img class="max-h-28 w-28 " src="{{asset('images/'.$promotion->attributes->image)}}" alt="{{$promotion->name}}.name">
            <h1>{{$promotion->name}}</h1></a>
        
        <p>{{$promotion->price}}</p>
        <p>{{$promotion->quantity}}</p>    
        
        <div>
            <button wire:click="incrementQty({{$promotion->id}})" >+</button>
            <span>{{$promotion->quantity}}</span>
            <button wire:click="decrementQty({{$promotion->id}})">-</button>
        </div>
      
        
        <form wire:submit.prevent="removeCart({{$promotion->id}})" method="POST">
            <button type="submit" class="rounded bg-red-600 px-7 text-white">Remove</button>
            </form>
        </div>
        @endforeach
      
        @else
        <h1>No cart item found!</h1>
        @endif
        
 

</div>
<div class="chekout bg-white border">
    <p>Sub Total:{{$promotion->price*$promotion->quantity}}</p>
    <h1>Total Price:{{Cart::getTotal()}}</h1>
    <a class="bg-green-700 text-white px-5 py-2" href="{{route('order.index')}}">Proceed To Purchase</a>
</div>
</div>


