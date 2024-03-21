<x-app-layout>

<div x-data="notes">
        <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full">
            <div class="bg-black/60 w-full h-full rounded-md absolute hidden"
                :class="{ '!block xl:!hidden': isShowNoteMenu }" @click="isShowNoteMenu = !isShowNoteMenu"></div>
            <div class="panel p-4 flex-none w-[240px] absolute xl:relative space-y-4 h-full xl:h-auto hidden xl:block ltr:lg:rounded-r-md ltr:rounded-r-none rtl:lg:rounded-l-md rtl:rounded-l-none overflow-hidden"
                :class="{ 'hidden shadow': !isShowNoteMenu, 'h-full ltr:left-0 rtl:right-0': isShowNoteMenu }">
                <div class="flex flex-col h-full pb-16">
                    <div class="flex text-center items-center">
                        <div>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path
                                    d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold ltr:ml-3 rtl:mr-3">Server Staff</h3>
                    </div>
                    <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b] my-4"></div>
                    <div class="perfect-scrollbar relative pr-3.5 -mr-3.5 h-full grow">
                        <div class="space-y-1">
                            <button type="button"
                                class="@if(request()->is('apps-todolist')) bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32] @endif w-full flex justify-between items-center p-2 hover:bg-white-dark/10 rounded-md dark:hover:text-primary hover:text-primary dark:hover:bg-[#181F32] font-medium h-10"
                                :class="{
                                    'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab ===
                                        'all'
                                }"
                                @click="tabChanged('all')">
                                <div class="flex items-center">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                        <path
                                            d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ltr:ml-3 rtl:mr-3">Assigned Staff</div>
                                </div>
                            </button>

                            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                    
                        </div>
                    </div>
                    <!-- basic -->
                    <div x-data="modal" class="relative top-[10vh]">
                        <!-- button -->
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-primary" @click="toggle">Add Task</button>
                        </div>
                    
                        <!-- modal -->
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <div class="font-bold text-lg">Add Task</div>
                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <form action="{{ url('assign-staff') }}" method="POST">
                                            @csrf
                                        <div>
                                            <label for="ctnSelect1">Task Type</label>
                                            <select id="ctnSelect1" name="task_type" class="form-select text-white-dark" required>
                                                <option >Select task type</option>
                                                <option>Delivery</option>
                                            </select>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="mt-4">
                                                <label for="ctnSelect1">Server Staff</label>
                                                <select id="ctnSelect1" name="staff" class="form-select text-white-dark" required>
                                                    <option>Select staff</option>
                                                    @foreach($staff as $server)
                                                    <option value="{{$server->code}}">{{$server->firstname}} {{$server->lastname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <label for="ctnSelect1">Select Pending Order</label>
                                            <select id="ctnSelect1" name="orders" class="form-select text-white-dark" required>
                                                <option>Select client orders</option>
                                                @foreach($orders as $order)
                                                <option value="{{$order->invoice_no}}">{{$order->invoice_no}} {{$order->customer_name}} - Room {{$order->room_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>

            <div class="panel flex-1 overflow-auto h-full">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Task Type</th>
                            <th>Server Name</th>
                            <th>Client Invoice</th>
                            <th>Room Number</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assigned_staff as $staff)
                            <tr>
                                <td>{{$staff->task_type}}</td>
                                <td>{{$staff->server_name}}</td>
                                <td>{{$staff->client_invoice}}</td>
                                <td>{{$staff->room_no}}</td>
                                <td>
                                    @if($staff->status == 'Pending')
                                        <span class="badge bg-danger">{{$staff->status}}</span>
                                    @else
                                        <span class="badge bg-success">{{$staff->status}}</span>
                                    @endif

                                </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>


</x-app-layout>
