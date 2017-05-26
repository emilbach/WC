<!DOCTYPE HTML>
<html>
<head>
    <title>Water Company</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{URL('css/main.css')}}" />

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <div style="font-weight: bold; position: absolute; top: 2%; right: 2%;">
        @if (Route::has('login'))
            <div>
                @if (Auth::check())
                    <a href="{{ url('/home') }}">My Profile</a>
                @else
                    <a class="button" href="{{ url('/login') }}">Login</a>
                    <a class="button" href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif
    </div>
    <header id="header">
        <div class="content">
            <div class="inner">
                <h1>Water Company</h1>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main">

        <!-- About -->
        <article id="about">
            <h2 class="major">About</h2>
            <span class="image main"><img src="{{URL('/images/water.jpg')}}" alt="" /></span>
            <p style="text-align: justify; font-weight: bold">
                Inquietude simplicity terminated she compliment remarkably few her nay.
                The weeks are ham asked jokes. Neglected perceived shy nay concluded.
                Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my.
                Money doubt oh drawn every or an china. Visited out friends for expense message set eat.
            </p>
        </article>

        <!-- Contact -->
        <article id="contact">
            <h2 class="major">Contact</h2>
            <form method="post" action="#">
                <div class="field half first">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" />
                </div>
                <div class="field half">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" />
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="4"></textarea>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="special" /></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </form>
        </article>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <p>Made by: Emil Bah & Filip Ilieski</p>
    </footer>

</div>

<!-- BG -->
<div id="bg"></div>

<!-- Scripts -->
<script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('/js/skel.min.js')}}"></script>
<script type="text/javascript" src="{{URL('/js/util.js')}}"></script>
<script type="text/javascript" src="{{URL('/js/main.js')}}"></script>

</body>
</html>
