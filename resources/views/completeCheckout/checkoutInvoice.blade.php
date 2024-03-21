<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you!</title>
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
<body>
    <!-- Invoice -->
  <div class="panel mx-20 my-20">
  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <!-- Grid -->
  <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
    <div>
      <img src="{{asset('assets/images/anaalogo.png')}}" class="w-[20vh]" alt="">
      <h2 class="mt-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">Thank You for Ordering!</h2>
    </div>
    <!-- Col -->

    <div class="inline-flex gap-x-2">
      <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
        Invoice PDF
      </a>
      <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        Print
      </a>
    </div>
    <!-- Col -->
  </div>
  <!-- End Grid -->

  <!-- Grid -->
  <div class="grid md:grid-cols-2 gap-3">
    <div>
      <div class="grid space-y-3">
        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Billed to:
          </dt>
          <dd class="text-gray-800 dark:text-gray-200">
            <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">
              {{$orders->customer_name}}
            </a>
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Deliver To:
          </dt>
          <dd class="font-medium text-gray-800 dark:text-gray-200">
            <span class="block font-semibold">Room {{$orders->room_no}}</span>
            <address class="not-italic font-normal">
             
            </address>
          </dd>
        </dl>

      </div>
    </div>
    <!-- Col -->

    <div>
      <div class="grid space-y-3">
        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Invoice number:
          </dt>
          <dd class="font-medium text-gray-800 dark:text-gray-200">
            {{$orders->invoice_no}}
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Currency:
          </dt>
          <dd class="font-medium text-gray-800 dark:text-gray-200">
            PHP / Peso
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Due date:
          </dt>
          <dd class="font-medium text-gray-800 dark:text-gray-200">
            {{$orders->created_at}}
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-36 max-w-[200px] text-gray-500">
            Billing method:
          </dt>
          <dd class="font-medium text-gray-800 dark:text-gray-200">
            {{$orders->payment_method}}
          </dd>
        </dl>
      </div>
    </div>
    <!-- Col -->
  </div>
  <!-- End Grid -->

  <!-- Table -->
  <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
    <div class="hidden sm:grid sm:grid-cols-5">
      <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
      <div class="text-start text-xs font-medium text-gray-500 uppercase">Qty</div>
      <div class="text-start text-xs font-medium text-gray-500 uppercase">Price</div>
      <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
    </div>

    @php 
        $total = 0;
    @endphp
    <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>
    @foreach($orders->cartPayments as $id => $order)
    <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
      <div class="col-span-full sm:col-span-2">
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
        <p class="font-medium text-gray-800 dark:text-gray-200">{{$order->item_name}} - {{$order->category}}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
        <p class="text-gray-800 dark:text-gray-200">{{$order->quantity}}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
        <p class="text-gray-800 dark:text-gray-200">{{$order->total_price}}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
        @php
          $total += $order->total_price * $order->quantity
        @endphp
        <p class="sm:text-end text-gray-800 dark:text-gray-200">{{$order->total_price * $order->quantity}}</p>
      </div>
    </div>
    @endforeach

  <!-- End Flex -->
</div>
  </div>
  <div class="btn btn-success flex items-center justify-center mt-6">
    <a href="{{ url('continue-order/'.$orders->acc_id) }}">Continue Ordering</a>
  </div>
<!-- End Invoice -->
<script src="https://js.stripe.com/v3/"></script>
    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>
</html>