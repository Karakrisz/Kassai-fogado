<!-- Title page -->
<section class="bg-img1 txt-center bg-overlay3 p-l-15 p-r-15 p-t-92 p-b-102 title-section"
    style="background-image: url('karaKrisz/img/section-bg.jpg');">
    <h2 class="l2-txt5 txt-center p-b-15">
        Rólunk
    </h2>

    <div class="flex-w flex-c-m">
        <span>
            <a href="/" class="m1-txt4 hov-cl1">
                Kezdőlap
            </a>
            <span class="m1-txt5 m-r-6 m-l-1">/</span>
        </span>

        <span class="m1-txt5">
            Panzió
        </span>
    </div>
</section>


<!-- about -->
<section class="sec-about bg4 p-t-80 p-b-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-b-30 text-center">
                <div class="p-t-10">
                    <div class="p-b-29">
                        <h3 class="l2-txt2 p-b-2">
                            Panzió
                        </h3>

                        <p class="m3-txt1">
                            Szeretettel köszöntjük honlapunkon!
                        </p>
                    </div>


                    <h4 class="m1-txt9 p-b-15">
                        Szállásárak
                    </h4>

                    <p class="s1-txt8 p-b-25">
                        1 fő (1 szoba): 14.500 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        2 fő (1 szoba): 16.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        2 fő (1 apartman): 22.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        1 fő (1 apartman): 20.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        1 apartman (4 fő): 26.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        1 apartman (5fő): 28.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        1 apartman (6fő): 30.000 Ft/éjszaka
                    </p>

                    <p class="s1-txt8 p-b-25">
                        Kisállat szállás díja: 3500 Ft / éjszaka
                    </p>


                    <h4 class="m1-txt9 p-b-15">
                        Gyermek kedvezmények
                    </h4>

                    <p class="s1-txt8 p-b-25">
                        3 éves korig ingyenes
                    </p>

                    <p class="s1-txt8 p-b-25">
                        A szobákat az érkezés napján 14:00 órától 20:00 óráig lehet elfoglalni (vasárnap és ünnepnapokon
                        legkésőbb 16 óráig!), és az elutazás napján 10:00 óráig kérjük elhagyni.
                    </p>

                    <p class="s1-txt8 p-b-25">
                        Recepciónk nyitvatartása megegyezik az étterem nyitvatartásával, ezáltal éjszakai recepcióval
                        nem rendelkezünk!
                    </p>

                    <p class="s1-txt8 p-b-25">
                        <strong>Megértésüket köszönjük!</strong>
                    </p>

                    <h4 class="m1-txt9 p-b-15">
                        Reggeli
                    </h4>

                    <p class="s1-txt8 p-b-25">
                        Lehetőség van hideg és meleg reggeli fogyasztására.
                    </p>
                    <p class="s1-txt8 p-b-25">
                        Félpanziós ellátás ára: 5490 Ft / fő, mely tartalmazza a reggelit és egy két fogásos vacsorát.
                    </p>

                    <p class="s1-txt8 p-b-25">
                        Félpanziós ellátás ára: 5490 Ft / fő, mely tartalmazza a reggelit és egy két fogásos vacsorát.
                    </p>

                    <p class="s1-txt8 p-b-25">
                        <strong>Reggeli étkezéssel kapcsolatos szándékát, kérjük a szoba elfoglalását megelőzően
                            jelezze, mivel Fogadónkban nincs állandó reggeliztetés így csak az előre egyeztetett
                            reggeli ételek és italok kiszolgálására van lehetőség.</strong>
                    </p>


                    <h4 class="m1-txt9 p-b-15">
                        Reggeli időpontja
                    </h4>

                    <p class="s1-txt8 p-b-25">
                        <strong>8:00 - 10:00 Időpont megjelöléssel !</strong>
                    </p>


                </div>
            </div>

            <div class="col-md-6 p-b-30 d-none">
                <div class="wrap-pic-w">
                    <img src="images/about-02.jpg" alt="IMG-ABOUT">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section class="sec-gallery bg2 p-t-90 p-b-110">
    <div class="p-l-15 p-r-15 p-b-48">
        <h3 class="l2-txt1 txt-center p-b-2">
            Képtár
        </h3>

        <p class="m3-txt1 txt-center">
            Szeretettel köszöntjük honlapunkon!
        </p>
    </div>

    <div class="flex-w p-l-40 p-r-40 respon1">

        <?php foreach ($allImages as $images): ?>
        <!-- <div class="how-gallery1">
	            <a class="dis-block bg-img1 size8 how-overlay1"
	                href=""
	                data-lightbox="gallery"
	                style="background-image: url('');"></a>
	        </div> -->

        <div class="col-xl-6">
            <?php echo "<img class='sec-gallery__img' alt='Kassai fogadó' src='data:image/jpeg;base64," . base64_encode($images['image']) . "'>"; ?>
        </div>

        <?php endforeach;?>
    </div>
</section>