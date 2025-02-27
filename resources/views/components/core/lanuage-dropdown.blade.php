<div class="relative inline-block text-left z-50 md:mr-6 mr-1">
    <div class="flex items-center justify-center">
        <button type="button"
                class="inline-flex justify-center  rounded-md border border-gray-300 shadow-sm md:px-4 md:py-2 py-1 bg-white text-xs md:text-sm  font-semibold text-gray-700 hover:bg-gray-50 px-1"
                id="language-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="flex items-center" id="selected-language">
                <svg class="h-4 w-4 mr-2" viewBox="0 0 640 480">
                    <g fill-rule="evenodd" stroke-width="1pt">
                        <path fill="#012169" d="M0 0h640v480H0z"/>
                        <path fill="#fff"
                              d="M75 0l244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
                        <path fill="#c8102e"
                              d="M424 281l216 159v40L369 281h55zm-184 20l6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/>
                        <path fill="#fff" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/>
                        <path fill="#c8102e" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/>
                    </g>
                </svg>
                English
            </span>
        </button>
    </div>

    <div class="origin-top-right absolute right-0 mt-2 rounded-md shadow-lg bg-white hidden" role="menu"
         aria-orientation="vertical" aria-labelledby="language-menu-button" tabindex="-1" id="language-menu">
        <div class="py-1" role="none">
            <a href="{{route('changeLocale', ['locale' => 'en'])}}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
               role="menuitem" tabindex="-1" id="language-menu-item-en" data-lang="en">
                <svg class="h-4 w-4 mr-2" viewBox="0 0 640 480">
                    <g fill-rule="evenodd" stroke-width="1pt">
                        <path fill="#012169" d="M0 0h640v480H0z"/>
                        <path fill="#fff"
                              d="M75 0l244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
                        <path fill="#c8102e"
                              d="M424 281l216 159v40L369 281h55zm-184 20l6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/>
                        <path fill="#fff" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/>
                        <path fill="#c8102e" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/>
                    </g>
                </svg>
                English
            </a>
            <a href="{{route('changeLocale', ['locale' => 'sp'])}}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
               role="menuitem" tabindex="-1" id="language-menu-item-sp" data-lang="sp">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                     preserveAspectRatio="xMidYMid meet" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#C60A1D"
                              d="M36 27a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v18z"></path>
                        <path fill="#FFC400" d="M0 12h36v12H0z"></path>
                        <path fill="#EA596E" d="M9 17v3a3 3 0 1 0 6 0v-3H9z"></path>
                        <path fill="#F4A2B2" d="M12 16h3v3h-3z"></path>
                        <path fill="#DD2E44" d="M9 16h3v3H9z"></path>
                        <ellipse fill="#EA596E" cx="12" cy="14.5" rx="3" ry="1.5"></ellipse>
                        <ellipse fill="#FFAC33" cx="12" cy="13.75" rx="3" ry=".75"></ellipse>
                        <path fill="#99AAB5" d="M7 16h1v7H7zm9 0h1v7h-1z"></path>
                        <path fill="#66757F" d="M6 22h3v1H6zm9 0h3v1h-3zm-8-7h1v1H7zm9 0h1v1h-1z"></path>
                    </g>
                </svg>
                Spanish
            </a>
            <a href="{{route('changeLocale', ['locale' => 'zh'])}}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
               role="menuitem" tabindex="-1" id="language-menu-item-zh" data-lang="zh">
                <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 130 120" enable-background="new 0 0 130 120" xml:space="preserve" width="64px"
                     height="64px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Infos">
                            <rect id="BG" x="-350" y="-1350" fill="#D8D8D8" width="2180" height="1700"></rect>
                        </g>
                        <g id="Others">
                            <g>
                                <rect fill="#DC4437" width="130" height="120"></rect>
                                <polygon fill="#FCBE1F"
                                         points="31,14.5 36.9,27 50,29 40.5,38.8 42.7,52.5 31,46 19.3,52.5 21.5,38.8 12,29 25.1,27 "></polygon>
                                <polygon fill="#FCBE1F"
                                         points="60.5,8 62.8,12.9 68,13.7 64.2,17.6 65.1,23 60.5,20.4 55.9,23 56.8,17.6 53,13.7 58.2,12.9 "></polygon>
                                <polygon fill="#FCBE1F"
                                         points="64.5,25.8 66.8,30.8 72,31.6 68.2,35.4 69.1,40.8 64.5,38.3 59.9,40.8 60.8,35.4 57,31.6 62.2,30.8 "></polygon>
                                <polygon fill="#FCBE1F"
                                         points="60.5,44 62.8,48.9 68,49.7 64.2,53.6 65.1,59 60.5,56.4 55.9,59 56.8,53.6 53,49.7 58.2,48.9 "></polygon>
                            </g>
                        </g>
                        <g id="Europe">
                            <g id="Row_5"></g>
                            <g id="Row_4"></g>
                            <g id="Row_3"></g>
                            <g id="Row_2"></g>
                            <g id="Row_1"></g>
                        </g>
                    </g></svg>
                Chinese
            </a>
            <a href="{{route('changeLocale', ['locale' => 'pt'])}}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
               role="menuitem" tabindex="-1" id="language-menu-item-pt" data-lang="pt">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                     fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#060"
                              d="M36 27a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v18z"></path>
                        <path fill="#D52B1E" d="M32 5H15v26h17a4 4 0 0 0 4-4V9a4 4 0 0 0-4-4z"></path>
                        <path fill="#FFCC4D"
                              d="M15 10a8 8 0 0 0-8 8a8 8 0 1 0 16 0a8 8 0 0 0-8-8zm-6.113 4.594l1.602 1.602l-2.46 1.23a6.95 6.95 0 0 1 .858-2.832zm-.858 3.979l4.4 2.207l-2.706 1.804l.014.021a6.963 6.963 0 0 1-1.708-4.032zM14 24.92a6.945 6.945 0 0 1-2.592-.92H14v.92zM14 23h-3.099L14 20.934V23zm0-3.268l-.607.405L9.118 18l2.116-1.058L14 19.707v.025zm0-1.439l-3.543-3.543l3.543.59v2.953zm0-3.992l-4.432-.713A6.983 6.983 0 0 1 14 11.08v3.221zm7.113.293a6.95 6.95 0 0 1 .858 2.833l-2.46-1.23l1.602-1.603zM16 11.08a6.987 6.987 0 0 1 4.432 2.508L16 14.301V11.08zm0 4.26l3.543-.591L16 18.293V15.34zm0 4.367l2.765-2.765L20.882 18l-4.274 2.137l-.608-.405v-.025zm0 5.213V24h2.592a6.945 6.945 0 0 1-2.592.92zM16 23v-2.066L19.099 23H16zm4.264-.395l.014-.021l-2.706-1.804l4.4-2.207a6.976 6.976 0 0 1-1.708 4.032z"></path>
                        <path fill="#D52B1E" d="M11 13v7a4 4 0 0 0 8 0v-7h-8z"></path>
                        <path fill="#FFF" d="M12 14v6a3 3 0 0 0 6 0v-6h-6z"></path>
                        <path fill="#829ACD" d="M13 17h4v2h-4z"></path>
                        <path fill="#829ACD" d="M14 16h2v4h-2z"></path>
                        <path fill="#039" d="M12 17h1v2h-1zm2 0h2v2h-2zm3 0h1v2h-1zm-3 3h2v2h-2zm0-6h2v2h-2z"></path>
                    </g>
                </svg>
                Portugal
            </a>
            <a href="{{route('changeLocale', ['locale' => 'fr'])}}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
               role="menuitem" tabindex="-1" id="language-menu-item-fr" data-lang="fr">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                     fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#ED2939" d="M36 27a4 4 0 0 1-4 4h-8V5h8a4 4 0 0 1 4 4v18z"></path>
                        <path fill="#002495" d="M4 5a4 4 0 0 0-4 4v18a4 4 0 0 0 4 4h8V5H4z"></path>
                        <path fill="#EEE" d="M12 5h12v26H12z"></path>
                    </g>
                </svg>
                French
            </a>

        </div>
    </div>
</div>

<script>
    const button = document.getElementById('language-menu-button');
    const menu = document.getElementById('language-menu');
    const selectedLanguage = document.getElementById('selected-language');
    const languageItems = document.querySelectorAll('[id^="language-menu-item-"]');

    // Function to update the button content
    function updateButtonContent(lang) {
        const selectedItem = document.getElementById(`language-menu-item-${lang}`);
        if (selectedItem) {
            selectedLanguage.innerHTML = selectedItem.innerHTML;
        }
    }

    // Load saved language preference
    const savedLang = localStorage.getItem('selectedLanguage') || 'en';
    updateButtonContent(savedLang);

    button.addEventListener('click', () => {
        const expanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !expanded);
        menu.classList.toggle('hidden');
    });

    languageItems.forEach(item => {
        item.addEventListener('click', (e) => {
            const lang = item.getAttribute('data-lang');
            updateButtonContent(lang);
            localStorage.setItem('selectedLanguage', lang);
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        });
    });

    document.addEventListener('click', (event) => {
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            button.setAttribute('aria-expanded', 'false');
            menu.classList.add('hidden');
        }
    });
</script>
