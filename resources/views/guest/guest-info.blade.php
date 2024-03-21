{{-- <x-app-layout>
    @section('title', 'employee')
   <div class="panel">
    <div class="flex justify-end">
        
        
        <div class="table-responsive">
            <form action="">
                <input type="text" name="search">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action </th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @foreach($profile as $item)
                    <tr>
                        <td class="whitespace-nowrap">{{$item->id}}</td>
                        <td>{{$item->employee_name}}</td>
                        <td class="text-center whitespace-nowrap"><span
                                class="bg-blue-600 px-2 py-1 text-white rounded-lg">{{$item->created_at->format('F j, Y
                                g:i A')}}</span></td>
                        <td class="text-center">
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div> --}}

        
        
        <div class="mb-5" x-data="modal">
            <!-- button -->
            <div class="flex items-center justify-center">
                <button type="button" class="btn btn-info" @click="toggle">Add Employee</button>
            </div>
            
            <!-- modal -->
            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">Personal Information</h5>
                            <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                            </button>
                        </div>

                        

                        <div class="p-5">
                             <form action="{{url('submit-profiles')}}" method="POST">
                                @csrf
                                <div class="">
                                    <label for="firstname">First Name</label>
                                    <input id="firstname" type="text"  placeholder="Enter First Name"  class="form-input" name="name" required />
                                </div>
                                <div class="mt-4">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" type="text"  placeholder="Enter Last Name"  class="form-input" name="lastname" required />
                                </div> 
                                <div class="mt-4">
                                    <label for="middlename">Middle Name</label>
                                    <input id="middlename" type="text"  placeholder="Enter Middle Name"  class="form-input" name="middle_name" required />
                                </div> 

                                <div class="mt-4">
                                    <label for="age">Age</label>
                                    <input id="age" type="number"  placeholder="Enter Age Name"  class="form-input" name="age" required />
                                </div>

                                <div class="mt-4">
                                    <label for="contact">Contact</label>
                                    <input id="contact" type="number"  placeholder="Enter Contact"  class="form-input" name="contact" required />
                                </div>

                                <div class="mt-4">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"  placeholder="Enter Email"  class="form-input" name="email" required />
                                </div>
                                    
                                <div class="mt-4">
                                    <label for="address">Address</label>
                                    <input id="address" type="text"  placeholder="Enter Address"  class="form-input " name="address" required/>
                                </div>

                                <div class="mt-4">
                                    <label for="postition">Position</label>
                                    <input id="position" type="text"  placeholder="Enter Address"  class="form-input" name="position" required />
                                </div>

                                <div class="mt-4">
                                    <label for="status">Status</label>
                                    <input id="status" type="text"  placeholder="Enter Address"  class="form-input" name="status" required />
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

        
        
        <!-- script -->
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("modal", (initialOpenState = false) => ({
                    open: initialOpenState,
        
                    toggle() {
                        this.open = !this.open;
                    },
                }));
            });
        </script>
        

    </div>
   </div>
</x-app-layout> --}}
