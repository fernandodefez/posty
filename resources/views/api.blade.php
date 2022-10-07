<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold py-6 text-xl text-gray-800 leading-tight">
            {{ __('API Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-600 p-6 opacity-90 text-sm font-medium">
                    Start Testing My API
                    <div id="app">
                        <ExampleComponent />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>

    getUserData();

    async function getCSRFToken() {
        return await fetch('{{ route('index') }}/sanctum/csrf-cookie');
    }

    async function getUserData() {
        await getCSRFToken();
        const response = await fetch('{{ route('index') }}/api/v1/posts', {
            method: 'GET', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            }
        });
        const res = await response.json();
        const posts = {...res.data}
        if (response.status === 401) location.href = '{{ route('login') }}'
        if (response.status === 200) console.log(posts)
    }

</script>
