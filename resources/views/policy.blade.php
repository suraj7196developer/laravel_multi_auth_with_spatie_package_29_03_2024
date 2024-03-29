<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <div class="form-head">
                <a href="{{url('/')}}" class="logo"><img src="{{ asset('assets/images/logo.svg') }}" class="img-fluid" alt="logo"></a>
            </div>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>
