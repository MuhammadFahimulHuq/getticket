<div>
    <ul class="flex flex-row justify-center gap-10">
        <li> <a class="text-zinc-400" href="{{route('cart.index')}}">add to cart</a></li>
        <li> <a  class="{{$currentStep !=1 ? 'text-zinc-400':'text-black'}}" href="#step-1">contact info</a></li>
        <li> <a  class="{{$currentStep !=2 ? 'text-zinc-400':'text-black'}}" href="#step-2" disabled>payment method</a></li>
    </ul>


    <div id="step-1" class="{{$currentStep !=1 ? 'hidden' : ''}}">
        <form wire:submit.prevent="addContactInfo()" class="flex flex-col items-center justify-center h-screen">
            @csrf
            <label for="contact">Enter Phone Number</label>
    <input type="text" id="contact" wire:model="contactInfo" placeholder="+880-01XXXXXXXX">
    <button type="submit">Proceed</button>
    </form>
    </div>
  




<div id="step-2" class="{{$currentStep !=2 ? 'hidden' : ''}}">
    <button wire:click="back(1)">Back</button>      
    <form wire:submit.prevent="addContactInfo()" class="flex flex-col items-center justify-center h-screen">
        @csrf
        <div class="flex flex-col">
            <div class="flex items-center h-5">
                <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" wire:model="paymentInfo" value="Cash-On-Venue" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </div>
            <div class="ml-2 text-sm">
                <label for="helper-radio" class="font-medium text-black dark:text-black">Cash On Venue</label>
                <p id="helper-radio-text" class="text-xs font-normal text-black dark:text-black">*Pay your ticket amount on cash in the designated venue</p>
            </div>
            <div class="flex items-center h-5">
                <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" wire:model="paymentInfo" value="Digital-payment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </div>
            <div class="ml-2 text-sm">
                <label for="helper-radio" class="font-medium text-black dark:text-black">Online Payment</label>
                <p id="helper-radio-text" class="text-xs font-normal text-black dark:text-black">Pay your ticket amount via digital payment</p>
            </div>
        </div>        
<button wire:click="submitForm">Confirm Purchase</button>
    </form>

</div>



</div>
