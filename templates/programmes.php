<section class="food_options text-center">
    <div class="container">
        <h2 class="mb-100">Közelgő események rögzítése</h2>
        <?php if($foodFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">Az eseményt rögzítettük!</p>
        </div>
        <?php endif ?>
        <?php if($dataDelete): ?>
        <div class="alert alert-danger food_options__alert">
            <p class="food_options__alert__p">Az eseményt töröltük!</p>
        </div>
        <?php endif ?>
        <div class="mt-100 tab-content">

            <div class="tab-pane active">
                <form id="programmeSubmit" method="POST" action="/programmeSubmit">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="programmes">Főcím</label>
                            <input type="text" id="programmes_name" name="programmes_name" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="programmes-date">Esemény dátuma (DEC 15, 2017)</label>
                            <input type="text" id="programmes_date" name="programmes_date" required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="programmes-time">Esemény időpontja (8:00 AM - 10:00 PM)</label>
                            <input type="text" id="programmes_time" name="programmes_time">
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="programmes-characterization">Esemény jellemzése</label>
                            <input type="text" id="programmes_characterization" name="programmes_characterization">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="programmes-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
                </form>
                <br>
                <button type="button" class="btn btn-primary mt-30" data-toggle="modal" data-target="#programmesModal">
                    Események megtekintése
                </button>

                <!-- The Modal -->
                <div class="fade modal" id="programmesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Eseménysek</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php foreach ($getprogrammes as $programmes) : ?>
                                        <form method="POST"
                                            action="/programmes/<?php esc($programmes['id'])  ?>/programmesdelete">
                                            <ul>
                                                <li>
                                                    <h3 class="text-left"><?php esc($programmes["programmes_name"]) ?>
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

</section>