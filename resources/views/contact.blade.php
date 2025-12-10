<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Content -->
                <h1 class="text-3xl font-bold mb-4">Welcome to GenZPati, {{ $contact }}!</h1>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5325.1881517820875!2d84.42940690679032!3d27.689577463981394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbirendra%20campus!5e1!3m2!1sen!2snp!4v1765367361819!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</x-app-layout>