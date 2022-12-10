
<div class="container flex flex-row justify-center gap-5 mt-5">
    <div class="cart  w-3/4 flex flex-col gap-5">
        @if($promotions->count()>0)
      
      
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Ticket Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantity
                </th>
                <th scope="col" class="py-3 px-6">
                    Sub Total
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
          
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <img class="max-h-28 w-28 " src="{{asset('images/'.$promotion->attributes->image)}}" alt="{{$promotion->name}}.name">            
                </td>
                <td class="py-4 px-6">
                    <h1>{{$promotion->name}}</h1>
                </td>
                <td class="py-4 px-6">
                    <p><span>&#2547</span>{{$promotion->price}}</p>
                </td>
                <td class="py-4 px-6">
                <button wire:click="incrementQty({{$promotion->id}})" >+</button>
                <span>{{$promotion->quantity}}</span>
                <button wire:click="decrementQty({{$promotion->id}})">-</button>
                </td>
                <td class="py-4 px-6">
                    <p><span>&#2547</span>{{$promotion->price*$promotion->quantity}}</p>
                </td>
                <td>
                    <form wire:submit.prevent="removeCart({{$promotion->id}})" method="POST">
                        <button type="submit" class="rounded bg-red-600 px-7 text-white">Remove</button>
                        </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

        
 

</div>
<div class="chekout bg-white border p-4 flex flex-col justify-evenly">
    <p class="font-semibold text-lg">Total Price: <span>&#2547</span>{{Cart::getTotal()}}</p>
    <div>
    <a class="bg-green-700 text-white px-5 py-2 mt-4" href="{{route('order.index')}}">Proceed To Purchase</a>
    </div>
</div>
@else
<h1>No cart item found!</h1>
@endif
</div>


