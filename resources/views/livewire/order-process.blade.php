<div>
    <ul class="flex flex-row justify-center gap-12 text-xl font-bold">
        <li> <a class="text-zinc-400 hover:text-zinc-500" href="{{route('cart.index')}}">Cart</a></li>
        <li> <a  class="{{$currentStep !=1 ? 'text-zinc-400 hover:text-zinc-500':'text-zinc-700 underline'}}" href="#step-1">Info</a></li>
        <li> <a  class="{{$currentStep !=2 ? 'text-zinc-400 hover:text-zinc-500':'text-zinc-700 underline'}}" href="#step-2" disabled>Payment</a></li>
    </ul>


    <div id="step-1" class="{{$currentStep !=1 ? 'hidden' : ''}}">

        <form wire:submit.prevent="addContactInfo()" class="flex flex-col mx-auto w-1/3 my-10">
            @csrf
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Enter Phone No.</label>
            <input type="tel" name="contact" id="contact" wire:model="contactInfo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />

    <button class="w-full bg-blue-500 rounded py-2 mt-2 text-zinc-200 text-md hover:bg-blue-300" type="submit">Proceed</button>
    </form>


    </div>
  


<div id="step-2" class="{{$currentStep !=2 ? 'hidden' : ''}}">
    <button class="text-md font-bold underline" wire:click="back(1)" >Back</button>      
    <form wire:submit.prevent="addContactInfo()" class="flex flex-col items-center justify-center ">
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
    <button class="w-full bg-blue-500 rounded py-2 mt-2 text-zinc-200 text-md hover:bg-blue-300" wire:click="submitForm">Confirm Purchase</button>
          </div>   
</form>

</div>



</div>
