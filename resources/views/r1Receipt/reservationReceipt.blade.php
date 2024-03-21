<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link rel="icon" href="{{ asset('assets/images/ANAA LOGO.png')}}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Payment Receipt</title>
    <script src="/assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="/assets/js/popper.min.js"></script>
    <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
    <script defer src="/assets/js/sweetalert.min.js"></script>
    <style>
        @media print {
        body {
            font-size: 14px; /* Adjust font size for printing */
        }

        .no-print {
            display: none; /* Hide elements with class 'no-print' */
        }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="flex items-center justify-center mt-20">
<div class="panel p-4 sm:p-7 overflow-y-auto max-w-lg">
    <div class="flex items-center justify-center mb-6">
    <img src="{{asset('assets/images/anaalogo.png')}}" class="w-32" alt="">
    </div>
        <div class="text-center">
            
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            Invoice ANAA: Hotel and Restaurant
          </h3>
        </div>

        <!-- Grid -->
        <div class="mt-5 sm:mt-10 grid grid-cols-2 sm:grid-cols-3 gap-5">
          <div>
            <span class="block text-xs uppercase text-gray-500">Amount paid:</span>
            <span class="block text-sm font-medium text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> {{number_format($total_price / 100, 2, '.', '')}}</span>
          </div>
          <!-- End Col -->

          <div>
            <span class="block text-xs uppercase text-gray-500">Date paid:</span>
            <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">{{$reserve->created_at}}</span>
          </div>
          <!-- End Col -->

          <div>
            <span class="block text-xs uppercase text-gray-500">Payment method:</span>
            <div class="flex items-center gap-x-2">
              
              <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">Card</span>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Grid -->

        <div class="mt-5 sm:mt-10">
          <h4 class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">Summary</h4>

          <ul class="mt-3 flex flex-col">
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
              <div class="flex items-center justify-between w-full">
                <span>Name</span>
                <span>{{$reserve->name}}</span>
              </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
              <div class="flex items-center justify-between w-full">
                <span>Email</span>
                <span>{{$reserve->email}}</span>
              </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold bg-gray-50 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-gray-700 dark:text-gray-200">
              <div class="flex items-center justify-between w-full">
                <span>Reservation</span>
                <span>{{$table_name}}</span>
              </div>
            </li>
          </ul>
        </div>

        <!-- Button -->
        <div class="mt-5 flex justify-end gap-x-2">
            <a href="http://192.168.101.86:8000/home" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">

                Back to Reservation
            </a>
          <button onclick="window.print()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
            Print
    </button>
        </div>
        <!-- End Buttons -->

        <div class="mt-5 sm:mt-10">
          <p class="text-sm text-gray-500">If you have any questions, please contact us at <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">anaahotel@site.com</a> or call at <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="tel:+1898345492">+1 898-34-5492</a></p>
        </div>
      </div>
</div>


   
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
