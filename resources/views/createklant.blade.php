<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('klant.store') }}" method="POST" class="max-w-md mx-auto" onsubmit="makeFieldsFocusable()">
                        @csrf
                        <input type="hidden" name="account_type" id="account_type" value="klant">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="naam" id="naam" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="naam" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Naam</label>
                        </div>
                        <div id="klant-fields">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="volwassen" id="volwassen" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="volwassen" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Volwassen</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="kinderen" id="kinderen" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="kinderen" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kinderen</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="babys" id="babys" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="babys" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Babys</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="postcode" id="postcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="postcode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Postcode</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="wensen" id="wensen" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="wensen" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Wensen</label>
                            </div>
                        </div>
                        <div id="medewerker-fields" style="display: none;">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                        </div>

                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="showKlantFields()" class="bg-green-500 text-white text-center py-2 px-4 rounded-lg shadow-lg">
                                Maak Klant
                            </button>
                            <button type="button" onclick="showMedewerkerFields()" class="bg-blue-500 text-white text-center py-2 px-4 rounded-lg shadow-lg">
                                Maak Medewerker
                            </button>
                            <button type="button" onclick="showVerdelerFields()" class="bg-yellow-500 text-white text-center py-2 px-4 rounded-lg shadow-lg">
                                Maak Verdeler
                            </button>
                        </div>

                        <script>
                            function showKlantFields() {
                                document.getElementById('klant-fields').style.display = 'block';
                                document.getElementById('medewerker-fields').style.display = 'none';
                                document.getElementById('account_type').value = 'klant';
                            }

                            function showMedewerkerFields() {
                                document.getElementById('klant-fields').style.display = 'none';
                                document.getElementById('medewerker-fields').style.display = 'block';
                                document.getElementById('account_type').value = 'medewerker';
                            }

                            function showVerdelerFields() {
                                document.getElementById('klant-fields').style.display = 'none';
                                document.getElementById('medewerker-fields').style.display = 'block';
                                document.getElementById('account_type').value = 'verdeler';
                            }

                            function makeFieldsFocusable() {
                                const accountType = document.getElementById('account_type').value;
                                if (accountType === 'klant') {
                                    document.querySelectorAll('#medewerker-fields input').forEach(input => input.required = false);
                                } else {
                                    document.querySelectorAll('#klant-fields input').forEach(input => input.required = false);
                                }
                            }

                            showKlantFields();
                        </script>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
