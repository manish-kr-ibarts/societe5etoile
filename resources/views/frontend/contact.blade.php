@extends('frontend.layout.main')

@section('title', 'Contact Us - Elite Society')

@section('content')

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16">
            <span class="text-amber-600 font-semibold uppercase tracking-widest text-sm">Contact Us</span>
            <h1 class="text-5xl font-extrabold mt-5 text-slate-900">Get in Touch</h1>
            <p class="mt-6 text-slate-600 text-lg max-w-2xl mx-auto leading-relaxed">
                We'd love to hear from you. Please fill out the form below or reach out to us directly.
            </p>
        </div>

        <div class="max-w-3xl mx-auto bg-white shadow-xl shadow-slate-200/50 rounded-2xl p-8 lg:p-12 border border-slate-100">
            <form action="#" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="john@example.com">
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="How can we help?">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="Your message here..."></textarea>
                </div>
                <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-4 rounded-xl transition text-lg">Send Message</button>
            </form>
        </div>
    </div>
</section>

@endsection
