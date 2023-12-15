<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<header class="showcase">
    <div class="showcase-top">
        <div style="display: flex; align-items: center;">
            <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt=""
                 style="width: 50px; height: auto; margin-top: 10px;" />
        </div>

        @guest
            <a href="{{ route('login') }}" class="btn btn-rounded">Login as Admin</a>
        @endguest
        @auth
        <a href="{{ route('logout') }}" class="btn btn-rounded">Logout</a>
        <a class="btn btn-rounded" href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                class="align-middle">Logout</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
    </div>
    <div class="showcase-content">
        <h1>Dinas Peternakan & Kesehatan Hewan</h1>
        <p>Sistem Buku Tamu Berbasis Web</p>
        @auth
        <div class="text-center">
            <div class="d-flex justify-content-center">
                <a class="btn btn-xl btn-block me-3" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="btn btn-xl btn-block me-3" href="{{ route('datatamu') }}">Data Tamu</a>
            </div>
        </div>

        @endauth
        @guest
            <a href="{{ route('bukutamu') }}" class="btn btn-xl">Buku Tamu</a>
        @endguest
    </div>
</header>

<style>
    /* Global Styles */
    :root {
        --primary-color: #1f58c7;
        --dark-color: #141414;
        --light-color: #f4f4f4;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        -webkit-font-smoothing: antialiased;
        background: #000;
        color: #999;
    }

    ul {
        list-style: none;
    }

    h1,
    h2,
    h3,
    h4 {
        color: #fff;
    }

    a {
        color: #fff;
        text-decoration: none;
    }

    p {
        margin: 0.5rem 0;
    }

    img {
        width: 100%;
    }

    .showcase {
        width: 100%;
        height: 93vh;
        position: relative;
        background: url('https://dispkh.riau.go.id/file/view?id=405') no-repeat center center/cover;
    }

    .showcase::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background: rgba(0, 0, 0, 0.6);
        box-shadow: inset 120px 100px 250px #000000, inset -120px -100px 250px #000000;
    }

    .showcase-top {
        position: relative;
        z-index: 2;
        height: 90px;
    }

    .showcase-top img {
        width: 170px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-left: 0;
    }

    .showcase-top a {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translate(-50%, -50%);
    }

    .showcase-content {
        position: relative;
        z-index: 2;
        width: 65%;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 9rem;
    }

    .showcase-content h1 {
        font-weight: 700;
        font-size: 5.2rem;
        line-height: 1.1;
        margin: 0 0 2rem;
    }

    .showcase-content p {
        text-transform: uppercase;
        color: #fff;
        font-weight: 400;
        font-size: 1.9rem;
        line-height: 1.25;
        margin: 0 0 2rem;
    }

    /* Tabs */
    .tabs {
        background: var(--dark-color);
        padding-top: 1rem;
        border-bottom: 3px solid #3d3d3d;
        border-right: none;
    }

    .tabs .container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 1rem;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .tabs p {
        font-size: 1.2rem;
        padding-top: 0.5rem;
    }

    .tabs .container>div {
        padding: 1.5rem 0;
    }

    .tabs .container>div:hover {
        color: #fff;
        cursor: pointer;
    }

    .tab-border {
        border-bottom: var(--primary-color) 4px solid;
    }

    /* Tab Content */
    .tab-content {
        padding: 3rem 0;
        background: #000;
        color: #fff;
    }

    /* Hide initial content */
    #tab-1-content,
    #tab-2-content,
    #tab-3-content {
        display: none;
        opacity: 0;
    }

    .show {
        display: block !important;
        opacity: 1 !important;
        transition: all 1000 ease-in;
    }

    #tab-1-content .tab-1-content-inner {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 2rem;
        align-items: center;
        justify-content: center;
    }

    #tab-2-content .tab-2-content-top {
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    #tab-2-content .tab-2-content-bottom {
        margin-top: 2rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
        text-align: center;
    }

    .table {
        width: 100%;
        margin-top: 2rem;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .table thead th {
        text-transform: uppercase;
        padding: 0.8rem;
    }

    .table tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .table tbody tr td {
        color: #999;
        padding: 0.8rem 1.2rem;
        text-align: center;
    }

    .table tbody tr td:first-child {
        text-align: left;
    }

    .table tbody tr:nth-child(odd) {
        background: #222;
    }

    .footer {
        max-width: 70%;
        margin: 1rem auto;
        overflow: auto;
    }

    .footer,
    .footer a {
        color: #999;
        font-size: 0.9rem;
    }

    .footer p {
        margin-bottom: 1.5rem;
    }

    .footer .footer-cols {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2rem;
    }

    .footer li {
        line-height: 1.9;
    }

    .footer .lang-select {
        margin-top: 2rem;
        color: #999;
        background-color: #000;
        background-image: none;
        border: 1px solid #333;
        padding: 1rem 1.2rem;
        border-radius: 5px;
    }

    /* Container */
    .container {
        max-width: 70%;
        margin: auto;
        overflow: hidden;
        padding: 0 2rem;
    }

    /* Text Styles */
    .text-xl {
        font-size: 2rem;
    }

    .text-lg {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .text-md {
        margin-bottom: 1.5rem;
        font-size: 1.2rem;
    }

    .text-center {
        text-align: center;
    }

    .text-dark {
        color: #999;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        background: var(--primary-color);
        color: #fff;
        padding: 0.4rem 1.3rem;
        font-size: 1rem;
        text-align: center;
        border: none;
        cursor: pointer;
        margin-right: 0.5rem;
        transition: opacity 0.2s ease-in;
        outline: none;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.45);
        border-radius: 2px;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn-rounded {
        border-radius: 5px;
    }

    .btn-xl {
        font-size: 2rem;
        padding: 1.5rem 2.1rem;
        text-transform: uppercase;
    }

    .btn-lg {
        font-size: 1rem;
        padding: 0.8rem 1.3rem;
        text-transform: uppercase;
    }

    .btn-icon {
        margin-left: 1rem;
    }

    @media (max-width: 960px) {

        .showcase {
            height: 70vh;
        }

        .hide-sm {
            display: none;
        }

        .showcase-top img {
            top: 30%;
            left: 5%;
            transform: translate(0);
        }

        .showcase-content h1 {
            font-size: 3.7rem;
            line-height: 1;
        }

        .showcase-content p {
            font-size: 1.5rem;
        }

        .footer .footer-cols {
            grid-template-columns: repeat(2, 1fr);
        }

        .btn-xl {
            font-size: 1.5rem;
            padding: 1.4rem 2rem;
            text-transform: uppercase;
        }

        .text-xl {
            font-size: 1.5rem;
        }

        .text-lg {
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .text-md {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
    }

    @media (max-width: 700px) {
        .showcase::after {
            background: rgba(0, 0, 0, 0.6);
            box-shadow: inset 80px 80px 150px #000000, inset -80px -80px 150px #000000;
        }

        .showcase-content h1 {
            font-size: 2.5rem;
            line-height: 1;
        }

        .showcase-content p {
            font-size: 1rem;
        }

        #tab-1-content .tab-1-content-inner {
            grid-template-columns: 1fr;
            text-align: center;
        }

        #tab-2-content .tab-2-content-top {
            display: block;
            text-align: center;
        }

        #tab-2-content .tab-2-content-bottom {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 2rem;
            text-align: center;
        }

        .btn-xl {
            font-size: 1rem;
            padding: 1.2rem 1.6rem;
            text-transform: uppercase;
        }
    }

    @media(max-height: 600px) {
        .showcase-content {
            margin-top: 3rem;
        }
    }
</style>

<script>
    const tabItems = document.querySelectorAll('.tab-item');
    const tabContentItems = document.querySelectorAll('.tab-content-item');

    // Select tab content item
    function selectItem(e) {
        // Remove all show and border classes
        removeBorder();
        removeShow();
        // Add border to current tab item
        this.classList.add('tab-border');
        // Grab content item from DOM
        const tabContentItem = document.querySelector(`#${this.id}-content`);
        // Add show class
        tabContentItem.classList.add('show');
    }

    // Remove bottom borders from all tab items
    function removeBorder() {
        tabItems.forEach(item => {
            item.classList.remove('tab-border');
        });
    }

    // Remove show class from all content items
    function removeShow() {
        tabContentItems.forEach(item => {
            item.classList.remove('show');
        });
    }

    // Listen for tab item click
    tabItems.forEach(item => {
        item.addEventListener('click', selectItem);
    });
</script>
