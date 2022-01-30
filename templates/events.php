<section class="food_options text-center mt-200">
    <div class="container">
        <h2 class="mb-100">Rendezvényi ételek rögzítése</h2>
        <?php if($foodFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">Az ételt rögzítettük!</p>
        </div>
        <?php endif ?>
        <?php if($dataDelete): ?>
        <div class="alert alert-danger food_options__alert">
            <p class="food_options__alert__p">Az ételt töröltük!</p>
        </div>
        <?php endif ?>
        <ul class="food_options-ul nav nav-tabs d-flex justify-content-center">
            <!-- <li class="active">
                <a href="#tab1" data-toggle="tab">Napi ajánlat</a>
            </li> -->
            <li class="active">
                <a class="food_options__elem__link--mr-formating" href="#events_tab2" data-toggle="tab">Kapos Menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab3" data-toggle="tab">Családi Menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab4" data-toggle="tab">Kassai Menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab5" data-toggle="tab">Zselici Menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab6" data-toggle="tab">Mérő menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab7" data-toggle="tab">Vegetáriánus
                    menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab8" data-toggle="tab">Klasszik
                    menü</a>
            </li>
            <li>
                <a class="food_options__elem__link--mr-formating" href="#events_tab9" data-toggle="tab">Lakodalmas
                    menü</a>
            </li>
        </ul>
        <div class="mt-100 tab-content">

            <div class="tab-pane active" id="events_tab2">
                <form id="kaposMenuSubmit" method="POST" action="/kaposMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="kaposMenu">Kapos Menü (pl: leves)</label>
                            <input type="text" id="kaposMenu_name" name="kaposMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="kaposMenu-characterization">Kapos Menü jellemzése</label>
                            <input type="text" id="kaposMenu_characterization" name="kaposMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="kaposMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#kaposMenuModal">
                    Kapos Menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="kaposMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Kapos Menü</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getkaposMenu as $kaposMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($kaposMenu['id'])  ?>/kaposMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($kaposMenu["kaposMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="events_tab3">
                <form id="familyMenuSubmit" method="POST" action="/familyMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="familyMenu">Családi menü</label>
                            <input type="text" id="familyMenu_name" name="familyMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="familyMenu-characterization">Családi menü jellemzése</label>
                            <input type="text" id="familyMenu_characterization" name="familyMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="familyMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#familyMenuModal">
                    Családi menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="familyMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Családi menü</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getfamilyMenu as $familyMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($familyMenu['id'])  ?>/familyMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($familyMenu["familyMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="events_tab4">
                <form id="kassaiMenuSubmit" method="POST" action="/kassaiMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="kassaiMenu">Kassai</label>
                            <input type="text" id="kassaiMenu_name" name="kassaiMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="kassaiMenu-characterization">Kassai menü jellemzése</label>
                            <input type="text" id="kassaiMenu_characterization" name="kassaiMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="kassaiMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#kassaiMenuModal">
                    Kassai menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="kassaiMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Kassai menü</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getkassaiMenu as $kassaiMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($kassaiMenu['id'])  ?>/kassaiMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($kassaiMenu["kassaiMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="events_tab5">
                <form id="zseleciMenuSubmit" method="POST" action="/zseleciMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="zseleciMenu">Zseleci menü</label>
                            <input type="text" id="zseleciMenu_name" name="zseleciMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="zseleciMenu-characterization">Zseleci menü jellemzése</label>
                            <input type="text" id="zseleciMenu_characterization" name="zseleciMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="zseleciMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#zseleciMenuModal">
                    Zseleci menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="zseleciMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Zseleci menü</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getzseleciMenu as $zseleciMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($zseleciMenu['id'])  ?>/zseleciMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($zseleciMenu["zseleciMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="events_tab6">
                <form id="meroMenuSubmit" method="POST" action="/meroMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="meroMenu">Mérői menü</label>
                            <input type="text" id="meroMenu_name" name="meroMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="meroMenu-characterization">Mérői menü jellemzése</label>
                            <input type="text" id="meroMenu_characterization" name="meroMenu_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="meroMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#meroMenuModal">
                    Mérői menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="meroMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Mérői menü ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getmeroMenu as $meroMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($meroMenu['id'])  ?>/meroMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($meroMenu["meroMenu_name"]) ?></h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="events_tab7">
                <form id="vegetarianMenuSubmit" method="POST" action="/vegetarianMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="vegetarianMenu">Vegetáriánus</label>
                            <input type="text" id="vegetarianMenu_name" name="vegetarianMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="vegetarianMenu-characterization">Vegetáriánus menü jellemzése</label>
                            <input type="text" id="vegetarianMenu_characterization"
                                name="vegetarianMenu_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="vegetarianMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal"
                    data-target="#vegetarianMenuModal">
                    Vegetáriánus rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="vegetarianMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Vegetáriánus ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getvegetarianMenu as $vegetarianMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($vegetarianMenu['id'])  ?>/vegetarianMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left">
                                                        <?php esc($vegetarianMenu["vegetarianMenu_name"]) ?></h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="events_tab8">
                <form id="classicMenuSubmit" method="POST" action="/classicMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="classicMenu">Klasszikus menü</label>
                            <input type="text" id="classicMenu_name" name="classicMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="classicMenu-characterization">Klasszikus menü jellemzése</label>
                            <input type="text" id="classicMenu_characterization" name="classicMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="classicMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#classicMenuModal">
                    Klasszikus rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="classicMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Klasszikus menü ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getclassicMenu as $classicMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($classicMenu['id'])  ?>/classicMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($classicMenu["classicMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="events_tab9">
                <form id="weddingMenuSubmit" method="POST" action="/weddingMenuSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="weddingMenu">Lakodalmas menü</label>
                            <input type="text" id="weddingMenu_name" name="weddingMenu_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="weddingMenu-characterization">Lakodalmas menü jellemzése</label>
                            <input type="text" id="weddingMenu_characterization" name="weddingMenu_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="weddingMenu-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#weddingMenuModal">
                    Lakodalmas menü rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="weddingMenuModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Lakodalmas menü</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getweddingMenu as $weddingMenu) : ?>
                                        <form method="POST"
                                            action="/events/<?php esc($weddingMenu['id'])  ?>/weddingMenudelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($weddingMenu["weddingMenu_name"]) ?>
                                                    </h3>
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Törlés</button>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- <div class="food-delete-box">
        <form class="food-delete-box__form" id="foodDelete" action="/foodDelete" method="post">
            <button class="btn food-delete-box__btn" name="submit" type="submit">Heti menü törlése</button>
        </form>
    </div> -->

</section>