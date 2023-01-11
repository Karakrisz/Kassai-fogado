<section class="food_options text-center">
    <div class="container">
        <h2 class="mb-100">Menü rögzítése</h2>
        <?php if ($foodFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">Az ételt rögzítettük!</p>
        </div>
        <?php endif?>
        <ul class="food_options-ul nav nav-tabs d-flex justify-content-center">
            <!-- <li class="active">
                <a href="#tab1" data-toggle="tab">Napi ajánlat</a>
            </li> -->
            <li class="active">
                <a href="#tab2" data-toggle="tab">Hétfő</a>
            </li>
            <li>
                <a href="#tab3" data-toggle="tab">Kedd</a>
            </li>
            <li>
                <a href="#tab4" data-toggle="tab">Szerda</a>
            </li>
            <li>
                <a href="#tab5" data-toggle="tab">Csütörtök</a>
            </li>
            <li>
                <a href="#tab6" data-toggle="tab">Péntek</a>
            </li>
        </ul>
        <div class="mt-100 tab-content">

            <div class="tab-pane active" id="tab2">
                <form id="mondaySubmit" method="POST" action="/mondaySubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="monday">Hétfő</label>
                            <input type="text" id="monday_name" name="monday_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="monday-characterization">Hétfői menü jellemzése</label>
                            <input type="text" id="monday_characterization" name="monday_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="monday-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#mondayModal">
                    Hétfői rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="mondayModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Hétfői ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getmonday as $monday): ?>
                                        <form method="POST"
                                            action="/weekly-menu-recording/<?php esc($monday['id'])?>/mondaydelete">
                                            <ul>
                                                <li>
                                                    <div class="food-update-delete-box">
                                                        <h3 class="text-left"><?php esc($monday["monday_name"])?></h3>
                                                        <h4 class="food-update">
                                                            <a class="btn btn-success"
                                                                href="/monday<?php esc($monday["id"]) ?>">Módosítás</a>
                                                        </h4>
                                                        <button type="submit"
                                                            class="btn btn-danger float-right">Törlés</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach;?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab3">
                <form id="tuesdaySubmit" method="POST" action="/tuesdaySubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="tuesday">Kedd</label>
                            <input type="text" id="tuesday_name" name="tuesday_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="tuesday-characterization">Keddi menü jellemzése</label>
                            <input type="text" id="tuesday_characterization" name="tuesday_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="tuesday-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#tuesdayModal">
                    Keddi rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="tuesdayModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Keddi ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($gettuesday as $tuesday): ?>
                                        <form method="POST"
                                            action="/weekly-menu-recording/<?php esc($tuesday['id'])?>/tuesdaydelete">
                                            <ul>
                                                <li>
                                                    <div class="food-update-delete-box">

                                                        <h3 class="text-left"><?php esc($tuesday["tuesday_name"])?></h3>
                                                        <h4 class="food-update">
                                                            <a class="btn btn-success"
                                                                href="/tuesday<?php esc($tuesday["id"]) ?>">Módosítás</a>
                                                        </h4>
                                                        <button type="submit"
                                                            class="btn btn-danger float-right">Törlés</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab4">
                <form id="wednesdaySubmit" method="POST" action="/wednesdaySubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="wednesday">Szerda</label>
                            <input type="text" id="wednesday_name" name="wednesday_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="wednesday-characterization">Szerdai menü jellemzése</label>
                            <input type="text" id="wednesday_characterization" name="wednesday_characterization"
                                required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="wednesday-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#wednesdayModal">
                    Szerdai rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="wednesdayModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Szerdai ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getwednesday as $wednesday): ?>
                                        <form method="POST"
                                            action="/weekly-menu-recording/<?php esc($wednesday['id'])?>/wednesdaydelete">
                                            <ul>
                                                <li>
                                                    <div class="food-update-delete-box">
                                                        <h3 class="text-left"><?php esc($wednesday["wednesday_name"])?>
                                                        </h3>
                                                        <h4 class="food-update">
                                                            <a class="btn btn-success"
                                                                href="/wednesday<?php esc($wednesday["id"]) ?>">Módosítás</a>
                                                        </h4>
                                                        <button type="submit"
                                                            class="btn btn-danger float-right">Törlés</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab5">
                <form id="thursdaySubmit" method="POST" action="/thursdaySubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="thursday">Csütörtök</label>
                            <input type="text" id="thursday_name" name="thursday_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="thursday-characterization">Csütörtöki menü jellemzése</label>
                            <input type="text" id="thursday_characterization" name="thursday_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="thursday-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#thursdayModal">
                    Csütörtöki rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="thursdayModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Csütörtöki ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getthursday as $thursday): ?>
                                        <form method="POST"
                                            action="/weekly-menu-recording/<?php esc($thursday['id'])?>/thursdaydelete">
                                            <ul>
                                                <li>
                                                    <div class="food-update-delete-box">
                                                        <h3 class="text-left"><?php esc($thursday["thursday_name"])?>
                                                        </h3>
                                                        <h4 class="food-update">
                                                            <a class="btn btn-success"
                                                                href="/thursday<?php esc($thursday["id"]) ?>">Módosítás</a>
                                                        </h4>
                                                        <button type="submit"
                                                            class="btn btn-danger float-right">Törlés</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab6">
                <form id="fridaySubmit" method="POST" action="/fridaySubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="friday">Péntek</label>
                            <input type="text" id="friday_name" name="friday_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="friday-characterization">Pénteki menü jellemzése</label>
                            <input type="text" id="friday_characterization" name="friday_characterization" required>
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="friday-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#fridayModal">
                    Pénteki rögzített ételek megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="fridayModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Pénteki ételek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getfriday as $friday): ?>
                                        <form method="POST"
                                            action="/weekly-menu-recording/<?php esc($friday['id'])?>/fridaydelete">
                                            <ul>
                                                <li>
                                                    <div class="food-update-delete-box">
                                                        <h3 class="text-left"><?php esc($friday["friday_name"])?></h3>
                                                        <h4 class="food-update">
                                                            <a class="btn btn-success"
                                                                href="/friday<?php esc($friday["id"]) ?>">Módosítás</a>
                                                        </h4>
                                                        <button type="submit"
                                                            class="btn btn-danger float-right">Törlés</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <?php endforeach;?>
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