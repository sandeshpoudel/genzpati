<footer class="bg-gray-900 text-gray-300 mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- About -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">About GenZPati</h3>
                <p class="text-sm leading-relaxed">
                    GenZPati.com is your trusted source for the latest news, opinions, 
                    and analysis on national and international topics. 
                    We deliver accurate, unbiased, and timely updates to keep you informed.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ url('/privacy-policy') }}" class="hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms') }}" class="hover:text-white">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Newsletter / Social -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Stay Connected</h3>
                <form action="#" method="POST" class="mb-4">
                    @csrf
                    <div class="flex">
                        <input type="email" 
                               name="email" 
                               placeholder="Enter your email" 
                               class="w-full px-3 py-2 rounded-l-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               required>
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700">
                            Subscribe
                        </button>
                    </div>
                </form>

                <div class="flex space-x-4">
                    <a href="https://facebook.com/genzpati" target="_blank" class="hover:text-white">Facebook</a>
                    <a href="https://twitter.com/genzpati" target="_blank" class="hover:text-white">Twitter</a>
                    <a href="https://instagram.com/genzpati" target="_blank" class="hover:text-white">Instagram</a>
                    <a href="https://youtube.com/genzpati" target="_blank" class="hover:text-white">YouTube</a>
                </div>
            </div>
        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} GenZPati.com — All Rights Reserved.
        </div>
    </div>
</footer>
<!-- Footer -->