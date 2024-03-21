<x-app-layout>
    @section('title', 'employee')
   <div class="panel">
    <div class="flex justify-end">
        
        <div class="mb-5" x-data="modal">
            <!-- button -->
            <div class="flex items-center justify-center">
                <a href="{{ url('add-employee') }}" class="btn btn-info">Add Employee</a>
            </div>
            
            <!-- modal -->
            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">Personal Information</h5>
                            <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="#9C603B"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                            </button>
                        </div>

                        
                        {{-- Create Employee --}}
                        <div class="p-5">
                             <form action="{{url('submit-profiles')}}" method="POST">
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="firstname">First Name</label>
                                        <input id="firstname" type="text"  placeholder="Enter First Name"  class="form-input" name="firstname" required />
                                    </div>
                                    <div class="">
                                        <label for="lastname">Last Name</label>
                                        <input id="lastname" type="text"  placeholder="Enter Last Name"  class="form-input" name="lastname" required />
                                    </div> 
                                </div>
                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="middlename">Middle Name</label>
                                        <input id="middlename" type="text"  placeholder="Enter Middle Name"  class="form-input" name="middle_name" required />
                                    </div> 
    
                                    <div class="">
                                        <label for="age">Age</label>
                                        <input id="age" type="number"  placeholder="Enter Your Age"  class="form-input" name="age" required />
                                    </div>
    
                                </div>
                                <div class="mt-4">
                                    <label for="contact">Contact</label>
                                    <input id="contact" type="number"  placeholder="Enter Your Contact"  class="form-input" name="contact" required />
                                </div>

                                <div class="mt-4"> 
                                    <label for="">Birthday</label>
                                    <div class="relative max-w-sm">
  <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
     <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
      </svg>
  </div>
  <input datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
</div>
                                </div>

                                <div class="mt-4">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"  placeholder="Enter Your Email"  class="form-input" name="email" required />
                                </div>
                                    
                                <div class="mt-4">
                                    <label for="address">Address</label>
                                    <input id="address" type="text"  placeholder="Enter Your Address"  class="form-input " name="address" required/>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="postition">Position</label>
                                        <input id="position" type="text"  placeholder="Enter Your Position"  class="form-input" name="position" required />
                                    </div>
    
                                    <div>
                                        <label for="ctnSelect1">Status</label>
                                        <select id="ctnSelect1" class="form-select text-white-dark" name="status" required>
                                            <option>Select Status</option>
                                            <option>Active</option>
                                            <option>In Active</option>
                                        </select>
                                    </div>
                                </div>

                        

                            
                                <div class="flex justify-end items-center mt-8">
                            
                                <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- DISPLAY TABLE --}}
    <div class="table-responsive">
        <form action="">
            <input  type="text" name="search" placeholder="Search...">
        </form>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach($store as $item)
                <tr>
                    <td class="whitespace-nowrap">{{$item->code}}</td>
                    <td>{{$item->firstname}} {{$item->lastname}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a href="{{ url('view-profile/'.$item->id) }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path
                                    opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="#9C603B"
                                    stroke-width="1.5"
                                ></path>
                                <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#9C603B" stroke-width="1.5"></path>
                            </svg>
                        </a>
                            View Profile
                        </a>
                    </td>

                    {{-- Edit --}}
                    <td>{{$item->status}}</td>
                    <td>
                        
                        <button  type="button"data-hs-overlay="#edit-employee{{$item->id}}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                    <path opacity="0.5"
                        d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                        stroke="#9C603B" stroke-width="1.5" stroke-linecap="round"></path>
                    <path
                        d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                        stroke="#9C603B" stroke-width="1.5"></path>
                    <path opacity="0.5"
                        d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                        stroke="#9C603B" stroke-width="1.5"></path>
                </svg>
                          </button>
                          
                          <div id="edit-employee{{$item->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                              <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                  <h3 class="font-bold text-gray-800 dark:text-white">
                                    Edit Profile
                                  </h3>
                               
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit-employee{{$item->id}}">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9C603B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <form action="{{url('update-profiles'.$item->id)}}" method="POST">
                                    @method('PUT')
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="firstname">First Name</label>
                                        <input id="firstname" type="text"  placeholder="Enter First Name"  class="form-input" value="{{$item->firstname}}" name="firstname" required />
                                    </div>
                                    <div class="">
                                        <label for="lastname">Last Name</label>
                                        <input id="lastname" type="text"  placeholder="Enter Last Name"  class="form-input" value="{{$item->lastname}}" name="lastname" required />
                                    </div> 
                                </div>
                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="middlename">Middle Name</label>
                                        <input id="middlename" type="text"  placeholder="Enter Middle Name"  class="form-input" value="{{$item->middle_name}}" name="middle_name" required />
                                    </div> 
    
                                    <div class="">
                                        <label for="age">Age</label>
                                        <input id="age" type="number"  placeholder="Enter Your Age"  class="form-input" value="{{$item->age}}" name="age" required />
                                    </div>
    
                                </div>
                                <div class="mt-4">
                                    <label for="contact">Contact</label>
                                    <input id="contact" type="number"  placeholder="Enter Your Contact"  class="form-input" value="{{$item->contact}}" name="contact" required />
                                </div>

                                <div class="mt-4">
                                    <label for="birthday">Birthday</label>
                                    <input id="birthday" type="birthday"  placeholder="Enter Your Birthday"  class="form-input" value="{{$item->birthday}}" name="birthday" required />
                                </div>

                                <div class="mt-4">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"  placeholder="Enter Your Email"  class="form-input" value="{{$item->email}}" name="email" required />
                                </div>
                                    
                                <div class="mt-4">
                                    <label for="address">Address</label>
                                    <input id="address" type="text"  placeholder="Enter Your Address"  class="form-input "  value="{{$item->address}}" name="address" required/>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <label for="postition">Position</label>
                                        <input id="position" type="text"  placeholder="Enter Your Position"  class="form-input" value="{{$item->position}}" name="position" required />
                                    </div>
    
                                    <div>
                                        <label for="ctnSelect1">Status</label>
                                        <select id="ctnSelect1" class="form-select text-white-dark" name="status" required>
                                            <option>Select Status</option>
                                            <option>Active</option>
                                            <option>In Active</option>
                                        </select>
                                    </div>
                                </div>

                        

                            
                                
                
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit-employee{{$item->id}}">
                                    Close
                                  </button>
                                  <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                            </form>
                              </div>
                            </div>
                          </div>    
                          

                          {{-- Delete --}}
 
                            
                            <button type="button"  data-hs-overlay="#delete{{$item->id}}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                    <path d="M20.5001 6H3.5" stroke="#9C603B" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                        stroke="#9C603B"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="#9C603B" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="#9C603B" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        opacity="0.5"
                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                        stroke="#9C603B"
                                        stroke-width="1.5"
                                    ></path>
                                </svg>
                            </button>
                            </div>
                            
                            <div id="delete{{$item->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                                <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                                <div class="absolute top-2 end-2">
                                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete{{$item->id}}">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9C603B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                    </button>
                                </div>
                            
                                <div class="p-4 sm:p-10 overflow-y-auto">
                                    <div class="flex gap-x-4 md:gap-x-7">
                                    <!-- Icon -->
                                    <span class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9C603B" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                    </span>
                                    <!-- End Icon -->
                            
                                    <div class="grow">
                                        <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                        Delete Employee Profile
                                        </h3>
                                        <p class="text-gray-500">
                                        Permanently remove Employee Profile and all of its contents from ANAA HOTEL RESTAURANT. This action is not reversible, so please continue with caution.
                                        </p>
                                    </div>
                                    </div>
                                </div>
                            
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete{{$item->id}}">
                                    Cancel
                                    </button>
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('delete-employee-profile/'.$item->id) }}">
                                    Delete Profile
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">
        </div>
    </div>
   

</x-app-layout>

{{-- TIME
<td class="text-center whitespace-nowrap"><span
    class="bg-blue-600 px-2 py-1 text-white rounded-lg">{{$item->created_at->format('F j, Y
    g:i A')}}</span></td>
<td class="text-center"> --}}
