<header class="header sticky-bar">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-1"></div>
            <div class="col-xl-10 col-lg-12">
                <div class="main-header">
                    <div class="header-logo"><a class="d-flex" href="index.html"><img class="logo-night"
                                alt="Funky Frontend" src="{{ asset('imgs/template/logo.svg') }}"><img
                                class="d-none logo-day" alt="Funky Frontend"
                                src="{{ asset('imgs/template/logo-day.svg') }}"></a></div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <x-links />
                            </ul>
                        </nav>
                        <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                                class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                    </div>
                    <div class="header-right text-end"><a class="btn btn-search" href="#"></a>
                        <div class="form-search p-20">
                            <form action="#">
                                <input class="form-control" type="text" placeholder="Search">
                                <input class="btn-search-2" type="submit" value="">
                            </form>
                        </div>
                        <div class="switch-button">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                    role="switch" checked="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    // DARK / LIGHT MODE
    const toggleSwitch = document.querySelector('#flexSwitchCheckChecked');
    const currentTheme = localStorage.getItem('theme');
    let currentSection = localStorage.getItem('section');

    if (currentTheme) {
        document.documentElement.classList.add(`theme-${currentTheme}`);
        toggleSwitch.checked = currentTheme === 'night';
    }

    if (currentSection) {
        showSection(currentSection);
    }

    function switchTheme(e) {
        const isDarkMode = e.target.checked;
        document.documentElement.classList.toggle('theme-night', isDarkMode);
        document.documentElement.classList.toggle('theme-day', !isDarkMode);
        localStorage.setItem('theme', isDarkMode ? 'night' : 'day');
    }

    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach((section) => {
            if (section.id === sectionId) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
        localStorage.setItem('section', sectionId);
    }

    toggleSwitch.addEventListener('change', switchTheme, false);

    document.querySelectorAll('.nav-link').forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const sectionId = e.target.getAttribute('href').slice(1);
            showSection(sectionId);
        });
    });
</script>