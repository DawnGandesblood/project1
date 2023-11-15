    @extends('layout/index')
    @section('title', 'Login Page')
    @section('content')
        <form action="" method="post" autocomplete="off">
            @csrf
            <div class="flex items-center justify-center">
                <div class="block px-10 space-y-5 py-10">
                    <div class="rounded-md px-8 py-5 mb-4 ml-auto mr-auto">
                        <div class="w-full max-w-md mr-auto ml-auto mt-4 mb-1 text-center">
                            <h1 class="text-gray-300 block text-3xl font-extrabold font-title uppercase">LOGIN</h1>
                            {{-- @include('component/alert') --}}
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3 mt-3">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2"
                                    for="email">
                                    Email
                                </label>
                                <input name="email"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="email" type="email" placeholder="Email" value="{{ Session::get('email') }}"
                                    required>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2"
                                    for="password">
                                    password
                                </label>
                                <input name="password"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="password" type="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="mb-2 block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                id="btn-login" name="submit">
                                LOG IN
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection