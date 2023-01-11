<section class="food_options text-center">
    <div class="container">
        <h2 class="mb-100">Bejelentkezés</h2>
        <?php if ($containsError) : ?>
        <div class="alert alert-danger food_options__alert">
            <p class="food_options__alert__p">
                Valamelyik megadott adat hibás! Próbáld meg újra kérlek..
            </p>
        </div>
        <?php endif ?>
        <div class="mt-100 tab-content">

            <div class="tab-pane active">
                <form id="programmeSubmit" method="POST" action="/login">
                    <div class="row d-flex justify-content-around">
                        <div class="col-xl-6 form-group">
                            <label for="email">Email cím</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="írd be az email címed...." required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <label for="password">Jelszó</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Írd be a jelszavad...">
                        </div>
                    </div>
                    <div class="alert alert-success inserted-alert-success">
                        <p id="programmes-inserted">
                        </p>
                    </div>
                    <button type="submit"
                        class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Bejelentkezés</button>
                </form>

            </div>

        </div>
    </div>

</section>