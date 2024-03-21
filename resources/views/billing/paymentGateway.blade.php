
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your Order</title>
  <link rel="icon" href="{{ asset('assets/images/ANAA LOGO.png')}}" type="image/png">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
      rel="stylesheet" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="/assets/js/perfect-scrollbar.min.js"></script>
  <script defer src="/assets/js/popper.min.js"></script>
  <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
  <script defer src="/assets/js/sweetalert.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-slate-900">
  <div>
    <body class="bg-gray-50 dark:bg-slate-900">
      <!-- Invoice -->
      <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
        <div class="sm:w-11/12 lg:w-3/4 mx-auto">
          <!-- Card -->
          <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
            <!-- Grid -->
            <div class="flex justify-between">
              <div>
                <img src="{{ asset('assets/images/anaa.svg') }}" class="w-52" alt="">
              </div>
              <!-- Col -->
    
              <div class="text-end">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200"></h2>
                <span class="mt-1 block text-gray-500"></span>
    
                <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">

                </address>
              </div>
              <!-- Col -->
            </div>
            <!-- End Grid -->
    
            <!-- Grid -->
            <div class="mt-8 grid sm:grid-cols-2 gap-3">
              <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</h3>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{$user->name}}</h3>
                <address class="mt-2 not-italic text-gray-500">
                  {{$user->email}}

                </address>
              </div>
              <!-- Col -->
    
              <div class="sm:text-end space-y-2">
                <!-- Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                  <dl class="grid sm:grid-cols-5 gap-x-3">
                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Date:</dt>
                    <dd class="col-span-2 text-gray-500">{{$date}}</dd>
                  </dl>
                  <dl class="grid sm:grid-cols-5 gap-x-3">
                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Due date:</dt>
                    <dd class="col-span-2 text-gray-500">{{$date}}</dd>
                  </dl>
                </div>
                <!-- End Grid -->
              </div>
              <!-- Col -->
            </div>
            <!-- End Grid -->
    
            <!-- Table -->
            <div class="mt-6">
              <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
                <div class="hidden sm:grid sm:grid-cols-7">
                  <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
                  <div class="text-start text-xs font-medium text-gray-500 uppercase">Category</div>
                  <div class="text-start text-xs font-medium text-gray-500 uppercase">QTY</div>
                  <div class="text-end text-xs font-medium text-gray-500 uppercase">Price</div>
                  <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                  <div class="text-end text-xs font-medium text-gray-500 uppercase">Action</div>
                </div>
    
                <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>
                @php  
                        $total = 0;
                @endphp
                <form action="{{ url('update-quantity/' . $user->id) }}" method="POST" id="cartForm">
                @csrf
                @foreach($cart as $id => $data)
                @php 
            
                  $total += $data->price * $data->quantity
                @endphp
                <div class="grid grid-cols-5 sm:grid-cols-7 gap-2">
                  <div class="col-span-full sm:col-span-2">
                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                    <p class="font-medium text-gray-800 dark:text-gray-200">{{$data->title}}</p>
                  </div>
                  <div>
                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Category</h5>
                    <p class="text-gray-800 dark:text-gray-200">{{$data->category}}</p>
                  </div>
                  <div>
                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                    <p class="text-gray-800 dark:text-gray-200">
                      <!-- Input Number -->
                      <input type="number" name="quantity[{{$data->id}}]" value="{{$data->quantity}}" class="w-20 md:w-32 md:mb-2 md:relative md:bottom-2 form-input"/>
                     
                    </p>
                  </div>
                  <div>
                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Price</h5>
                    <p class="sm:text-end text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> {{$data->price}}</p>
                  </div>


                  <div>
                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                    <p class="sm:text-end text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> <span class="amountField">{{$data->price * $data->quantity}}</span></p>
                  </div>

                  <div>
                  <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Action</h5>
                    <a href="{{ url('delete-item/id=' . $data->id.'/'.$data->title) }}" class="sm:text-end btn btn-danger mx-8"><i class="fa-solid fa-trash"></i></a>
                  </div>
                </div>
                @endforeach
                </form>
              </div>
            </div>
            <!-- End Table -->

            <!-- Flex -->
            <div class="mt-8 flex sm:justify-end">
              <div class="w-full max-w-2xl sm:text-end space-y-2">
                <!-- Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                  <dl class="grid sm:grid-cols-5 gap-x-3">
                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                    <dd class="col-span-2 text-gray-500"><i class="fa-solid fa-peso-sign"></i> {{$total}}</dd>
                  </dl>
    
                  <dl class="grid sm:grid-cols-5 gap-x-3">
                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>
                    <dd class="col-span-2 text-gray-500"><i class="fa-solid fa-peso-sign"></i> {{$total}}</dd>
                  </dl>

  
                </div>
                <!-- End Grid -->
              </div>
            </div>
            <!-- End Flex -->
    
            <p class="mt-5 text-sm text-gray-500">© 2024 ANAA Hotel and Restaurant</p>
          </div>
          <!-- End Card -->
    
          <!-- Buttons -->
          <div class="mt-6 flex justify-end gap-x-3">

            <form action="{{ url('checkout-card/' . $user->id) }}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="text-center">
                <button type="button" class="btn btn-primary" data-hs-overlay="#hs-notifications">
                  Check out
                </button>
              </div>

              <div id="hs-notifications" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                  <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                    <div class="absolute top-2 end-2">
                      <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-notifications">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                      </button>
                    </div>

                    <div class="p-4 sm:p-10 overflow-y-auto">
                      <div class="mb-6 text-center">
                        <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                          Payment Method
                        </h3>
                        <p class="text-gray-500">
                         
                        </p>
                      </div>

                      <div class="grid grid-cols-2 gap-4">
                        <button type="submit" class="btn btn-outline-primary p-6">
                        <i class="fa-regular fa-credit-card mr-2"></i> Through Card
                        </button>

                        <a href="{{ url('cash-on-receipt/'.$user->id) }}" class="btn btn-outline-primary p-6">
                        <i class="fa-solid fa-money-bill-1 mr-2"></i> Cash on Delivery
                        </a>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- End Buttons -->
        </div>
      </div>
      <!-- End Invoice -->
    </body>
  </div>
 <script>
 document.addEventListener('DOMContentLoaded', function() {
      const quantityInputs = document.querySelectorAll('input[type="number"]');

      // Add event listener to all quantity input fields
      quantityInputs.forEach(function(input) {
        input.addEventListener('input', function() {
          // Submit the form when the input value changes
          this.form.submit();
        });
      });
    });
 </script>
  <script src="https://js.stripe.com/v3/"></script>
    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>
</html>
    
