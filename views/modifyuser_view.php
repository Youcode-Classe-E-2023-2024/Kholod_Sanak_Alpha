<?php

?>
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">User Form</p>
                    </div>
                    <!-- Username -->
                    <div class="lg:col-span-2">
                        <form id="modifyProductForm">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-3">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" placeholder="Enter your Username"
                                           class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                </div>

                                <!-- Email -->
                                <div class="md:col-span-3">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" placeholder="Enter Your Email ....."
                                           class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                </div>
                                <!-- Phone -->
                                <div class="md:col-span-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" placeholder="Enter Your Phone Number ....."
                                           class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                </div>

                                <!-- Submit button-->
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="index.php?page=users" class="md:absolute  bottom-0 left-0 p-10 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?= PATH ?>assets/js/modify_user.js"></script>

