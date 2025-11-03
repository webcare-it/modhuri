<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    <link rel="icon" href="{{asset('setting/'.$setting->logo)}}"/>
    <meta name="facebook-domain-verification" content="ieyemwwciplmb8zl8f4n32ghwihek7" />
    <!-- Pavicon ICon -->
    @include('frontend.v-2.includes.style')
<!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id={{$code->gtm_id ?? 'GTM-XXXXXXX'}}'+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{$code->gtm_id ?? 'GTM-XXXXXXX'}}');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id={{$code->gtm_id ?? 'GTM-XXXXXXX'}}"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

    @include('frontend.v-2.includes.header')

    <main>
        <!-- Home Slider -->
        @yield('content-v2')
        <!-- /Footer top -->
    </main>

    <!-- Footer -->
    @include('frontend.v-2.includes.footer')
    <!-- /Footer -->

            <!-- Jquery CDN -->
    @include('frontend.v-2.includes.script')
    @stack('script')

    <!-- Floating Contact Buttons -->
    <style>
        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .floating-btn a {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            color: #fff;
            font-size: 22px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .floating-btn a:hover {
            transform: scale(1.1);
        }

        .whatsapp-btn { background-color: #25D366; }
        .messenger-btn { background-color: #0084FF; }
        .call-btn { background-color: #FF69B4; } /* your brand pink */
    </style>

    @php
        // Extract the page username from the full Facebook URL
        $facebook_link = $setting->facebook ?? '';
        $facebook_username = '';
        if ($facebook_link) {
            $facebook_username = str_replace('https://www.facebook.com/', '', trim($facebook_link, '/'));
        }
    @endphp

    <div class="floating-btn">
        <!-- WhatsApp -->
        <a href="https://wa.me/+88{{$setting->phone}}" target="_blank" class="whatsapp-btn" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Facebook Messenger -->
        <a href="https://m.me/{{$facebook_username}}" target="_blank" class="messenger-btn" title="Chat on Messenger">
            <i class="fab fa-facebook-messenger"></i>
        </a>

        <!-- Call -->
        <a href="tel:+88{{$setting->phone}}" class="call-btn" title="Call Now">
            <i class="fas fa-phone"></i>
        </a>
    </div>
</body>
</html>

