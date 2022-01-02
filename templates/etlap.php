	<!-- Title page -->
	<section class="bg-img1 txt-center bg-overlay3 p-l-15 p-r-15 p-t-92 p-b-102"
	    style="background-image: url('karaKrisz/img/section-bg.jpg');">
	    <h2 class="l2-txt5 txt-center p-b-15">
	        Étlap
	    </h2>

	    <div class="flex-w flex-c-m">
	        <span>
	            <a href="/" class="m1-txt4 hov-cl1">
	                Kezdőlap
	            </a>
	            <span class="m1-txt5 m-r-6 m-l-1">/</span>
	        </span>

	        <span class="m1-txt5">
	            Étlap
	        </span>
	    </div>
	</section>


	<!-- Menu -->
	<div class="sec-menu bg-img1 p-t-80 p-b-80" style="background-image: url('karaKrisz/img/menu-bg.jpg');">
	    <div class="container">
	        <!--  -->
	        <div class="p-t-20">
	            <div class="row">
	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay4 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-02.jpg');">
	                            Levesek
	                        </div>

	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($getsoup as $soup) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($soup['soup_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($soup['soup_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($soup['soup_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>

	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay5 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-03.jpg');">
	                            Magyaros fogások
	                        </div>
	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($gethungarianDishes as $hungarianDishes) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($hungarianDishes['hungarianDishes_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($hungarianDishes['hungarianDishes_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($hungarianDishes['hungarianDishes_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>
	            </div>
	        </div>


	        <!--  -->
	        <div class="p-t-20">
	            <div class="row">
	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay6 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-04.jpg');">
	                            Főételek
	                        </div>

	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($getmainCourses as $mainCourses) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($mainCourses['mainCourses_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($mainCourses['mainCourses_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($mainCourses['mainCourses_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>

	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay7 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-05.jpg');">
	                            Desszertek
	                        </div>

	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($getdesserts as $desserts) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($desserts['desserts_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($desserts['desserts_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($desserts['desserts_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>

	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay5 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-05.jpg');">
	                            Köretek
	                        </div>

	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($getgarnishes as $garnishes) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($garnishes['garnishes_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($garnishes['garnishes_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($garnishes['garnishes_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>

	                <div class="col-md-6 p-b-30">
	                    <div>
	                        <div class="flex-c-m bg-img1 bg-overlay4 l1-txt2 hsize2 p-l-15 p-r-15 p-t-30 p-b-30"
	                            style="background-image: url('images/bg-menu-05.jpg');">
	                            Házi savanyúságok
	                        </div>

	                        <ul class="sec-menu__ul">
	                            <!-- item menu -->
	                            <?php foreach ($gethomemadePickles as $homemadePickles) : ?>
	                            <li class="flex-m bor7 p-l-20 p-r-20 p-t-25 p-b-25 sec-menu__ul__li">
	                                <div class="wsize11" class="sec-menu__ul__li__div">
	                                    <a class="m2-txt5 hov-cl1 trans-04 sec-menu__ul__li__div__link">
	                                        <?php esc($homemadePickles['homemadePickles_name'])?>
	                                    </a>

	                                    <p class="s1-txt3 p-t-9" class="sec-menu__ul__li__div__link__p">
	                                        <?php esc($homemadePickles['homemadePickles_characterization'])?>
	                                    </p>
	                                </div>

	                                <div class="l2-txt6 p-l-20 sec-menu__ul__li__div">
	                                    <span class="sec-menu__ul__li__div__span">
	                                        <?php esc($homemadePickles['homemadePickles_price'])?> <strong
	                                            class="sec-menu__ul__li__div__span__strong">Ft</strong>
	                                    </span>
	                                </div>
	                            </li>
	                            <?php endforeach; ?>
	                        </ul>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


	<!-- Our Team -->
	<section class="sec-team bg2 p-t-90 p-b-55">
	    <div class="container">
	        <div class="p-b-93">
	            <h3 class="l2-txt1 txt-center p-b-2">
	                Our Perfect Team
	            </h3>

	            <p class="m3-txt1 txt-center">
	                Discover & Older
	            </p>
	        </div>

	        <div class="row">
	            <div class="col-sm-6 col-lg-3 p-b-65">
	                <div class=" how-icon2-parent hov2">
	                    <div class="how-icon2 trans-04">
	                        <img src="images/icons/icon-04.png" alt="IMG">
	                    </div>

	                    <div class="how-shadow1">
	                        <a href="#" class="wrap-pic-w">
	                            <img src="images/team-01.jpg" alt="IMG-TEAM">
	                        </a>

	                        <div class="flex-col-c-m bg4 p-t-15 p-b-13 p-l-15 p-r-15">
	                            <a href="#" class="m1-txt2 hov-cl1 trans-04 txt-center">
	                                Bobby Douglas
	                            </a>

	                            <span class="m1-txt3 txt-center p-t-4">
	                                Chef
	                            </span>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="col-sm-6 col-lg-3 p-b-65">
	                <div class=" how-icon2-parent hov2">
	                    <div class="how-icon2 trans-04">
	                        <img src="images/icons/icon-05.png" alt="IMG">
	                    </div>

	                    <div class="how-shadow1">
	                        <a href="#" class="wrap-pic-w">
	                            <img src="images/team-02.jpg" alt="IMG-TEAM">
	                        </a>

	                        <div class="flex-col-c-m bg4 p-t-15 p-b-13 p-l-15 p-r-15">
	                            <a href="#" class="m1-txt2 hov-cl1 trans-04 txt-center">
	                                Daniel Griffin
	                            </a>

	                            <span class="m1-txt3 txt-center p-t-4">
	                                Cooking
	                            </span>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="col-sm-6 col-lg-3 p-b-65">
	                <div class=" how-icon2-parent hov2">
	                    <div class="how-icon2 trans-04">
	                        <img src="images/icons/icon-06.png" alt="IMG">
	                    </div>

	                    <div class="how-shadow1">
	                        <a href="#" class="wrap-pic-w">
	                            <img src="images/team-03.jpg" alt="IMG-TEAM">
	                        </a>

	                        <div class="flex-col-c-m bg4 p-t-15 p-b-13 p-l-15 p-r-15">
	                            <a href="#" class="m1-txt2 hov-cl1 trans-04 txt-center">
	                                Hannah Pena
	                            </a>

	                            <span class="m1-txt3 txt-center p-t-4">
	                                Processing
	                            </span>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="col-sm-6 col-lg-3 p-b-65">
	                <div class=" how-icon2-parent hov2">
	                    <div class="how-icon2 trans-04">
	                        <img src="images/icons/icon-07.png" alt="IMG">
	                    </div>

	                    <div class="how-shadow1">
	                        <a href="#" class="wrap-pic-w">
	                            <img src="images/team-04.jpg" alt="IMG-TEAM">
	                        </a>

	                        <div class="flex-col-c-m bg4 p-t-15 p-b-13 p-l-15 p-r-15">
	                            <a href="#" class="m1-txt2 hov-cl1 trans-04 txt-center">
	                                Henry Romero
	                            </a>

	                            <span class="m1-txt3 txt-center p-t-4">
	                                Waiters
	                            </span>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>


	<!-- CTA -->
	<!-- <div class="parallax100 flex-col-c-m bg-overlay3 p-l-15 p-r-15 p-t-110 p-b-110"
	    style="background-image: url('images/bg-09.jpg');">
	    <span class="l3-txt2 p-b-30 txt-center">
	        We Love Perfect and Sweet.
	    </span>

	    <a href="reservation-01.html" class="flex-c-m s1-txt1 size6 how-btn2 bg1 trans-04 p-l-15 p-r-15">
	        Booking Now
	    </a>
	</div> -->