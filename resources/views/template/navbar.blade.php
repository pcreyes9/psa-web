<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{route('home')}}" >Home<br></a></li>
        <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{route('officers-boards')}}">Officers & Board</a></li>

                <li class="dropdown"><a href="{{ route('subspec-sig') }}"><span>Subspecialty & SIG</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('subspec-activity') }}">RASPHIL CONVENTION 2026</a></li>
                    </ul>
                </li>

                <li><a href="{{route('chapter-pres')}}">Chapter Presidents</a></li>
                <li class="dropdown"><a href="#"><span>Legacy</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{route('past-presidents')}}">Past Presidents</a></li>
                        <li><a href="{{route('quintin')}}">Quintin J. Gomez Awardee</a></li>
                        <li><a href="{{route('silao')}}">Manuel V. Silao Leadership Awardee</a></li>
                        <li><a href="{{route('hymn')}}">PSA Hymn</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>CME Activities</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li class="dropdown"><a href="#"><span>Convention</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>Midyear 2026</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('midyear-poster') }}">Poster</a></li>
                                <li><a href="{{ route('midyear-registration-deets') }}">Registration</a></li>
                                {{-- <li><a href="#">Annual</a></li> --}}
                            </ul>
                        </li>
                        <li><a target="_blank" href="https://aca2025manila.org/">ACA 2025 Manila</a></li>
                        {{-- <li class="dropdown"><a href="#"><span>Annual</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Poster</a></li>
                                <li><a href="#">Registration</a></li>
                                <li><a href="#">Program</a></li>
                                <li><a href="#">Call For Abstracts</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
                <li><a href="#">Tagisan ng Talino</a></li>
                <li><a href="#">Interesting Case Contest</a></li>
                {{-- <li><a href="#">Clinical Case Conference</a></li> --}}
                <li><a href="{{route('pja')}}">PJA</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Links</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a target="_blank" href="https://www.koreanesthesia.org/">Koreanethesia 2025</a></li>
                <li><a target="_blank" href="https://aca2025manila.org/">Asean Congress of Anesthesiologists 2025</a></li>
                <li><a target="_blank" href="https://wcacongress.org/">World Congress of Anesthesiologists (WCA)</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li class="dropdown"><a href="#"><span>ACA 2025</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{route('gallery-aca', ['day' => 'day1'])}}">Day 1</a></li>
                        <li><a href="{{route('gallery-aca', ['day' => 'day2'])}}">Day 2</a></li>
                        <li><a href="{{route('gallery-aca', ['day' => 'day3'])}}">Day 3</a></li>
                        {{-- <li class="dropdown"><a href="#"><span>Midyear</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Midyear</a></li>
                                <li><a href="#">Annual</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Membership</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                {{-- <li><a href="{{route('new-member')}}">Be a PSA Member</a></li> --}}
            </ul>
        </li>
        {{-- <li><a href="#contact">Contact</a></li> --}}

        {{-- <li class="listing-dropdown"><a href="#"><span>Listing Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li>
                <a href="#">Column 1 link 1</a>
                <a href="#">Column 1 link 2</a>
                <a href="#">Column 1 link 3</a>
                </li>
                <li>
                <a href="#">Column 2 link 1</a>
                <a href="#">Column 2 link 2</a>
                <a href="#">Column 3 link 3</a>
                </li>
                <li>
                <a href="#">Column 3 link 1</a>
                <a href="#">Column 3 link 2</a>
                <a href="#">Column 3 link 3</a>
                </li>
                <li>
                <a href="#">Column 4 link 1</a>
                <a href="#">Column 4 link 2</a>
                <a href="#">Column 4 link 3</a>
                </li>
                <li>
                <a href="#">Column 5 link 1</a>
                <a href="#">Column 5 link 2</a>
                <a href="#">Column 5 link 3</a>
                </li>
            </ul>
        </li> --}}
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
