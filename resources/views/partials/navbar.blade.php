   <header class="antialiased fixed right-0  w-full">
       <nav class="bg-white  border-b border-gray-200 px-4 py-3.5">
           <div class="flex flex-wrap justify-between items-center">
               <div class="flex justify-start items-center">
                   <button id="toggleSidebar" aria-expanded="true" aria-controls="sidebar"
                       class="hidden p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100">
                       <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                           viewBox="0 0 16 12">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M1 1h14M1 6h14M1 11h7" />
                       </svg>
                   </button>

                   <button aria-expanded="true" aria-controls="sidebar"
                       class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                       <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                           fill="none" viewBox="0 0 17 14">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M1 1h15M1 7h15M1 13h15" />
                       </svg>
                       <span class="sr-only">Toggle sidebar</span>
                   </button>

               </div>

               <div class="flex items-center lg:order-2 ">
                   <button type="button "
                       class="flex mx-3  text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300"
                       id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                       <span class="sr-only">Open user menu</span>
                       <img class="w-8 h-8 rounded-full hover:cursor-pointer"
                           src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                   </button>

                   <!-- User dropdown -->
                   <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow"
                       id="dropdown">
                       <div class="py-3 px-4">
                           <span class="block text-sm font-semibold text-gray-900">Neil sims</span>
                           <span class="block text-sm text-gray-500 truncate">name@flowbite.com</span>
                       </div>
                       <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                           <li>
                               <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">My profile</a>
                           </li>
                           <li>
                               <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Account
                                   settings</a>
                           </li>
                       </ul>
                       <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                           <li>
                               <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100">
                                   <svg class="mr-2 w-4 h-4 text-primary-600" aria-hidden="true"
                                       xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                       <path
                                           d="m7.164 3.805-4.475.38L.327 6.546a1.114 1.114 0 0 0 .63 1.89l3.2.375 3.007-5.006ZM11.092 15.9l.472 3.14a1.114 1.114 0 0 0 1.89.63l2.36-2.362.38-4.475-5.102 3.067Zm8.617-14.283A1.613 1.613 0 0 0 18.383.291c-1.913-.33-5.811-.736-7.556 1.01-1.98 1.98-6.172 9.491-7.477 11.869a1.1 1.1 0 0 0 .193 1.316l.986.985.985.986a1.1 1.1 0 0 0 1.316.193c2.378-1.3 9.889-5.5 11.869-7.477 1.746-1.745 1.34-5.643 1.01-7.556Zm-3.873 6.268a2.63 2.63 0 1 1-3.72-3.72 2.63 2.63 0 0 1 3.72 3.72Z" />
                                   </svg>
                                   Pro version
                               </a>
                           </li>
                       </ul>
                       <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                           <li>
                               <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Sign out</a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </nav>
   </header>
