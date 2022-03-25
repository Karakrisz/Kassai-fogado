<section class="food_options text-center">
    <div class="container">
        <h2 class="mb-100">Ételek rögzítése</h2>
        <?php if($foodFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">A terméket rögzítettük!</p>
        </div>
        <?php endif ?>
        <?php if($dataDelete): ?>
        <div class="alert alert-danger food_options__alert">
            <p class="food_options__alert__p">Az terméket töröltük!</p>
        </div>
        <?php endif ?>
        <ul class="food_options-ul nav nav-tabs d-flex justify-content-center">
            <!-- <li class="active">
                <a href="#tab1" data-toggle="tab">Napi ajánlat</a>
            </li> -->
            <li class="active">
                <a href="#menu_tab2" data-toggle="tab">Levesek</a>
            </li>
            <li>
                <a href="#menu_tab3" data-toggle="tab">Magyaros fogások</a>
            </li>
            <li>
                <a href="#menu_tab4" data-toggle="tab">Főételek</a>
            </li>
            <li>
                <a href="#menu_tab5" data-toggle="tab">Desszertek</a>
            </li>
            <li>
                <a href="#menu_tab6" data-toggle="tab">Köretek</a>
            </li>
            <li>
                <a href="#menu_tab7" data-toggle="tab">Házi savanyúságok</a>
            </li>
            <li>
                <a href="#menu_tab8" data-toggle="tab">Italok</a>
            </li>
        </ul>
        <div class="mt-100 tab-content">

            <div class="tab-pane active" id="menu_tab2">
                <form id="soupSubmit" method="POST" action="/soupSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="soup">Leves</label>
                            <input type="text" id="soup_name" name="soup_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="soup-characterization">Leves jellemzése</label>
                            <input type="text" id="soup_characterization" name="soup_characterization" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="soup-price">Étel ára</label>
                            <input type="text" id="soup_price" name="soup_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="soup-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#soupModal">
                    Levesek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="soupModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Levesek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getsoup as $soup) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($soup['id'])  ?>/soupdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($soup["soup_name"]) ?></h3>
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

            <div class="tab-pane" id="menu_tab3">
                <form id="hungarianDishesSubmit" method="POST" action="/hungarianDishesSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="hungarianDishes">Magyaros fogás</label>
                            <input type="text" id="hungarianDishes_name" name="hungarianDishes_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="hungarianDishes-characterization">Magyaros fogás jellemzése</label>
                            <input type="text" id="hungarianDishes_characterization"
                                name="hungarianDishes_characterization" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Étel ára</label>
                            <input type="text" id="hungarianDishes_price" name="hungarianDishes_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="hungarianDishes-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal"
                    data-target="#hungarianDishesModal">
                    Magyaros fogások megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="hungarianDishesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Magyaros fogások</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($gethungarianDishes as $hungarianDishes) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($hungarianDishes['id'])  ?>/hungarianDishesdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left">
                                                        <?php esc($hungarianDishes["hungarianDishes_name"]) ?>
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

            <div class="tab-pane" id="menu_tab4">
                <form id="mainCoursesSubmit" method="POST" action="/mainCoursesSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="mainCourses">Főétel</label>
                            <input type="text" id="mainCourses_name" name="mainCourses_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="mainCourses-characterization">Főétel jellemzése</label>
                            <input type="text" id="mainCourses_characterization" name="mainCourses_characterization"
                                required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Étel ára</label>
                            <input type="text" id="mainCourses_price" name="mainCourses_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="mainCourses-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#mainCoursesModal">
                    Főételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="mainCoursesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Főételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getmainCourses as $mainCourses) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($mainCourses['id'])  ?>/mainCoursesdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($mainCourses["mainCourses_name"]) ?>
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

            <div class="tab-pane" id="menu_tab5">
                <form id="dessertsSubmit" method="POST" action="/dessertsSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="desserts">Desszert</label>
                            <input type="text" id="desserts_name" name="desserts_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="desserts-characterization">Desszert jellemzése</label>
                            <input type="text" id="desserts_characterization" name="desserts_characterization" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Étel ára</label>
                            <input type="text" id="desserts_price" name="desserts_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="desserts-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#dessertsModal">
                    Desszertek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="dessertsModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Desszertek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getdesserts as $desserts) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($desserts['id'])  ?>/dessertsdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($desserts["desserts_name"]) ?></h3>
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

            <div class="tab-pane" id="menu_tab6">
                <form id="garnishesSubmit" method="POST" action="/garnishesSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="garnishes">Köret</label>
                            <input type="text" id="garnishes_name" name="garnishes_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="garnishes-characterization">Köret jellemzése</label>
                            <input type="text" id="garnishes_characterization" name="garnishes_characterization"
                                required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Étel ára</label>
                            <input type="text" id="garnishes_price" name="garnishes_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="garnishes-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#garnishesModal">
                    Köretek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="garnishesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Köretek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getgarnishes as $garnishes) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($garnishes['id'])  ?>/garnishesdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($garnishes["garnishes_name"]) ?>
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

            <div class="tab-pane" id="menu_tab7">
                <form id="homemadePicklesSubmit" method="POST" action="/homemadePicklesSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="homemadePickles">Házi savanyúság</label>
                            <input type="text" id="homemadePickles_name" name="homemadePickles_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="homemadePickles-characterization">Házi savanyúság jellemzése</label>
                            <input type="text" id="homemadePickles_characterization"
                                name="homemadePickles_characterization" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Étel ára</label>
                            <input type="text" id="homemadePickles_price" name="homemadePickles_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="homemadePickles-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal"
                    data-target="#homemadePicklesModal">
                    Házi savanyúságok megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="homemadePicklesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Házi savanyúságok</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($gethomemadePickles as $homemadePickles) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($homemadePickles['id'])  ?>/homemadePicklesdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left">
                                                        <?php esc($homemadePickles["homemadePickles_name"]) ?></h3>
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

            <div class="tab-pane" id="menu_tab8">
                <form id="drinksSubmit" method="POST" action="/drinksSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="drinks">Ital</label>
                            <input type="text" id="drinks_name" name="drinks_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="drinks-characterization">Ital jellemzése</label>
                            <input type="text" id="drinks_characterization" name="drinks_characterization" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-price">Ital ára</label>
                            <input type="text" id="drinks_price" name="drinks_price">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="drinks-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#drinksModal">
                    Italok megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="drinksModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Italok</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getdrinks as $drinks) : ?>
                                        <form method="POST"
                                            action="/menu-recording/<?php esc($drinks['id'])  ?>/drinksdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left">
                                                        <?php esc($drinks["drinks_name"]) ?></h3>
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