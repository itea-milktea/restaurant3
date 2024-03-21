<x-app-layout>
<div class="panel">
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
            <input datepicker datepicker-format="mm/dd/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</x-app-layout>